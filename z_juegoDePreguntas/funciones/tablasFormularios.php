<?php

      function tituloDeVentana($titulo){
            echo "
                  <section class='b_tituloVentana'>
                        <div class='b_uno_titVen'>
                              <h1>
                                    <a href='../index.php'>  
                                    <img src='../img/e_izqui.png' alt='informacion' width='45px'>
                                    </a> 
                              </h1>
                        </div>
                        <div class='b_dos_titVen'>
                              <h1>$titulo</h1>
                        </div>
                        <div class='b_tres_titVen'>
                              <h1>
                                    <a href='#'> 
                                    <img src='../img/c_mas.png' alt='informacion' width='45px'>
                                    </a>

                              </h1> 
                        </div>
                  </section>
            ";
                        
      }
      
     

      function formularioInsetaPregunta(){
            echo "
                  <section>
                        <form action='#' method='post'>
                              <div class='tablaFormulario'>
                                    <div class='fluid-grid'>
                                          <article>
                                                <p>pregunta</p>
                                                <input type='text' name='pregunta' required=''>
                                          </article>
                                          <article>
                                                <p>unoResp</p>
                                                <input type='text' name='unoResp' required=''>
                                          </article>
                                          <article>
                                                <p>dosResp</p>
                                                <input type='text' name='dosResp' required=''>
                                          </article>
                                          <article>
                                                <p>tresResp</p>
                                                <input type='text' name='tresResp' required=''>
                                          </article>
                                          <article>
                                                <p>cuatroResp</p>
                                                <input type='text' name='cuatroResp' required=''>
                                          </article>
                                    
                                          <article>
                                                <p>respVerdadera</p>
                                                <input type='text' name='respVerdadera' required=''>
                                          </article>
                                          <article>
                                                <p>url: img</p>
                                                <input type='text' name='img' required=''>
                                          </article>
                                          <article>
                                                <p>categoría</p>
                                                <select name='comodin' id='comodin' required >
                                                      <option>ciencia</option>
                                                      <option>Historia</option>
                                                      <option>informatica</option>
                                                      <option>Arte</option>
                                                      <option>Deportes</option>
                                                      <option>General</option>
                                                </select>
                                          </article>
                                          <article>
                                                <p>fecha</p>
                                                <input type='text' name='fecha'placeholder='automática' readonly=''>
                                          </article>
                                          <article>
                                                <p>Limpiar</p>
                                                <input type='reset' value='Limpiar'>
                                          </article>
                                          <article>
                                                <p>0k</p>
                                                <input type='submit' name='formularioInsetaPregunta' value='Guardar'>
                                          </article>
                                    </div>
                              </div>
                        </form>
                  </section>
            ";
      }
      
      function formulaAccesoJugarPart(){
            echo "
                  <section id='adminSection'>
                        <form action='#'>
                              <table id='admiTable'>
                                    <tr>
                                          <th><p>Nombre</p>
                                                <input type='text' name='nombre'>
                                          </th>
                                          <th><p>Clave</p>
                                                <input type='password' name='clave'>
                                          </th>
                                    </tr>
 
                                    <tr>
                                          <th colspan='2'><p>0k</p>
                                                <input type='submit' name='formulaAccesoJugarPart' value='Comenzar'>
                                          </th>
                                    </tr>
                              </table>
                        </form>
                  </section>
            ";
      }

      
      



      /**======================= serie de funciones para el administrador =============== */

      /**--- para acceder a la información  hay que AUTEN TI CARSE */
      function formularioAccesoInformacion(){
            echo "
                  <section id='adminSection'>
                        <form action='#'>
                              <table id='admiTable'>
                                    <tr>
                                          <th><p>Admin</p>
                                                <input type='text' name='admin'>
                                          </th>
                                          <th><p>Clave</p>
                                                <input type='password' name='clave'>
                                          </th>
                                    </tr>
 
                                    <tr>
                                          <th colspan='2'><p>0k</p>
                                                <input type='submit' name='accesoInformacion' value='Ver datos'>
                                          </th>
                                    </tr>
                              </table>
                        </form>
                  </section>
            ";
      }


      function opcionesDeAdministracion(){
            echo "
            <div style='border:solid black 2px; padding:10px; margin:22px;'>
                  <form action='#zztop' method='post' class='fluid-grid'>
                        <input type='submit' name='verPre' value='Ver Preguntas'>
                        <input type='submit' name='verPreDos' value='Ver Preguntas Dos'>
                        <input type='submit' name='griRes' value='Grid Responsibe. Teoría'>
                        <input type='submit' name='texFlu' value='Texto Fluido. Teoría'>
                  </form>
            </div>
            ";
      }

      /** -- muestra información Responsive al administrador. */
      function gridResponsive(){

            echo " <div style='border:solid black 2px; padding:10px; margin:22px;'>
                  <h2 style='text-align:center;'> GRID RESPONSIVE</h2>
                  <h3>
                  /*<br>
                  <mark> repeat(param1, param2):</mark><br>
                  <mark>param1 -></mark> nº de veces que se repite el patrón de columnas, en este caso
                        se utiliza la propiedad especial: 'auto-fit' que le dice.. (dependiendo
                        del nº de elementos que tenga esa grid, pues va a ser le nº de veces que
                        se va a repetir cada una de esas columnas).<br><br>
                  <mark>param2 -></mark> es la unidad de medida, en este caso utilizo al función: minmax(), que
                        nos da un valor máximo y un valor mínimo; [como valor min; 200px, y
                        como tamaño máximo el espacio sobrante; una fracción '1fr'.<br><br>
                  
                  las filas se generan automáticamente, dependiendo del nº de elementos.
                  <br>*/
                  <br><br>
                  .fluid-grid{<br>
                  display: grid;<br>
                  grid-template-columns:<mark> repeat(auto-fit, minmax(200px, 1fr))</mark>;<br>
                  }<br><br>
                  .fluid-iten{<br>
                  border: thin solid gray;<br>
                  padding: 1rem;<br>
                  }
                  <br><br>
                  </h3>
            ";


            echo "
                  <section class='fluid-grid'>
                        <article class='fluid-iten'>Elemento 1</article>
                        <article class='fluid-iten'>Elemento 2</article>
                        <article class='fluid-iten'>Elemento 3</article>
                        <article class='fluid-iten'>Elemento 3</article>
                        <article class='fluid-iten'>Elemento 5</article>
                        <article class='fluid-iten'>Elemento 6</article>
                        <article class='fluid-iten'>Elemento 7</article>
                        <article class='fluid-iten'>Elemento 8</article>
                        <article class='fluid-iten'>Elemento 9</article>
                        <article class='fluid-iten'>Elemento 10</article>
                        <article class='fluid-iten'>Elemento 11</article>
                        <article class='fluid-iten'>Elemento 12</article>
                        <article class='fluid-iten'>Elemento 13</article>
                        <article class='fluid-iten'>Elemento 13</article>
                        <article class='fluid-iten'>Elemento 15</article>
                        <article class='fluid-iten'>Elemento 16</article>
                  </section>
            ";

            echo "
            <br><br><br>
                  section class='fluid-grid'> <br>
                        article class='fluid-iten'>Elemento 1</article><br>
                        article class='fluid-iten'>Elemento 2</article><br>
                        article class='fluid-iten'>Elemento 3</article><br>
                        article class='fluid-iten'>Elemento n</article><br>
                  /section><br>
                 
                  </div>
            ";


      }

      /** -- muestra información Responsive al administrador. */
      function textoFluido(){
            echo "<div style='border:solid black 2px; padding:10px; margin:22px;'>
                        <h2 style='text-align:center;'> TEXTO FLUIDO</h2>
                        <h3>
                              /* <br>
                              14 = tamaño de letra más pequeño <br>
                              18 = tamaño de letra más grande <br>
                              300 = tamaño de viewport más pequeño <br>
                              1400 = tamaño de viewport más grande <br>
                              */<br><br>
                              font-size: calc(12px + (18 -12) * ((100vw - 300px) / (1400 - 300)));
                              
                              <br><br>
                        </h3>
                  </div>
            ";
      }



     // echo "<br><br><br><br><br>";

    
?>
