<?php

      include_once("../layout/header.php");

      //  --   --------------------------------  Título para todas las ventanas.
      echo "
            <section class='b_tituloVentana'>
                  <div class='b_uno_titVen'><h1><a href='../index.php'> &#8656;</a> </h1></div>
                  <div class='b_dos_titVen'>
                        <h1>Funcionamiento de la APP</h1>
                  </div>
                  <div class='b_tres_titVen'><h1><a href='#'> &#8654;</a></h1> </div>
            </section>
      ";

      echo "
            <div style='margin:22px;' >
                  <h2 class='a_fuente'>
                        Al iniciar la aplicación se mostrará una pantalla de bienvenida en la que se mostrará 
                        la tabla de records (los 5 mejores jugadores con sus puntuaciones), y se podrá elegir 
                        entre dos opciones: Editar preguntas o Jugar una partida. 
                  </h2>
                  <h2 class='a_fuente'>
                        Editar preguntas:<br> se mostrará un formulario desde el cual se podrán introducir tanto 
                        la pregunta, como cuatro posibles respuestas, se indicará cuál es la respuesta 
                        correcta y se podrá incluir una imagen (si no se especifica ninguna se utilizará una 
                        imagen por defecto). <br>Desde esta pantalla se podrán realizar 3 acciones:<br><br> 
                        - Guardar: sólo se podrá guardar una pregunta cuando la información sea 
                        completa, en caso contrario se le indicará al usuario que falta información de la 
                        pregunta. <br>
                        - Limpiar: vaciará la información de todos los campos. <br>
                        - Volver: regresará a la pantalla de bienvenida.
                  </h2>
                  <h2 class='a_fuente'>
                        Jugar partida:<br> en primer lugar el usuario deberá introducir un nombre de usuario y a 
                        continuación se le irán planteando preguntas seleccionadas de forma aleatoria 
                        mientras el usuario conteste correctamente.<br> 
                        La primera pregunta acertada sumará 10 puntos, y cada una de las posteriores 
                        valdrá el doble que la anterior. Si el usuario agota las preguntas se le sumarán 1000 
                        puntos y finalizará la partida. <br>
                        NOTA:<br> las preguntas se irán seleccionando de forma aleatoria a medida que el 
                        usuario avance mientras haya preguntas que no se le hayan planteado. En ningún 
                        caso se le mostrará una pregunta repetida.
                  </h2>
                  <h2 class='a_fuente'>
                        Todas las pantallas de la aplicación deberán mantener el mismo aspecto: colores de 
                        fondo, rótulos, etc. y contendrán un banner con el nombre del juego y su logotipo. 
                  </h2>
                  <h2 class='a_fuente'>
                        Además de la corrección del código se valorará el estilo de programación, el uso 
                        adecuado de funciones y la presentación. 
                  </h2>
                  <h2 class='a_fuente'>
                        EXTRA:<br> se obtendrá un punto extra en la calificación del trabajo si las preguntas se 
                        organizan por categorías (un mínimo de 4: Ciencias, Historia, Arte, Deportes, etc.). <br>
                        En todo momento se mostrará en pantalla información de las preguntas acertadas de 
                        cada categoría y cuando el usuario acumule 5 preguntas acertadas de la misma 
                        categoría habrá conseguido ganar la categoría y no se le volverán a presentar más 
                        preguntas sobre ella. De este modo, si el usuario 'gana' todas las categorías se le 
                        sumarán 1000 puntos y el juego se dará por finalizado. 
                  </h2>
                  
            </div>
      
      ";


      include_once("../layout/footer.php");
?>