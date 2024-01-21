// Obtener el pedido_id de la URL
const urlParams = new URLSearchParams(window.location.search);
const pedidoId = urlParams.get('pedido_id');

let pedidoContent = document.getElementById("general");
let titlePedido = document.getElementById("tituloPedido");
let precioTotal = document.getElementById("pTotal");

// Hacer la solicitud Fetch con el pedido_id
fetch(`http://localhost/laMallorquina/?controller=api&action=apiGetPedidoById&pedido_id=${pedidoId}`)
    .then(response => response.json())
    .then(pedidoData => {
        console.log(pedidoData);

        titlePedido.textContent += `#${pedidoId}:`; 

        let fechaPedido = document.createElement("div");
        fechaPedido.innerHTML = `
            <p>${pedidoData[0].fecha_pedido}</p>
        
        `;
        pedidoContent.appendChild(fechaPedido);

        pedidoData.forEach(item => {
            let productoElement = document.createElement("div");
            productoElement.innerHTML = `
                <div class="d-flex justify-content-between flex-wrap">
                    <p>${item.nombre_producto}</p>
                    <p>${item.cantidad} uds.</p>
                    <p>${item.precio_unidad} €</p>
                </div>
            `;
            pedidoContent.appendChild(productoElement);
            precioTotal.innerHTML = `
            <p class="text-end"><b>TOTAL:</b> ${pedidoData[1].precio_total} €</p>
            `;
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
