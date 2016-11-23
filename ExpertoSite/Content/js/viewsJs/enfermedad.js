var dataTableEnfermedad = null;
var formularioMantenimiento = "EnfermedadForm";
var delRowPos = null;
var delRowID = 0;
var urlMantenimiento = 'Controllers/EnfermedadController.php';

$(document).ready(function () { 

    $.extend($.fn.dataTable.defaults, {
        language: { url: 'Content/js/dataTables/Internationalisation/es.lang' },
        responsive: true,
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "bProcessing": true,
        "dom": 'fltip'
    });    

    dataTableEnfermedad = $('#EnfermedadDataTable').dataTable({
        "bFilter": false,
        "bProcessing": true,
        "serverSide": true,  
        //"scrollY": "350px",              
        "ajax": {
            "url": urlMantenimiento,
            "type": "POST"
        },
        "bAutoWidth": false,
        "columns": [
            {
                "data": function (obj) {

                    return '<div class="action-buttons">\
                    <a class="green editarEnfermedad" href="javascript:void(0)"><i class="ace-icon fa fa-pencil bigger-130"></i></a>\
                    <a class="red eliminarEnfermedad" href="javascript:void(0)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>\
                    </div>';
                }
            },
            { "data": "Id" },
            { "data": "Nombre" },
            { "data": "Descripcion" },
            { "data": function(obj){
                    if(obj.Estado == "1")
                        return '<span class="label label-info label-sm arrowed-in arrowed-in-right">Activo</span>';
                    else
                        return '<span class="label label-sm arrowed-in arrowed-in-right">Inactivo</span>';
                }
            }
        ],
        "aoColumnDefs": [
            {"bSortable": false, "sClass": "center", "aTargets": [0], "width": "10%"},
            {"bVisible": false,  "aTargets": [1]},
            {"aTargets": [2], "width": "20%"},
            {"className": "hidden-480", "aTargets": [3], "width": "50%"},
            {"bSortable": false, "aTargets": [4], "width": "20%"}
        ],
        "order": [[1, "desc"]]
    });

    $('body').on('click', 'button.btnAgregarEnfermedad', function() {
        LimpiarFormulario();

        $("#accionTitle").text('Nuevo');
        $("#NuevoEnfermedad").modal("show");
    });

    $('body').on('click', 'a.editarEnfermedad', function() {        
        var aPos = dataTableEnfermedad.fnGetPosition(this.parentNode.parentNode);
        var aData = dataTableEnfermedad.fnGetData(aPos[0]);
        var rowID = aData.Id;

        var modelView = {
            Id : aData.Id
        };        

        webApp.Ajax({
            url: urlMantenimiento,
            parametros: {
                action: 'GetById', 
                modelView: modelView
            }
        }, function(response){            
            if(response.success){                
                if(response.warning){                           
                    $.gritter.add({
                        title: 'Alerta',
                        text: response.message,
                        class_name: 'gritter-warning gritter'
                    });                         
                }else{
                    LimpiarFormulario();
                    var enfermedad = response.data;
                    $("#Nombre").val(enfermedad.Nombre);
                    $("#Descripcion").val(enfermedad.Descripcion);
                    $("#Estado").val(enfermedad.Estado);
                    $("#EnfermedadId").val(enfermedad.Id);

                    $("#accionTitle").text('Editar');
                    $("#NuevoEnfermedad").modal("show");
                }           

            }else{
                $.gritter.add({
                    title: 'Error',
                    text: response.message,
                    class_name: 'gritter-error gritter'
                });                     
            }
        }, function(response){
            $.gritter.add({
                title: 'Error',
                text: response,
                class_name: 'gritter-error gritter'
            });
        }, function(XMLHttpRequest, textStatus, errorThrown){
            $.gritter.add({
                title: 'Error',
                text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
                class_name: 'gritter-error gritter'
            });
        });
    });      

    $('body').on('click', 'a.eliminarEnfermedad', function() {        
        var aPos = dataTableEnfermedad.fnGetPosition(this.parentNode.parentNode);
        var aData = dataTableEnfermedad.fnGetData(aPos[0]);
        var rowID = aData.Id;

        delRowPos = aPos[0];
        delRowID = rowID;

        webApp.showDeleteConfirmDialog(function () {
                Eliminar();
            },'Se eliminará el registro.  ¿Está seguro que desea continuar?');
    }); 

    $('textarea.limited').inputlimiter({
        remText: '%n caracteres restantes...',
        limitText: 'máximo permitido : %n.'
    }); 

    $("#btnGuardarEnfermedad").on("click", function (e) { 

        if($('#'+formularioMantenimiento).valid()){

            webApp.showReConfirmDialog(function () {
                GuardarEnfermedad();
            });
        }

        e.preventDefault();
    });

    webApp.InicializarValidacion(formularioMantenimiento, 
        {
            Nombre: {
                required: true
            }
        },
        {
            Nombre: {
                required: "Por favor ingrese Nombre",
            }
        });

});  

