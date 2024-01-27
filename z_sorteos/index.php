<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>index_y_sortAle_nueva</title>

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body><!--______________________    http://localhost/y_sortAle_nueva/     -->

        <h1 class="h1Enunciado" id="enunUno">Sorteos Aleatorios</h1>
        <div id="generalDiv">

            <!-- Botones para seleccionar sorteo. -->
            <section id="b-section"  class="fluid-grid">

                <article class="fluid-iten">
                    <button class="manita btnSorteo" id="bonoLoto"> BonoLoto</button>
                </article>

                <article class="fluid-iten">
                    <button class="manita btnSorteo" id="primitiva"> Primitiva</button>
                </article>

                <article class="fluid-iten">
                    <button class="manita btnSorteo" id="elGordo"> El Gordo</button>
                </article>

                <article class="fluid-iten">
                    <button class="manita btnSorteo" id="euroMillones"> EuroMill</button>
                </article>

                <article class="fluid-iten actualiza">
                <!-- <div class='spinner'> </div>          __________ descomentar al terminar la APP-->
                    <button class="manita btnactPag" id="actPag"> Actualizar  </button>
                </article>

            </section>

            <div id="nombreJuego_Div"> </div>
            <section id="c-section">

                <div id="muResul_Div"> </div><!-- nº que participan en el sorteo -->
                <div id="bolasGananDiv">
                    <div id='spinner'></div>
                    <button class="manita btjugar" id="jugar_But">Sortear</button>
                    <div id="bolasGanaDiv"></div>
                </div>
                
                
            </section>

        </div><!--_______________________ Fin id="generalDiv" -->
        

        <script src="javaS/b_impFunct.js" type="module"></script>
    </body>
</html>