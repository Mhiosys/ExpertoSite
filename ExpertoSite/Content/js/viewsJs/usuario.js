var dataTableUsuario = null;
var formularioMantenimiento = "UsuarioForm";
var delRowPos = null;
var delRowID = 0;
var urlMantenimiento = 'Controllers/UsuarioController.php';

$(document).ready(function () { 

    $.extend($.fn.dataTable.defaults, {
        language: { url: 'Content/js/dataTables/Internationalisation/es.lang' },
        responsive: true,
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "bProcessing": true,
        "dom": 'fltip'
    });    

    dataTableUsuario = $('#UsuarioDataTable').dataTable({
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
                    <a class="green editarUsuario" href="javascript:void(0)"><i class="ace-icon fa fa-pencil bigger-130"></i></a>\
                    <a class="red eliminarUsuario" href="javascript:void(0)"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>\
                    </div>';
                }
            },
            { "data": "Id" },
            { "data": "Username" },
            { "data": "Nombre" },
            { "data": "Apellido" },
            { "data": "Correo" },
            { "data": "RolNombre" },
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
            {"aTargets": [2], "width": "10%"},
            {"className": "hidden-480", "aTargets": [3], "width": "20%"},
            {"className": "hidden-480", "aTargets": [4], "width": "25%"},
            {"className": "hidden-480", "aTargets": [5], "width": "15%"},
            {"bSortable": false, "aTargets": [6], "width": "20%"}
        ],
        "order": [[1, "desc"]]
    });

    $('body').on('click', 'button.btnAgregarUsuario', function() {
        LimpiarFormulario();

        $("#accionTitle").text('Nuevo');
        $("#NuevoUsuario").modal("show");
    });

    $('body').on('click', 'a.editarUsuario', function() {        
        var aPos = dataTableUsuario.fnGetPosition(this.parentNode.parentNode);
        var aData = dataTableUsuario.fnGetData(aPos[0]);
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
                    var usuario = response.data;                    
                    $("#Username").val(usuario.Username);
                    $("#Nombre").val(usuario.Nombre);
                    $("#Apellido").val(usuario.Apellido);
                    $("#Correo").val(usuario.Correo);
                    $("#CargoId").val(usuario.CargoId);
                    $("#RolId").val(usuario.RolId);
                    $("#Estado").val(usuario.Estado);
                    $("#UsuarioId").val(usuario.Id);

                    $("#accionTitle").text('Editar');
                    $("#NuevoUsuario").modal("show");
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

    $('body').on('click', 'a.eliminarUsuario', function() {        
        var aPos = dataTableUsuario.fnGetPosition(this.parentNode.parentNode);
        var aData = dataTableUsuario.fnGetData(aPos[0]);
        var rowID = aData.Id;

        delRowPos = aPos[0];
        delRowID = rowID;

        webApp.showDeleteConfirmDialog(function () {
                Eliminar();
            },'Se eliminará el registro.  ¿Está seguro que desea continuar?');
    });

    $("#btnGuardarUsuario").on("click", function (e) { 

        if($('#'+formularioMantenimiento).valid()){

            webApp.showReConfirmDialog(function () {
                GuardarUsuario();
            });
        }

        e.preventDefault();
    });

    webApp.validarLetrasEspacio(['Username','Nombre','Apellido']);

    webApp.InicializarValidacion(formularioMantenimiento, 
        {
            Username: {
                required: true
            },
            Nombre: {
                //currency: ["$", false],
                required: true
            },
            Apellido: {
                required: true
                //letterswithspace : true
            },
            Correo: {
                required: true,
                email:true
            },
            CargoId: {
                required: true
            },
            RolId: {
                required: true
            }            
        },
        {
            Username: {
                required: "Por favor ingrese Username"
            },
            Nombre: {
                required: "Por favor ingrese Nombre"
            },
            Apellido: {
                required: "Por favor ingrese Apellido"
            },
            Correo: {
                required: "Por favor ingrese Correo",
                email: "Por favor ingrese Correo válido"
            },
            CargoId: {
                required: "Por favor seleccione Cargo"
            },            
            RolId: {
                required: "Por favor seleccione Rol"
            }            
        });

    CargarCargo();
    CargarRol();

});  

function LimpiarFormulario(){
    webApp.clearForm(formularioMantenimiento);
    $("#CargoId").val(1);
    $("#RolId").val(1);
    $("#Estado").val(1);
    $("#Username").focus();
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
        $("#NuevoUsuario").modal("hide");
        if(response.success){
            dataTableUsuario.fnDeleteRow(delRowPos);
            
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

function GuardarUsuario() { 

    var modelView = {
        Id : $("#UsuarioId").val(),    
        Username : $("#Username").val(),
        Nombre : $("#Nombre").val(),
        Apellido : $("#Apellido").val(),
        Correo : $("#Correo").val(),
        CargoId : $("#CargoId").val(),
        RolId : $("#RolId").val(),
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
        $("#NuevoUsuario").modal("hide");
        if(response.success){
            dataTableUsuario.fnReloadAjax();
            
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

function CargarCargo(){
    
    webApp.Ajax({
        url: 'Controllers/CargoController.php',
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
                    $("#CargoId").append('<option value="'+ item.Id +'">' + item.Nombre + '</option>');
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

function CargarRol(){

    webApp.Ajax({
        url: 'Controllers/RolController.php',
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
                    $("#RolId").append('<option value="'+ item.Id +'">' + item.Nombre + '</option>');
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