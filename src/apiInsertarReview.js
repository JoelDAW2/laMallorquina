let btn = document.getElementById("btnEnviarDatos");

btn.addEventListener( "click", () => {
        fetch("http://localhost/laMallorquina/?controller=api&action=apiInsertReview", {
        method: 'POST',
        body: JSON.stringify({
            cliente_id: 30,
            pedido_id: 131,
            nombre_cliente: 's',
            apellido_cliente: 's',
            puntuacion: 3,
            descripcion: 's',
            fecha: '2024-01-19'
        }),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        }
    }).then(response => response.json()) 
    .then(json => console.log(json))
    .catch(err => console.log(err));
    console.log("insertado");
});


