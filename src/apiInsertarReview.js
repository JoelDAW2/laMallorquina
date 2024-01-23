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


// Obtener el pedido_id de la URL
const urlInfo = new URLSearchParams(window.location.search);
const idPedido = urlParams.get('pedido_id');

let btn = document.getElementById("btnEnviarDatos");

btn.addEventListener( "click", () => {
        let idCliente = document.getElementsByName("numIdCliente").value;
        let vInputText = document.getElementById("txtReviewInsertar").value;
        
        let fecha = new Date();

        let year = fecha.getFullYear();
        let month = (fecha.getMonth() + 1).toString().padStart(2, '0');
        let day = fecha.getDate().toString().padStart(2, '0');

        let fechaActual = `${year}-${month}-${day}`;

        fetch("http://localhost/laMallorquina/?controller=api&action=apiInsertReview", {
        method: 'POST',
        body: JSON.stringify({
            cliente_id: idCliente, // Cogerlo con lo del storage alomejor
            pedido_id: idPedido,
            nombre_cliente: 'WWWW',
            apellido_cliente: 'FFFFF',
            puntuacion: 5, 
            descripcion: vInputText,
            fecha: fechaActual
        }),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        }
    }).then(response => response.json()) 
    .then(json => console.log(json))
    .catch(err => console.log(err));
});





