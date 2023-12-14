<?php
    include('controlador/inicioSesionControlador.php');
    if(isset($_POST['correo']) && isset($_POST['contraseña']) && isset($_POST['iniciarSesion'])){
        inicioSesionControlador::startSession($_POST['correo'], $_POST['contraseña']);
    }
    include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estiloIniciarSesion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row mx-4 mt-5">
        <h2 class="titulo">Iniciar sesión con su cuenta</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-3">
                <p class="texto">¡Inicie sesión!</p>
                <form action="" method="post" id="formularioIniciar">
                    <input type="email" name="correo" placeholder="Dirección de correo electrónico">
                    <input type="password" name="contraseña" placeholder="Contraseña">
                    <p class="texto">¿Olvidó su contraseña?</p>
                    <input type="submit" name="iniciarSesion" value="INICIAR SESIÓN">
                </form>
                <div class="centrado">
                    <form action="" method="post">
                        <hr>
                        <a href="registro.php"><p class="texto">¿No tiene una cuenta? Cree una aquí</p></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--
        <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <h2 class="titulo text-center">Iniciar sesión con su cuenta</h2>
                <div class="text-center">
                    <p class="texto">¡Inicie sesión!</p>
                    <form action="" method="post" id="formularioIniciar">
                        <div class="form-group">
                            <input type="email" class="form-control" name="correo" placeholder="Dirección de correo electrónico">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" name="iniciarSesion" value="INICIAR SESIÓN">
                        </div>
                    </form>
                </div>
                <div class="text-center mt-3">
                    <form action="" method="post">
                        <p class="olvido">¿Olvidó su contraseña?</p>
                        <hr>
                        <a href="registro.php" class="texto">¿No tiene una cuenta? Cree una aquí</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    -->


    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php
    include("seccionInfoEnvio.php");
    include('footer.php');
?>
