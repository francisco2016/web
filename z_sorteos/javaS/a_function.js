const d = document,
   BNLT = 49, PRMTV = 49, ELGD = 54, EURMLL = 50, ESTRLLS = 12, RNTGR = 9;

let b_section = d.getElementById("b-section"),
    c_section = d.getElementById("c-section");


//  almacena las bolas ganadoras en el mt: 'agitaNumSor(nombreJuego, valor )'
let numArray =[];

// valores para pasar al botón    
var nomJueg ="", numBol =0;
var acumulador =0;

var  ora = new Date();
var reintegro =  ora.getMilliseconds().toString();



export function botonesDeSorteo(bonolot, primit, elGor, euroMil, actPag, jugar_But ){

   
    d.addEventListener("click", (e) => {
        

        if(e.target.matches(elGor) ){
            nomJueg ="ElGordo";
            numBol = ELGD;
            desactivaButtons();
            c_section.style.visibility = "visible";
            numerosDelSorteo(nomJueg, numBol );       
        }

        else if(e.target.matches(euroMil) ){
            nomJueg ="EuroMill";
            numBol = EURMLL;
            desactivaButtons();
            c_section.style.visibility = "visible";
            numerosDelSorteo(nomJueg, numBol );       
        }

        else if(e.target.matches(primit) ){
            nomJueg ="Primitiva";
            numBol = PRMTV;
            desactivaButtons();
            c_section.style.visibility = "visible";
            numerosDelSorteo(nomJueg, numBol );       
        }
        
        else if(e.target.matches(bonolot) ){
            nomJueg ="Bonoloto";
            numBol = BNLT;
            desactivaButtons();
            c_section.style.visibility = "visible";
            numerosDelSorteo(nomJueg, numBol );       
        }
         
        else if(e.target.matches(jugar_But) ){

            // muestra las bolas ganadores que se van extrayendo.
            let bolasGanaDiv = d.getElementById("bolasGanaDiv");

            let jugar_But = d.getElementById("jugar_But");
                jugar_But.style.visibility ="hidden";

            let b_spinner = d.getElementById("spinner");
                b_spinner.style.visibility ="visible";

            // https://es.javascript.info/settimeout-setinterval#:~:text=El%20setTimeout%20anidado%20es%20un,los%20resultados%20de%20la%20actual.
            setTimeout(function run() {

                let unaBola =agitaNumSor(nomJueg, numBol );
                crearDivs( bolasGanaDiv, unaBola); 
                finSorteo(nomJueg, acumulador);

                if( (acumulador == 5 && (nomJueg =="ElGordo" | nomJueg =="EuroMill") ) || acumulador == 6){
                    b_spinner.style.visibility ="hidden";
                    return;
                }

                setTimeout(run, 3000);              
            }, 4000);
        }

        else if(e.target.matches(actPag) ){
            
            location.reload();// -- actualizo la página.
            e.target.disabled = true;
        }

    }); /** Fin d.addEventListener("click", (e) */

}


/** _________________PRIMER MT. EN EJECUTARSE
 * muestra los nº del sorteo seleccionado.
 * param: 'valor' cantidad de nº que tiene el sorteo seleccionado. */
 function numerosDelSorteo(nombreJuego, valor ){
    let nombreJuego_Div = d.getElementById("nombreJuego_Div"),
        muResul_Div = d.getElementById("muResul_Div");// nº que participan en el sorteo.

    nombreJuego_Div.innerHTML = " ";
    nombreJuego_Div.innerHTML +=  "<h2 class='h2Enunciado'>" +nombreJuego+  ": Números del sorteo. </h2> ";
    muResul_Div.innerHTML = " ";
    
    for(let i =1; i <=valor; i++){// números del sorteo.

        setTimeout(function(){
            crearDivs( muResul_Div, i);       
        }, i* 50);   
    }   
     
}


/**_________________SEGUNDO MT. EN EJECUTARSE
 * Agita los nº del sorteo y devuelve la última bola como bola ganadora. */
function agitaNumSor(nombreJuego, valor ) {

    var sol =0;
    if( acumulador ==0){
        numArray = arrayBolasAgitadas (valor );
        sol = numArray.shift();
    }
    else if( acumulador >0){
        numArray = numArray.sort(() => Math.random() - 0.5);
        sol += numArray.shift();
        valor = numArray.length;
    }
    
    nombreJuego_Div.innerHTML = " ";
    nombreJuego_Div.innerHTML +=  
        " <h2  class='h2Enunciado'>" +nombreJuego+ ". "+valor+ ": Números agitados. "+(acumulador+1) +".  bola/s extraida/s </h2> ";
    muResul_Div.innerHTML = " ";
  
    for(let i =0; i <numArray.length; i++){// números del sorteo.
        setTimeout(function(){
            crearDivs( muResul_Div, numArray[i]);       
        }, i* 50);   
    }  
    
    acumulador++;
    return sol;
}


