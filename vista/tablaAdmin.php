<?php
    include_once '../config/dataBase.php';
    include_once '../controlador/tablaAdminControlador.php';
    include_once '../modelo/tablaAdminDAO.php';
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estiloTablaAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="table-responsive container-fluid px-5">
        <h1 class="tituloTabla">TABLA DE PRODUCTOS</h1>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO UNITARIO</th>
                <th>CATEGORIA_ID</th>
                <th>IMÁGENES</th>
                <th>ACCIONES</th>
            </tr>
            <?php
                $products = tablaAdminDAO::getAllProducts();
                foreach ($products as $product) {      
            ?>
            <tr>
                <td><?php echo $product->getProductoId()?></td>
                <td><?php echo $product->getNombre()?></td>
                <td><?php echo $product->getDescripcion()?></td>
                <td><?php echo $product->getPrecioUnidad()." €"?></td>
                <td><?php echo $product->getCategoriaId()?></td>
                <td><?php echo $product->getImg()?></td>
                <td class="btnsAcciones">
                    <form action="modificar.php" method="get">
                        <input type="hidden" name="escondidoModificar" value="<?= $product->getProductoId()?>">
                        <input type="submit" name="modificar" value="MODIFICAR">
                    </form>
                    <form action="" method="post">
                        <input type="hidden" name="escondido" value="<?= $product->getProductoId()?>">
                        <input type="submit" name="eliminar" value="ELIMINAR">
                        <?php tablaAdminControlador::eliminarProducto($product->getProductoId()) ?>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <form action="añadir.php" method="post">
            <input type="submit" value="AÑADIR">
        </form>
    </div>

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php
    include("footer.php");
?>

