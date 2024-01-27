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
    <title> Chat espaldamojada</title>


    <script>
        // actualiza la aplicación y cierra ventana secundaria.
        function cerrarse(){
            //opener.location.reload();
            window.close()
        }
    </script>


    <script src="../e-javaScript/javaScrip/jquery-1.6.3.min.js" > </script>


    <script>
        $(function(){
            $("body").hide( ).fadeIn(2000); //para que aparecca el body lentamente.
        });
    </script>

</head>

<body>

    <div class="chat">
        <!-- https://www.bing.com/videos/riverview/relatedvideo?q=chat+en+php&mid=2FF6BBC2C294B1360F0D2FF6BBC2C294B1360F0D  -->
        <div class="button-email">
            <span> <?php nombreUsuario ($id_Us); ?> </span>
            
            <input class='Deconnexion_btn' type=button value='Dexconexión' onclick='cerrarse()'>
        </div>

        <!-- mensajes-->
        <div class="messages_box">
            Cargando ...

            <!-- -->
            <?php                    
                
                //include("messajes.php");
                // $_SESSION['nameUsuario'] se carga en: 'g-modelos/yy_loginRegistro/logReg.php
                if(isset($_SESSION['nameUsuario']) ) {
            
                    $datos = datosChatsOrdenados("messages");

                    if(count($datos) == 0 ) {
                        // si aún no hay mensajes
                        echo "buzón vacío";
                    }
                    else {
                        // si hay mensajes
                        for($i =0; $i <count($datos); $i++ ){  
                            // si enviaste el mensaje usamos el formato e 
                            if( $datos[$i]['id_Us'] == $_SESSION['idUsus'] ) {
                                ?>
                                    <div class="message your_message">
                                        <span>Mi chat</span>
                                        <p><?php echo $datos[$i]['msg']; ?></p>
                                        <p class="date"><?php echo  $datos[$i]['fecha']; ?></p>
                                    </div>
                                <?php
                            }
                            else {
                                // Si no es el autor del mensaje, ib muestra este mensaje en este formato:
                                ?>
                                    <div class="message others_message">
                                        <span><?php  nombreUsuario ($datos[$i]['id_Us']);  ?></span>
                                        <p><?php echo  $datos[$i]['msg']; ?></p>
                                        <p class="date"><?php echo $datos[$i]['fecha']; ?></p>
                                    </div>
                                <?php
                            }
                        }
                    } 
                }
            
            ?>
            
        </div>

        <?php 
            // enviando mensajes
            if(isset($_REQUEST['send']) ) {
                // recuperamos el mensaje
                $message = $_REQUEST['message'];

                // comprueba si el campo no está vacío.
                if(isset($message) && $message != "" ) {
                    // inserta el mensaje en la bbdd
                    addChat("messages", $id_Us, $message, $comodin = "");
                    
                    // actualiza la página
                    //  header("location: http://localhost/DWES_22-23/z_proyecto/h_chat/chat.php");
                    //  die();
                    echo "
                        <script>
                            location.href ='http://localhost/27_09_2023/z_proyecto/h_chat/chat.php';
                        </script>
                    ";
                }
                else {
                    // si el mensaje esta vacio, actualiza la página
                   // header("location: http://localhost/DWES_22-23/z_proyecto/h_chat/chat.php");
                    // die();

                    //http://localhost/27_09_2023/z_proyecto/
                    echo "
                        <script>
                            location.href ='http://localhost/27_09_2023/z_proyecto/h_chat/chat.php';
                        </script>
                    ";
                }

            }
        ?>

        <form action="" class="send_message" method="POST">
            <textarea name="message" id="" cols="30" rows="2" placeholder="Su mensaje"></textarea>
            <input type="submit" value="Enviar" name="send"  >
        </form>
    </div>

    <script>
        // actualiza el chat automáticamente utilizando AJAX
        var message_box = document.querySelector('.messages_box');

        setInterval(function(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    message_box.innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "messajes.php", true);  // recuperacion de la página messajes.
            xhttp.send();

        }, 500); // Actualzar el chat en 500 milisegundos
    </script>

</body>
</html>