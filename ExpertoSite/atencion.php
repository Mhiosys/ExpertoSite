<?php require_once 'Include/header.php'; ?>
<?php require_once 'Include/headerAtencion.php'; ?>
<?php require_once 'Include/headerClose.php'; ?>

<?php require_once 'Include/body.php'; ?>
<?php require_once 'Include/menu.php'; ?>

            <!-- /section:basics/sidebar -->
            <div class="main-content">
                <div class="main-content-inner">
                    <!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="index.php">INICIO</a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">PROCESO</a>
                            </li>
                            <li class="active">ATENCIÓN MÉDICA</li>
                        </ul><!-- /.breadcrumb -->  

                        <!-- /section:basics/content.searchbox -->
                    </div>

                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content">
                        <!-- #section:settings.box -->
                        
                        <!-- /section:settings.box -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->

                                <div class="widget-box">
                                    <div class="widget-header widget-header-blue widget-header-flat hide">
                                        <h4 class="widget-title">ATENCIÓN MÉDICA</h4>

                                        <div class="widget-toolbar">
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <!-- #section:plugins/fuelux.wizard -->
                                            <div id="fuelux-wizard-container">
                                                <div>
                                                    <!-- #section:plugins/fuelux.wizard.steps -->
                                                    <ul class="steps">
                                                        <li data-step="1" class="active">
                                                            <span class="step">1</span>
                                                            <span class="title">Paciente</span>
                                                        </li>

                                                        <li data-step="2">
                                                            <span class="step">2</span>
                                                            <span class="title">Síntomas</span>
                                                        </li>

                                                        <li data-step="3">
                                                            <span class="step">3</span>
                                                            <span class="title">Diagnóstico</span>
                                                        </li>                                                        
                                                    </ul>

                                                    <!-- /section:plugins/fuelux.wizard.steps -->
                                                </div>

                                                <hr style="margin-top: 0px; margin-bottom: 0px;" />

                                                <!-- #section:plugins/fuelux.wizard.container -->
                                                <div class="step-content pos-rel">
                                                    <div class="step-pane active" data-step="1">
                                                        <form class="form-horizontal" id="frmPaciente" method="post">
                                                            <!--<div class="form-group"></div>-->

                                                            <div class="form-group margin-bottom-8 hide">
                                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right"></label>
                                                                <h4>
                                                                    Por favor
                                                                    <small>
                                                                        <i class="ace-icon fa fa-angle-double-right"></i>
                                                                        llenar información básica acerca de usted.
                                                                    </small>
                                                                </h4>
                                                            </div>                                                             

                                                            <div class="form-group margin-bottom-8">
                                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Genero">Género </label>

                                                                <div class="col-xs-12 col-sm-8">
                                                                    <div class="clearfix">
                                                                        <select id="Genero" name="Genero" class="col-xs-12 col-sm-10">
                                                                            <option value="" selected>SELECCIONE</option>
                                                                            <option value="1">MASCULINO</option>
                                                                            <option value="2">FEMENINO</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>    

                                                            <div class="form-group margin-bottom-8">
                                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Edad">Edad </label>

                                                                <div class="col-xs-12 col-sm-8">
                                                                    <div class="clearfix">
                                                                        <select id="Edad" name="Edad" class="col-xs-12 col-sm-10">
                                                                            <option value="" selected>SELECCIONE</option>
                                                                            <option value="18-30" >18-30</option>
                                                                            <option value="31-45">31-45</option>
                                                                            <option value="46-60">46-60</option>
                                                                            <option value="60+">60+</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                                                                       

                                                            <div class="form-group margin-bottom-8">
                                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Talla">Talla </label>

                                                                <div class="col-xs-12 col-sm-8">
                                                                    <div class="clearfix">
                                                                        <input type="text" id="Talla" name="Talla" placeholder="Talla" maxlength="3"  class="col-xs-2 col-sm-2"/>
                                                                        <select id="TallaSelect" name="TallaSelect" class="col-xs-2 col-sm-2" disabled="disabled">
                                                                            <option value="cm" selected>cm</option>
                                                                        </select>  
                                                                    </div>
                                                                </div>
                                                            </div> 

                                                            <div class="form-group margin-bottom-8">
                                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Peso">Peso </label>

                                                                <div class="col-xs-12 col-sm-8">
                                                                    <div class="clearfix">
                                                                        <input type="text" id="Peso" name="Peso" placeholder="Peso" maxlength="3"  class="col-xs-2 col-sm-2"/>
                                                                        <select id="PesoSelect" name="PesoSelect" class="col-xs-2 col-sm-2" disabled="disabled">
                                                                            <option value="Kg" selected>Kg</option>
                                                                        </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="step-pane" data-step="2">
                                                        <form class="form-horizontal" id="frmSintomas" method="post">

                                                            <div class="form-group margin-bottom-8">
                                                                <div id="respuestasSintomas" class="center"></div>
                                                            </div>
                                                        </form>
                                                        <input type="hidden" id="Finalizado" value="0" />
                                                        <input type="hidden" id="SintomaId" value="0" />
                                                        <input type="hidden" id="EnfermedadId" value="0" />
                                                        <input type="hidden" id="EnfermedadNombre" value="" />                                                        
                                                    </div>

                                                    <div class="step-pane" data-step="3">
                                                        <form class="form-horizontal" id="frmDiagnostico" method="post">

                                                            <div class="form-group margin-bottom-8">
                                                                <div id="respuestasDiagnostico" class="center"></div>           
                                                            </div>
                                                        </form>                                                       
                                                    </div>
                                                </div>

                                                <!-- /section:plugins/fuelux.wizard.container -->
                                            </div>

                                            
                                            <div class="wizard-actions">
                                                <!-- #section:plugins/fuelux.wizard.buttons -->
                                                <button class="btn btn-prev">
                                                    <i class="ace-icon fa fa-arrow-left"></i>
                                                    Anterior
                                                </button>

                                                <button class="btn btn-success btn-next" data-last="Descargar">
                                                    Siguiente
                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>

                                                <!-- /section:plugins/fuelux.wizard.buttons -->
                                            </div>

                                            <!-- /section:plugins/fuelux.wizard -->
                                        </div><!-- /.widget-main -->
                                    </div><!-- /.widget-body -->
                                </div>                                

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

<?php require_once 'Include/footer.php'; ?>
<?php require_once 'Include/bodyScript.php'; ?>
<?php require_once 'Include/bodyScriptAtencion.php'; ?>
<?php require_once 'Include/bodyClose.php'; ?>