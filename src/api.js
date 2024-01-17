// Llamar a la API para obtener reseñas usando fetch
fetch("http://localhost/laMallorquina/?controller=api&action=apiGetAllReviews")
.then(response => response.json())
.then(reseñasData => {
    //console.log(reseñasData); // Agrega esta línea
    let reseñasContainer = document.getElementById('reseñasContainer');

    // Mostrar la información de las reseñas en la página
    reseñasData.forEach( (reseña) => {
        let reseñaElemento = document.createElement('div');
        reseñaElemento.innerHTML = `
            <p>${reseña.review_id}</p>
            <p>${reseña.cliente_id}</p>
            <p>${reseña.pedido_id}</p>
            <p>${reseña.nombre_cliente}</p>
            <p>${reseña.apellido_cliente}</p>
            <p>${reseña.puntuacion}</p>
            <p>${reseña.descripcion}</p>
            <p>${reseña.fecha}</p>
            <hr>
        `;
        reseñasContainer.appendChild(reseñaElemento);
    });
});