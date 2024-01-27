
 
<article id="modal-1" class="modal">
    <div class="modal-container">
        <a href="#cerrar" class="modal-close">X</a>
        
        <h1>Preparando sorteo</h1>

        <div id="botones">
            <button id='elGordo' class='eleccion' value='elGordo'> El Gordo</button>
            <button id='bonoloto' class='eleccion' value='bonoloto'> Bonoloto</button>
            <button id='primitiva' class='eleccion' value='primitiva'> Primitiva</button>
            <button id='euroMillones' class='eleccion' value='euroMillones'> Euro Millones</button>        
        </div>

        <div id="muestraResult">                
        </div>

        <div id="reintegro-muestraResult"> 
        </div>

        <script> 

            let d = document;
            let divP = d.getElementById('muestraResult');
            let rein_divP = d.getElementById('reintegro-muestraResult');

            let divB = [];
            /*  divB: alamacena las bolas elegidas para el premio, se carga en: 
                        function  bolasRevueltas(......, .n).*/
            let divC = [];
            /*  divC: alamacena los divs con la clase: 'divBola', se carga en: 
                        function  creaDivs(num , divPadre).*/            
            let divD = [];
            /*  divD alamacena los divs con la clase: 'numClave' para el premio nº Clave. 
                        se carga en: function numClaveCreaDivs( divPadre)*/                       
            let divE = []; 
            /*  divE alamacena los divs con la clase: 'estrellas' para el premio nº Estrellas. 
                        se carga en: function estrellasCreaDivs( divPadre)*/

            d.addEventListener('click', (e) => {

                divP.innerHTML = "";
                rein_divP.innerHTML = "";

                if(e.target.matches('#elGordo')){    
                    divP.innerHTML = "<h2>--Números para el Gordo--</h2>";
                    creaDivs(54, divP);
                    bolasRevueltas(54, 5, divC);
                    rein_divP.innerHTML = "<h2> ---------Número Clave--------- </h2>";
                    numClaveCreaDivs(rein_divP );
                    bolasRevueltas(10, 1, divD);
                }
                else if(e.target.matches('#bonoloto') ){
                    divP.innerHTML = "<h2> Números para Bonoloto </h2> ";
                    creaDivs(49, divP);                
                    bolasRevueltas(49, 6, divC);
                }
                else if(e.target.matches('#primitiva') ){
                    divP.innerHTML = "<h2> --Números para Primitiva-- </h2> ";
                    creaDivs(49, divP);                 
                    bolasRevueltas(49, 6, divC);
                }
                else if(e.target.matches('#euroMillones') ){
                    divP.innerHTML = "<h2>---Nº para EuroMillones--- </h2> ";
                    creaDivs(50, divP);
                    bolasRevueltas(50, 5, divC);
                    rein_divP.innerHTML = "<h2> ------------Estrellas------------ </h2>";
                    estrellasCreaDivs( rein_divP)
                    bolasRevueltas(12, 2, divE);   
                }

            }); /*----------- Fin d.addEventListener('click', (e) =>  */
                

            function creaDivs(num , divPadre){

                for(let i = 0; i<num; i++){

                    let $div = d.createElement('div');

                    $div.setAttribute('id', i);
                    $div.className = "divBola";
                    $div.value = i;                   
                    $div.innerHTML = (i+1);
                    divPadre.appendChild($div);
                }

                divC = d.querySelectorAll('.divBola'); 

            }/*----------- Fin creaDivs(num , divPadre)  */


            function numClaveCreaDivs( divPadre){

                for(let i = 0; i<10; i++){

                    let $div = d.createElement('div');

                    $div.setAttribute('id', i +'r');
                    $div.className = 'numClave';
                    $div.value = i;                   
                    $div.innerHTML = (i);
                            
                    $div.style.width= '19px';
                    $div.style.height= 'auto';                              
                    $div.style.margin = '4px 2px';
                    $div.style.padding = '2px';
                    divPadre.appendChild($div);

                }
                    divD = d.querySelectorAll('.numClave'); 

            }/*----------- Fin numClaveCreaDivs( divPadre)  */


            function estrellasCreaDivs(divPadre){

                for(let i = 1; i<=12; i++){

                    let $div = d.createElement('div');

                    $div.setAttribute('id', i +'e');
                    $div.className = 'estrellas';
                    $div.value = i;                   
                    $div.innerHTML = (i);
                            
                    $div.style.width= '19px';
                    $div.style.height= 'auto';                      
                    $div.style.margin = '4px 2px';
                    $div.style.padding = '2px';

                    divPadre.appendChild($div);
                }

                    divE = d.querySelectorAll('.estrellas'); 

            }/*----------- Fin estrellasCreaDivs(divPadre)  */


            /**selecciona un nº de bolas de forma aleatoria
                param: 'numBolas' cantidad de bolas a sortear.
                param: 'bolasElegidas' cantidad de bolas a seleccionar. 
                param: 'divX' selector sobre el que se ejecuta la función. */
            function bolasRevueltas(numBolas, bolasElegidas, divX){

                let bolasRevueltas = [];
                for (let i = 0; i < numBolas; i++) {
                    bolasRevueltas[i] = (i+1) ;
                }
    
                let bolaElegida;          
                for (let i = 0; i < bolasElegidas; i++) {

                    // -- desordeno el array en cada iteración.
                    bolasRevueltas.sort(() => Math.random() - 0.5);
                    // --con: 'shift()' elimino el 1º elemento del array y lo almaceno.
                    bolaElegida = bolasRevueltas.shift();     
                    divB[i] = bolaElegida;

                    divX.forEach(element => {
                        if(element.value   === bolaElegida){
                            divX[bolaElegida-1].style.backgroundColor = '#f83f15';
                        }
                    });                                                         
                }

            }// ----------- Fin  bolasRevueltas(numBolas, bolasElegidas).

        </script>
    </div>
</article>
