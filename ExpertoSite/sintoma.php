<?php require_once 'Include/header.php'; ?>
<?php require_once 'Include/headerSintoma.php'; ?>
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
                                <a href="javascript:void(0)">ADMINISTRACI&Oacute;N</a>
                            </li>
                            <li class="active">SÍNTOMA</li>
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
                                <div class="table-responsive">
                                    <table id="SintomaDataTable" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <button class="btn btn-primary btn-minier btnAgregarSintoma">
                                                        <i class="ace-icon fa fa-plus-circle align-top bigger-110"></i>
                                                        Agregar
                                                    </button>                                                    
                                                </th>
                                                <th>Id</th>
                                                <th>Enfermedad</th>
                                                <th>Nombre</th>
                                                <th>Pregunta</th>
                                                <th>Es Principal</th>                                                
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div id='NuevoSintoma' tabindex='-1' role='dialog' aria-hidden='true' class='modal fade' data-backdrop='static' style='z-index:100000;'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class='modal-title'><span id='accionTitle'></span> Síntoma</h4>                                        
                                    </div>
                                    <div class='modal-body'>                                    
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <!-- PAGE CONTENT BEGINS -->
                                                <form class="form-horizontal" role="form" id="SintomaForm">
                                                    <div class="form-group"></div>
                                                    <!-- #section:elements.form --> 

                                                    <div class="form-group individual masivo">
                                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="EnfermedadId">Enfermedad </label>

                                                        <div class="col-xs-12 col-sm-8">
                                                            <div class="clearfix">
                                                                <select id="EnfermedadId" name="EnfermedadId" class="col-xs-12 col-sm-12" >
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>                                                                                                       

                                                    <div class="form-group">
                                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Nombre">Nombre </label>

                                                        <div class="col-xs-12 col-sm-8">
                                                            <div class="clearfix">
                                                                <input type="text" id="Nombre" name="Nombre" placeholder="Nombre" maxlength="100"  class="col-xs-12 col-sm-12" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Pregunta">Pregunta </label>

                                                        <div class="col-xs-12 col-sm-8">
                                                            <div class="clearfix">
                                                                <input type="text" id="Pregunta" name="Pregunta"  placeholder="Pregunta" maxlength="200"  class="col-xs-12 col-sm-12"  />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="EsPrincipal"></label>

                                                        <div class="col-xs-12 col-sm-8 checkbox">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="EsPrincipal" id ="EsPrincipal" type="checkbox" class="ace ace-checkbox-2">
                                                                    <span class="lbl">Es Principal </span>
                                                                </label>
                                                            </div>
                                                        </div>                                                 
                                                    </div>           

                                                    <div class="form-group">
                                                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Estado">Estado </label>

                                                        <div class="col-xs-12 col-sm-8">
                                                            <div class="clearfix">
                                                                <select id="Estado" name="Estado" class="col-xs-12 col-sm-12">
                                                                    <option value="1" selected>Activo</option>
                                                                    <option value="2">Inactivo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                    <input type="hidden" name="SintomaId" id="SintomaId" value="0" />
                                                </form>                                              
                                            </div>  
                                        </div>                                              
                                    </div>
                                    <div class='modal-footer' style='margin-top: 0px; margin-bottom: 0px;'>                                             
                                        <button class='btn btn-primary' data-dismiss='modal'><i class='fa fa-remove'></i> Cancelar</button>
                                        <button class='btn btn-success' id="btnGuardarSintoma"><i class='fa fa-floppy-o'></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

<?php require_once 'Include/footer.php'; ?>
<?php require_once 'Include/bodyScript.php'; ?>
<?php require_once 'Include/bodyScriptSintoma.php'; ?>
<?php require_once 'Include/bodyClose.php'; ?>