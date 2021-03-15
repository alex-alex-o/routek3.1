ExtensionInterface = function (app)
{
    this.app = app;
};

ExtensionInterface.prototype.GetButtonsDiv = function ()
{
    return this.app.extensionButtons.GetButtonsDiv ();
};

ExtensionInterface.prototype.GetModelJson = function ()
{
    return this.app.viewer.GetJsonData ();
};

ImporterApp = function ()
{
    this.sizeX = null;
    this.sizeY = null;
    this.sizeZ = null;
    
    this.canvas = null;
    this.viewer = null;
    this.fileNames = null;
    this.inGenerate = false;
    this.meshesGroup = null;
    this.materialMenuItems = null;
    this.meshMenuItems = null;
    this.extensions = [];
    this.importerButtons = null;
    this.extensionButtons = null;
    this.introControl = null;
    this.floatingDialog = null;
    this.isMobile = null;
    this.readyForTest = null;
};

ImporterApp.prototype.Init = function ()
{
    if (!JSM.IsWebGLEnabled () || !JSM.IsFileApiEnabled ()) {
        while (document.body.lastChild) {
            document.body.removeChild (document.body.lastChild);
        }

        var div = $('<div>').addClass ('nosupport').appendTo ($('body'));
        div.html ([
            '<div id="nosupport">',
            this.GetWelcomeText (),
            '<div class="nosupporterror">Ваш браузер должен поддерживать следующие технологии: WebGL, WebGLRenderingContext, File, FileReader, FileList, Blob, URL.</div>',
            '</div>'
        ].join (''));
        return;
    }

    var top = $('#top');
    this.importerButtons = new ImporterButtons (top);
    this.introControl   = new FloatingControl ();
    this.floatingDialog = new FloatingDialog ();

    var match = window.matchMedia ('(max-device-width : 400px)');
    this.isMobile = match.matches;

    window.addEventListener ('resize', this.Resize.bind (this), false);
    this.Resize ();

    var canvasName = 'modelcanvas';
    this.canvas = $('#' + canvasName);
    this.RegisterCanvasClick ();
    this.viewer = new ImporterViewer ();
    this.viewer.Init (canvasName);
    
    window.addEventListener ('dragover', this.DragOver.bind (this), false);
    window.addEventListener ('drop',     this.Drop.bind (this), false);

    var fileInput = document.getElementById ('file');
    if (fileInput !== null) {
        fileInput.addEventListener ('change', this.FileSelected.bind (this), false);
    }

    var modelInput = document.getElementById ('model_id');
    if (modelInput !== null) {
        modelInput.addEventListener ('change', this.ModelSelected.bind (this), false);
    }
    
    window.onhashchange = this.LoadFilesFromHash.bind (this);
    var hasHashModel = this.LoadFilesFromHash ();
    if (!hasHashModel && !this.isMobile) {
        this.ShowIntroControl ();
    }
};

ImporterApp.prototype.ClearReadyForTest = function ()
{
    if (this.readyForTest !== null) {
        this.readyForTest.remove ();
        this.readyForTest = null;
    }
};

ImporterApp.prototype.SetReadyForTest = function ()
{
    this.readyForTest = $('<div>').attr ('id', 'readyfortest').hide ().appendTo ($('body'));
};

ImporterApp.prototype.AddExtension = function (extension)
{
    if (!extension.IsEnabled ()) {
        return;
    }

    var extInterface = new ExtensionInterface (this);
    extension.Init (extInterface);
};

ImporterApp.prototype.ShowIntroControl = function ()
{
    var dialogText = [
        '<div class = "importerdialog">',
            this.GetWelcomeText (),
        '</div>',
    ].join ('');
    
    this.introControl.Open ({
        parent : this.canvas,
        text : dialogText
    });
    this.Resize ();
};

ImporterApp.prototype.HideIntroControl = function ()
{
    this.introControl.Close ();
    this.Resize ();
};

ImporterApp.prototype.GetWelcomeText = function ()
{
    var welcomeText = [].join ('');
    
    return welcomeText;
};

ImporterApp.prototype.Resize = function ()
{
    this.introControl.Resize ();
    this.floatingDialog.Resize ();
};

ImporterApp.prototype.JsonLoaded = function (progressBar)
{
    this.Generate(progressBar);
};

ImporterApp.prototype.Volume = function (v) {

    var v321 = v[2].x * v[1].y * v[0].z;
    var v231 = v[1].x * v[2].y * v[0].z;
    var v312 = v[2].x * v[0].y * v[1].z;
    var v132 = v[0].x * v[2].y * v[1].z;
    var v213 = v[1].x * v[0].y * v[2].z;
    var v123 = v[0].x * v[1].y * v[2].z;

    return (1.0 /6.0) * (-v321 + v231 + v312 - v132 - v213 + v123);    
}

