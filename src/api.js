let imgUser = document.createElement("img");
imgUser.src = "img/panel1.svg";

let estrellaAmarilla = document.createElement("img");
estrellaAmarilla.src = "img/eAmarilla.svg";

let estrellaGris = document.createElement("img");
estrellaGris.src = "img/eGris.svg";

let listadoReseñas;

//******<img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>

// Llamar a la API para obtener reseñas usando fetch
fetch("http://localhost/laMallorquina/?controller=api&action=apiGetAllReviews")
.then(response => response.json())
.then(reseñasData => {
    let reseñasContainer = document.getElementById('reseñasContainer');
    listadoReseñas = reseñasData;
    // Mostrar la información de las reseñas en la página
    reseñasData.forEach( (reseña) => {
        let reseñaElemento = document.createElement('article');
        reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3','panelFiltrar',parseInt(reseña.puntuacion));
        reseñaElemento.innerHTML = `
            <div class="seccionPanel d-flex">
                <img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>
                <div class="infoContainer ps-3">
                    <div class="nombreEstrellas d-flex">
                        <div class="d-flex">
                            <p>${reseña.nombre_cliente}</p>
                            <p>${reseña.apellido_cliente}</p>
                        </div>
                        <div id="divPuntuacion" class="puntuacion">${reseña.puntuacion}</div>
                    </div
                    <div class="infoOpinion d-flex flex-column align-items-start">
                        <p>${reseña.fecha}</p>
                        <p id="txtDescripcion">${reseña.descripcion}</p>
                    </div>
                </div>
            </div>
        `;
        reseñasContainer.appendChild(reseñaElemento);
    });
});

/*
let puntuacionContainer = document.getElementById("divPuntuacion");

for (let i = 0; i < 5; i++) {
    let estrella = document.createElement("img");

    if (i < reseña.puntuacion) {
        estrella.src = estrellaAmarilla.src;
    } else {
        estrella.src = estrellaGris.src;
    }

    puntuacionContainer.appendChild(estrella);
}
*/