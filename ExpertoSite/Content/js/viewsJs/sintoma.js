var dataTableSintoma = null;
var formularioMantenimiento = "SintomaForm";
var delRowPos = null;
var delRowID = 0;
var urlMantenimiento = 'Controllers/SintomaController.php';

$(document).ready(function () { 

    $.extend($.fn.dataTable.defaults, {
        language: { url: 'Content/js/dataTables/Internationalisation/es.lang' },
        responsive: true,
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        "bProcessing": true,
        "dom": 'fltip'
    });    

    dataTableSintoma = $('#SintomaDataTable').dataTable({
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
                    <a class="green editarSintoma" href="javascript:void(0)"><i class="ace-icon fa fa-pencil bigger-130"></i></a>\
                    <a class="red eliminarSintoma" href="javascript:void(0)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>\
                    </div>';
                }
            },
            { "data": "Id" },
            { "data": "EnfermedadNombre" },
            { "data": "Nombre" },
            { "data": "Pregunta" },
            { "data": function(obj){
                    if(obj.EsPrincipal == "1")
                        return '<span class="label label-info label-sm arrowed-in arrowed-in-right">SI</span>';
                    else
                        return '<span class="label label-sm arrowed-in arrowed-in-right">NO</span>';
                }
            },            
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
            {"aTargets": [2], "width": "15%"},
            {"aTargets": [3], "width": "15%"},
            {"className": "hidden-480", "aTargets": [4], "width": "40%"},
            {"bSortable": false, "aTargets": [5], "width": "10%"},
            {"bSortable": false, "aTargets": [5], "width": "10%"}
        ],
        "order": [[1, "desc"]]
    });

    $('body').on('click', 'button.btnAgregarSintoma', function() {
        LimpiarFormulario();

        $("#accionTitle").text('Nuevo');
        $("#NuevoSintoma").modal("show");
    });

    $('body').on('click', 'a.editarSintoma', function() {        
        var aPos = dataTableSintoma.fnGetPosition(this.parentNode.parentNode);
        var aData = dataTableSintoma.fnGetData(aPos[0]);
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
                    var sintoma = response.data;
                    $("#Nombre").val(sintoma.Nombre);
                    $("#Pregunta").val(sintoma.Pregunta);
                    $("#EsPrincipal").prop('checked',(sintoma.EsPrincipal==1));
                    $("#Estado").val(sintoma.Estado);
                    $("#SintomaId").val(sintoma.Id);
                    $("#EnfermedadId").val(sintoma.EnfermedadId);

                    $("#accionTitle").text('Editar');
                    $("#NuevoSintoma").modal("show");
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

    $('body').on('click', 'a.eliminarSintoma', function() {        
        var aPos = dataTableSintoma.fnGetPosition(this.parentNode.parentNode);
        var aData = dataTableSintoma.fnGetData(aPos[0]);
        var rowID = aData.Id;

        delRowPos = aPos[0];
        delRowID = rowID;

        webApp.showDeleteConfirmDialog(function () {
                Eliminar();
            },'Se eliminará el registro.  ¿Está seguro que desea continuar?');
    });

    $("#btnGuardarSintoma").on("click", function (e) { 

        if($('#'+formularioMantenimiento).valid()){

            webApp.showReConfirmDialog(function () {
                GuardarSintoma();
            });
        }

        e.preventDefault();
    });

    webApp.InicializarValidacion(formularioMantenimiento, 
        {
            Nombre: {
                required: true
            },
            Pregunta: {
                required: true
            },
            EnfermedadId: {
                required: true
            } 
        },
        {
            Nombre: {
                required: "Por favor ingrese Nombre",
            },
            Pregunta: {
                required: "Por favor ingrese Pregunta",
            },
            EnfermedadId: {
                required: "Por favor seleccione Enfermedad"
            }
        });
    CargarEnfermedad();
});  

function LimpiarFormulario(){
    webApp.clearForm(formularioMantenimiento);
    $("#Estado").val(1);
    $("#EnfermedadId").focus();
}

function CargarEnfermedad(){
    
    webApp.Ajax({
        url: 'Controllers/EnfermedadController.php',
        async: false,
        parametros: {
            action: 'GetAll'
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
                $.each(response.data, function(index, item){
                    $("#EnfermedadId").append('<option value="'+ item.Id +'">' + item.Nombre + '</option>');
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
        $("#NuevoSintoma").modal("hide");
        if(response.success){
            dataTableSintoma.fnDeleteRow(delRowPos);
            //dataTableSintoma.fnReloadAjax();
            
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

function GuardarSintoma() { 
    debugger;
    var modelView = {
        Id : $("#SintomaId").val(),  
        EnfermedadId: $("#EnfermedadId").val(),
        Nombre : $("#Nombre").val(),
        Pregunta : $("#Pregunta").val(),
        EsPrincipal : $("#EsPrincipal").prop('checked')?1:0,
        Estado : $("#Estado").val()
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
        $("#NuevoSintoma").modal("hide");        
        if(response.success){
            dataTableSintoma.fnReloadAjax();
            
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