<?php
    include_once 'config/dataBase.php';
    include_once 'controlador/tablaAdminControlador.php';
    include_once 'modelo/tablaAdminDAO.php';
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estiloAccionesAdmin.css">
    <!--<link rel="stylesheet" href="../estilos/estiloModificar.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ACTUALIZA LOS PRODUCTOS</h1>
    <div class="row d-flex justify-content-center">
        <div class="d-flex justify-content-center px-0 contenedor">
            <form action="" method="post">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="text" name="descripcion" placeholder="Descripción">
                <input type="text" name="precioUnitario" placeholder="Precio unitario">
                <input type="text" name="categoria" placeholder="Categoría">
                <input type="text" name="img" placeholder="Imagen">
                <input type="submit" name="btnActualizar" value="ACTUALIZAR">
                <?php tablaAdminControlador::procesarFormularioModificar() ?>
            </form>
        </div>
    </div> 

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

