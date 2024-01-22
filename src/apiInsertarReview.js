// Obtener el pedido_id de la URL
const urlInfo = new URLSearchParams(window.location.search);
const idPedido = urlParams.get('pedido_id');

let btn = document.getElementById("btnEnviarDatos");

btn.addEventListener( "click", () => {
        let vInputText = document.getElementById("txtReviewInsertar").value;
        
        let fecha = new Date();

        let year = fecha.getFullYear();
        let month = (fecha.getMonth() + 1).toString().padStart(2, '0');
        let day = fecha.getDate().toString().padStart(2, '0');

        let fechaActual = `${year}-${month}-${day}`;

        fetch("http://localhost/laMallorquina/?controller=api&action=apiInsertReview", {
        method: 'POST',
        body: JSON.stringify({
            cliente_id: 30, // Cogerlo con lo del storage alomejor
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


