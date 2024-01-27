<?php  



    if( !isset($_SESSION['nameVentana']) ) {  
        $_SESSION['nameVentana'] = "";
    }
    if( !isset($_SESSION['idUsus']) ) {
        $_SESSION['idUsus'] = "";
    }

    if( !isset($_SESSION['nameUsus']) ) { 
        $_SESSION['nameUsus']  = letrasGoticas("invitado");
    }

    if( !isset($_SESSION['nameUsuario']) ) {
        $_SESSION['nameUsuario'] = "";
    }
    if( !isset($_SESSION['visitas']) ) {
        $_SESSION['visitas'] = "";
    } 
    if( !isset($_SESSION['nameTabla']) ) {
        $_SESSION['nameTabla'] = "";
    }




    include_once("g-modelos/zz_phpBBDD/a_funciones_bbdd.php");
    include_once("d_php/funciones.php");

    $id_Us = $_SESSION['idUsus'];
    //__ array indexado con contratos de un usuario.
    $contrato = datosTablaArray("vcontratos", $sentencia = " where id_Us = ' $id_Us'");
    $numContratos = count(datosTablaArray("vcontratos", $sentencia = " where id_Us = ' $id_Us'")) ;

    $estadoContrato = estadoContrato(); // '', en espera, en proceso, finalizado, pagado, anulado
    //__ muestra al administrador el nº de contratos que tiene pendientes de pago.
    $numDeContratos = numeroDeFilas ("vcontratos", "comodin", $condicion = " where estado !=  '$estadoContrato[4]' "); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="c-img/yama.png" type="../image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="b-css/a-cabecera.css">
        <link rel="stylesheet" href="b-css/b-general.css">
        <link rel="stylesheet" href="b-css/c-divOculto.css">
        <link rel="stylesheet" href="b-css/c-imagenDosCaras.css">
        <link rel="stylesheet" href="b-css/c-sorteos.css">
        <link rel="stylesheet" href="b-css/d-footer.css">
        <link rel="stylesheet" href="b-css/c-modelPagWeb.css">

        <style>

            /**__ muestra un comentario desplazandose hacia la derecha si el usuario es conocido. */
            #publiDinamica{
                /*text-align: center;
                background-color: black;
                color: white;
                height: 13px;*/
                margin-top: 70px;
                
                max-width: 1500px;
                font-size: 25px;
            }

            #publiDinamica{
                /* animation properties */
                -moz-transform: translateX(100%);
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
                
                -moz-animation: my-animation 15s linear infinite;
                -webkit-animation: my-animation 15s linear infinite;
                animation: my-animation 15s linear infinite;
            }
            
            /* for Firefox */
            @-moz-keyframes my-animation {
                from { -moz-transform: translateX(100%); }
                to { -moz-transform: translateX(-100%); }
            }
            
            /* for Chrome */
            @-webkit-keyframes my-animation {
                from { -webkit-transform: translateX(100%); }
                to { -webkit-transform: translateX(-100%); }
            }
            
            @keyframes my-animation {
                from {
                -moz-transform: translateX(100%);
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
                }
                to {
                -moz-transform: translateX(-100%);
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
                }
            }  

            /**___  https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_zoom_hover */
            .zoom {
                /*padding: 60px;*/
                /*background-color: green;*/
                transition: transform 1.2s;
                width: 55px;
                height: 55px;
                /*margin: 0 auto;*/
            }

            .zoom:hover {
                -ms-transform: scale(1.5); /* IE 9 */
                -webkit-transform: scale(1.5); /* Safari 3-8 */
                transform: scale(1.5); 
                filter: grayscale(100%);
                -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
            }

        </style>

        
        <title> <?php echo  $_SESSION['nameVentana']; ?> </title>

    </head>

    <body>

        <div id="cabecera">

            <div id="izq"> 

                <h2>  Desde __  2022-27-11 </h2> 
            </div>

            <div id="cen"> 
                <h1> <?php echo  letrasGoticas("espaldamojada") ; ?> </h1>
            </div>
            <div id="der">

                <img class="zoom"  src="c-img/yama.png"  alt="yama.png">
            </div>

        </div><!-- -----------------------------------FIN  div cabecera-->

        <div id="b-cabecera">

            <section id="b-uno">

                <div id="logotipo">
                    <h1> 
                        <span id="span"> &#8984; </span> <?php echo  letrasGoticas("alto standing"); ?>
                    </h1>
                </div>

                <div id="cabRedSoc">
                    <div class="rS">
                        <a href="javascript:ventanaSecundaria('https://es-es.facebook.com/')">
                            <h2><span class="Websymbols manita"> f</span> </h2> 
                        </a>
                    </div>

                    <div class="rS">
                        <a href="javascript:ventanaSecundaria('https://workspace.google.com/products/currents/')">
                            <h2><span class="Websymbols manita"> g</span> </h2> 
                        </a>
                    </div>

                    <div class="rS">
                        <a href="javascript:ventanaSecundaria('https://www.instagram.com/')">
                            <h2><span class="Websymbols manita"> l</span> </h2> 
                        </a>
                    </div>

                    <div class="rS">
                        <a href="javascript:ventanaSecundaria('https://twitter.com/?lang=es')">
                            <h2><span class="Websymbols manita"> t</span> </h2> 
                        </a>
                    </div>

                    <div class="rS">
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/')">
                            <h2><span class="Websymbols manita"> y</span> </h2> 
                        </a>
                    </div>
                </div>
            </section>

            <!-- Da información, cuando se pasa el mouse por encima, sobre la importancia de tener una web.  -->
            <?php include("f-vistas/informacion.php");  ?>

            <section id="b-dos">

                <form>
                    <?php 
                        if( $_SESSION['nameUsus'] == letrasGoticas("invitado") ) {    
                    ?>
                            <div id="btnUsuCon">
                                <a class="privado" href="javascript:loginVentanaSecundaria('g-modelos/yy_loginRegistro/logReg.php')">
                                      <?php echo  letrasGoticas("__ acceso __"); ?> 
                                </a>                                                     
                            </div>    
                    <?php
                        }// _______ Fin if( $_SESSION['nameUsus'] == "invitado" )
                        else{
                    ?>  
                            <div id="btnUsuCon"> 

                                <?php if( $_SESSION['nameUsus'] == letrasGoticas("admin") ) { ?>

                                    <?php if ( $numDeContratos >= 1 ) {   ?> 
                                        <a class="chatear" href="javascript:administracionVentana('i-contratar/administracion.php')"> 
                                            <?php  echo $numDeContratos;  ?>  
                                        </a>
                                    <?php  } ?> 

                                    <a class="chatear" href="javascript:administracionVentana('i-contratar/administracion.php')"> 
                                        <?php echo letrasGoticas("administracion"); ?> 
                                    </a>

                                <?php }
                                      
                                ?>

                                <?php //__ si el usuario tiene contratos pendientes.
                                    if($numContratos >= 1 ) {
                                ?>
                                        <a class="chatear" href="javascript:contratosUsuVentana('i-contratar/ventanaUsuContrato.php')">   
                                            <?php echo $numContratos; ?> 
                                        </a>
                                <?php } ?>

                                <a class="chatear" href="javascript:ventanaChat('h_chat/chat.php')"> 
                                    <?php 
                                        echo letrasGoticas("chatear"); 
                                    ?> 
                                </a>


                            </div> 
                    <?php        
                        }// _______ Fin else ( $_SESSION['nameUsus'] == "invitado" )
                    ?>
                    
                </form>
            </section>

        </div>