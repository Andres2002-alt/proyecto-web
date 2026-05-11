<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<?php include("header.php"); ?>

<main>

<section class="confirmacion">

<h2>¡Registro completado!</h2>

<p>
Tu inscripción o compra se ha realizado correctamente.
Gracias por confiar en <strong>PowerFit Gym</strong>.
</p>

<a href="indice.html">
<button>Volver al inicio</button>
</a>

</section>

</main>

<?php include("footer.php"); ?>
<script src="js/script.js"></script>
</body>
</html>