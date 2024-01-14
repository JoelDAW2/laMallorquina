<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estiloReseñas.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Mallorquina | Panel de control</title>
</head>
<body>
    <section class="mt-5">
        <div class="tituloForm">
            <h2 id="titulo">Valoraciones</h2>
            <button id="formularioEstrellas">Ordenar por: ▼</button>
        </div>
        <div class="row p-0 d-flex">
            <?php
                foreach ($reseña as $reseñaImprimir){      
            ?>
                <article class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="">
                        <div class="seccionPanel p-3 d-flex">
                            <img src="img/panel1.svg" alt="">
                            <div class="ps-2">
                                <div class="nombreEstrellas d-flex">
                                    <p><?= $reseñaImprimir->getNombreCliente()?></p>
                                    <img src="img/estrellas.svg" alt="">
                                </div>
                                <div class="infoOpinion d-flex flex-column align-items-start">
                                    <p>03-12-2023</p>
                                    <p><?= $reseñaImprimir->getDescripcion() ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php } ?>
    </section>

    <!--SCRIPTS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <script src="src/interacciones.js"></script>
</body>
</html>