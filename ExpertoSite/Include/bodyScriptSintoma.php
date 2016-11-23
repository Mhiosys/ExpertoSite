        <!-- page specific plugin scripts -->
        <script src="Content/js/jquery.dataTables.min.js"></script>
        <script src="Content/js/jquery.dataTables.fnReloadAjax.js"></script>        
		<script src="Content/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="Content/js/jquery.validate.js"></script>
		<script src="Content/js/additional-methods.js"></script>
		<script src="Content/js/jquery.gritter.js"></script>
		<script src="Content/js/jquery.blockUI.js"></script>		

        <!-- inline scripts related to this page -->
        <script src="Content/js/viewsJs/sintoma.js"></script>
		<!-- Ajax BlockUi scripts -->
	    <script type="text/javascript">
	        var pageBlocked = false;
	        var handlerActivo = false;

	        $(document).ready(function () {
	            $.blockUI.defaults.baseZ = 100000;
	            $.blockUI.defaults.overlayCSS.opacity = 0.4;
	            $.blockUI.defaults.css.backgroundColor = "transparent";
	            $.blockUI.defaults.css.border = '0px none';
	            $.blockUI.defaults.fadeIn = 100,
	            $.blockUI.defaults.fadeOut = 100,

	            $(document).ajaxSend(function () {
	                if (!pageBlocked) {
	                    $.blockUI({
	                        message: "Espere un momento por favor",
	                        css: {
	                            border: 'none',
	                            padding: '15px',
	                            backgroundColor: '#000',
	                            '-webkit-border-radius': '10px',
	                            '-moz-border-radius': '10px',
	                            opacity: 1,
	                            color: '#fff'
	                        },
	                        onBlock: function () {
	                            pageBlocked = true;
	                        }
	                    });
	                }
	            }).ajaxStop(function () {
	                jQuery.unblockUI();
	                pageBlocked = false;
	            });

           });
		</script>        

 
        