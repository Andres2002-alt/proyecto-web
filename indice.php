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

    <section class="hero">
        <div class="hero-slider" id="heroSlider">

            <div class="hero-slide">
                <img src="imagenes/hero1.png" alt="Entrenamiento en PowerFit">
            </div>

            <div class="hero-slide">
                <img src="imagenes/hero2.png" alt="Clases grupales en PowerFit">
            </div>

            <div class="hero-slide">
                <img src="imagenes/hero3.png" alt="Zona de pesas PowerFit">
            </div>

            <div class="hero-slide">
                <img src="imagenes/hero4.png" alt="Entrenamiento funcional en PowerFit">
            </div>

            <div class="hero-slide">
                <img src="imagenes/hero1.png" alt="Entrenamiento en PowerFit">
            </div>

        </div>

        <div class="hero-overlay"></div>

        <div class="hero-contenido">
            <h2>Tu mejor versión empieza hoy</h2>
            <p>Fuerza, disciplina y resultados reales</p>
        </div>
    </section>

    <section class="planes planes-inicio">

        <h2>Planes de membresía</h2>
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

                <button onclick="seleccionarPlan('Plan Esencial', 25)">
                    Comenzar ahora
                </button>
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

                <button onclick="seleccionarPlan('Plan Activo', 40)">
                    Inscribirse
                </button>
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

                <button onclick="seleccionarPlan('Plan Elite', 60)">
                    Unirme al Elite
                </button>
            </div>

        </div>

    </section>

    <section class="sobre">

        <div class="sobre-contenedor">

            <div class="sobre-titulo">
                <h2>
                    Somos un gimnasio dedicado a la salud y al bienestar
                </h2>
            </div>

            <div class="sobre-texto">
                <p>
                    PowerFit Gym es un espacio dedicado al bienestar físico y mental.
                    Ofrecemos entrenamiento personalizado, clases grupales y equipos
                    de última generación para ayudarte a alcanzar tus objetivos.
                </p>
            </div>

        </div>

    </section>

    <section class="carrusel-instalaciones">

        <h2>Nuestras instalaciones</h2>
        <p>Conoce los espacios donde entrenarás cada día.</p>

        <div class="carrusel">

            <button class="btn-carrusel anterior" onclick="cambiarImagen(-1)">
                &#10094;
            </button>

            <img id="imagenCarrusel" src="imagenes/instalacion1.jpg" alt="Instalaciones del gimnasio">

            <button class="btn-carrusel siguiente" onclick="cambiarImagen(1)">
                &#10095;
            </button>

        </div>

    </section>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>