jQuery(function($) {

    $("#btnLogin").click(function () {
    	Login();
    });				
 
});

function buscar(e){
    
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        Login();
    }
}

function Login(){
	$.ajax({
	    data : { 
            action: 'GetByUsername', 
            usuario: $('#usuarioText').val(), 
            clave: $('#claveText').val() 
        },
	    url:   'Controllers/AccountController.php',
	    type:  'post',
	    beforeSend: function () {
	            
	    },
	    success:  function (response) {
        	if(response.success){

        		if(response.warning){                			
        			$.gritter.add({
        				title: 'Alerta',
        				text: response.message,
        				class_name: 'gritter-warning'
        			});                			
        		}else{
        			window.location.href = response.data;
        		}			        		

        	}else{
    			$.gritter.add({
    				title: 'Error',
    				text: response.message,
    				class_name: 'gritter-error'
    			});                		
        	}	    	

	    },
	    error: function(XMLHttpRequest, textStatus, errorThrown) { 
			$.gritter.add({
				title: 'Error',
				text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
				class_name: 'gritter-error'
			});	        
	    }                
	});
}			