<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estiloInfoPedidoQr.css">
    <title>La Mallorquina | Información del pedido</title>
</head>
<body class="d-flex justify-content-center align-items-center flex-column">
    <div class="logoEmpresa d-flex justify-content-center pt-4">
        <img src="img/logoMallorquina.svg" alt="">
    </div>
    <section class="row pe-0 d-flex flex-column justify-content-center">
    <h2 id="tituloPedido" class="subtitulo">Detalles del pedido </h2>
        <div class="row tiquet p-0">
            <div id="general" class="pe-1"></div>
            <div id="pTotal"></div>
            <h3>Pago con tarjeta</h3>
            <h3>Grácias por su visita!</h3>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="src/interaccionesQr.js"></script>
</body>
</html>