
            $(document).ready(function () {
                GetCantidadGiftCard();
                //setInterval(GetCantidadGiftCard, 5000);
            });

            function GetCantidadGiftCard(){
                pageBlocked = true;
                webApp.Ajax({
                    url: 'Controllers/AlertaController.php',
                    parametros: {
                        action: 'GetCount'
                    }
                }, function(response){
                    if(response.success){
                        
                        if(response.warning){                           
                            $.gritter.add({
                                title: 'Alerta',
                                text: response.message,
                                class_name: 'gritter-warning gritter'
                            });                         
                        }else{                       
                            var alertaResult = response.data;

                            var backGroundAlerta = 'backGreen';
                            if(parseInt(alertaResult.Cantidad) <= parseInt(alertaResult.CantidadAmarillo) && parseInt(alertaResult.Cantidad) > parseInt(alertaResult.CantidadRojo)){
                                backGroundAlerta = 'backYellow';
                            }

                            if(parseInt(alertaResult.Cantidad) <= parseInt(alertaResult.CantidadRojo)){
                                backGroundAlerta = 'backRed';
                            }

                            $("#contenedorAlerta").remove();
                            $('#listaAlerta li:eq(0)').before('<li id="contenedorAlerta" class="' + backGroundAlerta +'"><a data-toggle="dropdown" class="dropdown-toggle ' + backGroundAlerta + '" href="javascript:void(0)" aria-expanded="false"><i class="ace-icon fa fa-bell"></i>        <span id="cantidadGiftCard" class="badge badge-black">' + alertaResult.Cantidad + '</span> </a></li>');

                            /*
                            var mensajeLi = "";
                            mensajeLi += ('<li id="contenedorAlerta" class="' + backGroundAlerta +'"><a data-toggle="dropdown" class="dropdown-toggle ' + backGroundAlerta + '" href="javascript:void(0)" aria-expanded="false"><i class="ace-icon fa fa-bell"></i>        <span id="cantidadGiftCard" class="badge badge-black">' + alertaResult.Cantidad + '</span> </a>');
                            mensajeLi += '<ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">';
                            mensajeLi += '<li class="dropdown-header">';
                            mensajeLi += '<i class="ace-icon fa fa-exclamation-triangle"></i>';
                            mensajeLi += '8 Notifications';
                            mensajeLi += '</li>';
                            mensajeLi += '<li class="dropdown-content">';
                            mensajeLi += '<ul class="dropdown-menu dropdown-navbar navbar-green">';
                            mensajeLi += '<li>';
                            mensajeLi += '<a href="#">';
                            mensajeLi += '<div class="clearfix">';
                            mensajeLi += '<span class="pull-left">';
                            mensajeLi += '<i class="btn btn-xs no-hover btn-green fa fa-comment"></i>';
                            mensajeLi += 'New Comments';
                            mensajeLi += '</span>';
                            mensajeLi += '<span class="pull-right badge badge-info">+12</span>';
                            mensajeLi += '</div>';
                            mensajeLi += '</a>';
                            mensajeLi += '</li>';
                            mensajeLi += '<li>';
                            mensajeLi += '<a href="#">';
                            mensajeLi += '<i class="btn btn-xs btn-primary fa fa-user"></i>';
                            mensajeLi += 'Bob just signed up as an editor ...';
                            mensajeLi += '</a>';
                            mensajeLi += '</li>';
                            mensajeLi += '<li>';
                            mensajeLi += '<a href="#">';
                            mensajeLi += '<div class="clearfix">';
                            mensajeLi += '<span class="pull-left">';
                            mensajeLi += '<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>';
                            mensajeLi += 'New Orders';
                            mensajeLi += '</span>';
                            mensajeLi += '<span class="pull-right badge badge-success">+8</span>';
                            mensajeLi += '</div>';
                            mensajeLi += '</a>';
                            mensajeLi += '</li>';
                            mensajeLi += '<li>';
                            mensajeLi += '<a href="#">';
                            mensajeLi += '<div class="clearfix">';
                            mensajeLi += '<span class="pull-left">';
                            mensajeLi += '<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>';
                            mensajeLi += 'Followers';
                            mensajeLi += '</span>';
                            mensajeLi += '<span class="pull-right badge badge-info">+11</span>';
                            mensajeLi += '</div>';
                            mensajeLi += '</a>';
                            mensajeLi += '</li>';
                            mensajeLi += '</ul>';
                            mensajeLi += '</li>';
                            mensajeLi += '<li class="dropdown-footer">';
                            mensajeLi += '<a href="#">';
                            mensajeLi += 'See all notifications';
                            mensajeLi += '<i class="ace-icon fa fa-arrow-right"></i>';
                            mensajeLi += '</a>';
                            mensajeLi += '</li>';
                            mensajeLi += '</ul>';
                            mensajeLi += '</li>';

                            $('#listaAlerta li:eq(0)').before(mensajeLi);
                            */
                        }
                    }else{
                        $.gritter.add({
                            title: 'Error',
                            text: response.message,
                            class_name: 'gritter-error gritter'
                        });                     
                    }
                }, function(response){
                    $.gritter.add({
                        title: 'Error',
                        text: response,
                        class_name: 'gritter-error gritter'
                    });
                }, function(XMLHttpRequest, textStatus, errorThrown){
                    $.gritter.add({
                        title: 'Error',
                        text: "Status: " + textStatus + "<br/>Error: " + errorThrown,
                        class_name: 'gritter-error gritter'
                    });
                });
            }            