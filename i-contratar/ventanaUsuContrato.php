
<?php

    session_start();
    $idUsuario = $_SESSION['idUsus'];
    $nameUsuario = $_SESSION['nameUsuario'];


    include_once("../g-modelos/zz_phpBBDD/a_funciones_bbdd.php");
    include_once("../d_php/funciones.php");

    //__ return array: [' ', 'en espera', 'en proceso', 'finalizado', 'pagado', 'anulado']
    $estadoContrato = estadoContrato();

    //__ muestra a los usuarios un contador con el nº de contratos que han acordado.
    $revisarContratos = numeroDeFilas ("vcontratos", "comodin", $condicion = " where estado !=  '$estadoContrato[4]'  AND id_Us = '$idUsuario' "); 

    $datosContrato = datosTablaArray("vcontratos", $sentencia = " where id_Us = '$idUsuario' ");
    echo "<pre>";
        // print_r($datosContrato);
    echo "</pre>";
    
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../c-img/yama.png" type="../image/x-icon">
        <title>Estado de contrato</title>

        <style> 
            .enunH1{
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1 class="enunH1" style="color: red;">
            Te informamos sobre la solicitud de tu página web. <br> 
        </h1>

        <?php
            for($i =0; $i < count($datosContrato); $i++ ) {

                $num = $i +1;
                if($datosContrato[$i][9] == "" ) {
                    // __ si el administrador no ha modificado el campo comodin de la tabla vcontratos, la APP
                    //    muestra por defecto al usuario que solicitó el contrato el siguiente texto:
                    echo "
                        <h2> 
                        $num.- <mark>Tu solicitud: <br></mark>   {$datosContrato[$i][5]} <br><br> <mark>ha sido recibido 
                            pronto te informaremos.</mark>
                        </h2> <hr>
                    ";
                }
                else{
                    // __ si no, muestra al usuario el texto que el administrador ha escrito en el campo comodin:
                    //   '$datosContrato[$i][9]', y la solicitud que el usuario realizó: $datosContrato[$i][5].
                    echo "
                        <h2> 
                            $num.- <mark>Tu solicitud: <br></mark>  {$datosContrato[$i][5]} <br><br>
                            '__ ' {$datosContrato[$i][9]}.
                        </h2> <hr>
                    ";
                }
            }
            
        ?>
    </body>
</html>