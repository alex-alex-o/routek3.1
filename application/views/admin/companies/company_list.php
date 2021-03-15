<!-- JQuery DataTable Css -->
<link href="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet" />  
<!-- Bootstrap Select Css -->
<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="display: inline-block;">
                    Организации
                </h2>
                <a href="" class="btn bg-deep-orange waves-effect pull-right"><i class="material-icons">person_add</i>ДОБАВИТЬ</a>
            </div>
            <div class="body">
                <div class="table-responsive">
                  <table id = "na_datatable" class = "table table-striped table-hover dataTable">
                    <thead>
                      <tr>
                        <th>Название</th>
                        <th>Телефон</th>
                        <th>Адрес</th>
                        <th>Дата создания</th>
                        <th>Блокировка</th>
                      </tr>
                    </thead>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

 <!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url()?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url()?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
  //---------------------------------------------------
    var table = $('#na_datatable').DataTable( {
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": "<?=base_url('admin/company/datatable_json')?>",
        "order": [[3,'desc']],
        "columnDefs": [
            { "targets": 0, "name": "name",       'searchable':true, 'orderable':true},
            { "targets": 1, "name": "phone",      'searchable':true, 'orderable':true},
            { "targets": 2, "name": "address",    'searchable':true, 'orderable':false},
            { "targets": 3, "name": "created_at", 'searchable':true, 'orderable':true},
            { "targets": 4, "name": "Block",      'searchable':false, 'orderable':false}
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
        }  
    });
</script>
  
<!-- Autosize Plugin Js -->
<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script> 

<!-- Custom Js -->
 <script src="<?= base_url()?>public/js/pages/tables/jquery-datatable.js"></script>
 
 <script>
    //Textare auto growth
    autosize($('textarea.auto-growth'));

   
    $("#companies").addClass('active');
 </script>
  

  

