let cajaBox = document.getElementById("siPropina");
let cajaPuntos = document.getElementById("dejarPuntos");
let numsPuntos = document.getElementById("contadorPuntos");
let numsPropinas = document.getElementById("contadorPropina");
let btnConfirmCompra = document.getElementById("inputInsertarPedido");
let btnAplicarPuntos = document.getElementById("btnAplicar");

let idCliente = document.getElementById("idClienteActivo").value;
let contenidoVTotal = document.getElementById("vPrecioTotal").innerHTML;
let vTotal = parseInt(contenidoVTotal);

let puntosUser;
// Puntos del usuario
let txtPuntos = document.getElementById("puntosRellenar");

cajaBox.addEventListener( "click", () => {
    numsPropinas.style.display = "block";
});
cajaPuntos.addEventListener( "click", () => {
    numsPuntos.style.display = "block";
    btnAplicarPuntos.style.display = "block";
});

// Mostrar puntos del usuario
fetch(`http://localhost/laMallorquina/?controller=api&action=apiObtenerPuntosUsuario&id=${idCliente}`)
.then(response => response.json())
.then(puntosData => {
    infoObtenida = puntosData;
    // Mostrar la información de las reseñas en la página
    puntosData.forEach( (objs) => {
        txtPuntos.innerHTML += infoObtenida[0].puntos;
        puntosUser = infoObtenida[0].puntos;
    });
});

// RESTAR PUNTOS al pulsar el boton de aplicar
btnAplicarPuntos.addEventListener( "click", () => {
    let puntosArestar = document.getElementById("contadorPuntos").value;
    if(numsPuntos.value < 4300){
        fetch(`http://localhost/laMallorquina/?controller=api&action=restarPuntos&puntosParaRestar&puntos=${puntosUser}&id=${idCliente}`, {
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

// RESTAR PUNTOS segun el valor del input
numsPuntos.addEventListener("change", () => {
    let puntosRestar = parseInt(numsPuntos.value) || 0;
    let puntosActuales = parseInt(txtPuntos.innerHTML) || 0;
    
    if (puntosRestar > puntosActuales) {
        alert("No puedes restar más puntos de los disponibles.");
        numsPuntos.value = puntosActuales;
        vTotalJs.innerHTML = parseInt(vTotalJs) - parseInt(txtPuntos); 
    } else {
        let nuevosPuntos = puntosActuales - puntosRestar;
        txtPuntos.innerHTML = nuevosPuntos;
    }
});

// INSERTAR PUNTOS 
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

