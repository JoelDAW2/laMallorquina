<?php
    //include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estiloRestaurante.css">
    <title>La Mallorquina | Textil para el Hogar y decoración de calidad</title>
</head>
<body>
    <main class="container-fluid">
        
        <!--CARRUSEL-->
        <section class="row px-3 pb-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="parche d-flex justify-content-center align-items-center flex-column">
                        <div class="d-flex flex-column justify-content-start">
                            <h1><b>NUESTRO <br> RESTAURANTE</b></h1>
                            <p>Nuestra cocina ofrece todo tipo de <br> platos veganos, confeccionados a <br> partir de productos naturales y por <br> las manos de nuestros profesionales.</p>
                        </div>
                    </div>
                    <img src="img/b1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <div class="parche d-flex justify-content-center align-items-center flex-column">
                        <h1><b>LOS MEJORES <br> MENÚS VEGANOS</b></h1>
                        <img src="img/decoracionFaja.svg" alt="">
                    </div>
                    <img src="img/b2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/b3.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </section>

        <!--BANNER FOTOS BUENO-->
        <section>
            <div class="row px-5 fotos">
                <div class="col-md-8 col-sm-12"></div>
                <div class="col-md-4 col-sm-12"></div>
            </div>
        </section>

        <!--PRODUCTOS NUESTRA SELECCION-->
        <h2><b>NUESTRA SELECCIÓN PARA TI</b></h2>
        <section>
            <div class="row px-5">
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column seleccion">
                    <img src="img/seleccion1.jpg" alt="">
                    <p>Sopa de miso vegano</p>
                    <p>13,95€</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column seleccion">
                    <img src="img/seleccion2.jpg" alt="">
                    <p>Sopa de miso vegano</p>
                    <p>13,95€</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column seleccion">
                    <img src="img/seleccion3.jpg" alt="">
                    <p>Sopa de miso vegano</p>
                    <p>13,95€</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column seleccion">
                    <img src="img/seleccion4.jpg" alt="">
                    <p>Sopa de miso vegano</p>
                    <p>13,95€</p>
                </div>
            </div>
        </section>

        <!--SECCION HISTORIA-->
        <h3><b>COME Y BEBE COMO EN TU CASA</b></h3>
        <section>
            <div class="row px-lg-5 historiaRestaurante">
                <h4 class="pt-4 pb-2"><b>Restaurante La Mallorquina</b></h4>
                <div class="col-12 col-lg-4">
                    <p class="pt-3 pb-3 textoHistoria">
                        El restaurante La Mallorquina destaca por su variedad de platos donde cuyos ingredientes mantienen lo verde y natural. <br>
                        <br>Por supuesto, nuestras instalaciones cuentan con herramientas nuevas y siempre en perfectas condiciones, para llevar a cabo la preparación de cada plato. <br>
                        <br> Desde hace más de 75 años, La Mallorquina proporciona productos de calidad, preocupandose a la vez, por el orígen de sus productos con el objetivo de proporcionar al cliente lo mejor del mercado. 
                    </p>
                </div>
                <div class="col-12 col-lg-4">
                    <img id="cocineros" src="img/cocineros.png" alt="">
                </div>
                <div class="col-12 col-lg-4">
                    <p class="pt-3 pb-3 textoHistoria">
                        <span>Historia del restaurante</span>
                        <br> Ya hace más de 20 años que los hermanos Jené decidieron iniciarse en el negocio de la hostelería, abriendo el primer restaurante vegano en el centro de Barcelona. <br>
                        <br> A pesar de las dificultades iniciales, con el paso del tiempo han logrado crear un espacio perfecto para disfrutar de sus mejores platos. <br>
                        <br> Actualmente, disponen de una gran cadena de restaurantes veganos distribuidos por toda Barcelona.
                    </p>
                </div>
            </div>
        </section>

        <!--SECCION ENVIOS-->
        <!--
        <section>
            <div class="row px-5 py-5 seccionLogosRedes">
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column">
                    <img src="img/info1.svg" alt="">
                    <p>PAGO<br>100% SEGURO</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column">
                    <img src="img/info2.svg" alt="">
                    <p>ENVÍO GRATIS<br>A PARTIR DE 49,90€</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column">
                    <img src="img/info3.svg" alt="">
                    <p>CAMBIOS Y DEVOLUCIONES<br>GRATIS</p>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center align-items-center flex-column">
                    <img src="img/info4.svg" alt="">
                    <p>TE ASESORAMOS<br>EN TU COMPRA</p>
                </div>
            </div>
        </section>
        -->
    </main>
    
    
    <!-- Incluye los archivos JavaScript de Bootstrap 5 (Popper.js es necesario) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>
</html>

<?php
    include("seccionInfoEnvio.php");
    include('footer.php');
?>

