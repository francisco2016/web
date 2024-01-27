<?php /*         http://localhost/27_09_2023/z_proyecto/         */?>

<?php /*         ________________PÁGINA PRINCIPAL________________         */

    
    session_start();

    $_SESSION['nameVentana'] = "z_proyecto___index.php"; 

    include_once('d_php/funciones.php'); 
    include("f-vistas/a-header.php"); 
    
?>


<!-- ================================================================================-->


<div id="general"> 

    <!-- ----------------------------------- MODELOS DE Pag Web PARA LOS CLIENTES-->
    <?php 
        include_once('g-modelos/zz_phpBBDD/a_funciones_bbdd.php'); 
        include ('g-modelos/a_modelos.php'); //_ plantillas de pag Web que se presenta a los clientes 


        /* Las visitas a la página solo se le presentan al administrador en el archivo: 
            i-contratat/administracion.php */
        if($_SESSION['visitas'] == ""){
            $valor = contador();
            $_SESSION['visitas'] = $valor;
        }                       
                                
             
    ?>


    <!-- ----------------------------------- IMÁGENES DEL USUARIO LocalStore-->
    <div id="oculto">
    
        <div id="container">

            <div id="a-container">

                <div id="lateOcul"> 
                    <br>
                    <p class="carruselP">pegar dirección de imagen
                        <textarea class='manita' name='textUrl' id='textUrl' cols="50" rows="1" > </textarea>
                    </p>
                    
                    <p class="carruselP">haz comentario sobre la imagen
                        <textarea class='manita' name='descriText' id='descriText' cols="50" rows="1" > </textarea>
                    </p>

                    <button class='manita' id='butGuardarCa'>Guardar datos</button>
                    <hr><br>

                    <p class="carruselP">comentario almacenado
                        <textarea class='manita'  name='comentTex' id='comentTex' cols="50" rows="1" > </textarea>
                    </p>
                    <hr>
                    <br>
                    <button class='manita' id='cerCarOculto'>Cerrar carrusel</button>
                    <br><br>

                    <button class='manita' id='eliminaImagenes'>Eliminar todas las Imágenes</button>
                </div> 
            </div> 

            <div id="b-container">

                <div id="left"> 
                    <span id="fleIz" class="icono"><h1 class='manita'>&#10502;</h1>  </span> 
                </div>

                <div id="center"> <img src="" alt="" id="imgCarrusel">    </div>  

                <div id="right"> 
                    <span id="fleDe" class="icono"><h1 class='manita'>&#10503;</h1> </span> 
                </div>                             
            </div>
            
        </div>          

        <div id="divFinal"> </div>
         
    </div> <!-- -----------------------------------FIN  div oculto LocalStore -->
        
    
    <?php include ('d_php/c_sorteos.php'); ?>

    <!-- ----------------------------------- CONTENIDO DE LA PÁGINA-->

    <?php 
        if( $_SESSION['nameUsus'] == letrasGoticas("invitado")) {
            echo "<h1  class='masSuplementos'>".              
                    letrasGoticas("pincha e interactua con otros suplementos para la web.").
                "</h1>"
            ;   
        }  
        else{  
            echo" <h3  id='publiDinamica'>"  
                    .letrasGoticas("paginas web gratuitas o de pago.
                                    Pincha en -contratar pagina web- y dinos.
                    "). 
                "</h3> "
            ;     
        }
    ?>    
    

    <section id="a-sectionContenido">
    
        <!-- ----------------------------------- CONTENIDO LATERAL IZQUIERDA DE LA PÁGINA-->
        <main>

            <div id="a-main">

                <article> 
                    <label>Fecha: 29 dic 2021 Categoría: Película</label>
                    <h2 class="manita">enlaces a películas en YouTube </h2>     

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=XzYSn8lLBiA/')">
                            Película: Fantasma 
                        </a> <br/> 
                        Una gran sinfonía compuesta por un gran maestro, interpretada en una gran orquesta con
                        un gran presupuesto.La misma sinfonía interpretada por una pequeña orquesta en modo 
                        Jazz. Esto es esta película. Recomendada para quien esté harto de la buena vida.
                        <br/><br/>  
                    </h5>

                    <label>Fecha: 04 jun 2023 Categoría: Película</label>
                                        
                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.facebook.com/LaCameliaBlog/videos/la-vida-de-los-otros-das-leben-der-anderen-subtitulada/563210970970540/')">
                            película: La vida de los otros
                        </a> <br/>  
                        Instructiva, Alto standing, doble cero, dirigida por Florian Henckel von Donnersmarck.
                        <br/><br/>   
                    </h5>
                </article>

                <article> 
                    <label>Fecha: 05 mar 2022 Categoría: Teoría</label>
                    <h2 class="manita">enlaces a teoría informática </h2>       

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.mclibre.org/consultar/htmlcss/html/html-unicode-simbolos.html#gr-simbolos-letras')">
                            Símbolos gráficos en modo texto en Unicode 
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://dev.w3.org/html5/html-author/charref')">
                            Letras góticas 
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.w3schools.com/css/css_z-index.asp')">
                            CSS Tutorial
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://css-tricks.com/snippets/css/a-guide-to-flexbox/#flexbox-properties')">
                            Flex Box
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://sass-lang.com/documentation/at-rules/mixin#taking-arbitrary-arguments')">
                            SASS document oficial
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=udGrXWeJp1Y&list=PLvq-jIkSeTUZYcX9SYwVe7f66afwd9qk_&index=5')">
                            Responsive Desing y Arquitectura CSS
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://codeguide.co/')">
                            Guía de codigos
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=XH8wOgkSukk')">
                            XAMPP Error: MySQL shutdown unexpectedly
                        </a>
                    </h5>
                </article>

                <article> 
                    <label>Fecha: 13 mar 2022 Categoría: Música</label>
                    <h2 class="manita">enlaces a música en YouTube</h2>    

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=m1dawpzSKrE')">
                            Evaristo - Salve 
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=CpevRqPgGxk')">
                            Mambo Jambo "Exotic Rendezvous" 
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=O0YX4Fe6xFk&list=RDLVbP9HKVSZaqw&index=5')">
                            Su Majestad "Ramito de violetas" 
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=ft3Hqt8aXI4')">
                            Misirlou "Kfir Ochaion" 
                        </a>
                    </h5>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=xsTNn_oyToM')">
                            Entre dos aguas
                        </a>
                    </h5>
                </article>
            
                <article> 

                    <label>Fecha: 01 Apr 2022 Categoría: Chistes</label>
                    <h2 class="manita">chistes célebres</h2>

                    <h5>
                        Es mejor reducir al mínimo tus deseos y necesidades que lograr su máxima satisfacción, 
                        y esto último también es imposible, ya que a medida que se satisfacen las necesidades y 
                        deseos aumentan indefinidamente.
                    </h5>
                    <hr>

                    <h5>
                        La lectura excesiva no solo es inútil, ya que el lector en el proceso de lectura toma 
                        prestados los pensamientos de otras personas y los absorbe peor que si pensara en ellos 
                        el mismo, sino que también es perjudicial para la mente, porque la debilita y te enseña 
                        a dibujar ideas de fuentes externas, y de tu propia cabeza.
                    </h5>
                    <hr>

                    <h5>
                        Si sospecha que alguien está mintiendo, finja que le cree, entonces miente de manera 
                        más grosera y lo atrapan. si en sus palabras se deslizó la verdad que le gustaría ocultar, 
                        fingir no creer; él dirá el resto de la verdad.
                    </h5>
                    <hr>

                    <h5>
                        La mayoría de las personas, anhelan la felicidad la brillantez y la longevidad; son como 
                        esos estúpidos actores que siempre quieren interpretar papeles grandes, brillantes y nobles, 
                        sin darse cuenta de que lo importante no es qué y cuánto interpretar, sino cómo interpretar.
                    </h5>
                    <hr>

                    <h5>
                        El mundo es ciertamente malo en todos sus aspectos: estéticamente parece una caricatura,
                        intelectualmente un manicomio, moralmente una guarida fraudulenta y, en general, una prisión.
                    </h5>
                    <hr>

                    <h5>
                        La gran mayoría de las personas... no pueden pensar de forma independiente, sino solo creer,
                        y... no pueden obedecer a la razón, sino solo al poder.
                    </h5>
                    <hr>

                    <h5>
                        Seamos franco: no importa cuan estrechamente unen a las personas las amistad, el dolor y el
                        matrimonio, sinceramente una persona desea el bien solo para si misma, y quizás incluso para 
                        sus hijos.
                    </h5>
                    <hr>

                    <h5>
                        Uno de los obstáculos significativos para el desarrollo de la raza humana debe ser considerado 
                        el hecho de que las personas obedecen no al que es más inteligente que los demás, sino 
                        al que habla más alto.
                    </h5>
                    <hr>

                    <h5>
                        <a href="javascript:ventanaSecundaria('https://www.youtube.com/watch?v=raZbTn0PdS8')">
                            Schopenhauer
                        </a>
                    </h5>
                </article>

            </div>     
        </main>

        <!-- ----------------------------------- CONTENIDO LATERAL DERECHA DE LA PÁGINA-->
        <aside>

            <?php
                // significado del if: $_SESSION['nameUsus'] es != "invitado"
                if( $_SESSION['nameUsus'] != "&#120154;&#120159;&#120167;&#120154;&#120165;&#120146;&#120149;&#120160;" ) {
            ?>
                    <section id="botonSec">
                        <button class='classButtonLateral manita parpadea text' > 
                            <a class="privado" href="javascript:juegoDePreguntas('z_juegoDePreguntas/index.php')">
                                <?php echo  letrasGoticas("juego"); ?> 
                            </a>
                        </button>

                        <button class='classButtonLateral manita' id='tusImg' > 
                            <?php echo letrasGoticas("imagenes"); ?> 
                        </button>
                    </section>
                            
                    <section id="as-a-teclado">
                        <?php include ('d_php/teclado.php'); ?>
                        <hr>
                        <h2 id="h2clave">
                            <?php echo letrasGoticas("claves teclado"); ?> :
                        </h2>

                        <h3 class="h3clave"> 
                            &#x290f; <?php echo letrasGoticas("hacte millonario"); ?> : 777 <strong style="color: black;"> Ver</strong> 
                        </h3>

                        <h3 class="h3clave">
                            &#x290f; <?php echo letrasGoticas("curriculum"); ?> : ZARKW3 <strong style="color: black;"> Ver</strong> 
                        </h3>

                    </section>

                    <br><br>
                    <button id="contratar">                        
                        <a href="javascript:contrataPagina('i-contratar/contrato.php')"> 
                            <?php echo letrasGoticas("contratar pagina web"); ?> 
                        </a>
                    </button>
                    
            <?php } 
                    else{    
            ?>
                        <h2 id="servH2">Para usuarios conocidos:</h2> 
                        <h3 class="h3Servicios">&#x290f; Personalizan páginas web</h3>
                        <h3 class="h3Servicios">&#x290f; Contratan página web</h3>
                        <h3 class="h3Servicios">&#x290f; Ver desarrollo de página web contratada</h3>
                        <h3 class="h3Servicios">&#x290f; Curriculum en Internet</h3>
                        <h3 class="h3Servicios">&#x290f; Chatean entre usuarios</h3>
                        <h3 class="h3Servicios">&#x290f; Aciertan quinielas</h3>
                        <h3 class="h3Servicios">&#x290f; Juegos de entretenimiento</h3>
                        <h2 id="regisH2">
                            <a class="privado" href="javascript:loginVentanaSecundaria('g-modelos/yy_loginRegistro/logReg.php')">
                                    <?php echo  letrasGoticas("acceso"); ?> 
                            </a>
                        </h2>
                                                                                                
            <?php  } ?>

            <?php ?>

        </aside>

    </section>
    
    <?php

        //-------------- Imágenes con dos caras: <div id="iDoC"> 
        include('d_php/d_imagenDosCaras.php'); 
        include("f-vistas/b-footer.php");
    ?>
           
</div><!-- -----------------------------------FIN  div general-->

    






 