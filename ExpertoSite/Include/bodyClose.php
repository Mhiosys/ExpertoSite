        <!-- ace scripts -->
        <script src="Content/js/ace/elements.scroller.js"></script>
        <script src="Content/js/ace/elements.aside.js"></script>
        <script src="Content/js/ace/elements.wizard.js"></script>
        <script src="Content/js/ace/ace.js"></script>
        <script src="Content/js/ace/ace.ajax-content.js"></script>
        <script src="Content/js/ace/ace.touch-drag.js"></script>
        <script src="Content/js/ace/ace.sidebar.js"></script>
        <script src="Content/js/ace/ace.sidebar-scroll-1.js"></script>
        <script src="Content/js/ace/ace.submenu-hover.js"></script>
        <script src="Content/js/ace/ace.widget-box.js"></script>
        <script src="Content/js/ace/ace.settings.js"></script>
        <script src="Content/js/ace/ace.settings-rtl.js"></script>
        <script src="Content/js/ace/ace.settings-skin.js"></script>
        <script src="Content/js/ace/ace.widget-on-reload.js"></script>
        <script src="Content/js/ace/ace.searchbox-autocomplete.js"></script>
        <script src="Content/js/jquery.blockUI.js"></script>
        
        
        <!-- Fijar menú scripts -->
        <script type="text/javascript">
            $(document).ready(function () {
                if(ace.vars['old_ie']) ace.helper.redraw($('#sidebar')[0]); 
                ace.settings.breadcrumbs_fixed(null, true);                 
            });
        </script>

        <script src="Content/js/validCampoFranz.js"></script>
        <script src="Content/js/webApp.js"></script>  
        
        <script type="text/javascript">
            $(function () {
                var parametros = {
                    mensajeEspera: 'Espere un momento por favor...',
                    tituloPopupMensaje: 'Informaci&oacute;n',
                    tituloPopupComfirmacion: 'Confirmaci&oacute;n',
                    tituloEliminacionPopupMensaje: 'Eliminaci&oacute;n',
                    mensajePopupConfirmacion: 'Seguro de continuar con este proceso?',
                    mensajePopupEliminacionConfirmacion: 'Seguro de continuar con este proceso?',
                    btnCancelar: 'Cancelar',
                    btnAceptar: 'Aceptar',
                    formatoFecha: 'dd/MM/yyyy hh:mm'
                };

                webApp.init(parametros);

            });
        </script>
    </body>
</html>