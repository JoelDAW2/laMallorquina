<?php
    include_once 'config/dataBase.php';
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
        <h1 class="tituloTabla">MIS PEDIDOS</h1>
        <table class="table table-hover">
            <tr>
                <th>PEDIDO ID</th>
                <th>FECHA</th>
                <th>ESTADO</th>
                <th>PRECIO TOTAL</th>
            </tr>
            <?php
                foreach ($misPedidos as $miPedido) {      
            ?>
            <tr>
                <td><?= $miPedido->getPedidoId()?></td>
                <td><?= $miPedido->getFecha()?></td>
                <td><?= $miPedido->getEstado()?></td>
                <td><?= $miPedido->getPrecioTotal()?></td>
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

