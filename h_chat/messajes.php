
<?php
    include_once ("../g-modelos/zz_phpBBDD/a_funciones_bbdd.php");
    
     session_start();
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
                // si c'est vous qui avvez envoyé le message on utiise e format :
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
                    // si vous n'êtes pas l'auter du message, ib affucge ce message sur ce format :
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




<!--
    <div class="message your_message">
        <span>Vous</span>
        <p>Commente sa vas ??</p>
        <p class="date">05-07-2023</p>
    </div>
    <div class="message others_message">
        <span>eva@eva.com</span>
        <p>Oui sa vas merci</p>
        <p class="date">05-07-2023</p>
    </div>
-->    