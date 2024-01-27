<?php

      include_once("../layout/header.php");
      include_once("../funciones/baseDeDatos.php");
      include_once("../funciones/tablasFormularios.php");

      //  --   --------------------------------  Título para todas las ventanas.
      tituloDeVentana("Editando preguntas");
      
      
      formularioInsetaPregunta();

      if ( isset($_REQUEST['formularioInsetaPregunta']) ){

            //$pregunta = htmlentities($_REQUEST['pregunta']) ;
            $pregunta = $_REQUEST['pregunta'];
            $unoResp = $_REQUEST['unoResp'];
            $dosResp = $_REQUEST['dosResp'];
            $tresResp = $_REQUEST['tresResp'];

            $cuatroResp = $_REQUEST['cuatroResp'];
            $respVerdadera = $_REQUEST['respVerdadera'];
            $img = $_REQUEST['img'];
            $comodin = $_REQUEST['comodin'];
            $fecha = date('Y/m/d');;

            insertaPregunta($pregunta, $unoResp, $dosResp, $tresResp, $cuatroResp, 
                  $respVerdadera, $img, $comodin, $fecha);
      }
       
      
      include_once("../layout/footer.php");

      // crearTablaPreguntas();
      camposTabla("preguntas");
?>