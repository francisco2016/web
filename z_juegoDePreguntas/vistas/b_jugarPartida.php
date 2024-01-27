<?php
      session_start();
      /*
      if ( !isset($_SESSION['nameJug']) ){
            $_SESSION['nameJug'] = "";
      }
      */
      if ( !isset($_SESSION['clave']) ){  
            $_SESSION['clave'] = "";
      }

      if ( !isset($_SESSION['accesoOk']) ){
            $_SESSION['accesoOk'] = "";
      }


      
      

      include_once("../layout/header.php");
      include_once("../funciones/baseDeDatos.php");
      include_once("../funciones/tablasFormularios.php");

      //  --   --------------------------------  Título para todas las ventanas.
      tituloDeVentana("Jugar partida");
      //usuariosCreaTabla();

      /**sin no se ha pulsado el: 'submit' de la función: formulaAccesoJugarPart()
       * se muestra el fomulario para registrarse. Una vez registrado: '$_SESSION['nameJug']'
       * no estará vacía, por lo que entonces no se volverá a mostrar el formulario. */
      if ( !isset($_REQUEST['formulaAccesoJugarPart']) && $_SESSION['nameJug'] == "Invitado"){
            formulaAccesoJugarPart();
      }
      
      /** si las 'SESSION' no son: "", es porque el usuario se ha registrado, y se muestran 
       *   las preguntas  */
      else if ( $_SESSION['nameJug'] != "" &&  $_SESSION['clave'] != ""){
            echo "<h1>Bien Venido/a " .$_SESSION['nameJug']. ".</h1>";
            

            mostrarPreguntas();
      }
      /** cuando se ha pulsado el: 'submit' de la función: formulaAccesoJugarPart() se almacena
       *   el valor de los input en dos variables: '$nombre' y '$clave' */
      else if( isset($_REQUEST['formulaAccesoJugarPart']) ){
            $nombre = $_REQUEST['nombre'];
            $clave = $_REQUEST['clave'];

            /** si alguna de las variables no se han completado, se sigue mostrando el formulario. */
            if ( empty($nombre) || empty($clave) ){
                  echo "<h1>Faltan datos para acceder al juego. </h1>";
                  formulaAccesoJugarPart();
            }
            else{
                  $_SESSION['nameJug'] = $nombre;
                  $_SESSION['clave'] = $clave;
   

                  /**si el jugador está registrado en la bbdd devuelve: 'ok', 
                   * sino, devuelve: 'no está registrado' */
                  $jugadorRegis = compruebaJugadores($nombre, $clave);

 
                  /**-- si está registrado, muestra las preguntas */
                  if ($jugadorRegis == "ok" ){

                        $_SESSION['accesoOk'] = "Ok";

                        echo "<h1 style='font-family:Shadows Into Light;'>Bien Venido/a " .$_SESSION['nameJug']. ".</h1>";
                         
                        mostrarPreguntas();

                        
                  }
                  else{ /**si no, le registra en la bbdd, y muestra las preguntas */
                        $nombre = $_REQUEST['nombre'];
                        $password = $_REQUEST['clave'];


                        insertaJugador($nombre, $password, "");
                        echo "<h1>Bien Venido/a " .$_SESSION['nameJug']. ".</h1>";

                        $_SESSION['accesoOk'] = "Ok";
                        mostrarPreguntas();
                  }
            }
     
      }

      include_once("../layout/footer.php");

      /*
      echo "<br><br><br> ";
      
      echo " =========================
      <br><br>--------   _SESSION['nameJug'] = "  .$_SESSION['nameJug'] ;   

      echo " <br><br>----------  _SESSION['clave'] = "  .$_SESSION['clave'].
            "<br> ==================================================<br><br>" ; 

      echo " =========================
            <br><br>-------- _SESSION['accesoOk'] = "    ;   

      echo      "<br> ==================================================<br><br>" ;
      
      echo " =========================
      <br><br>--------  _SESSION['contador'] = "  .$_SESSION['contador'] ;   

      echo " <br><br>--2222222------  _SESSION['contador'] = "  .$_SESSION['contador'].
            "<br> ==================================================<br><br>" ; 

   
       
      echo "=========================
            <br><br> nº de ids de preguntas en  _SESSION['idsPreguntas'] = " .count($_SESSION['idsPreguntas']); 

      echo "<pre>";
            print_r(cargaSessionConIds()) ;
      echo "</pre>";


      echo "<pre>";
      print_r($_SESSION['idsPreguntas']);
      echo "</pre>";
      echo " ==================================================<br><br>" ; 
      

       camposTabla("jugadores");
       echo "<br><br><br><br><br><br><br>";
       */
?>
