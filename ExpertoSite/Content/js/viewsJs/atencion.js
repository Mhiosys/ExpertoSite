$(document).ready(function () {
	var $validation = true;
	$('#fuelux-wizard-container')
	.ace_wizard({
		//step: 2, //optional argument. wizard will jump to step "2" at first
		//buttons: '.wizard-actions:eq(0)'
	})
	.on('actionclicked.fu.wizard' , function(e, info){
		if(info.step == 1) {
			if(info.direction == "next"){
		        if(!$('#frmPaciente').valid()){
		        	$("#Finalizado").val(0);
		            e.preventDefault();
		        }else{
		        	if(parseInt($("#Finalizado").val())==0){
			        	$("#Finalizado").val(1);
			        	$("#respuestasSintomas").html('');
						GetFirstPrincipal();
		        	}
				}
			}

			if(info.direction == "previous"){
			}
		}

		if(info.step == 2) {
			if(info.direction == "next"){

			}

			if(info.direction == "previous"){
			}
		}		

		if(info.step == 3) {
			if(info.direction == "previous"){

			}
		}		
	})
	.on('finished.fu.wizard', function(e) {

		if($('#frmCanje').valid()){
		    webApp.showConfirmResumeDialog(function () {
			    GuardarCanje();
			},
			GetResumen());				
		}else{
			webApp.showMessageDialog("Debe ingresar los datos correctamente");
		}		

	}).on('stepclick.fu.wizard', function(e){
		//e.preventDefault();//this will prevent clicking and selecting steps
	});

    //webApp.disableAllFormElements('frmTitular');
    webApp.validarNumerico(['Talla','Peso']);
    webApp.InicializarValidacion('frmPaciente', 
        {
            Genero: {
                required: true
            },
            Edad: {
                required: true
            },            
            Talla: {
                required: true
            },
            Peso: {
                required: true
            }                             
        },
        {
            Genero: {
                required: "Por favor seleccione Género"
            },
            Edad: {
                required: "Por favor seleccione Edad"
            },           
            Talla: {
                required: "Por favor ingrese Talla"
            },
            Peso: {
                required: "Por favor ingrese Peso"
            }                      
        });
});	

function GetFirstPrincipal(){

    webApp.Ajax({
        url: 'Controllers/SintomaController.php',
        parametros: {
            action: 'GetFirstPrincipal'
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
                var sintoma = response.data;
                $("#SintomaId").val(sintoma.Id);
                $("#EnfermedadId").val(sintoma.EnfermedadId);
                $("#EnfermedadNombre").val(sintoma.EnfermedadNombre);
                /*                
                $("#Nombre").val(sintoma.Nombre);
                $("#Pregunta").val(sintoma.Pregunta);
                $("#EsPrincipal").val(sintoma.EsPrincipal);
                $("#Estado").val(sintoma.Estado);
                */

			    webApp.showConfirmDialogSintoma(
			    	sintoma.Nombre,
			    	sintoma.Pregunta,
			    	function () {
			    		$("#respuestasSintomas").append('<p>' + sintoma.Nombre + '</p>');
			    		setTimeout(function(){
			    			GetNextSintoma(sintoma.EnfermedadId, sintoma.Id);
			    		}, 500);			    		
			    	},
					function () {
						$("#respuestasSintomas").html('');
			    		setTimeout(function(){
			    			GetNextPrincipalByEnfermedadId(sintoma.EnfermedadId);
			    		}, 500);						
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

function GetNextSintoma(enfermedadId, next){

    var modelView = {
        EnfermedadId : enfermedadId,
        Next: next
    };	

    webApp.Ajax({
        url: 'Controllers/SintomaController.php',
        parametros: {
            action: 'GetNextSintoma',
            modelView: modelView
        }
    }, function(response){            
        if(response.success){                
            if(response.warning){                           
            	if(response.data == null){
					var wizard = $('#fuelux-wizard-container').data('fu.wizard')
					wizard.currentStep = 3;
					wizard.setState();  

					$("#respuestasDiagnostico").html('<h1><small>De acuerdo a sus respuestas, usted padece de </small> <i class="ace-icon fa fa-angle-double-right"></i> ' + $("#EnfermedadNombre").val() + ' </h1>');
            	}
            }else{
                var sintoma = response.data;
                $("#SintomaId").val(sintoma.Id);
                $("#EnfermedadId").val(sintoma.EnfermedadId);
                $("#EnfermedadNombre").val(sintoma.EnfermedadNombre);

			    webApp.showConfirmDialogSintoma(
			    	sintoma.Nombre,
			    	sintoma.Pregunta,
			    	function () {
			    		$("#respuestasSintomas").append('<p>' + sintoma.Nombre + '</p>');
			    		setTimeout(function(){
			    			GetNextSintoma(sintoma.EnfermedadId, sintoma.Id);
			    		}, 500);			    		
			    	},
					function () {
						$("#respuestasSintomas").html('');
			    		setTimeout(function(){
			    			GetNextPrincipalByEnfermedadId(sintoma.EnfermedadId);
			    		}, 500);						
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

function GetNextPrincipalByEnfermedadId(enfermedadId){

    var modelView = {
        EnfermedadId : enfermedadId
    };	

    webApp.Ajax({
        url: 'Controllers/SintomaController.php',
        parametros: {
            action: 'GetNextPrincipalByEnfermedadId',
            modelView: modelView
        }
    }, function(response){            
        if(response.success){                
            if(response.warning){                           
            	if(response.data == null){
					var wizard = $('#fuelux-wizard-container').data('fu.wizard')
					wizard.currentStep = 3;
					wizard.setState();  

					$("#respuestasDiagnostico").html('<h1><small>De acuerdo a sus respuestas, usted padece de </small> <i class="ace-icon fa fa-angle-double-right"></i> Enfermedad Desconocida </h1>');
            	}                        
            }else{
                var sintoma = response.data;
                $("#SintomaId").val(sintoma.Id);
                $("#EnfermedadId").val(sintoma.EnfermedadId);
                $("#EnfermedadNombre").val(sintoma.EnfermedadNombre);

			    webApp.showConfirmDialogSintoma(
			    	sintoma.Nombre,
			    	sintoma.Pregunta,
			    	function () {
			    		$("#respuestasSintomas").append('<p>' + sintoma.Nombre + '</p>');
			    		setTimeout(function(){
			    			GetNextSintoma(sintoma.EnfermedadId, sintoma.Id);
			    		}, 500);			    		
			    	},
					function () {
						$("#respuestasSintomas").html('');
			    		setTimeout(function(){
			    			GetNextPrincipalByEnfermedadId(sintoma.EnfermedadId);
			    		}, 500);						
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