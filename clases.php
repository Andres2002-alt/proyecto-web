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

<section class="descripcion-clases">

<h2>Nuestras Clases</h2>

</section>


<section class="lista-clases">

<div class="clase">
    <h3>Boxeo</h3>
    <p>Entrenamiento intenso para mejorar fuerza y resistencia.</p>
    <img src="imagenes/boxeo1.jpg" alt="foto_boxeo"
    onmouseover="aumentarImagen(this)"
    onmouseout="volverImagen(this)"
    onclick="clicImagen(this); mostrarDetalles('Boxeo', '60 minutos', 'Alta', 'Mañana y Tarde')">
</div>

<div class="clase">
    <h3>Spinning</h3>
    <p>Sesiones de ciclismo para mejorar el rendimiento cardiovascular.</p>
    <img src="imagenes/spinning3.jpg" alt="foto_spinning"
    onmouseover="aumentarImagen(this)"
    onmouseout="volverImagen(this)"
    onclick="clicImagen(this); mostrarDetalles('Spinning', '45 minutos', 'Media', 'Mañana y Noche')">
</div>

<div class="clase">
    <h3>Bailoterapia</h3>
    <p>Ejercicio divertido al ritmo de la música.</p>
    <img src="imagenes/bailo1.jpg" alt="foto_bailo"
    onmouseover="aumentarImagen(this)"
    onmouseout="volverImagen(this)"
    onclick="clicImagen(this); mostrarDetalles('Bailoterapia', '50 minutos', 'Media', 'Tarde y Noche')">
</div>

<div class="clase">
    <h3>Yoga</h3>
    <p>Mejora tu flexibilidad y equilibrio mental.</p>
    <img src="imagenes/YOGA1.jpg" alt="foto_yoga"
    onmouseover="aumentarImagen(this)"
    onmouseout="volverImagen(this)"
    onclick="clicImagen(this); mostrarDetalles('Yoga', '60 minutos', 'Baja', 'Mañana y Tarde')">
</div>

<div class="clase">
    <h3>Jiu-Jitsu</h3>
    <p>Arte marcial para defensa personal y disciplina.</p>
    <img src="imagenes/JIU JITSU.jpg" alt="foto_jiujitsu"
    onmouseover="aumentarImagen(this)"
    onmouseout="volverImagen(this)"
    onclick="clicImagen(this); mostrarDetalles('Jiu-Jitsu', '75 minutos', 'Alta', 'Tarde y Noche')">
</div>

<div class="clase">
    <h3>Pilates</h3>
    <p>Enfocado en fortalecer el cuerpo de manera equilibrada.</p>
    <img src="imagenes/pilates1.jpg" alt="foto_pilates"
    onmouseover="aumentarImagen(this)"
    onmouseout="volverImagen(this)"
    onclick="clicImagen(this); mostrarDetalles('Pilates', '55 minutos', 'Media', 'Mañana y Tarde')">
</div>

</section>


<?php include("footer.php"); ?>
<script src="js/script.js"></script>
<div id="modalHorarios" class="modal">
    <div class="modal-contenido">
        <!--<span class="cerrar" onclick="cerrarModalHorarios()">&times;</span>-->
        <h2 id="modalTitulo"></h2>
        <p id="modalCuerpo"></p>
    </div>
</div>
</body>

</html>