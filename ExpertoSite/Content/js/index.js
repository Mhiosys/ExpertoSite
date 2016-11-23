
	var grid_selectorRecibidos = "#tablaRecibidos";
	var pager_selectorRecibidos = "#pieRecibidos";		
	var colNamesRequerimientosRecibidos = ['ID', 'C&oacute;digo', 'AreaId', '&Aacute;rea', 'EncargadoId', 'Encargado', 'Descripci&oacute;n', 'Fecha Registro'];
	var colModelsRequerimientosRecibidos = [     		                  		
	    { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
	    { name: 'codigo', index: 'codigo', align: 'left', width: 100, sortable : false },
	    { name: 'areaId', index: 'areaId', align: 'left', hidden:true, width: 100, sortable : false},
	    { name: 'areaNombre', index: 'areaNombre', align: 'left', width: 150, sortable : false},    		    
	    { name: 'encargadoId', index: 'encargadoId', align: 'left', hidden:true, width: 100, sortable : false},
	    { name: 'encargadoNombre', index: 'encargadoNombre', align: 'left', width: 150, sortable : false},
      { name: 'descripcion', index: 'descripcion', align: 'left', width: 400, sortable : false},
	    { name: 'fechaRegistro', index: 'fechaRegistro', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y H:i',
              defaultValue:null
          }
      	}
	];	

	var grid_selectorConfirmados = "#tablaConfirmados";
	var pager_selectorConfirmados = "#pieConfirmados";		
	var colNamesRequerimientosConfirmados = ['ID', 'C&oacute;digo', 'AreaId', '&Aacute;rea', 'EncargadoId', 'Encargado', 'Descripci&oacute;n', 'Fecha Registro', 'Fecha Inicio', 'Fecha Fin', 'EntregableId', 'Entregable'];
	var colModelsRequerimientosConfirmados = [     		                  		
	    { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
	    { name: 'codigo', index: 'codigo', align: 'left', width: 100, sortable : false },
	    { name: 'areaId', index: 'areaId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'areaNombre', index: 'areaNombre', align: 'left', width: 200, sortable : false},            
      { name: 'encargadoId', index: 'encargadoId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'encargadoNombre', index: 'encargadoNombre', align: 'left', width: 150, sortable : false},
      { name: 'descripcion', index: 'descripcion', align: 'left', width: 400, sortable : false},
		{ name: 'fechaRegistro', index: 'fechaRegistro', align: 'right', hidden:true, width: 150, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y H:i',
              defaultValue:null
          }
      	},    
      	{ name: 'fechaInicio', index: 'fechaInicio', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'fechaFin', index: 'fechaFin', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'entregableId', index: 'entregableId', align: 'left', hidden:true, width: 100, sortable : false},
	    { name: 'entregableNombre', index: 'entregableNombre', align: 'left', width: 100, sortable : false}
	];

	var grid_selectorEnEjecucion = "#tablaEnEjecucion";
	var pager_selectorEnEjecucion = "#pieEnEjecucion";		
	var colNamesRequerimientosEnEjecucion = ['ID', 'C&oacute;digo', 'AreaId', '&Aacute;rea', 'EncargadoId', 'Encargado', 'Descripci&oacute;n', 'Fecha Registro', 'Fecha Inicio', 'Fecha Fin', 'EntregableId', 'Entregable', 'Avance'];
	var colModelsRequerimientosEnEjecucion = [     		                  		
	    { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
	    { name: 'codigo', index: 'codigo', align: 'left', width: 100, sortable : false },
	    { name: 'areaId', index: 'areaId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'areaNombre', index: 'areaNombre', align: 'left', width: 200, sortable : false},            
      { name: 'encargadoId', index: 'encargadoId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'encargadoNombre', index: 'encargadoNombre', align: 'left', width: 150, sortable : false},
      { name: 'descripcion', index: 'descripcion', align: 'left', width: 400, sortable : false},
		{ name: 'fechaRegistro', index: 'fechaRegistro', align: 'right', hidden:true, width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y H:i',
              defaultValue:null
          }
      	},    
      	{ name: 'fechaInicio', index: 'fechaInicio', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'fechaFin', index: 'fechaFin', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'entregableId', index: 'entregableId', align: 'left', hidden:true, width: 100, sortable : false},
	    { name: 'entregableNombre', index: 'entregableNombre', align: 'left', hidden:true, width: 200, sortable : false},
	    { name: 'avance', index: 'avance', align: 'right', width: 100, sortable : false, formatter: 'currency', formatoptions: { decimalSeparator: ".", thousandsSeparator: ",", decimalPlaces: 1 , suffix:"%"}}
	];	

	var grid_selectorDetenidos = "#tablaDetenidos";
	var pager_selectorDetenidos = "#pieDetenidos";		
	var colNamesRequerimientosDetenidos = ['ID', 'C&oacute;digo', 'AreaId', '&Aacute;rea', 'EncargadoId', 'Encargado', 'Descripci&oacute;n', 'Fecha Registro', 'Fecha Inicio', 'Fecha Fin', 'EntregableId', 'Entregable', 'Avance'];
	var colModelsRequerimientosDetenidos = [     		                  		
	    { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
	    { name: 'codigo', index: 'codigo', align: 'left', width: 100, sortable : false },
	    { name: 'areaId', index: 'areaId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'areaNombre', index: 'areaNombre', align: 'left', width: 200, sortable : false},            
      { name: 'encargadoId', index: 'encargadoId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'encargadoNombre', index: 'encargadoNombre', align: 'left', width: 150, sortable : false},
      { name: 'descripcion', index: 'descripcion', align: 'left', width: 400, sortable : false},
		{ name: 'fechaRegistro', index: 'fechaRegistro', align: 'right', hidden:true, width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y H:i',
              defaultValue:null
          }
      	},    
      	{ name: 'fechaInicio', index: 'fechaInicio', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'fechaFin', index: 'fechaFin', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'entregableId', index: 'entregableId', align: 'left', hidden:true, width: 100, sortable : false},
	    { name: 'entregableNombre', index: 'entregableNombre', align: 'left', hidden:true, width: 200, sortable : false},
	    { name: 'avance', index: 'avance', align: 'right', width: 100, sortable : false, formatter: 'currency', formatoptions: { decimalSeparator: ".", thousandsSeparator: ",", decimalPlaces: 1 , suffix:"%"}}
	];

	var grid_selectorFinalizados = "#tablaFinalizados";
	var pager_selectorFinalizados = "#pieFinalizados";		
	var colNamesRequerimientosFinalizados = ['ID', 'C&oacute;digo', 'AreaId', '&Aacute;rea', 'EncargadoId', 'Encargado', 'Descripci&oacute;n', 'Fecha Registro', 'Fecha Inicio', 'Fecha Fin', 'EntregableId', 'Entregable', 'Avance'];
	var colModelsRequerimientosFinalizados = [     		                  		
	    { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
	    { name: 'codigo', index: 'codigo', align: 'left', width: 100, sortable : false },
	    { name: 'areaId', index: 'areaId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'areaNombre', index: 'areaNombre', align: 'left', width: 200, sortable : false},            
      { name: 'encargadoId', index: 'encargadoId', align: 'left', hidden:true, width: 100, sortable : false},
      { name: 'encargadoNombre', index: 'encargadoNombre', align: 'left', width: 150, sortable : false},
      { name: 'descripcion', index: 'descripcion', align: 'left', width: 400, sortable : false},
		{ name: 'fechaRegistro', index: 'fechaRegistro', align: 'right', hidden:true, width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'Y-m-d H:i',
              defaultValue:null
          }
      	},    
      	{ name: 'fechaInicio', index: 'fechaInicio', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'fechaFin', index: 'fechaFin', align: 'right', width: 100, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y',
              defaultValue:null
          }
      	},
      	{ name: 'entregableId', index: 'entregableId', align: 'left', hidden:true, width: 100, sortable : false},
	    { name: 'entregableNombre', index: 'entregableNombre', align: 'left', hidden:true, width: 200, sortable : false},
	    { name: 'avance', index: 'avance', align: 'right', width: 100, sortable : false, formatter: 'currency', formatoptions: { decimalSeparator: ".", thousandsSeparator: ",", decimalPlaces: 1 , suffix:"%"}}
	];	

	var grid_selectorObservaciones = "#tablaObservaciones";
	var pager_selectorObservaciones = "#pieObservaciones";		
	var colNamesObservaciones = ['ID', 'Observacion', 'Fecha Registro'];
	var colModelsObservaciones = [     		                  		
	    { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
	    { name: 'descripcion', index: 'descripcion', align: 'left', width: 400, sortable : false },
	    { name: 'fechaRegistro', index: 'fechaRegistro', align: 'right', width: 150, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y H:i',
              defaultValue:null
          }
      	}
	];	


  var grid_selectorObservaciones2 = "#tablaObservaciones2";
  var pager_selectorObservaciones2 = "#pieObservaciones2";    
  var colNamesObservaciones2 = ['ID', 'Observacion', 'Fecha Registro'];
  var colModelsObservaciones2 = [                              
      { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
      { name: 'descripcion', index: 'descripcion', align: 'left', width: 600, sortable : false },
      { name: 'fechaRegistro', index: 'fechaRegistro', align: 'right', width: 150, sortable : false, formatter: 'date',
          formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'd-m-Y H:i',
              defaultValue:null
          }
        }
  ];
	
	jQuery(function($) {

		$(window).on('resize.jqGrid', function () {
			$(grid_selectorRecibidos).jqGrid( 'setGridWidth', $(".page-content").width() );
			$(grid_selectorConfirmados).jqGrid( 'setGridWidth', $(".page-content").width() );
			$(grid_selectorEnEjecucion).jqGrid( 'setGridWidth', $(".page-content").width() );
			$(grid_selectorDetenidos).jqGrid( 'setGridWidth', $(".page-content").width() );
			$(grid_selectorFinalizados).jqGrid( 'setGridWidth', $(".page-content").width() );
			//$(grid_selectorObservaciones).jqGrid( 'setGridWidth', $(".page-content").width() );
	    });
	
		$(document).one('ajaxloadstart.page', function(e) {
			$(grid_selectorRecibidos).jqGrid('GridUnload');
			$(grid_selectorConfirmados).jqGrid('GridUnload');
			$(grid_selectorEnEjecucion).jqGrid('GridUnload');
			$(grid_selectorDetenidos).jqGrid('GridUnload');
			$(grid_selectorFinalizados).jqGrid('GridUnload');
			$(grid_selectorObservaciones).jqGrid('GridUnload');
			$('.ui-jqdialog').remove();
		});

		$("#codigoFilter").on("keyup", function() {
			if($(this).val().length==10){
		  		$('#btnBuscar').trigger('click');
			}
		});	

    $("#usuario").change(function () {
      $('#btnBuscar').trigger('click');
    });	

		$("#btnGuardarRequerimiento").on("click", function (e) { 

        	if(IsValid()){

	            webApp.showReConfirmDialog(function () {
	            	GuardarRequerimiento();
	            });
        	}

            e.preventDefault();
        });

        $("#btnGuardarConfirmacion").on("click", function (e) { 

        	if(IsValidConfirmacion()){

	            webApp.showReConfirmDialog(function () {
	            	GuardarConfirmacion();
	            });
        	}

            e.preventDefault();
        }); 

        $("#btnGuardarAvance").on("click", function (e) { 

        	if(IsValidAvance()){

	            webApp.showReConfirmDialog(function () {
	            	GuardarAvance();
	            });
        	}

            e.preventDefault();
        }); 

        $("#btnGuardarFinalizar").on("click", function (e) { 

        	if(IsValidFinalizar()){

	            webApp.showReConfirmDialog(function () {
	            	GuardarFinalizar();
	            });
        	}

            e.preventDefault();
        }); 

        $("#btnGuardarReanudar").on("click", function (e) { 

        	if(IsValidReanudar()){

	            webApp.showReConfirmDialog(function () {
	            	GuardarReanudar();
	            });
        	}

            e.preventDefault();
        });

		$("#btnBuscar").click(function () {
			if($("#codigoFilter").val()=='')
				ReloadGridEstate(parseInt($("#estadoRequerimientoFilter").val()));
			else
	        	GetFilterGridState();
        });

		jQuery.datepicker.setDefaults(jQuery.datepicker.regional["es"]);

        jQuery("#fechaInicio").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            firstDay: 1,
            changeFirstDay: false,
            onClose: function (selectedDate) {
                jQuery("#fechaFin").datepicker("option", "minDate", selectedDate);
            }
        });  

        jQuery("#fechaFin").datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: "dd/mm/yy",
             firstDay: 1,
             changeFirstDay: false,
             onClose: function (selectedDate) {
                jQuery("#fechaInicio").datepicker("option", "maxDate", selectedDate);
             }
        }); 

        
        jQuery("#fechaInicioReanudar").datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: "dd/mm/yy",
             firstDay: 1,
             changeFirstDay: false,
             onClose: function (selectedDate) {
                jQuery("#fechaFinReanudar").datepicker("option", "minDate", selectedDate);
             }
        }); 
		

        jQuery("#fechaFinReanudar").datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: "dd/mm/yy",
             firstDay: 1,
             changeFirstDay: false,
             onClose: function (selectedDate) {
                jQuery("#fechaInicioReanudar").datepicker("option", "maxDate", selectedDate);
             }
        });      

        $("#recibidosTab").click(function () {
	        ReloadGridEstate(1);
        });

        $("#confirmadosTab").click(function () {
	        ReloadGridEstate(2);
        }); 

        $("#enejecucionTab").click(function () {
	        ReloadGridEstate(3);
        });

        $("#detenidosTab").click(function () {
	        ReloadGridEstate(4);
        });

        $("#finalizadosTab").click(function () {
	        ReloadGridEstate(5);
        });       

        CargarFiltros();         		
	});

	function ReloadGridObservacion(){
		var grid = jQuery(grid_selectorObservaciones);			
		grid.jqGrid('GridUnload');
		$('.ui-jqdialog').remove();        	
    	
        var opciones = {
        	grid_selector: grid_selectorObservaciones,
        	pager_selector: pager_selectorObservaciones,
        	identificador: 'identificadorObservaciones',
        	colNames: colNamesObservaciones,
        	colModel: colModelsObservaciones,
        	urlListar: "Controllers/ObservacionController.php",
        	caption: 'Observaciones',
        	height: '200',
            nuevo: false,
            editar: false,
            eliminar: false,
            search: false,
            rules: true,
            GetRulesMethod: GetRulesObservacion,              
            GridCompleteHandler : function() {
				var table = this;
				setTimeout(function(){
					updatePagerIcons(table);							
					enableTooltips(table);
					
				}, 0);
			},	                
        };

    	webApp.createGrid(opciones);

        $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size    			
	}

  function ReloadGridObservacion2(){
    var grid = jQuery(grid_selectorObservaciones2);      
    grid.jqGrid('GridUnload');
    $('.ui-jqdialog').remove();         
      
        var opciones = {
          grid_selector: grid_selectorObservaciones2,
          pager_selector: pager_selectorObservaciones2,
          identificador: 'identificadorObservaciones2',
          colNames: colNamesObservaciones2,
          colModel: colModelsObservaciones2,
          urlListar: "Controllers/ObservacionController.php",
          caption: 'Observaciones',
          height: '200',
            nuevo: false,
            editar: false,
            eliminar: false,
            search: false,
            rules: true,
            GetRulesMethod: GetRulesObservacion,              
            GridCompleteHandler : function() {
              var table = this;
              setTimeout(function(){
                updatePagerIcons(table);              
                enableTooltips(table);
                
              }, 0);
            },                  
        };

      webApp.createGrid(opciones);

      $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size         
  }

	function ReloadGridEstate(estadoRequerimientoFilter){

		var gridEstate = new Object();
		$("#estadoRequerimientoFilter").val(estadoRequerimientoFilter);
		if(estadoRequerimientoFilter==1){
			gridEstate.grid_selector = grid_selectorRecibidos;
			gridEstate.pager_selector = pager_selectorRecibidos;
			gridEstate.colNamesRequerimientos = colNamesRequerimientosRecibidos;
			gridEstate.colModelsRequerimientos = colModelsRequerimientosRecibidos;
			gridEstate.caption = 'Requerimientos Recibidos';

		    var customButtons = {};
		    customButtons = [
		    {
		        Caption: '',
		        Title: 'Confirmar',
		        ButtonIcon: 'ace-icon fa fa-check green',
		        Position: 'thrid',
		        ClickFunction: function () {
		        	var rowKey = $(grid_selectorRecibidos).getGridParam('selrow');
		            if (rowKey != null) {


					$.ajax({
					    data : { action: 'GetById', id: rowKey },
					    url:   'Controllers/RequerimientoController.php',
					    type:  'post',
					    beforeSend: function () {
					            
					    },
					    success:  function (response) {
					    	
				        	if(response.success){

				        		if(response.warning){                			
				        			$.gritter.add({
				        				title: 'Alerta',
				        				text: response.message,
				        				class_name: 'gritter-warning gritter-center'
				        			});                			
				        		}
				        		var requerimiento = response.data;

				        		if(requerimiento.estadoRequerimiento != 1){
				        			webApp.showMessageDialog('Este requerimiento ya ha sido procesado, por favor actualice su información. F5 a la página.');
				        		}else if(requerimiento.estado == 2){
				        			webApp.showMessageDialog('No se puede procesar un requerimiento eliminado. F5 a la página.');
				        		}else{
					            	LimpiarConfirmacion();
					            	$("#requerimientoId").val(requerimiento.id);
					            	$("#confirmarTitle").text(requerimiento.codigo);
					            	$("#encargadoIdConfirm").val(requerimiento.encargadoId);
					            	$("#NuevaConfirmacion").modal("show");

									setTimeout(function(){
										$('#entregableId, #encargadoIdConfirm').chosen({allow_single_deselect:true});
										$('#encargadoIdConfirm').trigger('chosen:updated');  		
							    	},1000);		        			
				        		}


				        	}else{
				    			$.gritter.add({
				    				title: 'Error',
				    				text: response.message,
				    				class_name: 'gritter-error gritter-center'
				    			});                		
				        	}	    	

					    },
					    error: function(XMLHttpRequest, textStatus, errorThrown) { 
					    	
							$.gritter.add({
								title: 'Error',
								text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
								class_name: 'gritter-error gritter-center'
							});	        
					    }                
					});

		            } else {
		            	webApp.showMessageDialog('Seleccione Registro');
		            }
		        }
		    }
		    ];	
		    
		    gridEstate.nuevo = true;
		    gridEstate.editar = true;
		    gridEstate.customButtons = customButtons;		
		}

		if(estadoRequerimientoFilter==2){
			gridEstate.grid_selector = grid_selectorConfirmados;
			gridEstate.pager_selector = pager_selectorConfirmados;
			gridEstate.colNamesRequerimientos = colNamesRequerimientosConfirmados;
			gridEstate.colModelsRequerimientos = colModelsRequerimientosConfirmados;
			gridEstate.caption = 'Requerimientos Confirmados';

		    var customButtons = {};
		    customButtons = [
		    {
		        Caption: '',
		        Title: 'Iniciar Ejecución',
		        ButtonIcon: 'ace-icon fa fa-power-off red',
		        Position: 'first',
		        ClickFunction: function () {
		        	var rowKey = $(grid_selectorConfirmados).getGridParam('selrow');
		            if (rowKey != null) {

					$.ajax({
					    data : { action: 'GetById', id: rowKey },
					    url:   'Controllers/RequerimientoController.php',
					    type:  'post',
					    beforeSend: function () {
					            
					    },
					    success:  function (response) {
					    	
				        	if(response.success){

				        		if(response.warning){                			
				        			$.gritter.add({
				        				title: 'Alerta',
				        				text: response.message,
				        				class_name: 'gritter-warning gritter-center'
				        			});                			
				        		}
				        		var requerimiento = response.data;

				        		if(requerimiento.estadoRequerimiento > 2){
				        			webApp.showMessageDialog('Este requerimiento ya ha sido procesado, por favor actualice su información. F5 a la página.');
				        		}else if(requerimiento.estado == 2){
				        			webApp.showMessageDialog('No se puede procesar un requerimiento eliminado. F5 a la página.');
				        		}else{
				        			$("#requerimientoId").val(requerimiento.id);
									webApp.showReConfirmDialog(function () {
						            	IniciarEjecucion();
						            },'Se iniciará la ejecución del requerimiento con la fecha actual del sistema.  ¿Está seguro que desea INICIAR la ejecución del requerimiento?');
				        		}

				        	}else{
				    			$.gritter.add({
				    				title: 'Error',
				    				text: response.message,
				    				class_name: 'gritter-error gritter-center'
				    			});                		
				        	}	    	

					    },
					    error: function(XMLHttpRequest, textStatus, errorThrown) { 
					    	
							$.gritter.add({
								title: 'Error',
								text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
								class_name: 'gritter-error gritter-center'
							});	        
					    }                
					});

		            } else {
		            	webApp.showMessageDialog('Seleccione Registro');
		            }
		        }
		    }
		    ];

		    gridEstate.customButtons = customButtons;			
		}	

		if(estadoRequerimientoFilter==3){
			gridEstate.grid_selector = grid_selectorEnEjecucion;
			gridEstate.pager_selector = pager_selectorEnEjecucion;
			gridEstate.colNamesRequerimientos = colNamesRequerimientosEnEjecucion;
			gridEstate.colModelsRequerimientos = colModelsRequerimientosEnEjecucion;
			gridEstate.caption = 'Requerimientos En Ejecucion';

		    var customButtons = {};
		    customButtons = [
		    {
		        Caption: '',
		        Title: 'Registar Avance',
		        ButtonIcon: 'ace-icon fa fa-external-link blue',
		        Position: 'first',
		        ClickFunction: function () {
		        	var rowKey = $(grid_selectorEnEjecucion).getGridParam('selrow');
		            if (rowKey != null) {

					$.ajax({
					    data : { action: 'GetById', id: rowKey },
					    url:   'Controllers/RequerimientoController.php',
					    type:  'post',
					    beforeSend: function () {
					            
					    },
					    success:  function (response) {
					    	
				        	if(response.success){

				        		if(response.warning){                			
				        			$.gritter.add({
				        				title: 'Alerta',
				        				text: response.message,
				        				class_name: 'gritter-warning gritter-center'
				        			});                			
				        		}
				        		var requerimiento = response.data;

				        		if(requerimiento.estadoRequerimiento > 3){
				        			webApp.showMessageDialog('Este requerimiento ya ha sido procesado, por favor actualice su información. F5 a la página.');
				        		}else if(requerimiento.estado == 2){
				        			webApp.showMessageDialog('No se puede procesar un requerimiento eliminado. F5 a la página.');
				        		}else{
				        			LimpiarAvance();				        			
					            	$("#requerimientoId").val(requerimiento.id);
					            	ReloadGridObservacion();
					            	$("#avanceTitle").text(requerimiento.codigo);
					            	$("#avance").val(requerimiento.avance);
					            	$("#NuevoAvance").modal("show");
				        		}
				        	}else{
				    			$.gritter.add({
				    				title: 'Error',
				    				text: response.message,
				    				class_name: 'gritter-error gritter-center'
				    			});                		
				        	}	    	

					    },
					    error: function(XMLHttpRequest, textStatus, errorThrown) { 
					    	
							$.gritter.add({
								title: 'Error',
								text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
								class_name: 'gritter-error gritter-center'
							});	        
					    }                
					});

		            } else {
		            	webApp.showMessageDialog('Seleccione Registro');
		            }
		        }
		    },
		    {
		        Caption: '',
		        Title: 'Pausar Requerimiento',
		        ButtonIcon: 'ace-icon fa fa-pause red',
		        Position: 'second',
		        ClickFunction: function () {
		        	var rowKey = $(grid_selectorEnEjecucion).getGridParam('selrow');
		            if (rowKey != null) {

					$.ajax({
					    data : { action: 'GetById', id: rowKey },
					    url:   'Controllers/RequerimientoController.php',
					    type:  'post',
					    beforeSend: function () {
					            
					    },
					    success:  function (response) {
					    	
				        	if(response.success){

				        		if(response.warning){                			
				        			$.gritter.add({
				        				title: 'Alerta',
				        				text: response.message,
				        				class_name: 'gritter-warning gritter-center'
				        			});                			
				        		}
				        		var requerimiento = response.data;

				        		if(requerimiento.estadoRequerimiento > 3){
				        			webApp.showMessageDialog('Este requerimiento ya ha sido procesado, por favor actualice su información. F5 a la página.');
				        		}else if(requerimiento.estado == 2){
				        			webApp.showMessageDialog('No se puede procesar un requerimiento eliminado. F5 a la página.');
				        		}else{
				        			$("#requerimientoId").val(requerimiento.id);
									webApp.showReConfirmDialog(function () {
						            	PausarEjecucion();
						            },'Se detendrá la ejecución del requerimiento, luego podrá reanudarla desde la lista de requerimientos DETENIDOS.  ¿Está seguro que desea DETENER la ejecución del requerimiento?');
				        		}

				        	}else{
				    			$.gritter.add({
				    				title: 'Error',
				    				text: response.message,
				    				class_name: 'gritter-error gritter-center'
				    			});                		
				        	}	    	

					    },
					    error: function(XMLHttpRequest, textStatus, errorThrown) { 
					    	
							$.gritter.add({
								title: 'Error',
								text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
								class_name: 'gritter-error gritter-center'
							});	        
					    }                
					});

		            } else {
		            	webApp.showMessageDialog('Seleccione Registro');
		            }
		        }
		    },
		    {
		        Caption: '',
		        Title: 'Finalizar',
		        ButtonIcon: 'ace-icon fa fa-unlock-alt green',
		        Position: 'thrid',
		        ClickFunction: function () {
		        	var rowKey = $(grid_selectorEnEjecucion).getGridParam('selrow');
		            if (rowKey != null) {

					$.ajax({
					    data : { action: 'GetById', id: rowKey },
					    url:   'Controllers/RequerimientoController.php',
					    type:  'post',
					    beforeSend: function () {
					            
					    },
					    success:  function (response) {
					    	
				        	if(response.success){

				        		if(response.warning){                			
				        			$.gritter.add({
				        				title: 'Alerta',
				        				text: response.message,
				        				class_name: 'gritter-warning gritter-center'
				        			});                			
				        		}
				        		var requerimiento = response.data;

				        		if(requerimiento.estadoRequerimiento > 3){
				        			webApp.showMessageDialog('Este requerimiento ya ha sido procesado, por favor actualice su información. F5 a la página.');
				        		}else if(requerimiento.estado == 2){
				        			webApp.showMessageDialog('No se puede procesar un requerimiento eliminado. F5 a la página.');
				        		}else{
				        			LimpiarFinalizar();				        			
					            	$("#requerimientoId").val(requerimiento.id);
					            	$("#finalizarTitle").text(requerimiento.codigo);
                        $("#avanceFinal").val(requerimiento.avance);

                        
					            	$("#NuevoFinalizar").modal("show");
				        		}
				        	}else{
				    			$.gritter.add({
				    				title: 'Error',
				    				text: response.message,
				    				class_name: 'gritter-error gritter-center'
				    			});                		
				        	}	    	

					    },
					    error: function(XMLHttpRequest, textStatus, errorThrown) { 
					    	
							$.gritter.add({
								title: 'Error',
								text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
								class_name: 'gritter-error gritter-center'
							});	        
					    }                
					});

		            } else {
		            	webApp.showMessageDialog('Seleccione Registro');
		            }
		        }
		    }		    	    
		    ];

		    gridEstate.customButtons = customButtons;			
		}		

		if(estadoRequerimientoFilter==4){
			gridEstate.grid_selector = grid_selectorDetenidos;
			gridEstate.pager_selector = pager_selectorDetenidos;
			gridEstate.colNamesRequerimientos = colNamesRequerimientosDetenidos;
			gridEstate.colModelsRequerimientos = colModelsRequerimientosDetenidos;
			gridEstate.caption = 'Requerimientos Detenidos';

		    var customButtons = {};
		    customButtons = [
		    {
		        Caption: '',
		        Title: 'Reanudar Ejecución',
		        ButtonIcon: 'ace-icon fa fa-history red',
		        Position: 'first',
		        ClickFunction: function () {
		        	var rowKey = $(grid_selectorDetenidos).getGridParam('selrow');
		            if (rowKey != null) {

					$.ajax({
					    data : { action: 'GetById', id: rowKey },
					    url:   'Controllers/RequerimientoController.php',
					    type:  'post',
					    beforeSend: function () {
					            
					    },
					    success:  function (response) {
					    	
				        	if(response.success){

				        		if(response.warning){                			
				        			$.gritter.add({
				        				title: 'Alerta',
				        				text: response.message,
				        				class_name: 'gritter-warning gritter-center'
				        			});                			
				        		}
				        		var requerimiento = response.data;

				        		if(requerimiento.estadoRequerimiento != 4){
				        			webApp.showMessageDialog('Este requerimiento ya ha sido procesado, por favor actualice su información. F5 a la página.');
				        		}else if(requerimiento.estado == 2){
				        			webApp.showMessageDialog('No se puede procesar un requerimiento eliminado. F5 a la página.');
				        		}else{
									LimpiarReanudar();
					            	$("#requerimientoId").val(requerimiento.id);
					            	$("#reanudarTitle").text(requerimiento.codigo);
					            	$("#fechaInicioReanudar").val(ReturnFecha(requerimiento.fechaInicio));
					            	$("#fechaFinReanudar").val(ReturnFecha(requerimiento.fechaReanudacion));
					            	$("#NuevaReanudacion").modal("show");
                        jQuery("#fechaFinReanudar").datepicker("option", "minDate", $("#fechaInicioReanudar").val());

				        		}

				        	}else{
				    			$.gritter.add({
				    				title: 'Error',
				    				text: response.message,
				    				class_name: 'gritter-error gritter-center'
				    			});                		
				        	}	    	

					    },
					    error: function(XMLHttpRequest, textStatus, errorThrown) { 
					    	
							$.gritter.add({
								title: 'Error',
								text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
								class_name: 'gritter-error gritter-center'
							});	        
					    }                
					});

		            } else {
		            	webApp.showMessageDialog('Seleccione Registro');
		            }
		        }
		    }
		    ];

		    gridEstate.customButtons = customButtons;			
		}	

		if(estadoRequerimientoFilter==5){
			gridEstate.grid_selector = grid_selectorFinalizados;
			gridEstate.pager_selector = pager_selectorFinalizados;
			gridEstate.colNamesRequerimientos = colNamesRequerimientosFinalizados;
			gridEstate.colModelsRequerimientos = colModelsRequerimientosFinalizados;
			gridEstate.caption = 'Requerimientos Finalizados';

        var customButtons = {};
        customButtons = [
        {
            Caption: '',
            Title: 'Ver Requerimiento',
            ButtonIcon: 'ace-icon fa fa-eye blue',
            Position: 'first',
            ClickFunction: function () {
              var rowKey = $(grid_selectorFinalizados).getGridParam('selrow');
                if (rowKey != null) {

                  $.ajax({
                      data : { action: 'GetById', id: rowKey },
                      url:   'Controllers/RequerimientoController.php',
                      type:  'post',
                      beforeSend: function () {
                              
                      },
                      success:  function (response) {
                        
                          if(response.success){

                            if(response.warning){                     
                              $.gritter.add({
                                title: 'Alerta',
                                text: response.message,
                                class_name: 'gritter-warning gritter-center'
                              });                     
                            }
                            var requerimiento = response.data;

                            LimpiarVisualizador();                 
                            $("#requerimientoId").val(requerimiento.id);
                            $("#codigoV").val(requerimiento.codigo);
                            $("#areaIdV").val(requerimiento.areaId);
                            $("#encargadoIdV").val(requerimiento.encargadoId);
                            $("#descripcionV").val(requerimiento.descripcion);
                            $("#entregableIdV").val(requerimiento.entregableId);
                            $("#entregableIdV").val(requerimiento.entregableId);
                            $("#entregableIdV").val(requerimiento.entregableId);
                            $("#fechaInicioV").val(requerimiento.fechaInicio);
                            $("#fechaFinV").val(requerimiento.fechaReanudacion);
                            $("#avanceV").val(requerimiento.avance);
                            $("#observacionV").val(requerimiento.observacionV);

                            ReloadGridObservacion2();                            

                            $("#visualizadorTitle").text(requerimiento.codigo);
                            $("#VerRequerimiento").modal("show");                            

                          }else{
                          $.gritter.add({
                            title: 'Error',
                            text: response.message,
                            class_name: 'gritter-error gritter-center'
                          });                   
                          }       

                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        
                      $.gritter.add({
                        title: 'Error',
                        text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
                        class_name: 'gritter-error gritter-center'
                      });         
                      }                
                  });

                } else {
                  webApp.showMessageDialog('Seleccione Registro');
                }
            }
        }
        ];

        gridEstate.customButtons = customButtons;       
		}				

    	CargarRequerimientosEstado(gridEstate);
	}	
	
	function CargarFiltros(){
		$.ajax({
		    data : { action: 'FindAllActive' },
		    url:   'Controllers/ItemTablaController.php',
		    type:  'post',
		    beforeSend: function () {
		            
		    },
		    success:  function (response) {
	        	if(response.success){

	        		if(response.warning){                			
	        			$.gritter.add({
	        				title: 'Alerta',
	        				text: response.message,
	        				class_name: 'gritter-warning gritter-center'
	        			});                			
	        		}        			
						
					$.each(response.data, function( key, value ) {
						if(value.tablaId==1){
							$("#areaId").append("<option value='"+value.valor+"'>"+value.nombre+"</option>");
              $("#areaIdV").append("<option value='"+value.valor+"'>"+value.nombre+"</option>");
						}
						if(value.tablaId==2){
							$("#encargadoId").append("<option value='"+value.valor+"'>"+value.nombre+"</option>");
							$("#encargadoIdConfirm").append("<option value='"+value.valor+"'>"+value.nombre+"</option>");
              $("#encargadoIdV").append("<option value='"+value.valor+"'>"+value.nombre+"</option>");
						}
						if(value.tablaId==3){
							$("#entregableId").append("<option value='"+value.valor+"'>"+value.nombre+"</option>");	
              $("#entregableIdV").append("<option value='"+value.valor+"'>"+value.nombre+"</option>"); 
            }
            if(value.tablaId==4){
              $("#usuario").append("<option value='"+value.valor+"'>"+value.nombre+"</option>");	
            }

            			
					});

          $('#usuario').chosen({allow_single_deselect:true});
          SeleccionarUsuario();

					ReloadGridEstate(1);

	        	}else{
	    			$.gritter.add({
	    				title: 'Error',
	    				text: response.message,
	    				class_name: 'gritter-error gritter-center'
	    			});                		
	        	}	    	

		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
				$.gritter.add({
					title: 'Error',
					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
					class_name: 'gritter-error gritter-center'
				});	        
		    }                
		});
	}

	function IsValid(){		
		
		var listaErrores = "";
		if($("#areaId").val()==0 || $("#areaId").val()==null)
			listaErrores += "Seleccione Area Solicitante<br/>";

		if($("#encargadoId").val()<0 || $("#encargadoId").val()==null)
			listaErrores += "Seleccione Encargado<br/>";

		if($.trim($("#codigo").val())=="")
			listaErrores += "No se generó código correctamente<br/>";

		if($.trim($("#descripcion").val())=="")
			listaErrores += "Ingrese Descripción correctamente<br/>";	
		
		if(listaErrores.length>0){
			webApp.showMessageDialog("<b>Tiene los siguientes errores:</b><br/>"+listaErrores);
			return false;
		}else
			return true;
	}

	function IsValidConfirmacion()	{
		var listaErrores = "";

		if($("#encargadoIdConfirm").val()==0 || $("#encargadoIdConfirm").val()==null)
			listaErrores += "Seleccione Encargado<br/>";

		if($("#fechaInicio").val()=='' || $("#fechaInicio").val()==null)
			listaErrores += "Ingrese Fecha Inicio<br/>";

		if($("#fechaFin").val()=='' || $("#fechaFin").val()==null)
			listaErrores += "Ingrese Fecha Fin<br/>";

		if($("#entregableId").val()==0 || $("#entregableId").val()==null)
			listaErrores += "Seleccione Entregable<br/>";
		
		if(listaErrores.length>0){
			webApp.showMessageDialog("<b>Tiene los siguientes errores:</b><br/>"+listaErrores);
			return false;
		}else
			return true;
	}

	function IsValidAvance()	{
		var listaErrores = "";

		if($("#avance").val()==''  || $("#avance").val()==0 || $("#avance").val()==null)
			listaErrores += "Ingrese Avance, debe ser mayor a cero<br/>";
		else{
			if(parseInt($("#avance").val())>100)
				listaErrores += "El valor de Avance debe ser m&aacute;ximo de 100.<br/>";
		}

		if($("#observacion").val()=='' || $("#observacion").val()==null)
			listaErrores += "Ingrese Observación<br/>";
		
		if(listaErrores.length>0){
			webApp.showMessageDialog("<b>Tiene los siguientes errores:</b><br/>"+listaErrores);
			return false;
		}else
			return true;
	}

	function IsValidFinalizar(){
		var listaErrores = "";

		if($("#observacionFinal").val()==''  || $("#observacionFinal").val()==null)
			listaErrores += "Ingrese Observaci&oacute;n<br/>";

    if(parseInt($("#avanceFinal").val())!=100){
      if(!$("#permitirAvance").prop('checked'))
        listaErrores += "No puede FINALIZAR el requerimento, debido a que el avance no está al 100%.<br/> Para registrar deber&iacute;a seleccionar <b>Avance < 100%.</b>";
    }
    
		
		if(listaErrores.length>0){
			webApp.showMessageDialog("<b>Tiene los siguientes errores:</b><br/>"+listaErrores);
			return false;
		}else
			return true;

	}	

	function IsValidReanudar(){
		var listaErrores = "";

		if($("#fechaInicioReanudar").val()=='' || $("#fechaInicioReanudar").val()==null)
			listaErrores += "La Fecha Inicio no es correcta<br/>";

		if($("#fechaFinReanudar").val()=='' || $("#fechaFinReanudar").val()==null)
			listaErrores += "Ingrese Fecha Fin<br/>";
		
		if(listaErrores.length>0){
			webApp.showMessageDialog("<b>Tiene los siguientes errores:</b><br/>"+listaErrores);
			return false;
		}else
			return true;		
	}

	function CargarRequerimientosEstado(gridEstate){

		var grid = jQuery(gridEstate.grid_selector);			
		grid.jqGrid('GridUnload');
		$('.ui-jqdialog').remove();

    var opciones = {
    	grid_selector: gridEstate.grid_selector,
    	pager_selector: gridEstate.pager_selector,
    	identificador: 'identificadorRequerimientos',
    	colNames: gridEstate.colNamesRequerimientos,
    	colModel: gridEstate.colModelsRequerimientos,
    	urlListar: "Controllers/RequerimientoController.php",
    	//caption: gridEstate.caption,
    	height: '340',
        nuevo: (gridEstate.nuevo == null)? false : gridEstate.nuevo,
        NuevoCommand: NuevoRegistro,
        editar: (gridEstate.editar == null)? false : gridEstate.editar,
        EditarCommand: EditarRegistro,
        eliminar: false,
        search: false,
        rules: true,
        GetRulesMethod: GetRulesRequerimientos,               
        GridCompleteHandler : function() {
  				var table = this;
  				setTimeout(function(){
  					updatePagerIcons(table);							
  					enableTooltips(table);
			
		      }, 0);

          GetCountList();
  			},	
  			CustomButtons: (gridEstate.customButtons == null)? new Array(): gridEstate.customButtons
    };

    webApp.createGrid(opciones);
    $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size		
	}

  function GetCountList(){
    
    var codigoFilter = $("#codigoFilter").val();
    var usuarioFilter = $("#usuario").val() == '' ? 0 : $("#usuario").val();

    $.ajax({
        data : { action: 'GetListCount', codigo : codigoFilter, usuario : usuarioFilter },
        url:   'Controllers/ItemTablaController.php',
        type:  'post',
        beforeSend: function () {
                
        },
        success:  function (response) {
          if(response.success){

            if(response.warning){                     
              $.gritter.add({
                title: 'Alerta',
                text: response.message,
                class_name: 'gritter-warning gritter-center'
              });                     
            }             
            
          $.each(response.data, function( key, value ) {
            if(value.tablaId==1)
              $("#recibidosTotal").text(value.valor);
            
            if(value.tablaId==2)
              $("#confirmadosTotal").text(value.valor);

            if(value.tablaId==3)
              $("#enEjecucionTotal").text(value.valor);

            if(value.tablaId==4)
              $("#detenidosTotal").text(value.valor);

            if(value.tablaId==5)
              $("#finalizadosTotal").text(value.valor);
                  
          });

        }else{
          $.gritter.add({
            title: 'Error',
            text: response.message,
            class_name: 'gritter-error gritter-center'
          });                   
        }       

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        $.gritter.add({
          title: 'Error',
          text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
          class_name: 'gritter-error gritter-center'
        });         
      }                
    });    
  }

	function GetRulesRequerimientos() {
    
    var estadoRequerimientoFilter = $("#estadoRequerimientoFilter").val() == '' ? 1 : $("#estadoRequerimientoFilter").val();
    var codigoFilter = $("#codigoFilter").val();
    var usuarioFilter = $("#usuario").val() == '' ? 0 : $("#usuario").val();
    
    var rules = [
          { field: 'estadoRequerimientoFilter', data: estadoRequerimientoFilter, op: "eq" },
          { field: 'codigoFilter', data: codigoFilter, op: "eq" },
          { field: 'usuarioFilter', data: usuarioFilter, op: "eq" }
    ];

    return rules;
	}

	function GetRulesObservacion(){
	    var requerimientoIdFilter = $("#requerimientoId").val() == '' ? 0 : $("#requerimientoId").val();
	    
	    var rules = [
            { field: 'requerimientoId', data: requerimientoIdFilter, op: "eq" }
	    ];

	    return rules;		
	}
	
  function NuevoRegistro() {  
  	LimpiarFormulario();

		$.ajax({
		    data : { action: 'GetNextId' },
		    url:   'Controllers/RequerimientoController.php',
		    type:  'post',
		    beforeSend: function () {
		            
		    },
		    success:  function (response) {
	        	if(response.success){

	        		if(response.warning){                			
	        			$.gritter.add({
	        				title: 'Alerta',
	        				text: response.message,
	        				class_name: 'gritter-warning gritter-center'
	        			});                			
	        		}

			    	$("#accionTitle").text('Nuevo');
			    	$("#NuevoRequerimiento").modal("show");
			    	$("#requerimientoId").val(0);
			    	$("#codigo").val(response.data);
					setTimeout(function(){
						$('#areaId, #encargadoId').chosen({allow_single_deselect:true}); 		
			    	},1000); 

	        	}else{
	    			$.gritter.add({
	    				title: 'Error',
	    				text: response.message,
	    				class_name: 'gritter-error gritter-center'
	    			});                		
	        	}	    	

		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
  				$.gritter.add({
  					title: 'Error',
  					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
  					class_name: 'gritter-error gritter-center'
  				});	        
		    }                
	  });
  }

  function GuardarRequerimiento() { 

    	var modelView = {
      	 id : $("#requerimientoId").val(),    	 
         codigo : $("#codigo").val(),
      	 areaId : $("#areaId").val() == '' ? 0 : $("#areaId").val(),
      	 encargadoId : $("#encargadoId").val() == '' ? 0 : $("#encargadoId").val(),
      	 descripcion : $("#descripcion").val()
      };

      if(modelView.id == 0)
      	action = 'Add';
      else
      	action = 'Edit';

  		$.ajax({
  		    data : { action: action, modelView: modelView },
  		    url:   'Controllers/RequerimientoController.php',
  		    type:  'post',
  		    beforeSend: function () {
  		            
  		    },
  		    success:  function (response) {
            $("#NuevoRequerimiento").modal("hide");
  	        	if(response.success){
  	        		$(grid_selectorRecibidos).trigger("reloadGrid");
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

  		    },
  		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
    				$.gritter.add({
    					title: 'Error',
    					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
    					class_name: 'gritter-error gritter'
    				});	        
  		    }                
  		});
  } 

  function GuardarConfirmacion() { 

    	var modelView = {
      	 id : $("#requerimientoId").val(),
      	 encargadoId : $("#encargadoIdConfirm").val() == '' ? 0 : $("#encargadoIdConfirm").val(),
      	 entregableId : $("#entregableId").val() == '' ? 0 : $("#entregableId").val(),
      	 fechaInicio : GetFecha($("#fechaInicio").val()),
      	 fechaFin : GetFecha($("#fechaFin").val()),
      };

      if(modelView.id == 0)
      	ErrorModal('NuevaConfirmacion');
      else{
      	action = 'Confirmar';

  			$.ajax({
  			    data : { action: action, modelView: modelView },
  			    url:   'Controllers/RequerimientoController.php',
  			    type:  'post',
  			    beforeSend: function () {
  			            
  			    },
  			    success:  function (response) {
                $("#NuevaConfirmacion").modal("hide");
  		        	if(response.success){
  		        		$(grid_selectorRecibidos).trigger("reloadGrid");		        		
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

  			    },
  			    error: function(XMLHttpRequest, textStatus, errorThrown) { 
    					$.gritter.add({
    						title: 'Error',
    						text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
    						class_name: 'gritter-error gritter'
    					});	        
  			    }                
  			});        	
      }
  }  

	function IniciarEjecucion(){

  	var modelView = {
    	 id : $("#requerimientoId").val()
    };

    if(modelView.id == 0)
    	ErrorModal('');
    else{
    	action = 'Iniciar';

			$.ajax({
			    data : { action: action, modelView: modelView },
			    url:   'Controllers/RequerimientoController.php',
			    type:  'post',
			    beforeSend: function () {
			            
			    },
			    success:  function (response) {
		        	if(response.success){
		        		$(grid_selectorConfirmados).trigger("reloadGrid");
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

			    },
			    error: function(XMLHttpRequest, textStatus, errorThrown) { 
  					$.gritter.add({
  						title: 'Error',
  						text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
  						class_name: 'gritter-error gritter'
  					});	        
			    }                
			});        	
    }
  }   

  function PausarEjecucion(){
  	var modelView = {
    	 id : $("#requerimientoId").val()
    };

    if(modelView.id == 0)
    	ErrorModal('');
    else{
    	action = 'Pausar';

  		$.ajax({
  		    data : { action: action, modelView: modelView },
  		    url:   'Controllers/RequerimientoController.php',
  		    type:  'post',
  		    beforeSend: function () {
  		            
  		    },
  		    success:  function (response) {

	        	if(response.success){
	        		$(grid_selectorEnEjecucion).trigger("reloadGrid");
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
  		    },
  		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
    				$.gritter.add({
    					title: 'Error',
    					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
    					class_name: 'gritter-error gritter'
    				});	        
  		    }                
  		});
    }    	
  }

  function GuardarAvance(){
  	var modelView = {
    	 id : $("#requerimientoId").val(),
    	 avance : $("#avance").val() == '' ? 0 : $("#avance").val(),
    	 observacion : $("#observacion").val() == null ? '' : $("#observacion").val()
    };

    if(modelView.id == 0)
    	ErrorModal('NuevoAvance');
    else{
    	action = 'Avanzar';

  		$.ajax({
  		    data : { action: action, modelView: modelView },
  		    url:   'Controllers/RequerimientoController.php',
  		    type:  'post',
  		    beforeSend: function () {
  		            
  		    },
  		    success:  function (response) {
            $("#NuevoAvance").modal("hide");
	        	if(response.success){
	        		$(grid_selectorEnEjecucion).trigger("reloadGrid");
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

  		    },
  		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
    				$.gritter.add({
    					title: 'Error',
    					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
    					class_name: 'gritter-error gritter'
    				});	        
  		    }                
  		});        	
    }    	
  }    

  function GuardarFinalizar() { 

  	var modelView = {
    	 id : $("#requerimientoId").val(),
    	 observacion : $("#observacionFinal").val()
    };

    if(modelView.id == 0)
    	ErrorModal('NuevoFinalizar');
    else{
    	action = 'Finalizar';

  		$.ajax({
  		    data : { action: action, modelView: modelView },
  		    url:   'Controllers/RequerimientoController.php',
  		    type:  'post',
  		    beforeSend: function () {
  		            
  		    },
  		    success:  function (response) {
            $("#NuevoFinalizar").modal("hide");
	        	if(response.success){
	        		$(grid_selectorEnEjecucion).trigger("reloadGrid");
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
  		    },
  		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
    				$.gritter.add({
    					title: 'Error',
    					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
    					class_name: 'gritter-error gritter'
    				});	        
  		    }                
  		});        	
    }
  }  

  function GuardarReanudar(){
  	var modelView = {
    	 id : $("#requerimientoId").val(),
    	 fechaReanudacion : GetFecha($("#fechaFinReanudar").val())
    };
      
    if(modelView.id == 0)
    	ErrorModal('NuevaReanudacion');
    else{
    	action = 'Reanudar';

  		$.ajax({
  		    data : { action: action, modelView: modelView },
  		    url:   'Controllers/RequerimientoController.php',
  		    type:  'post',
  		    beforeSend: function () {
  		            
  		    },
  		    success:  function (response) {
            $("#NuevaReanudacion").modal("hide");
	        	if(response.success){
	        		$(grid_selectorDetenidos).trigger("reloadGrid");
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
  		    },
  		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
    				$.gritter.add({
    					title: 'Error',
    					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
    					class_name: 'gritter-error gritter'
    				});	        
  		    }                
  		});        	
    }
  }      
    
  function GetFilterGridState(){
  	$.ajax({
	    data : { action: 'GetByCodigo', codigo: $("#codigoFilter").val() },
	    url:   'Controllers/RequerimientoController.php',
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
        			var requerimiento = response.data;

        			if(requerimiento.estado == 2){
        				webApp.showMessageDialog('El requerimiento buscado se encuentra en estado inactivo.');
        			}else{
        				switch(parseInt(requerimiento.estadoRequerimiento)){
        					case 1:
        						$("#recibidosTab").trigger('click');
        						break;
        					case 2:
        						$("#confirmadosTab").trigger('click');
        						break;
        					case 3:
        						$("#enejecucionTab").trigger('click');
        						break;
        					case 4:
        						$("#detenidosTab").trigger('click');
        						break;
        					case 5:
        						$("#finalizadosTab").trigger('click');
        						break;
        				}
        			}
        		}			    	

        	}else{
    			$.gritter.add({
    				title: 'Error',
    				text: response.message,
    				class_name: 'gritter-error gritter-center'
    			});                		
        	}	    	

	    },
	    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	    	
			$.gritter.add({
				title: 'Error',
				text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
				class_name: 'gritter-error gritter-center'
			});	        
	    }                
	});
  }

  function EditarRegistro(rowKey) { 	
  	LimpiarFormulario();
  	$.ajax({
	    data : { action: 'GetById', id: rowKey },
	    url:   'Controllers/RequerimientoController.php',
	    type:  'post',
	    beforeSend: function () {
	            
	    },
	    success:  function (response) {
	    	
        	if(response.success){

        		if(response.warning){                			
        			$.gritter.add({
        				title: 'Alerta',
        				text: response.message,
        				class_name: 'gritter-warning gritter-center'
        			});                			
        		}
        		
				var requerimiento = response.data;
				$("#requerimientoId").val(requerimiento.id);
				$("#codigo").val(requerimiento.codigo);
		    	$("#areaId").val(requerimiento.areaId);
		    	$("#encargadoId").val(requerimiento.encargadoId);
		    	$("#descripcion").val(requerimiento.descripcion);

		    	$("#accionTitle").text('Editar');
		    	$("#NuevoRequerimiento").modal("show");
				setTimeout(function(){
					$('#areaId, #encargadoId').chosen({allow_single_deselect:true});
					$('#areaId, #encargadoId').trigger('chosen:updated'); 
		    	},1000);			    	

        	}else{
    			$.gritter.add({
    				title: 'Error',
    				text: response.message,
    				class_name: 'gritter-error gritter-center'
    			});                		
        	}	    	

	    },
	    error: function(XMLHttpRequest, textStatus, errorThrown) { 
	    	
  			$.gritter.add({
  				title: 'Error',
  				text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
  				class_name: 'gritter-error gritter-center'
  			});	        
	    }                
	 });
  }

  function EliminarRegistro(rowKey){
  	webApp.showConfirmDialog(function () {
		$.ajax({
		    data : { action: 'Delete', id: rowKey },
		    url:   'Controllers/ExcludeController.php',
		    type:  'post',
		    beforeSend: function () {
		            
		    },
		    success:  function (response) {
		    	
	        	if(response.success){
	        		$(grid_selector).trigger("reloadGrid");

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

		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown) { 
  				$.gritter.add({
  					title: 'Error',
  					text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
  					class_name: 'gritter-error gritter'
  				});	        
		    }                
		}); 							
	 },
	 'Seguro de Eliminar este registro?');
  }   
		
	//replace icons with FontAwesome icons like above
	function updatePagerIcons(table) {
		var replacement = 
		{
			'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
			'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
			'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
			'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
		};
		$('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
			var icon = $(this);
			var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
			
			if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
		})
	}

	function enableTooltips(table) {		
		$('.navtable .ui-pg-button').tooltip({container:'body'});
		$(table).find('.ui-pg-div').tooltip({container:'body'});
	}

	function GetFecha(fecha){
		if(fecha == undefined || fecha=='')
			return '';
		else{
			var fechas = fecha.split('/');
			return fechas[2] + '-' + fechas[1] + '-' + fechas[0];
		}
	}

	function ReturnFecha(fecha){
		if(fecha == undefined || fecha=='')
			return '';
		else{
			var fechas = fecha.split('-');

			return fechas[2].substring(0, 2) + '/' + fechas[1] + '/' + fechas[0];
		}
	}

  function LimpiarFormulario(){
  	$("#codigo").val('');
  	$("#areaId").val(0);
  	$("#encargadoId").val(0);
  	$("#descripcion").val('');
  	$('#areaId, #encargadoId').trigger('chosen:updated');
  }	

	function LimpiarConfirmacion(){
		jQuery("#fechaInicio,#fechaFin").val('');
		$("#entregableId, #encargadoIdConfirm").val(0);
    	$('#entregableId, #encargadoIdConfirm').trigger('chosen:updated');
	}	

	function LimpiarAvance(){
		jQuery("#avance").val(0);
		$("#observacion").val('');
	}

	function LimpiarFinalizar(){
		$("#observacionFinal").val('');
    $("#avanceFinal").val(0);
    $("#permitirAvance").prop('checked',false);
	}

	function LimpiarReanudar(){
		jQuery("#fechaInicioReanudar,#fechaFinReanudar").val('');
	}

  function LimpiarVisualizador(){

    $("#codigoV, #descripcionV, observacionV").val('');
    $("#areaIdV, #encargadoIdV, #entregableIdV, #entregableIdV, #avanceV").val(0);

  }

	function ErrorModal(modal){
		if(modal!='')
			$("#"+modal).modal("hide");

		$.gritter.add({
			title: 'Alerta',
			text: 'No se reconoce el requerimiento que se desea confirmar, por favor inténelo de nuevo',
			class_name: 'gritter-warning gritter'
		});		
	}

  function Exportar(){

    var estado = $("#estadoRequerimientoFilter").val() == '' ? 1 : $("#estadoRequerimientoFilter").val();
    var codigo = $("#codigoFilter").val();
    var usuario = $("#usuario").val() == '' ? 0 : $("#usuario").val();


    var reportFilter = { action: 'GetByEstate', estado: estado, codigo: codigo, usuario: usuario };
    $.get( "Controllers/ExcelController.php", reportFilter )
      .done(function( data ) {
          window.location.href = data;
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      $.gritter.add({
        title: 'Error',
        text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
        class_name: 'gritter-error gritter-center'
      });
    });        
  }  