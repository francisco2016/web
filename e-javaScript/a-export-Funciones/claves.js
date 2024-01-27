
/** constantes 'clave' de acceso a nuevas páginas. */
const CURRICULUM = "ZARKW3";
const SORTEOS = "777";
const PRYECT = "5623WK"; //__ clave para el contrato con id: 2

/**devuelve una cadena que será una clave.
     * param: 'btns_teclado' botones pulsados por el usuario.
       param: 'btn_claOk' boton para retornar la clave.*/
export function claves(btns_teclado, btn_claOk) {

    const d = document;
    let valorClave = "";
    let bt_tec = d.querySelectorAll(btns_teclado);

    bt_tec.forEach( tecla => {
        
        tecla.addEventListener('click', (e) => {
            valorClave += tecla.value;
            console.log(" ---- valorClave ------------------ " +valorClave);
        });
    });

    d.addEventListener('click', (e) => {

        if(e.target.matches(btn_claOk) ) {

            if(valorClave === CURRICULUM){
                valorClave = "";
                window.location.href = "d_php/b_curriculum.php";
            }
            else if(valorClave === SORTEOS) {
                valorClave = "";
                window.location.href = "#modal-1";
            }
            else if(valorClave === PRYECT) {
                valorClave = "";
                window.location.href = "javascript:desarrollandoProyecto('z_sorteos/index.php')";

            }
            else{
                valorClave = "";
                alert("Clave de acceso desconocida.");
            }
        }
    });
}