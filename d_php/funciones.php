<?php

    function contador(){

        // obtengo valor del contador.
        $archivo = "archivo.txt";
        $contador = intval( trim( file_get_contents($archivo) ) );

        // escribo y actualizo el valor de la visita.
        $file = fopen($archivo, "w");
        fwrite( $file, $contador+1 . PHP_EOL);

        // muestro el valor del contador.
        $file = fopen($archivo, "r");
        $cont = fgets($file);

        fclose($file);

        return $cont;
    }


    function letrasGoticas($nombre){

        $abecedario = [
            'a', 'b', 'c', 'd', 'e', 
            'f', 'g', 'h', 'i', 'j', 
            'k', 'l', 'm', 'n', 'ñ', 
            'o', 'p', 'q', 'r', 's', 
            't', 'u', 'v', 'w', 'x', 
            'y', 'z'
        ];
        $goticas = [
            '&#120146;', '&#120147;', '&#120148;', '&#120149;', '&#120150;', 
            '&#120151;', '&#120152;', '&#120153;', '&#120154;', '&#120155;', 
            '&#120156;', '&#120157;', '&#120158;', '&#120159;', '&#120159;&#120159;', 
            '&#120160;', '&#120161;', '&#120162;', '&#120163;', '&#120164;', 
            '&#120165;', '&#120166;', '&#120167;', '&#120168;', '&#120169;', 
            '&#120170;', '&#120171;'
        ];

        $nombreEnGotico = str_replace($abecedario, $goticas, $nombre);
        return $nombreEnGotico;
    }


    function goticas($nombre){

        $abecedario = [
            'a', 'b', 'c', 'd', 'e', 
            'f', 'g', 'h', 'i', 'j', 
            'k', 'l', 'm', 'n', 'ñ', 
            'o', 'p', 'q', 'r', 's', 
            't', 'u', 'v', 'w', 'x', 
            'y', 'z'
        ];
        $goticas = [
            '&#120146;', '&#120147;', '&#120148;', '&#120149;', '&#120150;', 
            '&#120151;', '&#120152;', '&#120153;', '&#120154;', '&#120155;', 
            '&#120156;', '&#120157;', '&#120158;', '&#120159;', '&#120159;&#120159;', 
            '&#120160;', '&#120161;', '&#120162;', '&#120163;', '&#120164;', 
            '&#120165;', '&#120166;', '&#120167;', '&#120168;', '&#120169;', 
            '&#120170;', '&#120171;'
        ];

        $nombreEnGotico = str_replace($abecedario, $goticas, $nombre);
        return $nombreEnGotico;
    }


    function numeroDeFilas ($nameTable, $nameCampo, $condicion = "") {

        $totalFilas = 0;
        try{
            $con = new mysqli(HOST, USER, PASS, BBDD );
            $sentencia = "SELECT count($nameCampo) total FROM $nameTable $condicion ";
            $result = mysqli_query($con, $sentencia );
            if( $result) {
                $totalFilas = mysqli_fetch_assoc($result);
            }
        }
        catch(mysqli_sql_exception $e ) {
            die (("Error: " .$e->getMessage() ));
        }
        return $totalFilas['total'];
    }

    /*__ se utiliza en: 'f-vistas/a-header.php', para indicar al administrador 
        si tiene algún nº de contratos por revisar. 
        Tambien en: 'i-contratar/administracion.php' dentro de un formulario para
        que el administrador actualice el estado del contrato/s
    */
    function estadoContrato(){

        $estadoContrato = [
            ' ', 
            'en espera', 
            'en proceso', 
            'finalizado', 
            'pagado', 
            'anulado'
        ];
            
        return $estadoContrato;
    }
    
?>