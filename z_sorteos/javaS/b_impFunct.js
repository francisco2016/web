import { botonesDeSorteo } from "./a_function.js";

const d = document;

/** ========= aplico las funciones dentro dentro de un evento para todo el documento */
d.addEventListener("DOMContentLoaded", (e) => {

    botonesDeSorteo("#bonoLoto", "#primitiva", "#elGordo", "#euroMillones", 
                    "#actPag", "#jugar_But");

});