let cajaBox = document.getElementById("siPropina");
let cajaPuntos = document.getElementById("dejarPuntos");
let numsPuntos = document.getElementById("contadorPuntos");
let numsPropinas = document.getElementById("contadorPropina");
let btnConfirmCompra = document.getElementById("inputInsertarPedido");
let btnAplicarPuntos = document.getElementById("btnAplicar");

let idCliente = document.getElementById("idClienteActivo").value;
let contenidoVTotal = document.getElementById("vPrecioTotal").innerHTML;
let vTotal = parseInt(contenidoVTotal);
let vTotalFloat = parseFloat(contenidoVTotal);

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

// CONTROLAR QUE EL VALOR DEL INPUT DE PUNTOS SEA INFERIOR AL TOTAL DE PUNTOS GUARDADOS

numsPuntos.addEventListener( "change", () => {
    if(numsPuntos.value > parseInt(txtPuntos.innerHTML)){
        alert("Has suprado el limite de puntos!");
        numsPuntos.value = parseInt(txtPuntos.innerHTML);
    }
});

// ENVIAR PUNTOS Y PROPINA EN UN MISMO CLICK

btnConfirmCompra.addEventListener( "click", () => {
    let puntosRestar = numsPuntos.value;
    let puntosSumar = vTotal * 100;

    fetch(`http://localhost/laMallorquina/?controller=api&action=apiActualizarPuntosPropinas&puntosRestar=${puntosRestar}&puntosSumar=${puntosSumar}&id=${idCliente}`, {
            method: 'POST',
            body: JSON.stringify({
                 
                puntosRestar: puntosRestar,
                puntosSumar: puntosSumar, 
                cliente_id: idCliente
            }),
            headers: {
                'Content-Type': 'application/json; charset=UTF-8',
            }
        }).then(response => response.json()) 
        .then(json => console.log(json))
        .catch(err => console.log(err));

});

let escondidoPropinas = document.getElementById("cantidadPropinaAlmacenar");

numsPropinas.addEventListener("change", () => {
    escondidoPropinas.value = (numsPropinas.value * vTotalFloat) / 100;
    console.log("Valor de escondidoPropinas:", escondidoPropinas.value);
});


// RESTAR PUNTOS al pulsar el boton de aplicar
/*
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
*/

// RESTAR PUNTOS segun el valor del input
/*
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
*/

// INSERTAR PUNTOS 
/*
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
*/
