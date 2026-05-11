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

<section class="planes">

    <h2>Planes de Membresía</h2>
    <p>Elige el plan que mejor se adapte a tus objetivos</p>

    <div class="contenedor-planes">

        <div class="plan">
            <h3>Plan Esencial</h3>
            <p class="plan-frase">Tu primer paso al fitness</p>

            <ul class="lista-plan">
                <li>Acceso ilimitado al gimnasio</li>
                <li>Uso de máquinas y zona de pesas</li>
                <li>Asesoría inicial con instructor</li>
                <li>Horario flexible: lunes a sábado</li>
            </ul>

            <p class="precio-plan">$25 + IVA / mes</p>

            <form action="php/procesar_plan.php" method="POST">
                <input type="hidden" name="id_plan" value="1">
                <button type="submit">Comenzar ahora</button>
            </form>
        </div>

        <div class="plan destacado">
            <h3>Plan Activo</h3>
            <p class="plan-frase">Entrena, diviértete y progresa</p>

            <ul class="lista-plan">
                <li>Gimnasio + clases grupales</li>
                <li>Boxeo, spinning, yoga y bailoterapia</li>
                <li>Seguimiento básico de tu progreso</li>
                <li>Ambiente dinámico y motivador</li>
            </ul>

            <p class="precio-plan">$40 + IVA / mes</p>

            <form action="php/procesar_plan.php" method="POST">
                <input type="hidden" name="id_plan" value="2">
                <button type="submit">Inscribirse</button>
            </form>
        </div>

        <div class="plan premium">
            <h3>Plan Elite</h3>
            <p class="plan-frase">Transforma tu cuerpo y mente</p>

            <ul class="lista-plan">
                <li>Acceso total al gimnasio y clases</li>
                <li>Entrenador personal dedicado</li>
                <li>Rutina personalizada por objetivos</li>
                <li>Control avanzado de progreso</li>
            </ul>

            <p class="precio-plan">$60 + IVA / mes</p>

            <form action="php/procesar_plan.php" method="POST">
                <input type="hidden" name="id_plan" value="3">
                <button type="submit">Unirme al Elite</button>
            </form>
        </div>

    </div>

</section>
</main>

<?php include("footer.php"); ?>
<script src="js/script.js"></script>
</body>
</html>