console.log("hola");

/*--- MODAL ---*/

let btnModal = document.getElementById("botonModal");
let btnInsertarPedido = document.getElementById("formularioInsertarPedido");
let btnCerrar = document.getElementById("cerrar");

btnCerrar.addEventListener("click", (event) => {
    event.preventDefault();
    btnInsertarPedido.submit();
});

