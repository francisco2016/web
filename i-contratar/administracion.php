<?php
    /*
        * muestra al administrador tres inputs para acceder a las tablas: usuarios, messages, y contratos.
        * pulsando en ellos muestras cada una de las tablas, pudiendo actualizar, eliminar, o, ver detalle de cada fila.
    */
?>


<?php
    session_start();
    if( !isset($_SESSION['idDato']) ) { 
        $_SESSION['idDato']  = "";
    }

    include_once("../g-modelos/zz_phpBBDD/a_funciones_bbdd.php");
    include_once("../d_php/funciones.php");

    $estadoContrato = estadoContrato(); //__ return array: [en espera, en proceso, finalizado, pagado, anulado].

    //__ muestra al administrador un contador con el nº de contratos que tiene pendientes de pago.
    $revisarContratos = numeroDeFilas ("vcontratos", "comodin", $condicion = " where estado !=  '$estadoContrato[4]' "); 
                                      
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrador</title>

        <style>
            #adminH2{
                text-align: center;
            }

            .sectionFormu{
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }
            .sectionFormu #formuArticle {
                margin: 30px;
            }
            .sectionFormu #formuArticle form{
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                width: 44%;
            }
            .sectionFormu #formuArticle form .formAdmin{ /** inputs del formulario. */
                margin-bottom: 3px;
                padding: 5px 7px;
                font-size: 15px;
                font-weight: bold;
                border-radius: 7px;
            }
            .sectionFormu #formuArticle form .formAdmin:hover{ /** inputs del formulario. */
                background-color: white;
                color: blue;
                font-weight: bold;
                border: solid white 1px;
                cursor: pointer
            }

            .sectionFormu #tablaArticle{
                margin-top: 1px;
            }
            
            .sectionFormu #tablaArticle #idTable {
                 margin: auto;
            }
            .sectionFormu #tablaArticle #idTable thead{
                 font-size: 21px;
                 background-color: yellowgreen;
            }
            .sectionFormu #tablaArticle #idTable thead th{
                 padding: 0 12px;
            }
            .sectionFormu #tablaArticle #idTable tbody td{
                 padding: 3px 8px;
                 border: solid black 1px;
            }

            /* enlaces en tablas de datos para administrador */
            .fondoTd:hover{
                background-color: greenyellow;
            }
            #deleteTd:hover{
                background-color: red;
            }

            .datosTabla{ /* inputs, datos para actualizar por el administrador. */
                margin-left: 15px;
            }

        </style>

    </head>
    <body>
            

            <?php 
              
                echo "<h3><span> V i s i  t a s : " .$_SESSION['visitas']. "</span> </h3> "; 

                $totalUsuarios = numeroDeFilas ("usuarios", "id");
                echo "<h3><span>   R e g i s t r a d o s : " .$totalUsuarios. " </span> </h3> ";
            ?>
 
        

        <?php
            if($revisarContratos >= 1 ) {
                echo "<h2>Tiene $revisarContratos contratos para revisar. </h2>";
            }
        ?>

        <section class="sectionFormu">

            <article id="formuArticle">
                <form action="" method="post">
                    <input class="formAdmin" type="submit" name="usuarios" value="usuarios">
                    <input class="formAdmin" type="submit" name="chats" value="chats">
                    <input class="formAdmin" type="submit" name="contratos" value="contratos">

                </form>
            </article>

            <article id="tablaArticle">
                <?php

                    //___ SERIE DE CONDICIONALES, MUESTRAN DATOS DE TABLAS: 'DETALLE, ACTUALIZA Y ELIMINA'.

                    if(isset($_REQUEST['usuarios']) ) {
                        $_SESSION['nameTable'] = "usuarios";
                        $arryCampos = camposTablaArray("usuarios");
                        $arrayDatos = datosTablaArray("usuarios");
                        tablaDatos($nameTable = "usuarios", $arryCampos, $arrayDatos );
                    }
                    else if(isset($_REQUEST['chats']) ) {
                        $_SESSION['nameTable'] = "messages";
                        $arryCampos = camposTablaArray("messages");
                        $arrayDatos = datosTablaArray("messages");
                        tablaDatos($nameTable = "messages", $arryCampos, $arrayDatos );
                    }
                    else if(isset($_REQUEST['contratos']) ) {
                        $_SESSION['nameTable'] = "vcontratos";
                        $arryCampos = camposTablaArray("vcontratos");
                        $arrayDatos = datosTablaArray("vcontratos");
                        tablaDatos($nameTable = "vcontratos", $arryCampos, $arrayDatos );
                    }

                    //___ CADA FILA DE TABLA SE PUEDE ELIMINAR, ACTUALIZAR O VER DETALLADAMENTE. 

                    // 'clave': se lanza en un link, desde la función: tablaDatos($..., $..., $...).
                    else if(isset( $_REQUEST['clave']) == "detalle" || 
                                isset( $_REQUEST['clave']) == "update" || 
                                    isset( $_REQUEST['clave']) == "delete" ) {

                        $campos = [];// almacena el parametro 'name' del objeto que retorna: camposTablaArray()
                        $arrayCampos = camposTablaArray($_SESSION['nameTable']);
                        foreach( $arrayCampos as $campo ) {
                            $campos[] = "{$campo->name}" ;
                        }
                        // 'id': se lanza en un link, desde la función: tablaDatos($..., $..., $...). 
                        $id = $_REQUEST['id'];
                        $_SESSION['idDato'] = $id; // para que el admin actualice o elimine datos de una fila de la tabla.
                        $idLink = $_REQUEST['clave']; // detalle, update, o, delete

                        $condicion = " WHERE id  =  ' $id'";
                        if($_SESSION['nameTable'] == "messages" ) {
                            $condicion = " WHERE id_m  =  ' $id'";
                         }

                        $arrayDatos = datosTablaArray($_SESSION['nameTable'], $condicion  );

                        if($idLink  == "detalle"  ) {
                           
                            echo " <h2> Detalle de la tabla: " .$_SESSION['nameTable']. "</h2>";
                            for($i =0; $i <count($arrayDatos[0]); $i++ ) {
                                 echo " <h3> <mark> {$campos[$i]} :</mark> {$arrayDatos[0][$i]} </h3>";
                            }    
                        }
                        // muestra datos de una fila para ser modificados.
                        else if($idLink  == "update" ) {
                            // campos de tablas que no pueden ser actualizados
                            $readonly = 4;
                            if( $_SESSION['nameTable'] == "messages") {
                                $readonly = 3;
                            }
                            else if( $_SESSION['nameTable'] == "vcontratos") {
                                $readonly = 6;
                            }
                            echo " <h2 class='datosTabla'> Actualiza datos en tabla: " .$_SESSION['nameTable'].  "</h2>";
                            echo " <form action='administracion.php' method='post'> ";
                                for($i =0; $i <count($arrayDatos[0]); $i++ ) {
                                    if($i > $readonly) {

                                        if($campos[$i] == 'estado' ){
                                            echo " <label class='datosTabla'> <mark> {$campos[$i]} :</mark> <br> </label>
                                                <select class='datosTabla' name='arrayInput[]' style='color:red;'>";
                                                foreach($estadoContrato as $estCon ) {
                                                    $select = "";
                                                    if( $estCon == $arrayDatos[0][$i]) {
                                                        $select = " selected ";
                                                    }
                                                    echo "<option $select>{$estCon}</option>";
                                                }
                                            echo "</select> <br> <br>";
                                        }
                                        else{
                                            echo "
                                                <label class='datosTabla'> <mark> {$campos[$i]} :</mark> <br> </label>
                                                <input class='datosTabla' type='text' name='arrayInput[]' value='{$arrayDatos[0][$i]}' size='152'><br><br>
                                            ";
                                        }
                                        
                                        
                                    }
                                    else {
                                        echo "
                                            <label class='datosTabla'> <mark> {$campos[$i]} :</mark> <br> </label>
                                            <input class='datosTabla' type='text' name='arrayInput[]' value='{$arrayDatos[0][$i]}' size='152' readonly><br><br>
                                        "; 
                                    }                                                             
                                }
                                echo "                                 
                                    <h3 style='text-align:center;'>
                                        <input type='submit' name='actualiza' value='Actualizar'>
                                    </h3>                                   
                                ";
                            echo "</form> ";
                            echo "<pre>"; /////////////////////////////////////////////////////////////
                                print_r($estadoContrato);
                            echo "</pre>";
                        }

                        else if($idLink  == "delete" ) {
                            // pide confirmación para eliminar datos de la bbdd.
                            echo " <h2 style='text-align:center; color:red;'> Estás seguro de eliminar en tabla: " .$_SESSION['nameTable']. "   " .nombreUsuario( $id). "</h2>";
                            //  echo " <h2 style='text-align:center; color:red;'> Se eliminarán todos sus datos en la BBDD.</h2>";
                            for($i =0; $i <count($arrayDatos[0]); $i++ ) {
                                 echo " <h3> <mark> {$campos[$i]} :</mark> {$arrayDatos[0][$i]} </h3>";
                            }

                            echo "
                                <form action='administracion.php' method='post'> 
                                    <h3 style='text-align:center;'>
                                        <input type='submit' name='deleteFinal' value='Eliminar'>
                                    </h3>
                                </form>    
                            ";
                        }                                              
                    }
                    // conecta con la bbdd para modificar finalmente datos recogidos en: 'else if($idLink  == "update" )'.
                    else if(isset( $_REQUEST['actualiza']) ) {

                        $datos = $_REQUEST['arrayInput'];
                        $id = $_SESSION['idDato'];

                        if ( $_SESSION['nameTable'] == "usuarios" ) {                           
                            actualizaDatosUsuario("usuarios", $id_usu = $id, $passw =  $datos[2], $telefono = $datos[3],  $comodin = $datos[5]);
                        }
                        else if ( $_SESSION['nameTable'] == "messages" ) {
                            messajesActualizaDatos("messages", $id, $datos);
                        }
                        else if ( $_SESSION['nameTable'] == "vcontratos" ) {
                           contratosActualizaDatos("vcontratos", $id, $arrayDatos = $datos );
                        }   
                    }

                    // conecta con la bbdd para eliminación final de datos recogidos en: 'else if($idLink  == "delete" )'.
                    else if(isset( $_REQUEST['deleteFinal']) ) { 

                        $id = $_SESSION['idDato'];

                        if ( $_SESSION['nameTable'] == "usuarios" ) { 
                            eliminaUsuario("usuarios", $id);                          
                        }
                        else if ( $_SESSION['nameTable'] == "messages" ) {
                            eliminaMessage("messages", $id);
                        }
                        else if ( $_SESSION['nameTable'] == "vcontratos" ) {
                            eliminaUsuario("vcontratos", $id);
                        }
                    }
                    
                ?>
            </article>
            
        </section>      
        
        <script src="https://use.fontawesome.com/796fe62807.js"></script>
    </body>
</html>