ImporterApp.prototype.SetSize = function ()
{
    var i, j, mesh;
    var volume = 0;
    var jsonData = this.viewer.GetJsonData ();
    var v = [];
    
    for (i = 0; i < jsonData.meshes.length; i++) {
        mesh = jsonData.meshes[i];

        var min = new JSM.Coord (JSM.Inf, JSM.Inf, JSM.Inf);
        var max = new JSM.Coord (-JSM.Inf, -JSM.Inf, -JSM.Inf);
        var j, k = 0, vertex;
        
        for (j = 0; j < mesh.vertices.length; j =  j + 3) {
            vertex = new JSM.Coord (mesh.vertices[j], mesh.vertices[j + 1], mesh.vertices[j + 2]);
            v[k] = vertex;
            
            min.x = JSM.Minimum (min.x, vertex.x);
            min.y = JSM.Minimum (min.y, vertex.y);
            min.z = JSM.Minimum (min.z, vertex.z);
            max.x = JSM.Maximum (max.x, vertex.x);
            max.y = JSM.Maximum (max.y, vertex.y);
            max.z = JSM.Maximum (max.z, vertex.z);
            
            k ++;
            if (k > 2) {
                volume += this.Volume(v);
                k = 0;
            }
        }
        
        this.sizeX  = (max.x - min.x).toFixed (2);
        this.sizeY  = (max.y - min.y).toFixed (2);
        this.sizeZ  = (max.z - min.z).toFixed (2);
        this.volume = (Math.round(volume / 1000) * 100) / 100;
    
        $('#size-x').val(this.sizeX);
        $('#size-y').val(this.sizeY);
        $('#size-z').val(this.sizeZ);
        $('#volume').val(this.volume);
        $('#snapshot').val(this.viewer.viewer.renderer.domElement.toDataURL("image/jpeg"));
    }    
    
};

ImporterApp.prototype.GenerateError = function (errorMessage)
{
	this.viewer.RemoveMeshes ();
	var menu = $('#menu');
	menu.empty ();
	
	this.floatingDialog.Open ({
		title : 'Ошибка',
		text : '<div class="importerdialog">' + errorMessage + '</div>',
		buttons : [
			{
				text : 'ok',
				callback : function (dialog) {
					dialog.Close ();
				}
			}
		]
	});	
};

ImporterApp.prototype.Generate = function (progressBar)
{
	function ShowMeshes (importerApp, progressBar, merge)
	{
		importerApp.inGenerate = true;
		var environment = {
			onStart : function (taskCount) {
				progressBar.Init (taskCount);
			},
			onProgress : function (currentTask) {
				progressBar.Step (currentTask + 1);
			},
			onFinish : function () {
                                importerApp.SetSize ();
//				importerApp.GenerateMenu ();
				importerApp.inGenerate = false;
//				importerApp.SetReadyForTest ();
			}
		};
		
		if (merge) {
			var jsonData = importerApp.viewer.GetJsonData ();
			importerApp.viewer.SetJsonData (JSM.MergeJsonDataMeshes (jsonData));
		}
		importerApp.viewer.ShowAllMeshes (environment);
	}

	var jsonData = this.viewer.GetJsonData ();
	if (jsonData.materials.length === 0 || jsonData.meshes.length === 0) {
		this.GenerateError ('Невозможно открыть файл. Возможно проблемы с форматом файла.');
		this.SetReadyForTest ();
		return;
	}
	
	var myThis = this;
	if (jsonData.meshes.length > 250) {
		this.floatingDialog.Open ({
			title : 'Информация',
			text : '<div class="importerdialog">Большое количество объектов в модели. Могут возникнуит проблемы с производительность. Хотите объединить объединить объекты?</div>',
			buttons : [
				{
					text : 'да',
					callback : function (dialog) {
						ShowMeshes (myThis, progressBar, true);
						dialog.Close ();
					}
				},
				{
					text : 'нет',
					callback : function (dialog) {
						ShowMeshes (myThis, progressBar, false);
						dialog.Close ();
					}
				}				
			]
		});
	} else {
		ShowMeshes (myThis, progressBar, false);
	}
};

ImporterApp.prototype.FitInWindow = function ()
{
	this.viewer.FitInWindow ();
};

ImporterApp.prototype.FitMeshInWindow = function (meshIndex)
{
	this.viewer.FitMeshInWindow (meshIndex);
};

ImporterApp.prototype.FitMeshesByMaterialInWindow = function (materialIndex)
{
	var meshIndices = this.viewer.GetMeshesByMaterial (materialIndex);
	if (meshIndices.length === 0) {
		return;
	}
	this.viewer.FitMeshesInWindow (meshIndices);
};

