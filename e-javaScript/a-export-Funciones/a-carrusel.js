/* @author: francisco Javier
   Muestra una galería de imágenes almacenadas en localstore por los usuarios.
 */

const d = document;
let numImagen = 0; /* --- pide al array de imagenes, el valor de esta posición.
                      también se cada uno de los id de los div dinámicos del índice inferior*/

let indiceInferior = 0; /**cada uno de los indices de las img */
let parrafoIndice = [];/**almacena 'ids' de los div que contienen el índice de las img. */
 
let img = [], /**almacena las url de las imágenes. */
    com = []; /**almacena comentarios sobre las imágenes. */

/** Todos los parámetros serán Selectores.
 * param: 'oculto' es el div contenedor que aparecerá al pulsar el botón 'tusImg'.
 * param: 'tusImg' botón para acceder al div 'oculto'.
 * param: 'cerCarOculto' cierra el div oculto.
 * param: 'container' contiene imagen, flechas derecha/izquierda
 * param: 'left' flecha derecha.
 
 * param: 'right' flecha izquierda.
 * param: 'center' div para las imagenes.
 * param: 'divFinal' div para mostrar índice de imagenes
 * param: 'lateOcul' div lateral, para cerrar y allm 
 
 * param: 'textUrl' textArea donde el usuario pegará la URL de la imágen.
 * param: 'descriText' textArea donde el usuario comenta la imagen pegada.
 * param: 'butGuardarCa'botón para guradar los datos.
 * param: 'comentTex'  textArea donde se muestra el comentario hecho sobre la imagen.*/
export function carruselDeImagenes(oculto, tusImg, eliminaImagenes, cerCarOculto, left, right, 
                                    center, divFinal, butGuardarCa, textUrl, 
                                    descriText, comentTex){
                                         
    d.addEventListener("click", (e) => {

      let divOculto = d.querySelector(oculto),
      $left = d.querySelector(left),
      
      $right = d.querySelector(right),
      $center = d.querySelector(center),
      $divFinal = d.querySelector(divFinal),
      
      urlTex = d.querySelector(textUrl),
      desTex = d.querySelector(descriText),
      comTex = d.querySelector(comentTex);


      let listaI = new ListaImagenes();
      let img = listaI.imagenes();
      let com = listaI.comentario();
             

        /**detecto con el mt. 'target' que objeto originón el evento.
            'matches( )' comprueba si coincide con su parámetro; tusImg, en este caso. */
        if( e.target.matches(tusImg) ){ //--> botón para acceder al div 'oculto'.

          e.target.disabled = true; // desactiva el botón.
          ocultoDiv_Flex(divOculto);// muestra el div oculto.
          //------------------ crea tantos div como imágenes haya, para marcar índice de las imagenes.
          crearDivs(img.length , $divFinal);

          let cantidaDeImagenes = img.length;
          muestraFlechas(cantidaDeImagenes, $left, $right, $center, img);
          
          
          /**para marcar el índice inferior correspondiente a la primer img. */
          if(numImagen === 0){            
            d.getElementById(numImagen).style.backgroundColor = 'green'; 
          }
          
          // ====================================================== EVENTO DERECHA ===============================
          $right.addEventListener('click', (e) => {
            /**para desmarcar el índice inferior correspondiente a una img. */
            d.getElementById(numImagen).style.backgroundColor = 'aqua' ; 
            numImagen++;
            /**para marcar el índice inferior correspondiente a una img. */
            d.getElementById(numImagen).style.backgroundColor = 'green' ; 


            if(numImagen == img.length -1){
              $right.style.visibility = 'hidden';
            }
            else if(numImagen > 0 ){
              $left.style.visibility = 'visible';
            }

              comTex.innerHTML = com[numImagen];
              $center.innerHTML = img[numImagen];
          });
                
          // ====================================================== EVENTO IZQUIERDA ===============================        
          $left.addEventListener('click', (e) => {

            d.getElementById(numImagen).style.backgroundColor = 'aqua' ; 
            numImagen--;
            d.getElementById(numImagen).style.backgroundColor = 'green' ; 

            if(numImagen <= 0){
              $left.style.visibility = 'hidden';
              $right.style.visibility = 'visible';               
            }
            else if(numImagen > 0 ){
              $left.style.visibility = 'visible';               
            }

            $center.innerHTML = img[numImagen];
            comTex.innerHTML = com[numImagen];
            
          });
          
          /**Encuentra y muestra la imagen correspondiente al índice seleccionado */
          idImagenIndiceInferior($center, img);
                       
        }/**------------------ Fin e.target.matches(tusImg)  */
       
        
        if( e.target.matches(cerCarOculto) ){

          location.reload();// -- actualizo la página.
        }
 
        if( e.target.matches(butGuardarCa) ){

            let $array = [];   
            
            if( comprobarString(urlTex)){ // comprueba si la url de la img es '.jpg''.png''.gif'jpeg''.tif'              
              $array = [// --- almaceno los datos pasados por el usuario en la interfac.
                {'id': img.length,
                  'url': urlTex.value, 
                  'comentario': desTex.value, 
                  'fecha': new Date().toLocaleString()
                } 
              ];

              listaI.pushDos(urlTex.value, desTex.value, $array);
            }
            else{
              alert("URL de imagen no válida");
            }
                       
            location.reload();// -- actualizo la página.                      
        }

        if( e.target.matches(eliminaImagenes) ){ 

          let confirmar = confirm('Acepta eliminar todas las imágenes?');           
          if(confirmar){
            localStorage.clear();
            location.reload();// -- actualizo la página.
          }
        }

    });

} // ----------- Fin export function carruselDeImagenes


