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

// Input que muestra la cantidad de propina
cajaBox.addEventListener( "click", () => {
    if(cajaBox.checked == true){
        numsPropinas.style.display = "block";
        numsPropinas.disabled = false;
    }else if(cajaBox.checked == false){
        numsPropinas.style.display = "none";
        numsPropinas.disabled = true;
    }
});

// Input que muestra la cantidad de puntos
cajaPuntos.addEventListener( "click", () => {
    if(cajaPuntos.checked == true){
        numsPuntos.style.display = "block";
        numsPuntos.disabled = false;
    }else if(cajaPuntos.checked == false){
        numsPuntos.style.display = "none";
        numsPuntos.value = 0;
        numsPuntos.disabled = true;
        console.log(numsPuntos.value);
    }
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

// VALOR ESCONDIDO DEL PRECIO TOTAL DEL PEDIDO
let valorTotalModificar = document.getElementById("vTotalEscondido").value;

// CONTROLAR QUE EL VALOR DEL INPUT DE PUNTOS SEA INFERIOR AL TOTAL DE PUNTOS GUARDADOS
let puntos;
let vTotalShow = vTotal;

numsPuntos.addEventListener("change", () => {
    puntos = numsPuntos.value;
    let puntosEnEuros = puntos.slice(0, -2);
    let modificarPrecio = valorTotalModificar - puntosEnEuros;

    if(modificarPrecio < 0){
        alert("Precio mínimo alcanzado");
        numsPuntos.value = numsPuntos.value - 100;
    }

    if (numsPuntos.value > parseInt(txtPuntos.innerHTML)) {
        alert("Has superado el límite de puntos!");
        numsPuntos.value = parseInt(txtPuntos.innerHTML);
    }

    vTotalShow = modificarPrecio;
    console.log("Valor total a mostrar: " + vTotalShow);
});

let escondidoPropinas = document.getElementById("cantidadPropinaAlmacenar");
// INPUT DEL PORCENTAJE DE LAS PROPINAS
let propinaTotal;
numsPropinas.addEventListener("change", () => {
    propinaTotal = (vTotal * numsPropinas.value) / 100;
    escondidoPropinas.value = (numsPropinas.value * vTotalFloat) / 100;
    
    vTotalShow = vTotalShow + propinaTotal;
    
    console.log("Valor de escondidoPropinas:", escondidoPropinas.value);
    console.log("Valor total a mostrar: " + vTotalShow);
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


