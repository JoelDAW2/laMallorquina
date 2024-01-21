// Obtener el pedido_id de la URL
const urlParams = new URLSearchParams(window.location.search);
const pedidoId = urlParams.get('pedido_id');

let pedidoContent = document.getElementById("general");

// Hacer la solicitud Fetch con el pedido_id
fetch(`http://localhost/laMallorquina/?controller=api&action=apiGetPedidoById&pedido_id=${pedidoId}`)
    .then(response => response.json())
    .then(pedidoData => {
        pedidoData.forEach(item => {
            const productoElement = document.createElement("div");
            productoElement.innerHTML = `
                <p>Fecha del pedido: ${item.fecha_pedido}</p>
                <p>ID del producto: ${item.producto_id}</p>
                <p>Cantidad: ${item.cantidad}</p>
                <p>Precio por unidad: ${item.precio_unidad}</p>
                <p>- - - - - - - - - - - - - - - - - -</p> 
            `;
            pedidoContent.appendChild(productoElement);
        });
    })


















    









    

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
