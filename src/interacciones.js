/*--- MENU RESEÑAS ---*/

let formularioEstrella = document.getElementById("formularioEstrellas");
let parrafoOrden = document.getElementById("orden");
let imgEliminada = document.getElementsByTagName("img");

let primerClic = true;

let img1 = document.createElement("img");
img1.src = "img/unaEstrellas.svg";
let img2 = document.createElement("img");
img2.src = "img/dosEstrellas.svg";
let img3 = document.createElement("img");
img3.src = "img/tresEstrellas.svg";
let img4 = document.createElement("img");
img4.src = "img/cuatroEstrellas.svg";
let img5 = document.createElement("img");
img5.src = "img/cincoEstrellas.svg";
mostrarTodo = document.createElement("p");
mostrarTodo.innerHTML = "Mostrar todo";

/*--- VARIABLES FILTRO PUNTUACION ---*/
let cat = document.getElementsByClassName("panelFiltrar");

formularioEstrella.addEventListener( "click", (event) => {
    if (event.target === formularioEstrella) {
        if(primerClic){
            formularioEstrella.classList.add("botonAbierto");
            formularioEstrella.innerText = "Ordenar por: ▲"
            formularioEstrella.style.display = "flex";
            formularioEstrella.style.flexDirection = "column"; 
            

            let listaEstrellas = [img5, img4, img3, img2, img1, mostrarTodo];

            for (let i = 0; i < listaEstrellas.length; i++) {
                formularioEstrella.appendChild(listaEstrellas[i]);
            }

            primerClic = false;
        }else{
            formularioEstrella.innerHTML = "Ordenar por: ▼"; // Corregido aquí
            primerClic = true;
        }
    } else {
        if (event.target === img5) {
            let cat5 = listadoReseñas.filter((e) => e.puntuacion == "5.0");
            console.log(cat5);
        
            // Limpiar el contenedor antes de agregar las reseñas filtradas
            reseñasContainer.innerHTML = "";
        
            cat5.forEach((data) => {
                // Crear un elemento de artículo
                let reseñaElemento = document.createElement('article');
                reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3', 'panelFiltrar', parseInt(data.puntuacion));
        
                // Crear la estructura interna del elemento
                reseñaElemento.innerHTML = `
                    <div class="seccionPanel d-flex">
                        <img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>
                        <div class="infoContainer ps-3">
                            <div class="nombreEstrellas d-flex">
                                <div class="d-flex">
                                    <p>${data.nombre_cliente}</p>
                                    <p>${data.apellido_cliente}</p>
                                </div>
                                <div id="divPuntuacion" class="puntuacion">${data.puntuacion}</div>
                            </div>
                            <div class="infoOpinion d-flex flex-column align-items-start">
                                <p>${data.fecha}</p>
                                <p id="txtDescripcion">${data.descripcion}</p>
                            </div>
                        </div>
                    </div>
                `;
        
                // Agregar el elemento al contenedor
                reseñasContainer.appendChild(reseñaElemento);
            });
        } else if (event.target === img4) {
            let cat5 = listadoReseñas.filter((e) => e.puntuacion == "4.0");
            console.log(cat5);
        
            // Limpiar el contenedor antes de agregar las reseñas filtradas
            reseñasContainer.innerHTML = "";
        
            cat5.forEach((data) => {
                // Crear un elemento de artículo
                let reseñaElemento = document.createElement('article');
                reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3', 'panelFiltrar', parseInt(data.puntuacion));
        
                // Crear la estructura interna del elemento
                reseñaElemento.innerHTML = `
                    <div class="seccionPanel d-flex">
                        <img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>
                        <div class="infoContainer ps-3">
                            <div class="nombreEstrellas d-flex">
                                <div class="d-flex">
                                    <p>${data.nombre_cliente}</p>
                                    <p>${data.apellido_cliente}</p>
                                </div>
                                <div id="divPuntuacion" class="puntuacion">${data.puntuacion}</div>
                            </div>
                            <div class="infoOpinion d-flex flex-column align-items-start">
                                <p>${data.fecha}</p>
                                <p id="txtDescripcion">${data.descripcion}</p>
                            </div>
                        </div>
                    </div>
                `;
        
                // Agregar el elemento al contenedor
                reseñasContainer.appendChild(reseñaElemento);
            });
        } else if (event.target === img3) {
            let cat5 = listadoReseñas.filter((e) => e.puntuacion == "3.0");
            console.log(cat5);
        
            // Limpiar el contenedor antes de agregar las reseñas filtradas
            reseñasContainer.innerHTML = "";
        
            cat5.forEach((data) => {
                // Crear un elemento de artículo
                let reseñaElemento = document.createElement('article');
                reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3', 'panelFiltrar', parseInt(data.puntuacion));
        
                // Crear la estructura interna del elemento
                reseñaElemento.innerHTML = `
                    <div class="seccionPanel d-flex">
                        <img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>
                        <div class="infoContainer ps-3">
                            <div class="nombreEstrellas d-flex">
                                <div class="d-flex">
                                    <p>${data.nombre_cliente}</p>
                                    <p>${data.apellido_cliente}</p>
                                </div>
                                <div id="divPuntuacion" class="puntuacion">${data.puntuacion}</div>
                            </div>
                            <div class="infoOpinion d-flex flex-column align-items-start">
                                <p>${data.fecha}</p>
                                <p id="txtDescripcion">${data.descripcion}</p>
                            </div>
                        </div>
                    </div>
                `;
        
                // Agregar el elemento al contenedor
                reseñasContainer.appendChild(reseñaElemento);
            });
        } else if (event.target === img2) {
            let cat5 = listadoReseñas.filter((e) => e.puntuacion == "2.0");
            console.log(cat5);
        
            // Limpiar el contenedor antes de agregar las reseñas filtradas
            reseñasContainer.innerHTML = "";
        
            cat5.forEach((data) => {
                // Crear un elemento de artículo
                let reseñaElemento = document.createElement('article');
                reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3', 'panelFiltrar', parseInt(data.puntuacion));
        
                // Crear la estructura interna del elemento
                reseñaElemento.innerHTML = `
                    <div class="seccionPanel d-flex">
                        <img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>
                        <div class="infoContainer ps-3">
                            <div class="nombreEstrellas d-flex">
                                <div class="d-flex">
                                    <p>${data.nombre_cliente}</p>
                                    <p>${data.apellido_cliente}</p>
                                </div>
                                <div id="divPuntuacion" class="puntuacion">${data.puntuacion}</div>
                            </div>
                            <div class="infoOpinion d-flex flex-column align-items-start">
                                <p>${data.fecha}</p>
                                <p id="txtDescripcion">${data.descripcion}</p>
                            </div>
                        </div>
                    </div>
                `;
        
                // Agregar el elemento al contenedor
                reseñasContainer.appendChild(reseñaElemento);
            });
        } else if (event.target === img1) {
            let cat5 = listadoReseñas.filter((e) => e.puntuacion == "1.0");
            console.log(cat5);
        
            // Limpiar el contenedor antes de agregar las reseñas filtradas
            reseñasContainer.innerHTML = "";
        
            cat5.forEach((data) => {
                // Crear un elemento de artículo
                let reseñaElemento = document.createElement('article');
                reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3', 'panelFiltrar', parseInt(data.puntuacion));
        
                // Crear la estructura interna del elemento
                reseñaElemento.innerHTML = `
                    <div class="seccionPanel d-flex">
                        <img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>
                        <div class="infoContainer ps-3">
                            <div class="nombreEstrellas d-flex">
                                <div class="d-flex">
                                    <p>${data.nombre_cliente}</p>
                                    <p>${data.apellido_cliente}</p>
                                </div>
                                <div id="divPuntuacion" class="puntuacion">${data.puntuacion}</div>
                            </div>
                            <div class="infoOpinion d-flex flex-column align-items-start">
                                <p>${data.fecha}</p>
                                <p id="txtDescripcion">${data.descripcion}</p>
                            </div>
                        </div>
                    </div>
                `;
        
                // Agregar el elemento al contenedor
                reseñasContainer.appendChild(reseñaElemento);
            });
        } else if(event.target === mostrarTodo){
            let cat5 = listadoReseñas.filter((e) => e.puntuacion >= "1.0" && e.puntuacion <= "5.0");
            console.log(cat5);
        
            // Limpiar el contenedor antes de agregar las reseñas filtradas
            reseñasContainer.innerHTML = "";
        
            cat5.forEach((data) => {
                // Crear un elemento de artículo
                let reseñaElemento = document.createElement('article');
                reseñaElemento.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-mb-3', 'panelFiltrar', parseInt(data.puntuacion));
        
                // Crear la estructura interna del elemento
                reseñaElemento.innerHTML = `
                    <div class="seccionPanel d-flex">
                        <img src="${imgUser.src}" alt="Foto de perfil del usuario"></img>
                        <div class="infoContainer ps-3">
                            <div class="nombreEstrellas d-flex">
                                <div class="d-flex">
                                    <p>${data.nombre_cliente}</p>
                                    <p>${data.apellido_cliente}</p>
                                </div>
                                <div id="divPuntuacion" class="puntuacion">${data.puntuacion}</div>
                            </div>
                            <div class="infoOpinion d-flex flex-column align-items-start">
                                <p>${data.fecha}</p>
                                <p id="txtDescripcion">${data.descripcion}</p>
                            </div>
                        </div>
                    </div>
                `;
        
                // Agregar el elemento al contenedor
                reseñasContainer.appendChild(reseñaElemento);
            });
        }
        
    }
});

