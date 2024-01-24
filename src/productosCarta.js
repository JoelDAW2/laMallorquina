let btnFiltrarProductos = document.getElementById("btnFilters");
let checkEnsalada = document.getElementById("checkEnsaladas");
let checkSopa = document.getElementById("checkSopas");
let checkCrema = document.getElementById("checkCremas");
let checkBoxes = document.getElementsByClassName("cBox");
let seccionesProductos = document.getElementsByClassName("productosJs");
let divsPhp = document.getElementsByClassName("seccionesPhp");

for (let i = 0; i < seccionesProductos.length; i++) {
    seccionesProductos[i].style.display = "none";
    
}

btnFiltrarProductos.addEventListener("click", () => {

    for (let i = 0; i < divsPhp.length; i++) {
        divsPhp[i].style.display = "none";
        
    }
    
    for (let i = 0; i < seccionesProductos.length; i++) {
        if (checkBoxes[i].checked) {
            seccionesProductos[i].style.display = "flex";
            seccionesProductos[i].style.flexDirection = "row";
        }
    }
});





// Llamar a la API para obtener ENSALADAS con fetch
fetch("http://localhost/laMallorquina/?controller=api&action=apiObtenerEnsaladas")
.then(response => response.json())
.then(ensaladasGuardadas => {
    let productosContainer = document.getElementById('productoEnsalada');
    ensaladasGuardadas.forEach( (ensalada) => {
        let productoArticulo = document.createElement('article');
        productoArticulo.classList.add('col-12', 'col-md-6', 'col-lg-3', 'd-flex', 'justify-content-center', 'my-3', 'px-0', 'flex-column', 'align-items-center', 'tarjeta');
        productoArticulo.innerHTML = `
            <img class="imgProducto" src="img/${ensalada.img}.jpg" alt="Producto de la carta">
            <p>${ensalada.nombre_producto}<br></p>
            <p><b>${ensalada.precio_unidad} €</b></p>
            <div class="row d-flex w-100 acciones">
                <div class="col-6 d-flex p-0 justify-content-center accion">
                    <form class="w-100" action="" method="post">
                        <input id="btnLupa" type="submit" name="infoProducto" value="">                            
                    </form>
                </div>
                <div class="col-6 d-flex p-0 justify-content-center accion">
                    <form class="w-100" action="<?= URL ?>?controller=producto&action=añadirProductoArray" method="post">
                        <input id="btnCesta" type="submit" name="añadirCarrito" value="<?= $product->getProductoId()?>">                            
                    </form>
                </div>
            </div>  
        `;
        productosContainer.appendChild(productoArticulo);
    });
});

// Llamar a la API para obtener SOPAS con fetch
fetch("http://localhost/laMallorquina/?controller=api&action=apiObtenerSopas")
.then(response => response.json())
.then(sopasGuardadas => {
    let productosContainer = document.getElementById('productoSopa');
    sopasGuardadas.forEach( (ensalada) => {
        let productoArticulo = document.createElement('article');
        productoArticulo.classList.add('col-12', 'col-md-6', 'col-lg-3', 'd-flex', 'justify-content-center', 'my-3', 'px-0', 'flex-column', 'align-items-center', 'tarjeta');
        productoArticulo.innerHTML = `
            <img class="imgProducto" src="img/${ensalada.img}.jpg" alt="Producto de la carta">
            <p>${ensalada.nombre_producto}<br></p>
            <p><b>${ensalada.precio_unidad} €</b></p>
            <div class="row d-flex w-100 acciones">
                <div class="col-6 d-flex p-0 justify-content-center accion">
                    <form class="w-100" action="" method="post">
                        <input id="btnLupa" type="submit" name="infoProducto" value="">                            
                    </form>
                </div>
                <div class="col-6 d-flex p-0 justify-content-center accion">
                    <form class="w-100" action="<?= URL ?>?controller=producto&action=añadirProductoArray" method="post">
                        <input id="btnCesta" type="submit" name="añadirCarrito" value="<?= $product->getProductoId()?>">                            
                    </form>
                </div>
            </div>  
        `;
        productosContainer.appendChild(productoArticulo);
    });
});


// Llamar a la API para obtener CREMAS con fetch
fetch("http://localhost/laMallorquina/?controller=api&action=apiObtenerCremas")
.then(response => response.json())
.then(cremasGuardadas => {
    let productosContainer = document.getElementById('productoCrema');
    cremasGuardadas.forEach( (ensalada) => {
        let productoArticulo = document.createElement('article');
        productoArticulo.classList.add('col-12', 'col-md-6', 'col-lg-3', 'd-flex', 'justify-content-center', 'my-3', 'px-0', 'flex-column', 'align-items-center', 'tarjeta');
        productoArticulo.innerHTML = `
            <img class="imgProducto" src="img/${ensalada.img}.jpg" alt="Producto de la carta">
            <p>${ensalada.nombre_producto}<br></p>
            <p><b>${ensalada.precio_unidad} €</b></p>
            <div class="row d-flex w-100 acciones">
                <div class="col-6 d-flex p-0 justify-content-center accion">
                    <form class="w-100" action="" method="post">
                        <input id="btnLupa" type="submit" name="infoProducto" value="">                            
                    </form>
                </div>
                <div class="col-6 d-flex p-0 justify-content-center accion">
                    <form class="w-100" action="<?= URL ?>?controller=producto&action=añadirProductoArray" method="post">
                        <input id="btnCesta" type="submit" name="añadirCarrito" value="<?= $product->getProductoId()?>">                            
                    </form>
                </div>
            </div>  
        `;
        productosContainer.appendChild(productoArticulo);
    });
});