function  muestraFlechas(cantidaDeImagenes, $left, $right, $center, img){

  if(cantidaDeImagenes === 0 ){ 
              
    $left.style.visibility = 'hidden';
    $right.style.visibility = 'hidden';
    $center.innerHTML = "-clic derecho sobre una imágen en tu navegador, -clic en Copiar dirección de imágen, -pegar la dirección en el formulario. ";
  }
  else if(cantidaDeImagenes === 1 ){ 
    
    $left.style.visibility = 'hidden';
    $right.style.visibility = 'hidden';
    $center.innerHTML = img[0];               
  } 
  else if(cantidaDeImagenes > 1 ){ 

    $left.style.visibility = 'hidden';
    $center.innerHTML = img[0];               
  }  
}


/*Encuentra y muestra la imagen correspondiente al índice seleccionado.
    param: 'cen' lugar donde se inserta la imagen.
    param: 'img' array con las url de imágenes.
      return: id, de la imagen seleccionada.      */
function idImagenIndiceInferior(cen, img){

  /* 'divIndice' clase que tienen los div del índice bajo las imagenes:
      se almacenan en un array. */
  parrafoIndice = d.querySelectorAll('.divIndice');
  
  parrafoIndice.forEach( indice => {

    indice.addEventListener('click', (e) => {
      
      let valorParrafo = indice.value; 
      indiceInferior = parseInt(valorParrafo); 
      cen.innerHTML = img[indiceInferior];   
      indice.style.backgroundColor = 'green';
    });  

  });
  
  return indiceInferior;
}


/** comprueba si el parámetro que recibe tiene extensión de imágen. 
 * param: 'urlImagen' dato que el usuario pone en la interface.
 *    return: url si tiene extensión de archivo imagen. */
function comprobarString(urlImagen){

  let ur2 = urlImagen.value;
  let urlImg = false;

  let ur3 = ur2.substring( ur2.length-4) ;
  let ur = ur3.toLowerCase();
  if(ur === '.jpg' || ur === '.png' || ur === '.gif' || ur === 'jpeg' || ur === '.tif'){
    urlImg = true;
  }
  return urlImg;
}


// ------------------------- FUNCIONES PARA CREAR COMPONENTES ------------------------
//                      ----------------------------------------------

function ocultoDiv_Flex(divOculto){

  divOculto.style.display= 'block'; 
  divOculto.style.visibility= 'visible';
}