/**  
 * Carga un array con valores aleatorios entre: 1 y el nº que se le pase
 * como parámetro.
 * param: 'valor' cantidad de nº que tiene el sorteo seleccionado.
 * return: array */
function arrayBolasAgitadas (valor ){

    let aleatArray = [],//carga los nº del sorteo seleccionado, aleatoriamente.
        aleat = Math.round( (Math.random() *  (valor -1)  ) ) +1;
    aleatArray[0] = aleat;

    while ( aleatArray.length < valor ){

        let valido = true;
        while (valido  ){

            aleat = Math.round( (Math.random() * (valor -1)) ) +1;
            for ( let i = 0; i < aleatArray.length; i++){
                if ( aleatArray[i] == aleat){
                    valido = false;
                }
            }
            // si el nº aleatorio es diferente a los ya cargados, lo cargo el último.
            if(valido ) aleatArray.push(aleat);
        }
    }
   
    return aleatArray;
} // ---- Fin arrayAleatorio ( valor )


/* crea tantos div y parrafos como imagenes tengamos, sirve de índice para
   saber qué imagen estamos viendo.*/
function crearDivs( divMuestNum, i){ 

    let $div = d.createElement('div');
    let $p = d.createElement('p');
  
    $p.innerHTML = i;
    $p.style.textAlign= 'center';
    $p.style.borderRadius= '99px';
    $p.style.margin='auto';
    $p.className = 'parrafoBola';
    $p.value = i;
  
    $div.setAttribute('id', i);
    $div.className = 'divBola';
    $div.value = i;     
    $div.style.width= '11%';
    $div.style.height= '5%';
    $div.style.float = 'left';
    $div.style.borderRadius= '99px';
    $div.style.border = 'solid red 1px';
    $div.style.margin = '11px 11px 0px 0px  ';
  
    $div.appendChild($p);
    divMuestNum.appendChild($div);
}


/** desactiva botones todos los sorteos, y oculta */
function desactivaButtons(){

    let bonoLoto = d.getElementById("bonoLoto"),
        primitiva = d.getElementById("primitiva"),
        elGordo = d.getElementById("elGordo"),
        euroMillones = d.getElementById("euroMillones"),
        enunUno = d.getElementById("enunUno"),
        actPag = d.getElementById("actPag");

    bonoLoto.style.background = "white";
    primitiva.style.background = "white";
    elGordo.style.background = "white";
    euroMillones.style.background = "white";

    bonoLoto.style.color = "white";
    primitiva.style.color = "white";
    elGordo.style.color = "white";
    euroMillones.style.color = "white";
    enunUno.style.color = "white";

    bonoLoto.disabled = true;
    primitiva.disabled = true;
    elGordo.disabled = true;
    euroMillones.disabled = true;

}


function finSorteo(nomJueg, acumulador){
    
    let bolasEst = 0;
    //let b_spinner = d.getElementById("spinner");
        //b_spinner.style.visibility ="visible";

    if(acumulador == 5 && (nomJueg =="ElGordo" | nomJueg =="EuroMill") ){//  ElGordo 
        console.log("============== nomJueg 1 " +nomJueg);
        console.log("============== acumulador 1 " +acumulador);
        bolasEst =5;
    } 
    else if(acumulador == 6 ){
        console.log("============== nomJueg 2 " +nomJueg);
        console.log("============== acumulador 2 " +acumulador);
        bolasEst =6;
    }

    if(acumulador == bolasEst ){
        bolasGanaDiv.innerHTML += "<h3 class='h2Enunciado'><br>Combinación ganadora. </h3> ";
        if(nomJueg == "ElGordo"){
            bolasGanaDiv.innerHTML += "<h3 class='h2Enunciado'><br>Nº Clave: <mark>"+reintegro.slice(-1)+"</mark> </h3> ";
        }
        else if(nomJueg == "Primitiva"){
            bolasGanaDiv.innerHTML += "<h3 class='h2Enunciado'><br>Reintegro: <mark>"+reintegro.slice(-1)+"</mark> </h3> ";
        }
        else if(nomJueg == "EuroMill"){
            let a = Math.round( (Math.random() *  (12 -1)  ) ) +1;
            let b = Math.round( (Math.random() *  (12 -1)  ) ) +1;
            bolasGanaDiv.innerHTML += "<h3 class='h2Enunciado'><br>Estrellasss: <mark>"+a+" y "+b+"</mark> </h3> ";
        }
       
        
        //b_spinner.style.visibility ="hidden";
        //return;
    }
}