<?php 
    session_start();
    // $_SESSION['idUsus'] se carga en: 'g-modelos/yy_loginRegistro/logReg.php
    $id_Us = $_SESSION['idUsus'];     
    include_once ("../g-modelos/zz_phpBBDD/a_funciones_bbdd.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../c-img/yama.png" type="../image/x-icon">

        <link rel="stylesheet" href="style.css">
        
        <title>Contrato</title>

        <script src="../e-javaScript/javaScrip/jquery-1.6.3.min.js" > </script>
        <script>
            $(function(){
                $("body").hide( ).fadeIn(3000); //para que aparecca el body lentamente.
            });
        </script>

    </head>
    <body>
        <!--  Modelo de contrato: 
            https://kreitzmarket.com/contacto-diseno-web/ -->
        <h1>
            <?php echo "Hola "; nombreUsuario ( $id_Us) ?>
        </h1>
        <h1 style="color: red;">
            Puedes contactar por teléfono, email, o rellenando formulario.
        </h1>
        

        <div id="divGeneral">
            <section id="contrSection">
                <article id="izqarticle">
                    <form action="#" method="post">
                        <label for="nombre">Nombre</label> </br>
                        <input type="tex" name="nombre" value="<?php nombreUsuario ( $id_Us) ?>" readonly> </br> </br>

                        <label for="email">Email</label> </br>
                        <input type="email" name="email" required> </br> </br>

                        <label for="telefono">Telefono</label> </br>
                        <input type="number" name="telefono" required> </br> </br>

                        <label for="mensaje">Idea de tu web?</label> </br>  
                        <textarea name="mensaje" id="mensaje" cols="30" rows="10" required></textarea>
                        </br>
                        <input id="contrata" type="submit" name="acordar" value="Enviar" >
                    </form>

                    <?php

                        if( isset($_REQUEST['acordar']) ) {
                            
                            $nombre = $_REQUEST['nombre']; 
                            $email = $_REQUEST['email']; 
                            $telefono = $_REQUEST['telefono']; 
                            $mensaje = $_REQUEST['mensaje'];

                            addContrato("vcontratos", $nombre, $email, $telefono, $mensaje, 
                                            $aceptado = "", $fechapago = "", $comodin = "");
                        }
                        

                    ?>

                    <br>
                    <h3> 
                        &#x1F9CA;_ garantizada la protección de tu privacidad, y solo se usará tu 
                        información personal para administrar tu cuenta y proporcionar los productos 
                        y servicios que nos solicitaste
                    </h3>
                    <h3>
                        &#x1F9CA;_ Puedes darte de baja de estas comunicaciones en cualquier momento. 
                        Para obtener más información sobre nuestras prácticas de privacidad y cómo nos 
                        comprometemos a proteger y respetar tu privacidad, consulta nuestra Política 
                        de privacidad. 
                    </h3>
                    <h3>
                        &#x1F9CA;_ Puedes borrar todos tus datos desde la ventana de acceso.
                    </h3>
                </article>
                
                <article id="derarticle">
                    <h1>
                        <i class="fa fa-phone" aria-hidden="true"> </i>  682 51 18 35
                    </h1>
                    <h1>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:lobodemayo@hotmail.es">lobodemayo@hotmail.es</a>
                    </h1>
                </article>
            </section>
            

        </div>

    </body>
    <!-- ___ enlace para iconos__: https://.com/v4/icon/shopping-cart-->
    <script src="https://use.fontawesome.com/796fe62807.js"></script>
</html>