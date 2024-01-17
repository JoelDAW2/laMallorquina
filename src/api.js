let imgUser = document.createElement("img");
imgUser.src = "img/panel1.svg";

//******<img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>

// Llamar a la API para obtener reseñas usando fetch
fetch("http://localhost/laMallorquina/?controller=api&action=apiGetAllReviews")
.then(response => response.json())
.then(reseñasData => {
    //console.log(reseñasData); // Agrega esta línea
    let reseñasContainer = document.getElementById('reseñasContainer');

    // Mostrar la información de las reseñas en la página
    reseñasData.forEach( (reseña) => {
        let reseñaElemento = document.createElement('article');
        reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3');
        reseñaElemento.innerHTML = `
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