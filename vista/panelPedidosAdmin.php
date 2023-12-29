<?php
    include_once 'config/dataBase.php';
    include_once 'modelo/tablaAdminDAO.php';
    include_once 'controlador/tablaAdminControlador.php';
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estiloPanelesAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="titulo mt-5">Panel de pedidos</h2>
    <section class="seccionGeneral row d-flex justify-content-center">
        <div class="row p-0">
            <div class="table-responsive container-fluid">
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
                        <td><?= $pedido->getPedidoId()?></td>
                        <td><?= $pedido->getFecha()?></td>
                        <td><?= $pedido->getClienteId()?></td>
                        <td><?= $pedido->getEstado()?></td>
                        <td><?= $pedido->getPrecioTotal()?> €</td>
                        <td class="btnsAcciones d-flex">
                            <form action="<?= URL ?>?controller=&action=" method="post">
                                <input type="hidden" name="escondidoModificarPedido" value="<?= $pedido->getPedidoId()?>">
                                <input type="submit" name="modificarPedido" value="MODIFICAR">
                            </form>
                            <form action="<?= URL ?>?controller=tablaAdmin&action=eliminarPedido" method="post">
                                <input type="hidden" name="escondidoPedido" value="<?= $pedido->getPedidoId()?>">
                                <input type="submit" name="eliminarPedido" value="ELIMINAR">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            </div>
        </section>
        <section class="seccionLinks d-flex">
            <a href="<?php URL ?>?controller=tablaAdmin">◄ Volver</a>
            <a href="<?php URL ?>?controller=cuerpo">🏠 Inicio</a>
        </section>

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php
    include("footer.php");
?>

