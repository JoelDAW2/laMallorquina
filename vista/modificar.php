<?php
    include_once '../config/dataBase.php';
    include_once '../controlador/tablaAdminControlador.php';
    include_once '../modelo/tablaAdminDAO.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estiloModificar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ACTUALIZA LOS PRODUCTOS</h1>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre"><br>
        <input type="text" name="descripcion" placeholder="Descripción"><br>
        <input type="text" name="precioUnitario" placeholder="Precio unitario"><br>
        <input type="text" name="categoria" placeholder="Categoría"><br>
        <input type="text" name="img" placeholder="Imagen"><br>
        <input type="submit" name="btnActualizar" value="ACTUALIZAR">
        <?php //tablaAdminControlador::modificarProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precioUnitario'], $_POST['categoria'], $_POST['img'], 48) ?>
        <?php 
            if(isset($_POST['btnActualizar'])){
                echo $_POST['nombre'];
            }
        ?>
    </form> 

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

