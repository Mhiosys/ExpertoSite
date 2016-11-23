<?php
require_once("Entity/Constantes.php");
?>

            <!-- #section:basics/sidebar -->
            <div id="sidebar" class="sidebar responsive compact  sidebar-fixed menu-min">
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <div class="breadcrumbs" id="breadcrumbs2">
                            <ul class="breadcrumb">
                                <li style="width:80px;">
                                    <i class="ace-icon fa  fa-cog home-icon"></i>
                                    <a href="#">PANEL</a>
                                </li>
                            </ul>
                        </div>  
                    </div>              

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-success"></span>

                        <span class="btn btn-success"></span>

                        <span class="btn btn-success"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">                    
                    <?php if(getRolId() == Constantes::getADMINISTRADORID() || getRolId() == Constantes::getUSUARIOID()) {?>
                    <li class="open">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-folder-open"></i>
                            <span class="menu-text"> ADMINISTRACI&Oacute;N </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu nav-show" style="display: block;">
                                               
                            <?php if(getRolId() == Constantes::getADMINISTRADORID()) {?>
                            <li class="">
                                <a href="enfermedad.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    ENFERMEDAD
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="sintoma.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    SINTOMA
                                </a>

                                <b class="arrow"></b>
                            </li>                            
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(getRolId() == Constantes::getADMINISTRADORID() || getRolId() == Constantes::getUSUARIOID() || getRolId() == Constantes::getANONIMOID()) {?>
                    <li class="open">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-cogs"></i>
                            <span class="menu-text"> PROCESO </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu nav-show" style="display: block;">
                            <li class="">
                                <a href="atencion.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    ATENCIÓN
                                </a>

                                <b class="arrow"></b>
                            </li>                                                       
                        </ul>
                    </li>  
                    <?php } ?>
                    <?php if(getRolId() == Constantes::getADMINISTRADORID()) {?>
                    <li class="open">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> REPORTE </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu nav-show" style="display: block;">

                            <li class="">
                                <a href="contacto.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    CONTACTO
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul><!-- /.nav-list -->

                <!-- #section:basics/sidebar.layout.minimize -->
                <div class="sidebar-toggle sidebar-collapse hide" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-right" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>

                <!-- /section:basics/sidebar.layout.minimize -->
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'collapsed')
                }catch(e){}
                </script>
            </div>