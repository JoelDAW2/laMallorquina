<?php
    include_once 'config/dataBase.php';
    include_once 'controlador/productoControlador.php';
    include_once 'controlador/pedidoControlador.php';
    include_once 'modelo/productoDAO.php';
    require_once("controlador/sesionesControlador.php");
    //include("controlador/pedidoProductoControlador.php");
    include("controlador/cookie.php");
    include('header.php');

    cookie::crearCookie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos/estiloCarrito.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1 class="tituloPagina">CARRITO</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-4 mt-4 mb-4 px-0 listaProductosAñadidos">
            <?php
                //cantidadesControlador::carritoVacio();
                foreach ($_SESSION['lista'] as $key => $value) {
                    // Obtener detalles del producto utilizando el ID ($value)
                    $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
                
            ?>
            <div class="row fila-producto">
                <div class="col-12 d-flex justify-content-between align-items-center px-0 productoAñadido">
                    <div class="col-5 d-flex align-items-center">
                        <img class="py-3" src="img/<?php echo $producto->getImg()?>.jpg" alt="">
                        <p class="ps-2"><b><?php echo $producto->getNombre()?></b></p>
                    </div>

                    <div class="col-5 d-flex justify-content-end">
                        <form class="d-flex align-items-center" action="<?= URL ?>?controller=carrito&action=panelSumaResta" method="post">
                            <input type="hidden" name="cogerIdArray" value="<?php echo $_SESSION['lista'][$key]['id'] ?>">
                            <input type="number" name="" placeholder="<?php echo $_SESSION['lista'][$key]['cantidada'] ?>" min="1">
                            <input type="submit" name="sumarPlaceholder" src="img/logoSumar.png" value="+" alt="">
                            <input type="submit" name="restarPlaceholder" src="img/logoRestar.png" value="-" alt="">
                        </form>
                        <form id="formularioBasura" action="<?= URL ?>?controller=carrito&action=botonBasura" method="post">
                            <input type="hidden" name="basura" value="<?php echo $producto->getProductoId()?>">
                            <input type="image" src="img/logoBasura.png" name="productoBasura" >
                        </form>
                    </div>

                    <div class="col-2 divPrecioProducto">
                        <?php echo $producto->getPrecioUnidad()." €"?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <a href="carta.php"><p class="mt-3">Seguir comprando</p></a>
        </div>


        <div class="col-12 col-md-3 mt-4 mb-4 ps-md-5 pe-0 infoCompra">
            <h2 class="py-3 tituloRevisar"><b>REVISAR PEDIDO</b></h2>
            <?php
                foreach ($_SESSION['lista'] as $key => $value) {
                    // Obtener detalles del producto utilizando el ID ($value)
                    $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
                    
                    cantidadesControlador::imprimirCantidades($producto, $_SESSION['lista'][$key]['cantidada'], $producto->getPrecioUnidad());
                } 
            ?>  
            <div class="d-flex justify-content-between contenedorTotal">
                <p>Transporte</p>
                <p>Gratis</p>
            </div>
            <div class="d-flex justify-content-between contenedorTotal">
                <p><b>TOTAL</b> (IVA Incluido):</p>
                <p><?php cantidadesControlador::calcularTotal(); ?></p>
            </div>
            <div class="d-flex justify-content-between contenedorTotal">
                <?php cookie::imprimirValorCookie(); ?>
            </div>
            
            <div class="d-flex justify-content-between mt-4 codigoPromocional">
                <h3 class="tituloCodigo">¿TIENE UN CÓDIGO PROMOCIONAL?</h3>
                <img src="img/flechaCodigo.svg" alt="">
            </div>
            <form action="<?= URL ?>?controller=pedido&action=insertarPedido" method="post">
                <input class="py-3 mt-4" type="submit" name="confirmar" value="CONFIRMAR Y PAGAR PEDIDO">
                <?php
                    //$confirmar = productoControlador::destruirSesion();
                ?>
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php

    //pedidoControlador::insertarPedido();

    /*
    pedidoProductoControlador::insertarPedidoProducto($_SESSION['lista']);

    if(isset($_SESSION['idCliente'])){
        pedidoControlador::insertarPedido($_SESSION['idCliente']);  
        //echo ("si");
    }else{
        //echo ("no");
    }
    */

    include('footer.php');
?>