ImporterApp.prototype.SetFixUp = function ()
{
	this.viewer.SetFixUp ();
};

ImporterApp.prototype.SetNamedView = function (viewName)
{
	this.viewer.SetNamedView (viewName);
};

ImporterApp.prototype.SetView = function (viewType)
{
	this.viewer.SetView (viewType);
};

ImporterApp.prototype.ShowHideMesh = function (meshIndex)
{
	var meshMenuItem = this.meshMenuItems[meshIndex];
	this.ShowHideMeshInternal (meshIndex, !meshMenuItem.isVisible);
	this.viewer.Draw ();
};

ImporterApp.prototype.IsolateMesh = function (meshIndex)
{
	var i, meshMenuItem;
	
	var onlyThisVisible = true;
	if (!this.meshMenuItems[meshIndex].isVisible) {
		onlyThisVisible = false;
	} else {
		for (i = 0; i < this.meshMenuItems.length; i++) {
			meshMenuItem = this.meshMenuItems[i];
			if (meshMenuItem.isVisible && i !== meshIndex) {
				onlyThisVisible = false;
				break;
			}
		}
	}
	
	var i;
	for (i = 0; i < this.meshMenuItems.length; i++) {
		if (onlyThisVisible) {
			this.ShowHideMeshInternal (i, true);
		} else {
			if (i == meshIndex) {
				this.ShowHideMeshInternal (i, true);
			} else {
				this.ShowHideMeshInternal (i, false);
			}
		}
	}
	
	this.viewer.Draw ();
};

ImporterApp.prototype.ShowHideMeshInternal = function (meshIndex, isVisible)
{
	var meshMenuItem = this.meshMenuItems[meshIndex];
	meshMenuItem.isVisible = isVisible;
	meshMenuItem.visibleImage.attr ('src', meshMenuItem.isVisible ? 'images/visible.png' : 'images/hidden.png');
	this.viewer.ShowMesh (meshIndex, meshMenuItem.isVisible);
};

ImporterApp.prototype.HighlightMeshInternal = function (meshIndex, highlight)
{
	var meshMenuItem = this.meshMenuItems[meshIndex];
	meshMenuItem.Highlight (highlight);
	this.viewer.HighlightMesh (meshIndex, highlight);
};

ImporterApp.prototype.ProcessFiles = function (fileList, isUrl)
{
	this.ClearReadyForTest ();
	this.HideIntroControl ();
	this.floatingDialog.Close ();
	if (this.inGenerate) {
		return;
	}

        if (!isUrl && !this.CheckFiles(fileList)) {
            return;
        }
        
        var userFiles = fileList;
        if (userFiles.length === 0) {
            return;
	}
	
	this.fileNames = "";
	
	var myThis = this;
	var processorFunc = JSM.ConvertFileListToJsonData;
	if (isUrl) {
            processorFunc = JSM.ConvertURLListToJsonData;
	}
        
	var menu = $('#menu');
	menu.empty ();
	if (isUrl) {
		menu.html ('Закачка файла...');
	} else {
		menu.html ('Загрузка файлов...');
	}
	
	processorFunc (userFiles, {
		onError : function () {
			myThis.GenerateError ('Формат не поддерживается. Поддерживаемые форматы: 3ds, obj, stl, off.');
			myThis.SetReadyForTest ();
			return;
		},
		onReady : function (fileNames, jsonData) {
			myThis.fileNames = fileNames;
			myThis.viewer.SetJsonData (jsonData);
			menu.empty ();
			var progressBar = new ImporterProgressBar (menu);
			myThis.JsonLoaded (progressBar);
		}
	});
};

ImporterApp.prototype.RegisterCanvasClick = function ()
{
	var myThis = this;
	var mousePosition = null;
	this.canvas.mousedown (function () {
		mousePosition = [event.pageX, event.pageY];
	});
	this.canvas.mouseup (function (event) {
		var mouseMoved = (mousePosition == null || event.pageX != mousePosition[0] || event.pageY != mousePosition[1]);
		if (!mouseMoved) {
			var x = event.pageX - $(this).offset ().left;
			var y = event.pageY - $(this).offset ().top;
			myThis.OnCanvasClick (x, y);
		}
		mousePosition = null;
	});
};

ImporterApp.prototype.ScrollMeshIntoView = function (meshIndex)
{
	if (meshIndex == -1) {
		return;
	}
	var menuItem = this.meshMenuItems[meshIndex];
	menuItem.menuItemDiv.get (0).scrollIntoView ();
};

