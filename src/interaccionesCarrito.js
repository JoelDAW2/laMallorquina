let cajaBox = document.getElementById("siPropina");
let cajaPuntos = document.getElementById("dejarPuntos");
let numsPuntos = document.getElementById("contadorPuntos");
let numsPropinas = document.getElementById("contadorPropina");
let btnConfirmCompra = document.getElementById("inputInsertarPedido");
let btnAplicarPuntos = document.getElementById("btnAplicar");

let idCliente = document.getElementById("idClienteActivo").value;
let contenidoVTotal = document.getElementById("vPrecioTotal").innerHTML;
let vTotal = parseInt(contenidoVTotal);

let txtPuntos = document.getElementById("puntosRellenar");

cajaBox.addEventListener( "click", () => {
    numsPropinas.style.display = "block";
});
cajaPuntos.addEventListener( "click", () => {
    numsPuntos.style.display = "block";
    btnAplicarPuntos.style.display = "block";
});

// Restar los puntos al pulsar el boton de aplicar
numsPuntos.addEventListener( "click", () => {
    let puntosArestar = document.getElementById("contadorPuntos").value;
    if(numsPuntos.value < 4300){
        fetch(`http://localhost/laMallorquina/?controller=api&action=restarPuntos&puntosParaRestar&puntos=${vTotal}&id=${idCliente}`, {
            method: 'POST',
            body: JSON.stringify({
                cliente_id: idCliente, 
                puntos: puntosArestar
            }),
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            }
        }).then(response => response.json()) 
        .then(json => console.log(json))
        .catch(err => console.log(err));
    }else{
        alert("HAS SUPERADO LA CANTIDAD TOTAL DE TUS PUNTOS!")
    }
});


/*--- PROGRAMA DE FIDELIDAD ---*/

// Insertar puntos 
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

// Mostrar puntos del usuario

fetch(`http://localhost/laMallorquina/?controller=api&action=apiObtenerPuntosUsuario&id=${idCliente}`)
.then(response => response.json())
.then(puntosData => {
    infoObtenida = puntosData;
    // Mostrar la información de las reseñas en la página
    puntosData.forEach( (objs) => {
        txtPuntos.innerHTML += infoObtenida[0].puntos;
    });

});