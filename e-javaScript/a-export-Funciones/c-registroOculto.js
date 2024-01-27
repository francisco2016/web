

const d = document;

export function registOculto(logRegOcultoDiv, buttonOculto, cierraFormuRegistro){
                                         
    d.addEventListener("click", (e) => {

        let divOculto = d.querySelector(logRegOcultoDiv);
        
        if( e.target.matches(buttonOculto) ){ //--> enlace para acceder al div 'oculto'.
             //e.target.disabled = true; // desactiva el botón.
            divOculto.style.display= 'block'; 
            divOculto.style.visibility= 'visible';          
        }


        if( e.target.matches(cierraFormuRegistro) ){
            divOculto.style.display= 'none'; 
            divOculto.style.visibility= 'hidden';
        }
    });
    
} // ----------- Fin export function carruselDeImagenes