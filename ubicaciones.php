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

<section class="ubicacion">

<h2>Nuestra Ubicación</h2>

<p>
Visítanos en nuestra sede principal y disfruta de un ambiente
moderno con equipos de última generación y entrenadores
profesionales.
</p>

</section>


<section class="mapa">

<h2>Encuéntranos en el mapa</h2>

<iframe 
src="https://www.google.com/maps?q=Cuenca,Ecuador&output=embed"
width="600"
height="450"
style="border:0;"
allowfullscreen=""
loading="lazy">
</iframe>

</section>


<section class="datos-contacto">

<h2>Información de contacto</h2>

<p><strong>Dirección:</strong> Av. Principal 123, Cuenca, Ecuador</p>

<p><strong>Teléfono:</strong> 0999999999</p>

<p><strong>Email:</strong> powerfit@gmail.com</p>

<p><strong>Horario:</strong> Lunes a Sábado 6:00 AM - 10:00 PM</p>

</section>

</main>


<?php include("footer.php"); ?>
<script src="js/script.js"></script>
</body>

</html>