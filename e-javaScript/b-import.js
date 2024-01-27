import { carruselDeImagenes } from "./a-export-Funciones/a-carrusel.js";

import { claves } from "./a-export-Funciones/claves.js";
import {registOculto} from "./a-export-Funciones/c-registroOculto.js";

const d = document;
/** ========= aplico las funciones dentro de un evento para todo el documento */
d.addEventListener( "DOMContentLoaded", (e) => {

  // ------------ crea un area oculta donde se muestran imagenes almacenadas en LocalStore.
  carruselDeImagenes("#oculto", "#tusImg", "#eliminaImagenes", "#cerCarOculto", 
  "#left", "#right", "#center", "#divFinal", "#butGuardarCa",
  "#textUrl", "#descriText", "#comentTex");


  claves(".btn-teclado", "#d_clave");
  

  registOculto("#logRegOcultoDiv", "#buttonOculto", "#cierraFormuRegistro");

});