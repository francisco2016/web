        <?php
            /* Este archivo muestra información al usuario sobre la importancia de tener una 
                página web.
                Para ver esta información se requiere hacer clic sobre barritas azules intermitentes
                que aparecen en la cabecera de la página principal.
            */
        ?>
        
        
        <script>

            var itemOrig;

            function despMenu(nombre,sn) {
        
                obj = document.getElementById(nombre);

                if (sn) { 

                    obj.style.visibility = "visible";
                    obj.style.borderRadius = "17px";
                }
                else{
                    obj.style.visibility = "hidden";
                }
                    
            }

            function destacar(obj, val) {

                if (val) {
                    itemOrig = obj.style.backgroundColor; 
                    obj.style.borderRadius = "17px";
                }
                else
                    obj.style.backgroundColor= itemOrig;
                    obj.style.borderRadius = "17px";
            }

        </script>

        <script src="e-javaScript/javaScrip/jquery-1.6.3.min.js" > //para que aparecca el body lentamente. </script>
        <script>
            $(function(){
                $("#information").hide( ).fadeIn(4000); //para que aparecca el body lentamente.
            });

        </script>

        <!--        -->

        <section id="information">
            <article>
                <div id="Menu1" class="cabMenu intermitente"  onMouseout="despMenu('itMenu1',false)" onMouseover="despMenu('itMenu1',true)">

                </div>  
            </article>

            <article>
                <div id="Menu2" class="cabMenu"  onMouseout="despMenu('itMenu2',false)" onMouseover="despMenu('itMenu2',true)">
                     
                </div>              
            </article>

            <article>
                <div id="Menu3" class="cabMenu intermitente"  onMouseout="despMenu('itMenu3',false)" onMouseover="despMenu('itMenu3',true)">
                     
                </div>            
            </article>

            <article>
                <div id="Menu4" class="cabMenu intermitente"  onMouseout="despMenu('itMenu4',false)" onMouseover="despMenu('itMenu4',true)">
                    
                </div>
            </article>

            <article>
                <div id="Menu5" class="cabMenu"  onMouseout="despMenu('itMenu5',false)" onMouseover="despMenu('itMenu5',true)">
                    
                </div>
            </article>

            <article>
                <div id="Menu6" class="cabMenu intermitente"  onMouseout="despMenu('itMenu6',false)" onMouseover="despMenu('itMenu6',true)">
                    
                </div>
            </article>
        </section>



        <div id = "itMenu1" class="contMenu1" onMouseover="despMenu('itMenu1',true)" onMouseout="despMenu('itMenu1',false)">           
            <div id="itMenu11" class="itMenuDes" onMouseover="destacar(this,true)" onMouseout="destacar(this,false)">
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Deseas publicar escritos, fotografías y vídeos personales<br>
                </h2>
                <h2 id="lento" style="text-align: center; font-size: 19px;">
                Crear una página web web personal es la forma perfecta de compartir tus escritos, fotos o vídeos con el mundo. 
                Te permite controlar la presentación de los contenidos y quién los ve.<br><br> 
                Tu página sitio web personal puede ser tan sencilla o compleja como quieras. 
                Los creadores de sitios web tenemos funciones de blog 
                que te permiten gestionar los contenidos más fácilmente.<br><br> 
                Un creador de páginas web puede ayudarte a crear rápidamente un sitio web de 
                aspecto profesional sin codificación ni complicados procesos de diseño. Otra opción es 
                utilizar un sistema de gestión de contenidos como WordPress para disponer de opciones 
                de personalización más avanzadas.
                </h2>
       
            </div>
        </div>


        <div id = "itMenu2" class="contMenu1" onMouseover="despMenu('itMenu2',true)" onMouseout="despMenu('itMenu2',false)">  
            <div id="itMenu12" class="itMenuDes" onMouseover="destacar(this,true)" onMouseout="destacar(this,false)">
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Necesitas una plataforma para destacar tus trabajos<br>
                </h2>
                <h2 style="text-align: center; font-size: 19px;">
                    Una página web personal es un medio excelente para mostrar tu portafolio en línea. 
                    Muchos profesionales del sector crean sitios web de portafolio para atraer nuevos 
                    clientes y encontrar oportunidades de trabajo.<br><br> 
                    Una página web profesional te permite mostrar tus habilidades, experiencia y 
                    trabajos anteriores en un único lugar al que pueden acceder tus clientes potenciales. 
                    Crear una página web también te ayuda a demostrar tus conocimientos técnicos.<br><br> 

                    Considera la posibilidad de publicar contenidos valiosos a través de blogs, vídeos o 
                    podcasts para establecer tu posición como experto en el sector. Esto impulsará tu 
                    credibilidad como profesional y aumentará tus posibilidades de empleo.<br><br> 
                </h2>
            </div>
        </div>


        <div id = "itMenu3" class="contMenu1" onMouseover="despMenu('itMenu3',true)" onMouseout="despMenu('itMenu3',false)">            
            <div id="itMenu13" class="itMenuDes" onMouseover="destacar(this,true)" onMouseout="destacar(this,false)">
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Te interesa conectar con gente nueva<br>
                </h2>
                <h2 style="text-align: center; font-size: 19px;">
                    Puedes crear una comunidad y conectar con personas afines en tu página web. Por 
                    ejemplo, puedes obtener opiniones y comentarios de tu audiencia si habilitas la 
                    opción de comentarios en tus contenidos.<br><br> 
                    Otra forma de interactuar con gente nueva a través de tu sitio web es añadir un 
                    foro en línea. WordPress cuenta con muchos plugins de foros que te permiten 
                    crear un espacio en el que la gente pueda debatir sus opiniones y experiencias 
                    sobre un tema determinado.<br><br> 
                    En definitiva, convertir tu página web en un lugar para conectar con la gente 
                    es una forma excelente de ampliar tus conocimientos y tu red de contactos. 
               </h2>
           </div>
       </div>


        <div id = "itMenu4" class="contMenu1" onMouseover="despMenu('itMenu4',true)" onMouseout="despMenu('itMenu4',false)">          
            <div id="itMenu14" class="itMenuDes" onMouseover="destacar(this,true)" onMouseout="destacar(this,false)">
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Quieres tener seguidores en Internet<br>
                </h2>
                <h2 style="text-align: center; font-size: 19px;">
                    Establecer autoridad y conseguir seguidores en Internet será más fácil 
                    cuando dispongas de contenidos de alta calidad, experiencia y una audiencia 
                    comprometida.<br><br>

                    Otro factor importante para impulsar tu presencia en Internet es una personalidad 
                    auténtica. Puedes expresar tu personalidad y tus pasiones a través del diseño web 
                    y el estilo de los contenidos.<br><br> 
                    A diferencia de plataformas de terceros como Facebook o Twitter, un sitio web 
                    personal te permite personalizar por completo elementos de diseño como la combinación 
                    de colores y la tipografía para adaptarlos a tu marca. Después, mejóralo eligiendo 
                    el lenguaje y el estilo de presentación adecuados para tu público objetivo.
                </h2>
            </div>

        </div>


        <div id = "itMenu5" class="contMenu1" onMouseover="despMenu('itMenu5',true)" onMouseout="despMenu('itMenu5',false)">          
            <div id="itMenu15" class="itMenuDes" onMouseover="destacar(this,true)" onMouseout="destacar(this,false)">
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Cómo saber si tu empresa necesita una página web<br>
                </h2>
                <h2 style="text-align: center; font-size: 19px;">
                    En esta era digital, una empresa necesita tener una página web profesional para 
                    prosperar en el sector. Sin embargo, muchos propietarios de empresas todavía no 
                    se dan cuenta de que necesitan una.<br><br>
                    seis señales principales de que tu empresa necesita un sitio web. Así, comprenderás 
                    mejor la urgencia y sus beneficios.<br><br>
                </h2>
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Los competidores tienen páginas web<br>
                </h2>
                <h2 style="text-align: center; font-size: 19px;">
                    Analizar a la competencia es una de las mejores formas de identificar las necesidades 
                    de tu negocio. Si muchas marcas de tu sector tienen sitios web, lo más probable es que 
                    tu empresa también deba tener uno.<br><br> 

                    También es el paso más lógico que puedes dar para seguir siendo competitivo en tu 
                    sector. Sin una página web para tu empresa, perderás la oportunidad de captar nuevos 
                    clientes y establecer una sólida presencia en línea.<br><br> 
                </h2>
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Es necesario establecer credibilidad<br>
                </h2>
                <h2 style="text-align: center; font-size: 19px;">
                    Ganarse la confianza del público es uno de los métodos más importantes para conseguir 
                    nuevos clientes. Puedes conseguirlo gestionando un sitio web que funcione correctamente 
                    y satisfaga las necesidades de tus clientes.<br><br> 

                    También es el paso más lógico que puedes dar para seguir siendo competitivo en tu 
                    sector. Sin una página web para tu empresa, perderás la oportunidad de captar nuevos 
                    clientes y establecer una sólida presencia en línea.<br><br> 
                </h2>
            </div>

        </div>

        <div id = "itMenu6" class="contMenu1" onMouseover="despMenu('itMenu6',true)" onMouseout="despMenu('itMenu6',false)">          
            <div id="itMenu16" class="itMenuDes" onMouseover="destacar(this,true)" onMouseout="destacar(this,false)">
                <h2 style="text-align: center;  font-size: 22px; color:red;">
                    Conclusión<br>
                </h2>
                <h2 style="text-align: center; font-size: 19px;">
                    Tener una página web es cada vez más común hoy en día. Reconocer ciertas señales puede ayudarte a 
                    decidir si es el momento adecuado para invertir en una. 
                </h2>
                <h2 style="text-align: center; font-size: 19px; color:red;">
                    Puede que necesites empezar a crear un sitio web personal si observas las siguientes señales: 
                </h2>
                <h2 style="font-size: 19px;">
                    &#x25cf; Quieres publicar contenido personal.<br> 
                    &#x25cf; Necesitas mostrar tu portafolio y tus logros.<br> 
                    &#x25cf; Te interesa conectar con gente nueva.<br> 
                    &#x25cf; Quieres conseguir seguidores en Internet.<br> <br> 
                </h2>

                <h2 style="text-align: center; font-size: 19px; color:red;">
                    Los empresarios también pueden empezar a crear su propio sitio web cuando identifiquen 
                    varios indicadores, entre ellos: 
                </h2>
                <h2 style="font-size: 19px;">
                    &#x25cf; Tus competidores utilizan sitios web.<br> 
                    &#x25cf; Necesitas establecer credibilidad.<br> 
                    &#x25cf; Es más difícil llegar a los clientes potenciales.<br> 
                    &#x25cf; Las ventas son insuficientes.<br> 
                    &#x25cf; Incapacidad para operar 24/7.<br> 
                    &#x25cf; Quieres analizar mejor los datos de los clientes.<br> 
                </h2>

            </div>

        </div>