function LimpiarFormulario(){
    webApp.clearForm(formularioMantenimiento);
    $("#Estado").val(1);
    $("#Nombre").focus();
}

function Eliminar(){
    var modelView = {
        Id : delRowID
    };

    webApp.Ajax({
        url: urlMantenimiento,
        async: false,
        parametros: {
            action: 'Delete', 
            modelView: modelView
        }
    }, function(response){
        $("#NuevoEnfermedad").modal("hide");
        if(response.success){
            dataTableEnfermedad.fnDeleteRow(delRowPos);
            //dataTableEnfermedad.fnReloadAjax();
            
            if(response.warning){                           
                $.gritter.add({
                    title: 'Alerta',
                    text: response.message,
                    class_name: 'gritter-warning gritter'
                });                         
            }else{
                $.gritter.add({
                    title: 'Eliminación Satisfactoria',
                    text: 'Se realizó la eliminación satisfactoriamente',
                    class_name: 'gritter-success gritter'
                });
            }           

        }else{
            $.gritter.add({
                title: 'Error',
                text: response.message,
                class_name: 'gritter-error gritter'
            });                     
        }
    }, function(response){
        $.gritter.add({
            title: 'Error',
            text: response,
            class_name: 'gritter-error gritter'
        });
    }, function(XMLHttpRequest, textStatus, errorThrown){
        $.gritter.add({
            title: 'Error',
            text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
            class_name: 'gritter-error gritter'
        });
    });
    delRowPos = null;
    delRowID = 0;
} 

function GuardarEnfermedad() { 

    var modelView = {
        Id : $("#EnfermedadId").val(),       
        Nombre : $("#Nombre").val(),
        Descripcion : $("#Descripcion").val(),
        Estado : $("#Estado").val(),
    };

    if(modelView.Id == 0)
        action = 'Add';
    else
        action = 'Edit';

    webApp.Ajax({
        url: urlMantenimiento,
        parametros: {
            action: action, 
            modelView: modelView
        }
    }, function(response){
        $("#NuevoEnfermedad").modal("hide");
        if(response.success){
            dataTableEnfermedad.fnReloadAjax();
            
            if(response.warning){                           
                $.gritter.add({
                    title: 'Alerta',
                    text: response.message,
                    class_name: 'gritter-warning gritter'
                });                         
            }else{
                $.gritter.add({
                    title: 'Registro Satisfactorio',
                    text: 'Se realizó el registro satisfactoriamente',
                    class_name: 'gritter-success gritter'
                });
            }           

        }else{
            $.gritter.add({
                title: 'Error',
                text: response.message,
                class_name: 'gritter-error gritter'
            });                     
        }
    }, function(response){
        $.gritter.add({
            title: 'Error',
            text: response,
            class_name: 'gritter-error gritter'
        });
    }, function(XMLHttpRequest, textStatus, errorThrown){
        $.gritter.add({
            title: 'Error',
            text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
            class_name: 'gritter-error gritter'
        });
    });
} 