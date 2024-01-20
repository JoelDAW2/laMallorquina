// Obtener el pedido_id de la URL
const urlParams = new URLSearchParams(window.location.search);
const pedidoId = urlParams.get('pedido_id');

// Hacer la solicitud Fetch con el pedido_id
fetch(`http://localhost/laMallorquina/?controller=api&action=cogerIdApi&pedido_id=${pedidoId}`)
    .then(response => response.json())
    .then(reseñasData => {
        let general = document.getElementById("general");
        general.innerHTML = "hola";
    });

/*--- ESTRELLAS DEL MODAL ---*/
let estrellasPuntuacion = document.getElementById("estrellasSeleccionar");

let estrellaLlena = document.createElement("img");
estrellaLlena.src = "img/eAmarilla.svg";
let estrellaVacia = document.createElement("img");
estrellaVacia.src = "img/eGris.svg";

function aplicarEstrellasVacias() {
    for (let i = 0; i < 5; i++) {
        estrellasPuntuacion.appendChild(estrellaVacia.cloneNode(true));
    }
}

aplicarEstrellasVacias();
