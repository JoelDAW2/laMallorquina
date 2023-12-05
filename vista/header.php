<?php
  require_once("../controlador/sesionesControlador.php");
  sesionesControlador::crearSesion();
  include("../controlador/btnSesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estiloHeaderSup.css">
    <title>La Mallorquina</title>
</head>
<body>
  <!--LINEA GRIS PROPAGANDA SUPERIOR-->
  <div class="container-fluid px-0 cabecera">
    <div class="propaganda">
      <p>
        <b>ENVÍO GRATIS A PARTIR DE 49,90€. CAMBIOS Y DEVOLUCIONES GRATIS.*</b>
      </p>
    </div> 
  </div>

  <!--MENU INFO SUPERIOR-->
  <div class="row mt-4 filaMenuInfo">
    <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center">
      <ul class="list-group list-group-horizontal-sm primera lista">
        <li>ATT. AL CLIENTE <b>673 482 995</b></li>
        <li>CONTACTO</li>
        <li>TARJETA REGALO</li>
        <li id="sinBorde">TIENDAS</li>
      </ul>
    </div>

  <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center justify-content-center imgLogo">
    <img id="imgLogoPagina" class="img-fluid" src="../img/logoMallorquina.svg" alt="">
  </div>

    <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center justify-content-end">
      <ul class="d-flex justify-content-end list-group list-group-horizontal-sm lista">
        <!--
        <form action="tablaAdmin.php" method="post">
          <input type="<?php ?>" name="btnAdmin" value="">
        </form>
        -->
        <?php btnSesion::btnAdmin() ?>
        <li>ES / CA / EN</li>
        <?php btnSesion::btnSesion() ?>
        <!--
        <li>
          <form action="iniciarSesion.php" method="post">
            <input id="headerInput" type="submit" name="btnSesiones" value="<?php //btnSesion::btnSesion() ?>">
          </form>
        </li>
        -->
        <li id="iconoAccion">
          <img class="iconoAccion imgLinks" src="../img/logoUsuario.svg" alt="">
        </li>
        <li id="sinBorde"><a id="linkCarrito" href="carrito.php">CESTA DE LA COMPRA</a></li>
        <li id="iconoAccion">
          <div class="packCarrito">
            <img class="imgLinks" src="../img/logoCarrito.svg" alt="">
            <p>1</p>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <!--MENÚ DE LINKS-->
  <div class="row">
    <ul class="nav my-3 justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" href="cuerpo.php">RESTAURANTE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="carta.php">LA CARTA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="carrito.php">CARRITO</a>
      </li>
    </ul>
  </div>

  <!--MENU DEL CAMPUS-->
  <!--
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">RESTAURANTE</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LA CARTA
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Ensaladas</a></li>
            <li><a class="dropdown-item" href="#">Sopas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Cremas</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">CARRITO</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">BUSCAR  </button>
      </form>
    </div>
  </div>
</nav>
-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>