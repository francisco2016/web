<?php
    session_start();
     
    if ( !isset($_SESSION['sessAdmin']) ){
        $_SESSION['sessAdmin'] = "";
    }
     
    if ( !isset($_SESSION['sessClave']) ){
        $_SESSION['sessClave'] = "";
    }

    include_once("../layout/header.php");
    include_once("../funciones/baseDeDatos.php");
    include_once("../funciones/tablasFormularios.php");

    echo "<h1 id='zztop'> Datos:</h1>"  ;
    //  --   --------------------------------  Título para todas las ventanas.
    tituloDeVentana("Administración");


    /** ['accesoInformacion'] es un submit de: formularioAccesoInformacion() */
    if ( empty($_REQUEST['accesoInformacion'])) { 
        
        if ( $_SESSION['sessAdmin'] != 'admin' && $_SESSION['sessClave'] != 'clave'){
            
            formularioAccesoInformacion();
        }   
    }


    if ( isset( $_REQUEST['accesoInformacion'])) {

        if ( $_SESSION['sessAdmin'] != 'admin' && $_SESSION['sessClave'] != 'clave'){
            
            formularioAccesoInformacion();        
        }
        /** ['admin'] y ['clave'] son el valor de acceso, o no acceso.*/
        if (  $_REQUEST['admin'] == 'admin' && $_REQUEST['clave'] == 'clave' ){
            
            $_SESSION['sessAdmin'] = $_REQUEST['admin'];
            $_SESSION['sessClave'] = $_REQUEST['clave'];
       
        }
        else{
            echo "Error caracola.";
        }     
    }

    /** Si se cargan las constantes de Session, no pasa por; formularioAccesoInformacion(). */
    if ( $_SESSION['sessAdmin'] == 'admin' && $_SESSION['sessClave'] == 'clave') {

        opcionesDeAdministracion();

        /** ['griRes'], ['texFlu'] son submit de: opcionesDeAdministracion() */
        if ( isset( $_REQUEST['griRes'] ) ){
            gridResponsive();
        }
        else if ( isset( $_REQUEST['texFlu'] ) ){
            textoFluido();
        } 
        else if ( isset( $_REQUEST['verPre'] ) ){
            verPreguntas();
        }
        else if ( isset( $_REQUEST['verPreDos'] ) ){
            todosLosDatos();
        } 

        
    }
    

    echo "<br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br> <br><br><br><br><br>";
?>