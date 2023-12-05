<?php
    include_once '../config/dataBase.php';
    include_once '../controlador/productoControlador.php';
    include_once '../controlador/pedidoControlador.php';
    include_once '../modelo/productoDAO.php';
    require_once("../controlador/sesionesControlador.php");
    include('header.php');
    

    if(isset($_POST['productoBasura_x'])){
        $eliminarBasura = productoControlador::botonBasura();
    }
    
    if(isset($_POST['sumarPlaceholder_x'])){
        productoControlador::sumarPlaceholder();
    }

    if(isset($_POST['restarPlaceholder_x'])){
        productoControlador::restarPlaceholder();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilos/estiloCarrito.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1 class="tituloPagina">CARRITO</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-4 d-flex flex-column listaProductosAñadidos">
            <?php
                foreach ($_SESSION['lista'] as $key => $value) {
                    // Obtener detalles del producto utilizando el ID ($value)
                    $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
                
            ?>
            <div class="row fila-producto">
                <div class="d-flex justify-content-end align-items-center productoAñadido">
                    <img class="py-3" src="../img/<?php echo $producto->getImg()?>.jpg" alt="">
                    <?php echo $producto->getNombre()?>
                    <form class="d-flex align-items-center" action="" method="post">
                        <input type="hidden" name="cogerIdArray" value="<?php echo $_SESSION['lista'][$key]['id'] ?>">
                        <input type="number" name="" placeholder="<?php echo $_SESSION['lista'][$key]['cantidada'] ?>" min="1">
                        <input type="image" name="sumarPlaceholder" src="../img/logoSumar.png" alt="">
                        <input type="image" name="restarPlaceholder" src="../img/logoRestar.png" alt="">
                    </form>

                    <form action="" method="post">
                        <input type="hidden" name="basura" value="<?php echo $producto->getProductoId()?>">
                        <input type="image" src="../img/logoBasura.png" name="productoBasura" >
                    </form>
                    <?php echo $producto->getPrecioUnidad()." €"?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="col-12 col-md-3 px-5 infoCompra">
            <h2 class="py-3 tituloRevisar">REVISAR PEDIDO</h2>
            <?php
                foreach ($_SESSION['lista'] as $key => $value) {
                    // Obtener detalles del producto utilizando el ID ($value)
                    $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
            ?>
            <p><?php echo $producto->getNombre()." x ".$_SESSION['lista'][$key]['cantidada']." - ".$producto->getPrecioUnidad()." €";?></p>
            <?php } ?>  
            <p> TOTAL (IVA Incluido): 
            <?php 
                $total = $_SESSION['lista'];
                $cantidadProducto = 0;
                $sumaPrecio = 0;
                $sumaTotal = 0;
                foreach ($total as $key => $value) {
                    $producto = productoDAO::getProductoById($_SESSION['lista'][$key]['id']);
                    $cantidadProducto = $total[$key]['cantidada'];
                    $sumaPrecio = $cantidadProducto * $producto->getPrecioUnidad();
                    $sumaTotal = $sumaTotal + $sumaPrecio; 
                } 
                echo $sumaTotal." €";
            ?>
            </p>
            <h3 class="tituloCodigo">¿TIENE UN CÓDIGO PROMOCIONAL?</h3>
            <form action="" method="post">
                <input class="py-3" type="submit" name="confirmar" value="CONFIRMAR Y PAGAR PEDIDO">
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

    if(isset($_SESSION['idCliente'])){
        pedidoControlador::insertarPedido($_SESSION['idCliente']);  
        //echo ("si");
    }else{
        //echo ("no");
    }
    

    include('footer.php');
?>


