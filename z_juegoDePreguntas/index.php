      <?php
            
            session_start();
            include_once("funciones/baseDeDatos.php");


            if ( isset( $_REQUEST['guaPun'] ) ){
                  actualizaPuntos($_SESSION['puntosCon'], $_SESSION['nameJug'],  $_SESSION['clave'] );
            }
            if ( isset( $_REQUEST['salir'] ) ){
                  $_SESSION['nameJug'] = "Invitado";
            }
            
            if ( !isset($_SESSION['nameJug']) ){
                  $_SESSION['nameJug'] = "Invitado";
            } 

            /** -- se carga en la función: ciertoSiNO() */
            $_SESSION['contestadas'] = 0;
            
            /** -- se carga en la función: ciertoSiNO() */
            $_SESSION['okPreg'] = 0;

            /** -- se carga en la función: ciertoSiNO() */
            $_SESSION['falloPreg'] = 0;


            /** -- se carga en la función:  sumaPuntosConSesiones() y se ejecutan en ciertoSiNO() */
            $_SESSION['puntosCon'] = 0;

            /** -- se carga en la función:  sumaPuntosConSesiones() y se ejecutan en ciertoSiNO() */
            $_SESSION['acumulador'] = 10;
      
      ?>



      <?php include('layout/header.php'); ?>

      <!--   --------------------------------  Título para todas las ventanas-->
      <section class="b_tituloVentana"> 

            <div class="b_uno_titVen"> 
                  <h1>
                        <a href='vistas/z_funcionamientoApp.php'> 
                              <img src='img/a_inform.png' alt='informacion' width="40px">
                        </a>
                  </h1>  
            </div>

            <div class="b_dos_titVen">
                  <h1> BienVenido <?php echo $_SESSION['nameJug'] ; ?> </h1>
            </div>
            <div class="b_tres_titVen">
                  <h1>
                        <a href='vistas/z_administrador.php'> 
                              <img src='img/candado.png' alt='candados' width="40px">
                        </a>
                  </h1>  
            </div>
      </section>

      <section id="c_vistaIndex" class="fluid-grid">

            <div id="c_uno" class="fluid-grid">
                                
                  <div class="comment" style="  padding-left:15px;">

                        <h2>Lista TOP</h2> <?php listaTopJugadores(); ?>
                  </div>

                  <div style=" padding-left:15px;">

                        <h2>Jugadores</h2> <?php selectConJugadores();  ?>
                  </div>    

            </div>

            <div id="c_dos">

                  <div id="cd_a">

                        <img src="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg" alt="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg">
                        <img src="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg" alt="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg">
                        <img src="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg" alt="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg">
                        <img src="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg" alt="https://img-9gag-fun.9cache.com/photo/2598037_460s.jpg">
                  </div>

                  <div id="cd_b" class="fluid-grid" >

                        <?php 
                              if($_SESSION['nameJug'] == 'admin' ) {
                                    echo "
                                          <form action='vistas/a_editaPregunta.php' method='post'>
                                                <input type='submit' name='ediPre' value='Editar pregunta'>
                                          </form>
                                    ";
                              }                    
                        ?>

                        <form action="vistas/b_jugarPartida.php" method="post">
                              <input type="submit" name="jugPar" value="Jugar partida">
                        </form>
                  </div>                 
            </div>

      </section>


      <!--   --------------------------------  Footer-->
      <?php include("layout/footer.php");  ?>
