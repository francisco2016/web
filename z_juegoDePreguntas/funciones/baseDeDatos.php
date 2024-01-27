<?php

 
      /** la session se carga en la funcion: cargaSessionConIds() en: baseDeDatos.php */
      if ( !isset($_SESSION['idsPreguntas']) ){
            $_SESSION['idsPreguntas'] = array();
      }

      if ( !isset($_SESSION['contador']) ){
            $_SESSION['contador'] = 0;
      }

      /** -- se carga en la función: cargaSessionConIds() */
      if ( !isset($_SESSION['totalPreg'] ) ){
            $_SESSION['totalPreg'] = 0;
      }
      /** -- se carga en la función: ciertoSiNO() */
      if ( !isset($_SESSION['contestadas'] ) ){
            $_SESSION['contestadas'] = 0;
      }
      /** -- se carga en la función: ciertoSiNO() */
      if ( !isset($_SESSION['okPreg'] ) ){
            $_SESSION['okPreg'] = 0;
      }
      /** -- se carga en la función: ciertoSiNO() */
      if ( !isset($_SESSION['falloPreg'] ) ){   
            $_SESSION['falloPreg'] = 0;
      }

       /** -- se carga en la función:  sumaPuntosConSesiones() y se ejecutan en ciertoSiNO() */
       if ( !isset($_SESSION['puntosCon'] ) ){   
            $_SESSION['puntosCon'] = 0;
      }
      /** -- se carga en la función:  sumaPuntosConSesiones() y se ejecutan en ciertoSiNO() */
      if ( !isset($_SESSION['acumulador'] ) ){   
            $_SESSION['acumulador'] = 10;
      }

      //include_once("../layout/header.php");

      

      define("HOST", "localhost");
      define("USER", "root");
      define("PASS", "");
      define("BBDD", "a_juegodepreguntas");

      function conectar(){
            try{
                  $con = new mysqli(HOST, USER, PASS, BBDD);
                  return $con;
            }
            catch( mysqli_sql_exception $e){
                  die("Error. " .$e->getMessage() );
            } 
      }

      function insertaJugador($nombre, $password, $comoUno){
            $con = conectar();
            $sent = " INSERT INTO jugadores (nombre, password, comoUno) 
                  values ('$nombre', '$password', '$comoUno')";
            $result = mysqli_query($con, $sent);
            mysqli_close($con);

      }

      /**si el jugador está registrado devuelve: 'ok', sino, devuelve: 'no está registrado' */
      function compruebaJugadores($nombre, $password){
            $con = conectar();
            $sent = " SELECT * FROM jugadores";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);
            $acceso = "No está registrado";
            while($fila = mysqli_fetch_array($result)){
                  if($nombre == $fila['nombre'] && $fila['password'] == $password){
                        $acceso = "ok";
                  }
            }
            
            
            return $acceso;
      }


      function selectConJugadores(){
            $con = conectar();
            $sent = "SELECT * FROM jugadores ORDER BY puntuacion DESC ";
            $ressult = mysqli_query($con, $sent);

            mysqli_close($con);

            echo "
                  <select name='listTop' id='listTop'>  ";
            while( $fila = mysqli_fetch_array($ressult) ){
                  echo " <option>" .$fila['nombre']. " </option>";
            }
            echo "</select> ";
      }



      function listaTopJugadores(){
            $con = conectar();
            $sent = "SELECT * FROM jugadores ORDER BY puntuacion DESC LIMIT 5 ";
            $ressult = mysqli_query($con, $sent);

            mysqli_close($con);

            echo "<table class='tableListaTop'>";
            while( $fila = mysqli_fetch_array($ressult) ){

                  echo "<tr >
                        <td> " .$fila['nombre']. "</td> 
                        <th align='right'>" .$fila['puntuacion']. " pts.</th> 
                  </tr >";  
            }
            echo "</table >";
            
      }

      
      function actualizaPuntos($puntos, $name,  $clave ){
            $con = conectar();// UPDATE jugadores set puntuacion = 333 where nombre = 'ana' and password = 'ana';
            $sent = "UPDATE jugadores set puntuacion = $puntos where nombre = '$name' and password = '$clave'";

            $result = mysqli_query($con, $sent);
            mysqli_close($con);
      }
 

      function insertaPregunta($pregunta, $unoResp, $dosResp, $tresResp, $cuatroResp, 
      $respVerdadera, $img, $comodin, $fecha){
            
            $con = conectar();
            $sent = "INSERT INTO preguntas (pregunta, unoResp, dosResp, tresResp, 
            cuatroResp, respVerdadera, img, comodin, fecha) 
            VALUES ('$pregunta', '$unoResp', '$dosResp', '$tresResp', '$cuatroResp', 
            '$respVerdadera', '$img', '$comodin', '$fecha') ";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);
            if ( $result ){
                  echo "0K, Pregunta editada.";
            }
            else{
                  echo "Error, no se ha añadido la pregunta.";
            }
      }
      

      /**--    carga una 'session' con los ids de las preguntas, en forma aleatoria
       *   se utiliza para mostrar las preguntas aleatoriamente.*/
      function cargaSessionConIds(){
            $con = conectar();
            $sent = "SELECT id FROM preguntas";
            $result = mysqli_query($con, $sent);

            mysqli_close($con );
            
            $arrayIds = array();
            while( $fila = mysqli_fetch_array($result) ){

                  $arrayIds[] = $fila['id'] ;
            }
            shuffle($arrayIds);
            $_SESSION['idsPreguntas'] = $arrayIds;
            $_SESSION['totalPreg'] = count($arrayIds);
            
      }

      
      /** solo se muestra la primera vez que se accede a la ventana: 'b_jugarPartida.php' 
       *  Muestra la primer pregunta, carga una _Session con los ids de las preguntas, y
       *   una _Session contador, con el total de ids de preguntas
      */
      function mostrarPreguntas(){

            /**----------------------------------------------------------------------- 
             * serie de condicionales para tomar el valor los 'id' de una pregunta. */

            if( isset( $_REQUEST['jugPar'] ) || $_SESSION['accesoOk'] == "Ok" ){  
                              
                  unset($_SESSION['accesoOk']) ; 
                  /** -- se carga SESSION['idsPreguntas'], con ids aleatorios. */
                  cargaSessionConIds();
            
              ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                  /** _SESSION['contador'] se carga con el nº de preguntas.*/
                  $_SESSION['contador'] =  count($_SESSION['idsPreguntas']) -1  ;
                  //--------------------   $_SESSION['contador'] =  3  ; // === estamos en pruebassss...
              ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                  //$_SESSION['contador'] = $_SESSION['contador']-1;
                  /** la variable '$idPreg' toma el valor de: SESSION['contador']*/
                  $idPreg = $_SESSION['idsPreguntas'][$_SESSION['contador']];

                        
            }

            else if  ( isset($_REQUEST['respElegida']) ) {
                                                                 
                  $idPreg =    $_SESSION['idsPreguntas'][$_SESSION['contador']];
            }

            else if  (isset( $_REQUEST['otrPre'] ) ) {

                  $_SESSION['contador'] = ($_SESSION['contador']) -1; 
                        
                  if ( $_SESSION['contador'] >= 0 ){
                                    
                        $idPreg =    $_SESSION['idsPreguntas'][$_SESSION['contador']];
                  }

                  else{
                              
                  }
            }
            

            /**-- --------------------------------------------------------------------
             * serie div para mostrar las preguntas. */
            echo "<div id='muestraPreg' class='fluid-grid'> ";

                  echo "<div id='pregunta'>";

                        if ( $_SESSION['contador'] >= 0 ){

                              unaPregunta($idPreg);           
                        }

                        else{

                              seAcabaronLasPreguntas();
                        }                             
                  echo "</div> ";

                  echo "<div id='respuestas'>";
                  
                        /** -- muestra 4 respuestas de pregunta, y envía en un 'hidden' la resp verdadera 
                         * el envio lo realiza por medio de formulario. name = 'respElegida' */
                        if ( $_SESSION['contador'] >= 0 ){

                              elegirRespuesta($idPreg);
                        }
                        else{

                              seAcabaronLasPreguntas();
                        }        
                  echo "</div> ";
       
                  echo "<div id='seleccion'>";   

                        if ( isset($_REQUEST['respElegida']) ){

                              /** -- recoge los datos de la función: elegirRespuesta($idPreg), y los
                              * gesiona, también da acceso a la siguiente pregunta, mediante el 
                              * submit: name='otrPre' */

                              if ( $_SESSION['contador'] >= 0 ){

                                    ciertoSiNO($idPreg);
                              } 
                              else{

                                    seAcabaronLasPreguntas();
                              }
                        }
                        
                  echo "</div> ";

                  echo "<div id='comprobar'> <h2>Estado. </h2> ";

                        if ( $_SESSION['contador'] >= 0 ){

                              estado();                        
                        } 
                        else{
                              estado();

                              echo "<h4> Se acabaron las preguntas </h4>"; 
                        }             
                                           
                  echo "</div> ";
                                                    
            echo "</div>";        
      }


      function siguientePregunta(){
 
                  /** _REQUEST['otrPre']. submit en la función: ciertoSiNO() */
            if ( isset( $_REQUEST['otrPre'] )){
                  
                  --$_SESSION['contador'];
                  echo "<div id='muestraPreg' class='fluid-grid'> ";
                        $idPreg =    $_SESSION['idsPreguntas'][$_SESSION['contador']-1];


                        echo "<div id='pregunta'> <h2>Pregunta. </h2> ";
                                    unaPregunta($idPreg);
                                          
                        echo "</div> ";

                        echo "<div id='respuestas'> <h2 class='textFlu'>Elige Respuestas. </h2> ";
                        /** -- muestra 4 respuestas de pregunta, y envía en un 'hidden' la resp verdadera 
                         * el envio lo realiza por medio de formulario. name = 'respElegida' */      
                                    elegirRespuesta($idPreg);
                        echo "</div> ";

                        echo "<div id='seleccion'> <h2 class='textFlu'>Cierto: si/no    </h2> ";     
                                    if ( isset($_REQUEST['respElegida']) && count($_SESSION['idsPreguntas']) >= 0  ){
                                          /** -- recoge los datos de la función: elegirRespuesta($idPreg), y los
                                           * gesiona, también da acceso a la siguiente pregunta, mediante el 
                                           * submit: name='otrPre' */ 
                                          ciertoSiNO($idPreg);
                                    }
                        echo "</div> ";

                        echo "<div id='comprobar'> <h2>Puntos. </h2> ";             
                                    echo " hola caracola --- " .$_SESSION['contador'];        
                        echo "</div> ";

                        // -- elimino un id del aray session.
                        //unset($_SESSION['idsPreguntas'][3]);

                  echo "</div>"; 
                                                                  
            }
                       
   
            
            
      }


      function unaPregunta($id){
            echo " <h2>Pregunta. </h2> ";

            @$con = conectar();
            $sent = "SELECT pregunta, img FROM preguntas WHERE id = '$id' ";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);
            $fila = mysqli_fetch_array($result);
            if( $fila ){
                  echo "<h3 class='cuatroResp'>".$fila['pregunta']."</h3>"; 
                  echo " <img class='imgPre' src=".$fila['img']." alt='sin internet'>";
            }         

      }

      function unaImagen($id){

            @$con = conectar();
            $sent = "SELECT img FROM preguntas WHERE id = '$id' ";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);
            $fila = mysqli_fetch_array($result);
            if( $fila ){
                  echo " <img class='imgPre' src=".$fila['img']." alt='sin internet'>";
            }         

      }


      function respuestasDePregunta($id){
            $con = conectar();
            $sent = "SELECT * FROM preguntas WHERE id = '$id' ";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);
            
            while($fila = mysqli_fetch_array($result)){
                  echo "<h3 class='cuatroResp'>a &#41;. ".$fila['unoResp']."</h3>";
                  echo "<h3 class='cuatroResp'>b &#41;. ".$fila['dosResp']."</h3>";
                  echo "<h3 class='cuatroResp'>c &#41;. ".$fila['tresResp']."</h3>";
                  echo "<h3 class='cuatroResp'>d &#41;. ".$fila['cuatroResp']."</h3>"; 
            }
      }


      /** -- muestra 4 respuestas de pregunta, y envía en un 'hidden' la resp verdadera */
      function elegirRespuesta($id){

            $disabled = '';
            if ( isset( $_REQUEST['respElegida'])) {$disabled = 'disabled';}

            echo "<h2 class='textFlu'>Elige Respuesta. </h2> ";
            $con = conectar();
            $sent = "SELECT * FROM preguntas WHERE id = '$id' ";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);
            
            while($fila = mysqli_fetch_array($result)){
                  echo "<form action='#' method='post'>
                        <input type='hidden' name='respuestaVerdadera' value=".$fila['respVerdadera'].">";
                        echo "<h3 class='cuatroResp'>
                        <input type='radio' name='eligResp' checked value=".$fila['unoResp']."> ".$fila['unoResp']."
                              </h3>";
                        echo "<h3 class='cuatroResp'>
                        <input type='radio' name='eligResp' value=".$fila['dosResp']."> ".$fila['dosResp']."
                              </h3>";
                        echo "<h3 class='cuatroResp'>
                        <input type='radio' name='eligResp' value=".$fila['tresResp']."> ".$fila['tresResp']."
                              </h3>";
                        echo "<h3 class='cuatroResp'>
                        <input type='radio' name='eligResp' value=".$fila['cuatroResp']."> ".$fila['cuatroResp']."         
                              </h3>"; 
                        echo "<h3 style='text-align: center;'>
                        <input style='width:88%;text-align: center;' $disabled type='submit' name='respElegida' value='Resp elegida' >
                              </h3>
                  
                  </form>";
            }
            
      }

       
      function ciertoSiNO($id){
            echo " <h2 class='textFlu'>Cierto: si/no    </h2> ";
            if ( isset($_REQUEST['respElegida']) ){
                  $respElegida = $_REQUEST['eligResp'];
                  $respuestaVerdadera = $_REQUEST['respuestaVerdadera'];

                   
                   
                  if($respElegida == $respuestaVerdadera ){
                        echo "<h3 class='cuatroResp'> Acertaste. </h3>"; 
                        
                        $_SESSION['okPreg']++; 
                        sumaPuntosConSesiones();
                        unaImagen($id);
                  }
                  else
                  {
                        echo "<h3 class='cuatroResp'> La respuesta no es correcta. </h3>";
                        $_SESSION['falloPreg']++;   

                        // -- serie de condicionales para mostrar diferentes img, en fallo de respuestas.
                        if ( $_SESSION['falloPreg'] % 3 == 0) {
                              echo " <img class='imgPre' src='https://educacion30.b-cdn.net/wp-content/uploads/2018/02/mistake.jpg' alt='sin internet'>";
                        }
                        else if ( $_SESSION['falloPreg'] % 2 == 0) {
                              echo " <img class='imgPre' src='https://www.redeszone.net/app/uploads-redeszone.net/2022/02/solucionar-error-1005.jpg' alt='sin internet'>";
                        }
                        else {
                              echo " <img class='imgPre' src='https://thumbs.dreamstime.com/b/error-109026446.jpg' alt='sin internet'>";
                        }
                        
                  }
                  echo "
                        <form action='#' method='post'>
                              <input id='otraPreg' type='submit' name='otrPre' value='Otra pregunta'>
                        </form>
                  ";
                  if ( $_SESSION['contestadas'] <= $_SESSION['totalPreg'] ){
                        $_SESSION['contestadas']++;
                  }
                  
            }

      }


      function sumaPuntosConSesiones(){
              
            if ( $_SESSION['okPreg'] == 1 ) {
                  $_SESSION['puntosCon'] = $_SESSION['acumulador'];
            }
            else if ( $_SESSION['okPreg'] > 1 ){
                  $_SESSION['acumulador'] = $_SESSION['acumulador'] *2;
                  $_SESSION['puntosCon'] = $_SESSION['puntosCon'] + $_SESSION['acumulador'];
            }      
      }



      function seAcabaronLasPreguntas(){
            echo "<h2 class='textFlu'>No hay más preguntas. </h2> ";
            echo "<h1 style='font-size: 25px;'>   

                  <img src='../img/a_inform.png' alt='inform' width='90px'>
                  &#128142

            </h1>";
      }


      /** -- Muestra el estado de la partida: nº de preguntas, puntos, acertadas, falladas... */
      function estado(){ 

            echo "
                  <table id='tableEstado' style='width: 90%; margin: auto; '>
                        <tr>
                              <th> Nº Pre </th>
                              <th> Contes </th>
                              <th> 0k </th>
                              <th> fallos </th>
                        </tr>
                        <tr>
                              <th>".$_SESSION['totalPreg']."</th>
                              <th>".$_SESSION['contestadas']."</th>
                              <th>".$_SESSION['okPreg']."</th>
                              <th>".$_SESSION['falloPreg']."</th>
                        </tr>

                        <tr> <th><br><br></th> </tr>

                        <tr> 
                              <th colspan='3'>
                              Puntos conseguidos: ".$_SESSION['puntosCon']."
                              </th> 
                        </tr>

                        <tr> <th><br><br></th> </tr>
            ";
                  if ( $_SESSION['contestadas'] > 4 ) {  
            echo " 
                        <tr> 
                              <form action='../index.php' method='post'>
                                    <th colspan='2'>
                                          <input type='submit' name='salir' value='Salir'>
                                    </th> 
                                    <th colspan='2'>
                                          <input type='submit' name='guaPun' value='Guardar Puntos'>
                                    </th> 
                              </form>

                        </tr>
            "; 
                   }
            echo"

                  </table>
            ";

      }

      

      /**   0000  ======================================================================   0000   */
      /**======================= serie de funciones para el administrador =============== */

      function usuariosCreaTabla(){
            $con = conectar();
            $sent = " CREATE TABLE IF NOT EXISTS jugadores (id_jug int not null auto_increment,
                  nombre varchar(30), password varchar(269), puntuacion int, comoUno varchar(55),
                  primary key(id_jug) )";
            $result = mysqli_query($con, $sent);
            mysqli_close($con);
            if ($result){
                  echo " 0k, tabla creada.";
            }
            else{
                  echo " Error, tabla NO¡¡ creada.";
            }
      }

      function crearTablaPreguntas(){
            $con = conectar();
            $sent = "CREATE TABLE IF NOT EXISTS preguntas(id int not null auto_increment,
                  pregunta varchar(150), unoResp varchar(150), dosResp varchar(150), 
                  tresResp varchar(150), cuatroResp varchar(150), respVerdadera varchar(150), 
                  img varchar(250), comodin varchar(50), fecha date default null, primary key(id) )";

            $result = mysqli_query($con, $sent);
            mysqli_close($con);
      }
     
      function verPreguntas(){
            $con = conectar();
            $sent = "SELECT * FROM preguntas";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);

            
            while($fila = mysqli_fetch_array($result)){
                  echo "<div class='fluid-grid'>";
                  
                  echo "
                        <h4>
                              <u>-Pregunta id: ".$fila['id']. ".</u>  
                              ".$fila['pregunta']. ". 
                              <u>-Respuesta:</u> " .$fila['respVerdadera']. "
                              <u>-Categoría:</u> " .$fila['comodin']. "
                              
                        </h4>
                  ";
                  echo "</div>";
            }
      }

      function todosLosDatos(){
            $con = conectar();
            $sent = "SELECT * FROM preguntas";
            $result = mysqli_query($con, $sent);

            mysqli_close($con);

            echo "<table>";
                  $camp = mysqli_fetch_fields($result);
                  echo " <tr style='background-color:aqua;'>";
                  //foreach($camp as $nombre){
                        //echo "<th>".$nombre -> name."</th> ";
                  //}
                        echo "<th> pregunta </th> 
                              <th> unoResp </th> 
                              <th> dosResp </th> 
                              <th> tresResp </th> 
                              <th> cuatroResp </th> 
                              <th> respVerdadera </th> 
                              <th> img </th> 
                              <th> comodin </th>
                              <th> fecha </th>  
                        ";
                  echo "</tr> ";
                  echo "<tr> <th><br><br></th> </tr>";
                  while($fila = mysqli_fetch_array($result)){
                        echo "<tr>";
                        
                               
                              echo "<th>('".$fila['pregunta']."',</th>";
                              echo "<th>'".$fila['unoResp']."',</th>";
                              echo "<th>'".$fila['dosResp']."',</th>";
                              echo "<th>'".$fila['tresResp']."',</th>";
                              echo "<th>'".$fila['cuatroResp']."',</th>";
                              
                              echo "<th>'".$fila['respVerdadera']."',</th>";
                              echo "<th>'".$fila['img']."',</th> ";
                              echo "<th>'".$fila['comodin']."',</th>";
                              echo "<th>'".$fila['fecha']."'),</th>";
                        echo "</tr>";
                        echo "<tr> <th><br></th> </tr>";
                  }
            echo "</table>";
      }

      function camposTabla($nameTable){
            $con = conectar();
            $sent = "SELECT * FROM $nameTable";
            $result = mysqli_query($con, $sent);
            $campos = mysqli_fetch_fields($result);
            mysqli_close($con);

            echo "<p>";
            foreach ($campos as  $value) {
                  echo " " .$value -> name. ", ";
            }
            echo "</p>";
            echo "<p>";
            foreach ($campos as  $value) {
                  echo "$" .$value -> name. ", ";
            }
            echo "</p>";

            echo "<p>";
            foreach ($campos as  $value) {
                  echo "'$" .$value -> name. "', ";
            }
            echo "</p>";

            echo "<p>";
            foreach ($campos as  $value) {
                  echo "<br>$" .$value -> name. " = $"."_REQUEST['".$value -> name."'];";
            }
            echo "</p>";
            
      }

      function insertarPreguntaAMano(){
            $con = conectar();
            $sent = "INSERT INTO preguntas (pregunta, unoResp, dosResp, tresResp, 
            cuatroResp, respVerdadera, img, comodin, fecha) 
            VALUES 
            ('¿Cómo se llama el telescopio que fotografió un Agujero Negro por primera vez?',	
            'Telescopio Horizonte de Sucesos',	'Telescopio espacial Hubble',	'Skywatcher Evostar',	
            'Omegon 90/1250 Mak OTA',	'Telescopio Horizonte de Sucesos',	
            'http://c.files.bbci.co.uk/540D/production/_106371512_small.jpg',	'',	'2022-05-26'),

            ('¿Con que comando se pone el teclado en español con Ubuntu?',	
            'setxbmap -layout es',	'setxkbmap layout spanis',	'ponte Ya',	'setxkbmap -layout es',	
            'setxkbmap -layout es',	
            'https://www.ceibal.edu.uy/storage/app/uploads/public/616/5de/724/6165de724a5be323695063.png',	'',	
            '2022-05-26'),

            ('¿Qué tipo de software es el que se da una versión no avanzada del programa, y a cambio de un pago, se da una licencia para utilizar el programa?',	
            'Software',	'Freeware',	'Skywatcher Evostar',	'Adware',	'Software',	
            'https://i.ytimg.com/vi/SPZiO0JrftY/maxresdefault.jpg',	
            'informatica',	'2022-05-26'),

            ('¿Qué tipo de software instala anuncios publicitarios en el ordenador al instalar otros programas?',	
            'Software',	'Freeware',	'Skywatcher Evostar',	'Adware',	'Adware',	
            'https://es.malwarebytes.com/images/adware/adware_graphics_3.jpg',	'informatica',
            '2022-05-26'),


            ";

            /*
            ('$pregunta', '$unoResp', '$dosResp', '$tresResp', '$cuatroResp', 
                        '$respVerdadera', '$img', '$comodin', '$fecha') 

            */

            $result = mysqli_query($con, $sent);

            mysqli_close($con);
            if ( $result ){
                  echo "0K, Pregunta editada.";
            }
            else{
                  echo "Error, no se ha añadido la pregunta.";
            }
      }





      /**
       * Preguntas sobre deportes:
       * https://www.mundodeportivo.com/uncomo/ocio/articulo/120-preguntas-de-deportes-50646.html
       * 
       * 
       * Preguntas sobre historia:
       * https://www.flooxernow.com/para-ti/20-preguntas-sobre-historia-que-todo-el-mundo-deberia-saber-responder_201611225a94de130cf2052ee3bdcc6b.html
       * 
       * 
       * Preguntas sobre ciencia:
       * https://www.flooxernow.com/para-ti/20-preguntas-sobre-ciencias-que-todo-el-mundo-deberia-saber-responder_201604125a94d9630cf2052ee3bdbf15.html
       */
      
?>