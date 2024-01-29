let cajaBox = document.getElementById("siPropina");
let numsPropinas = document.getElementById("contadorPropina");
let btnConfirmCompra = document.getElementById("inputInsertarPedido");

let idCliente = document.getElementById("idClienteActivo").value;
let contenidoVTotal = document.getElementById("vPrecioTotal").innerHTML;
let vTotal = parseInt(contenidoVTotal);

cajaBox.addEventListener( "click", () => {
    numsPropinas.style.display = "block";
});




/*--- PROGRAMA DE FIDELIDAD ---*/

btnConfirmCompra.addEventListener( "click", () => {
    fetch(`http://localhost/laMallorquina/?controller=api&action=apiInsertarPuntos&puntos=${vTotal}&id=${idCliente}`, {
            method: 'POST',
            body: JSON.stringify({
                cliente_id: idCliente, 
                puntos: vTotal * 100
            }),
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            }
        }).then(response => response.json()) 
        .then(json => console.log(json))
        .catch(err => console.log(err));
});