/* crea tantos div y parrafos como imagenes tengamos, sirve de índice para
   saber qué imagen estamos viendo.*/
function crearDivs(numero ,divFinal){

  for (let i = 0; i < numero; i++){

    let $div = d.createElement('div');
    let $p = d.createElement('p');

    $p.innerHTML = i;
    $p.style.textAlign= 'center';
    $p.style.borderRadius= '99px';
    $p.className = 'parrafoIndice';
    $p.className = 'manita';
    $p.value = i;

    $div.setAttribute('id', i);
    $div.className = 'divIndice';
    $div.value = i;
    
    $div.style.width= '46px';
    $div.style.height= '26px';
    
    
    $div.style.borderRadius= '99px';
    $div.style.border = 'solid red 1px';
    $div.style.margin = '1px 11px';

    $div.appendChild($p);
    divFinal.appendChild($div);
  }
}




class ListaImagenes{

  constructor() {
    this.mensajes = [ ];
  }

  
  /* prepara una nueva imagen para añadirla en LocalStorage.
    param: '$url' url de la imagen.
    param: '$comentario' comentario sobre la imagen.
    param: 'coment' array que almacenará un objeto en el iten que creo en localstorage..
  */
  pushDos($url, $comentario, coment){

    if(!$comentario){$comentario = "Sin comentario";} 

    if ( $url && $comentario) {

      // --- compruebo si hay algún item, con clave 'carrusel' almacenado en localStorage.
      let imagenEnLocalStore = localStorage.getItem('carrusel');

      if( imagenEnLocalStore == null ){

        // --- si no hay item 'carrusel' inserto los datos de la constante 'coment'.
        localStorage.setItem( 'carrusel', JSON.stringify(coment));
      }
      else {

        // --- si hay 'item' almacenados, los paso a string.
        let data = JSON.parse(imagenEnLocalStore);
        // --- creo el nuevo 'item' con los datos pasados por el usuario.
        let newImagen =  {id: coment.length, url: $url, comentario: $comentario, fecha: new Date().toLocaleString()};
          
        // --- añado el 'item' al string de los 'item' que ya tenía.
        data.push(newImagen);
        
        // --- paso el string final a formato JSON.
        localStorage.setItem('carrusel', JSON.stringify(data));

      }
    }  
  }// ----------- Fin pushDos($url, $comentario, coment)


  /* ---- Comprueba si hay itens en localStorage, si existen devuelvo un array
      con los 'id' de cada una de los items.*/
  idsImagenes(){

    let idImagenes = [];
    const id = localStorage.getItem('carrusel');
    const id2 = JSON.parse(id);//-- paso el JSON  string.

    if (imag2 != null ){

      for (let i = 0; i < id2.length; i++ ) {
        idImagenes[i]=  id2[i]['id'];
      }
    }
    return idImagenes;
  }


  /* ---- Comprueba si hay itens en localStorage, si existen devuelvo un array
      con las URL de cada una de las imágenes, dentro de la etiqueta '<img>'.*/
  imagenes(){

    let urlImagenes = [];
    const imag = localStorage.getItem('carrusel');
    const imag2 = JSON.parse(imag);//-- paso el JSON  string.

    if (imag2 != null ){

      for (let i = 0; i < imag2.length; i++ ) {
        urlImagenes[i]=  "<img src='"+imag2[i]['url']+"' alt='error de ruta'>";
      }
    }
    return urlImagenes;
  }

 
  /** Comprueba si hay itens en localStorage, si existen devuelvo un array
       con los comentarios hechos en cada una de las imágenes. */
  comentario(){

    let comentarios = [];
    const com = localStorage.getItem('carrusel');
    const com2 = JSON.parse(com);//-- paso el JSON  string.

    if (com2 != null ){

        for (let i = 0; i < com2.length; i++ ) {
          comentarios[i]=   com2[i]['comentario'];
        }
    }
    return comentarios;
  }
  

}// ----------- Fin class ListaImagenes


