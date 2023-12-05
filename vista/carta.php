<?php
    include_once '../config/dataBase.php';
    include_once '../controlador/productoControlador.php';
    include_once '../modelo/productoDAO.php';
    require_once("../controlador/sesionesControlador.php");
    include('header.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estiloCartaProductos.css">
    <title>TABLA DE PRODUCTOS</title>
</head>
<body>
    <h1 class="pt-4">ENSALADAS</h1>
    <div class="row px-5">
        <?php
            $products = productoDAO::getEnsaladas();  
            foreach ($products as $product){      
        ?>
            <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center py-3 flex-column align-items-center tarjeta">
                <img class="imgProducto" src="../img/<?php echo $product->getImg()?>.jpg" alt="">
                <p><?php echo $product->getNombre()?><br></p>
                <p><?php echo $product->getPrecioUnidad()." €"?></p>
                <div class="row d-flex w-100 acciones">
                    <div class="col-6 d-flex p-0 justify-content-center accion">
                        <form class="w-100" action="" method="post">
                            <input id="btnLupa" type="submit" name="infoProducto" value="">                            
                        </form>
                    </div>
                    <div class="col-6 d-flex p-0 justify-content-center accion">
                        <form class="w-100" action="" method="post">
                            <input id="btnCesta" type="submit" name="añadirCarrito" value="<?php echo $product->getProductoId()?>">                            
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <h1 class="pt-4">SOPAS</h1>
    <div class="row px-5">
        <?php
            $products = productoDAO::getSopas();  
            foreach ($products as $product){      
        ?>
            <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center py-3 flex-column align-items-center tarjeta">
                <img class="imgProducto" src="../img/<?php echo $product->getImg()?>.jpg" alt="">
                <p><?php echo $product->getNombre()?><br></p>
                <p><?php echo $product->getPrecioUnidad()." €"?></p>
                <div class="row d-flex w-100 acciones">
                    <div class="col-6 d-flex p-0 justify-content-center accion">
                        <form class="w-100" action="" method="post">
                            <input id="btnLupa" type="submit" name="infoProducto" value="">                            
                        </form>
                    </div>
                    <div class="col-6 d-flex p-0 justify-content-center accion">
                        <form class="w-100" action="" method="post">
                            <input id="btnCesta" type="submit" name="añadirCarrito" value="<?php echo $product->getProductoId()?>">                            
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <h1 class="pt-4">CREMAS</h1>
    <div class="row px-5">
        <?php
            $products = productoDAO::getCremas();  
            foreach ($products as $product){      
        ?>
            <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center py-3 flex-column align-items-center tarjeta">
                <img class="imgProducto" src="../img/<?php echo $product->getImg()?>.jpg" alt="">
                <p><?php echo $product->getNombre()?><br></p>
                <p><?php echo $product->getPrecioUnidad()." €"?></p>
                <div class="row d-flex w-100 acciones">
                    <div class="col-6 d-flex p-0 justify-content-center accion">
                        <form class="w-100" action="" method="post">
                            <input id="btnLupa" type="submit" name="infoProducto" value="">                            
                        </form>
                    </div>
                    <div class="col-6 d-flex p-0 justify-content-center accion">
                        <form class="w-100" action="" method="post">
                            <input id="btnCesta" type="submit" name="añadirCarrito" value="<?php echo $product->getProductoId()?>">                            
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!--NAV NUMERO DE PAGINAS NO FUNCIONA EL RESPONSIVE-->
    <!--
    <div class="row px-5">
        <nav class="d-flex justify-content-center align-items-center paginacion" aria-label="Page navigation example">
            <ul class="pagination py-3">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&lt; ANTERIOR</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">SIGUIENTE &gt;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    -->

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php
    if(isset($_POST['añadirCarrito'])){
        $idAñadir = $_POST['añadirCarrito'];
        
        echo $idAñadir;
        $encontrado = false;
        
        for ($i=0; $i < count($_SESSION['lista']); $i++) { 
            if($_SESSION['lista'][$i]['id'] == $idAñadir){
                $_SESSION['lista'][$i]['cantidada'] = $_SESSION['lista'][$i]['cantidada']  + 1;
                $encontrado = true;
            }
        }

        if(!$encontrado){
            array_push($_SESSION['lista'], ['id' => $idAñadir , 'cantidada'=> 1]);
        }
        

    }
    //  $_SESSION['lista']=null;
    echo "<pre>";
    print_r($_SESSION['lista']);
    echo "</pre>";
?>

<?php
    include('footer.php');
?>
