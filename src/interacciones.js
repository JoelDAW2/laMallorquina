/*--- MENU RESEÑAS ---*/

let formularioEstrella = document.getElementById("formularioEstrellas");
let parrafoOrden = document.getElementById("orden");
let imgEliminada = document.getElementsByTagName("img");

let primerClic = true;

formularioEstrella.addEventListener( "click", () => {

    if(primerClic){
        formularioEstrella.classList.add("botonAbierto");
        formularioEstrella.innerText = "Ordenar por: ▲"
        formularioEstrella.style.display = "flex";
        formularioEstrella.style.flexDirection = "column"; 
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

        let listaEstrellas = [img5, img4, img3, img2, img1, mostrarTodo];

        for (let i = 0; i < listaEstrellas.length; i++) {
            formularioEstrella.appendChild(listaEstrellas[i]);
        }

        primerClic = false;
    }else{
        formularioEstrella.innerHTML = "Ordenar por: ▼"; // Corregido aquí
        primerClic = true;
    }
});

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

