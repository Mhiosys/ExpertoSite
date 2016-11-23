<?php require_once 'Include/header.php'; ?>
<?php require_once 'Include/headerEnfermedad.php'; ?>
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
                            <li class="active">ENFERMEDAD</li>
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
                                    <table id="EnfermedadDataTable" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <button class="btn btn-primary btn-minier btnAgregarEnfermedad">
                                                        <i class="ace-icon fa fa-plus-circle align-top bigger-110"></i>
                                                        Agregar
                                                    </button>                                                    
                                                </th>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th class="hidden-480">Descripci&oacute;n</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div id='NuevoEnfermedad' tabindex='-1' role='dialog' aria-hidden='true' class='modal fade' data-backdrop='static' style='z-index:100000;'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class='modal-title'><span id='accionTitle'></span> Enfermedad</h4>                                        
                                    </div>
                                    <div class='modal-body'>                                    
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <!-- PAGE CONTENT BEGINS -->
                                                <form class="form-horizontal" role="form" id="EnfermedadForm">
                                                    <div class="form-group"></div>
                                                    <!-- #section:elements.form -->                                                    

                                                    <div class="form-group">
                                                        <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="Nombre">Nombre </label>

                                                        <div class="col-xs-12 col-sm-9">
                                                            <div class="clearfix">
                                                                <input type="text" id="Nombre" name="Nombre" placeholder="Nombre" maxlength="100"  class="col-xs-12 col-sm-12" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="Descripcion">Descripci&oacute;n </label>

                                                        <div class="col-xs-12 col-sm-9">
                                                            <div class="clearfix">
                                                                <textarea class="form-control limited" id="Descripcion" name="Descripcion" maxlength="200" rows="4"></textarea>
                                                            </div>                                                            
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="Estado">Estado </label>

                                                        <div class="col-xs-12 col-sm-9">
                                                            <div class="clearfix">
                                                                <select id="Estado" name="Estado" class="col-xs-12 col-sm-12">
                                                                    <option value="1" selected>Activo</option>
                                                                    <option value="2">Inactivo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="EnfermedadId" id="EnfermedadId" value="0" />                                                    

                                                </form>                                              
                                            </div>  
                                        </div>                                              
                                    </div>
                                    <div class='modal-footer' style='margin-top: 0px; margin-bottom: 0px;'>                                             
                                        <button class='btn btn-primary' data-dismiss='modal'><i class='fa fa-remove'></i> Cancelar</button>
                                        <button class='btn btn-success' id="btnGuardarEnfermedad"><i class='fa fa-floppy-o'></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>                         
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

<?php require_once 'Include/footer.php'; ?>
<?php require_once 'Include/bodyScript.php'; ?>
<?php require_once 'Include/bodyScriptEnfermedad.php'; ?>
<?php require_once 'Include/bodyClose.php'; ?>