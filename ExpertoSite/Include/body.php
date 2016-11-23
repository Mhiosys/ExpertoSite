<?php
include("Security/VerifyAccess.php");
?>
    <body class="no-skin">
        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-default">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>

            <div class="navbar-container" id="navbar-container">
                <!-- #section:basics/sidebar.mobile.toggle -->
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="index.php" class="navbar-brand">
                        <img class="cabeceraImg" src="Content/images/Cabecera2.png"  alt="">
                        <img style="display: none;" class="cabeceraImg992" src="Content/images/Cabecera992.png"  alt="">
                        <img style="display: none;" class="cabeceraImg480" src="Content/images/Cabecera480.png"  alt="">
                        <img style="display: none;" class="cabeceraImg360" src="Content/images/Cabecera360.png"  alt="">
                    </a>                    

                    <!-- /section:basics/navbar.layout.brand -->

                    <!-- #section:basics/navbar.toggle -->

                    <!-- /section:basics/navbar.toggle -->
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul id="listaAlerta" class="nav ace-nav">                        

                        <!-- #section:basics/navbar.user_menu -->
                        <!-- 
                        <li class="green">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
                                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                                <span id="cantidadGiftCard" class="badge badge-success">1</span>
                            </a>

                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="ace-icon fa fa-envelope-o"></i>
                                    1 mensaje
                                </li>

                                <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="max-height: 200px;">
                                    <ul class="dropdown-menu dropdown-navbar">
                                        <li>
                                            <a href="#" class="clearfix">
                                                <img src="Content/images/avatar2.png" class="msg-photo" alt="Alex's Avatar">
                                                <span class="msg-body">
                                                    <span class="msg-title">
                                                        <span class="blue">Alex:</span>
                                                        quemó una nueva giftcard ...
                                                    </span>

                                                    <span class="msg-time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span>hace un momento</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>

                                        
                                    </ul>
                                </div></li>

                                <li class="dropdown-footer">
                                    <a href="index.php">
                                        Ver todos los mensajes
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>    
                        -->                    
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="javascript:void(0)" class="dropdown-toggle">
                                <img class="nav-user-photo" src="Content/images/avatar2.png" alt="Foto del Usuario" />
                                <span class="user-info">
                                    <small>Bienvenido,</small>
                                    <?php echo getUserName();?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <!--
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="ace-icon fa fa-cog disabled"></i>
                                        Configurar
                                    </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="ace-icon fa fa-user disabled"></i>
                                        Perfil
                                    </a>
                                </li>
                                -->
                                <li class="divider"></li>

                                <li>
                                    <a href="logout.php">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Cerra Sesión
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- /section:basics/navbar.user_menu -->
                    </ul>
                </div>                

                <!-- /section:basics/navbar.dropdown -->
            </div><!-- /.navbar-container -->
        </div>
        <!-- /section:basics/navbar.layout -->
        <!--[if gte IE 8]>
          <div style="width:100%; height:60px;"></div>
          <div style="clear:both"></div>
        <![endif]-->
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>


