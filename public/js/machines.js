function fillParams(machineID, url) { 
    $.ajax ({
        type: "GET",
        url: url,
        dataType: 'json',
        data: { "machineID" : machineID},
        cache: false,
        success: function(r)
        {
            $("#params-block").empty();

            for(var key in r) {
                addParameterInput(key, r);
            }
        }
    });
}

function fillParamValues(companyMachineID, url) { 
    $.ajax ({
        type: "GET",
        url: url,
        dataType: 'json',
        data: { "companyMachineID" : companyMachineID},
        cache: false,
        success: function(r)
        {
            $("#params-block").empty();

            for(var key in r) {
                addParameterInput(key, r);
            }
        }
    });
}
    
function addParameterInput(key, params, ) {
    if (params[key].id) {
        if (params[key].type === "bool") {
            var paramDiv =
                '<div class="row clearfix">'
                +    '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">'
                +       '<label class="form-check-label" for="param' + params[key].id + '">'  + params[key].name + '</label>'
                +    '</div>'
                +    '<div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">'
                +        '<div class="form-group">'
                +            '<div class="form-line">'
                +               '<input type="checkbox" class="form-check-input" id="param' + params[key].id + '" name="param[' + params[key].id + ']" />'
                +            '</div>'
                +        '</div>'
                +    '</div>'
                + '</div>';
        } else {
            var paramDiv =
                '<div class="row clearfix">'
                +    '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">'
                +       '<label class="col-form-label" for="name">' + params[key].name +  '</label>'
                +    '</div>'
                +    '<div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">'
                +        '<div class="form-group">'
                +            '<div class="form-line">'
                +               '<input type="text" class="form-control" id="param' + params[key].id + '" name="param[' + params[key].id + ']" value = "' + params[key].value + '" />'
                +            '</div>'
                +        '</div>'
                +    '</div>'
                + '</div>';

        }

        $("#params-block").append(paramDiv);
    }            
}

