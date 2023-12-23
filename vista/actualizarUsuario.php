<?php
    include_once 'config/dataBase.php';
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estiloAccionesAdmin.css">
    <link rel="stylesheet" href="estilos/estiloRegistro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_SESSION['idCliente'])) {
        echo "--------------";
        echo "<pre>";
        print_r($usuario);  // O utiliza echo json_encode($usuario, JSON_PRETTY_PRINT); para formato JSON
        echo "</pre>";
    }
    ?>
    <h1>MODIFICA TU INFORMACIÓN</h1>
    <div class="row d-flex justify-content-center">
        <div class="d-flex justify-content-center px-0 contenedor">
            <form action="<?= URL ?>?controller=actualizarUsuario&action=procesarFormularioModificarUsuario" method="post">
                <input type="text" name="nombre" value="<?= $usuario->getNombre()?>" placeholder="<?= $usuario->getNombre()?>">
                <input type="text" name="apellido" value="<?= $usuario->getApellido()?>" placeholder="<?= $usuario->getApellido()?>">
                <input type="email" name="email" value="<?= $usuario->getEmail()?>" placeholder="<?= $usuario->getEmail()?>">
                <input type="radio" name="sr">
                    <label for="sr">Sr.</label>
                <input type="radio" name="sra">
                    <label for="sra">Sra.</label>
                    <input type="password" name="contraseña" value="<?= $usuario->getContraseña()?> placeholder="Nueva contraseña">
                <input type="submit" name="btnActualizarDatos" value="ACTUALIZAR DATOS">
            </form>
        </div>
    </div> 

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

