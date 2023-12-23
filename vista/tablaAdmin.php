<?php
    include_once 'config/dataBase.php';
    include_once 'controlador/tablaAdminControlador.php';
    include_once 'modelo/tablaAdminDAO.php';
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estiloTablaAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="table-responsive container-fluid px-5">
        <h1 class="tituloTabla">PANEL DE PRODUCTOS</h1>
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
                foreach ($products as $product) {      
            ?>
            <tr>
                <td><?php echo $product->getProductoId()?></td>
                <td><?php echo $product->getNombre()?></td>
                <td><?php echo $product->getDescripcion()?></td>
                <td><?php echo $product->getPrecioUnidad()?> €</td>
                <td><?php echo $product->getCategoriaId()?></td>
                <td><?php echo $product->getImg()?>.jpg</td>
                <td class="btnsAcciones">
                    <form action="<?= URL ?>?controller=tablaAdmin&action=indexModificar" method="post">
                        <input type="hidden" name="escondidoModificar" value="<?= $product->getProductoId()?>">
                        <input type="submit" name="modificar" value="MODIFICAR">
                    </form>
                    <form action="<?= URL ?>?controller=tablaAdmin&action=eliminarProducto" method="post">
                        <input type="hidden" name="escondido" value="<?= $product->getProductoId()?>">
                        <input type="submit" name="eliminar" value="ELIMINAR">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <form action="<?= URL ?>?controller=tablaAdmin&action=indexAñadir" method="post">
            <input type="submit" value="AÑADIR">
        </form>
    </div>
    <div class="table-responsive container-fluid px-5">
        <h1 class="tituloTabla">PANEL DE PEDIDOS</h1>
        <table class="table table-hover">
            <tr>
                <th>PEDIDO ID</th>
                <th>FECHA</th>
                <th>CLIENTE ID</th>
                <th>ESTADO</th>
                <th>PRECIO TOTAL</th>
                <th>ACCIONES</th>
            </tr>
            <?php
                foreach ($pedidos as $pedido) {      
            ?>
            <tr>
                <td><?php echo $pedido->getPedidoId()?></td>
                <td><?php echo $pedido->getFecha()?></td>
                <td><?php echo $pedido->getClienteId()?></td>
                <td><?php echo $pedido->getEstado()?></td>
                <td><?php echo $pedido->getPrecioTotal()?> €</td>
                <td class="btnsAcciones">
                    <form action="<?= URL ?>?controller=tablaAdmin&action=indexModificar" method="post">
                        <input type="hidden" name="escondidoModificar" value="<?= $product->getProductoId()?>">
                        <input type="submit" name="modificar" value="MODIFICAR">
                    </form>
                    <form action="<?= URL ?>?controller=tablaAdmin&action=eliminarProducto" method="post">
                        <input type="hidden" name="escondido" value="<?= $product->getProductoId()?>">
                        <input type="submit" name="eliminar" value="ELIMINAR">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php
    include("footer.php");
?>