/*--- FILTRO PUNTUACION ---*/

let prueba = formularioEstrellas.children;
for (let i = 0; i < prueba.length; i++) {
    console.log(prueba[i]);
}






/*--- IMPRIMIR PUNTUACION ESTRELLAS ---*/

let numsPuntuacion = document.getElementsByClassName("puntuacion");

let imgEstrella = document.createElement("img");
imgEstrella.src = "img/unaEstrellas.svg";

for (let i = 0; i < numsPuntuacion.length; i++) {
    switch (parseInt(numsPuntuacion[i].innerText)) {
        case 1:
            numsPuntuacion[i].innerHTML = "";
            numsPuntuacion[i].appendChild(document.createElement("img")).src = "img/unaEstrellas.svg";
            break;

        case 2:
            numsPuntuacion[i].innerHTML = "";
            numsPuntuacion[i].appendChild(document.createElement("img")).src = "img/dosEstrellas.svg";
            break;

        case 3:
            numsPuntuacion[i].innerHTML = "";
            numsPuntuacion[i].appendChild(document.createElement("img")).src = "img/tresEstrellas.svg";
            break;

        case 4:
            numsPuntuacion[i].innerHTML = "";
            numsPuntuacion[i].appendChild(document.createElement("img")).src = "img/cuatroEstrellas.svg";
            break;

        case 5:
            numsPuntuacion[i].innerHTML = "";
            numsPuntuacion[i].appendChild(document.createElement("img")).src = "img/cincoEstrellas.svg";
            break;

        default:
            numsPuntuacion[i].innerText = "mal";
    }
}