ImporterApp.prototype.HighlightMesh = function (meshIndex)
{
	var i, menuItem, highlight;
	if (meshIndex != -1) {
		for (i = 0; i < this.meshMenuItems.length; i++) {
			menuItem = this.meshMenuItems[i];
			highlight = false;
			if (i == meshIndex) {
				if (!menuItem.IsHighlighted ()) {
					this.HighlightMeshInternal (i, true);
				} else {
					this.HighlightMeshInternal (i, false);
				}
			}
		}
	} else {
		for (i = 0; i < this.meshMenuItems.length; i++) {
			menuItem = this.meshMenuItems[i];
			if (menuItem.IsHighlighted ()) {
				this.HighlightMeshInternal (i, false);
			}
		}
	}
	
	this.viewer.Draw ();
};

ImporterApp.prototype.HighlightMeshesByMaterial = function (materialIndex)
{
	var meshIndices = this.viewer.GetMeshesByMaterial (materialIndex);
	if (meshIndices.length === 0) {
		return;
	}
	
	var i, meshIndex, meshMenuItem;
	this.HighlightMesh (-1);
	for (i = 0; i < meshIndices.length; i++) {
		meshIndex = meshIndices[i];
		meshMenuItem = this.meshMenuItems[meshIndex];
		this.HighlightMeshInternal (meshIndex, true);
	}

	this.meshesGroup.SetOpen (true);
	this.ScrollMeshIntoView (meshIndices[0]);
	this.viewer.Draw ();
};

ImporterApp.prototype.OnCanvasClick = function (x, y)
{
	if (this.meshMenuItems == null) {
		return;
	}
	var objects = this.viewer.GetMeshesUnderPosition (x, y);
	var meshIndex = -1;
	if (objects.length > 0) {
		meshIndex = objects[0].originalJsonMeshIndex;
		this.meshesGroup.SetOpen (true);
	}
	
	this.HighlightMesh (meshIndex);
	this.ScrollMeshIntoView (meshIndex);
};

ImporterApp.prototype.DragOver = function (event)
{
    event.stopPropagation ();
    event.preventDefault ();
    event.dataTransfer.dropEffect = 'copy';
};

ImporterApp.prototype.Drop = function (event)
{
    event.stopPropagation ();
    event.preventDefault ();
    this.ResetHash ();
    this.ProcessFiles (event.dataTransfer.files, false);
};

ImporterApp.prototype.FileSelected = function (event)
{
    event.stopPropagation ();
    event.preventDefault ();
    this.ResetHash ();
    this.ProcessFiles (event.target.files, false);
    
};

ImporterApp.prototype.OpenFile = function ()
{
    var fileInput = document.getElementById ('file');
    fileInput.click ();
};

ImporterApp.prototype.ModelSelected = function (event)
{
    event.stopPropagation ();
    event.preventDefault ();
    this.ResetHash ();
    files = [event.target.selectedOptions[0].getAttribute("data-url")];    
    this.LoadFilesFromUrl (files, false);
    
};

ImporterApp.prototype.ResetHash = function ()
{
    if (window.location.hash.length > 1) {
        window.location.hash = '';
    }
};

ImporterApp.prototype.LoadFilesFromHash = function ()
{
    if (window.location.hash.length < 2) {
        return false;
    }

    var fileInput = $('#file');
    var hash = window.location.hash;
    if (hash == '#testmode') {
        fileInput.css ('display', '');
        fileInput.css ('position', 'absolute');
        fileInput.css ('right', '10px');
        fileInput.css ('bottom', '10px');
        return false;	
    }

    fileInput.css ('display', 'none');
    var hash = hash.substr (1, hash.length - 1);
    var fileList = hash.split (',');

    this.ProcessFiles (fileList, true);
    return true;
};

ImporterApp.prototype.LoadFilesFromUrl = function (fileList)
{
    this.ProcessFiles (fileList, true);
    return true;    
}

ImporterApp.prototype.CheckFiles = function (fileList) {
    
    for(i = 0; i < fileList.length; i ++) {
        if (fileList[i].size / 1024 / 1024 > 10) {
            alert("Размер файла не должен превышать 10Мб");
            $("#file").val('');
            $("#file-link-panel").removeAttr('hidden');

            return false;
        } 

        ext = ((/[.]/.exec(fileList[i].name)) ? /[^.]+$/.exec(fileList[i].name) : undefined).toString().toLowerCase();
        if (!(ext === 'stl' || ext === 'obj' || ext === 'pdf' || ext === 'jpeg' || ext === 'jpg' || ext === 'gif' || ext === 'png' || ext === 'tiff')) {

            alert("Неподдерживаемый формат файла. Поддерживаются файлы: stl, obj, pdf, jpeg, gif, png, tiff.");
            $("#file").val('');
            return false;
        }

    }    
    
    return true;
}

window.onload = function ()
{
//	var importerApp = new ImporterApp ();
//	importerApp.Init ();
	// ExtensionIncludes
	// importerApp.AddExtension (new ExampleExtension ());
	// ExtensionIncludesEnd
};
