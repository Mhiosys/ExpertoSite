
var grid_selectorGeneral = "#tablaReporteGeneral";
var pager_selectorGeneral = "#pieReporteGeneral";		
var colNamesGeneral = ['ID', 'EncargadoId', 'Encargado', 'Recibidos', 'Confirmados', 'En Ejecuci&oacute;n', 'Detenidos', 'Finalizados', 'Total'];
var colModelsGeneral = [     		                  		
    { name: 'id', index: 'id', align: 'center', hidden: true, width: 40 },
    { name: 'encargadoId', index: 'encargadoId', align: 'left', hidden: true, width: 100, sortable : false },
    { name: 'encargadoNombre', index: 'encargadoNombre', align: 'left', width: 300, sortable : false},
  	{ name: 'recibidos', index: 'recibidos', align: 'left', width: 100, sortable : false},
  	{ name: 'confirmados', index: 'confirmados', align: 'left', width: 100, sortable : false},
  	{ name: 'enEjecucion', index: 'enEjecucion', align: 'left', width: 100, sortable : false},
  	{ name: 'detenidos', index: 'detenidos', align: 'left', width: 100, sortable : false},
  	{ name: 'finalizados', index: 'finalizados', align: 'left', width: 100, sortable : false},
  	{ name: 'totales', index: 'totales', align: 'left', width: 100, sortable : false}
];

var dataReporteDetalle = [];
var dataExportDetalle = [];

jQuery(function($) {

	$(window).on('resize.jqGrid', function () {
		$(grid_selectorGeneral).jqGrid( 'setGridWidth', $(".page-content").width() );
    });

	$(document).one('ajaxloadstart.page', function(e) {
		$(grid_selectorGeneral).jqGrid('GridUnload');
		$('.ui-jqdialog').remove();
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

  $("#btnBuscar").click(function () {
    ReloadGridGeneral();
  });

	ReloadGridGeneral();
});	

function ReloadGridGeneral(){

  var reportFilter = {
    fechaInicioFilter : GetFecha($("#fechaInicio").val()),
    fechaFinFilter : GetFecha($("#fechaFin").val())
  };


  $.ajax({
    data : { action: 'GetGeneral', filter: reportFilter },
    url:   'Controllers/ReporteGeneralController.php',
    type:  'post',
    beforeSend: function () {
            
    },
    success:  function (response) {
      
      dataReporteDetalle = [];
      dataExportDetalle = [];

      $(grid_selectorGeneral).jqGrid('GridUnload');
        
      if(response.success){
        if(response.warning){
          ListarReporteGeneral();                   
          $.gritter.add({
            title: 'Alerta',
            text: response.message,
            class_name: 'gritter-warning gritter-center'
          });                     
        }else{
          var generales = response.data;            
                        
          $.each(generales, function( key, value ) {
            dataReporteDetalle.push({ encargadoId: value.encargadoId, encargadoNombre: value.encargadoNombre.toUpperCase(), recibidos: value.recibidos, confirmados: value.confirmados, enEjecucion: value.enEjecucion, detenidos: value.detenidos, finalizados: value.finalizados, totales: value.totales });
          });
          
          dataExportDetalle = dataReporteDetalle;     
        
          ListarReporteGeneral();             
        }
      }else{
        ListarReporteGeneral();
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

function GetRulesGeneral() {
    var fechaInicioFilter = GetFecha($("#fechaInicio").val());
    var fechaFinFilter = GetFecha($("#fechaFin").val());
    
    var rules = [
        { field: 'fechaInicioFilter', data: fechaInicioFilter, op: "eq" },
        { field: 'fechaFinFilter', data: fechaFinFilter, op: "eq" }
    ];

    return rules;
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

function ListarReporteGeneral(){    
  jQuery(grid_selectorGeneral).jqGrid({
    data: dataReporteDetalle,
    datatype: "local",
    height: 'local',
    colNames: colNamesGeneral,
    colModel: colModelsGeneral,
    altRows: true,
    caption: "Reporte General",
    autowidth: true
  });

  $(window).triggerHandler('resize.jqGrid');
}

function Exportar(){
  var reportFilter = { action: 'GetGeneral', dataExportDetalle: dataExportDetalle };
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