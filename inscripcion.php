<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inscripción - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<header class="navbar">

    <div class="logo">
        <a href="indice.html">
            <h1>PowerFit</h1>
        </a>
    </div>

    <nav class="menu">
        <ul>
            <li><a href="indice.html">Inicio</a></li>
            <li><a href="clases.html">Clases</a></li>
            <li><a href="instructores.html">Instructores</a></li>
            <li><a href="ubicaciones.html">Ubicaciones</a></li>
            <li><a href="tienda.html">Tienda</a></li>
        </ul>
    </nav>

    <div class="nav-derecha">

        <a href="login.html" class="icono-usuario" title="Iniciar sesión">
            <i class="fa-regular fa-user"></i>
        </a>

        <a href="carrito.html" class="botonCarrito" title="Carrito de compras">
            <i class="fa-solid fa-cart-shopping"></i>
            <span id="contador-carrito">0</span>
        </a>

        <a href="inscripcion.html" class="btn-gym">
            Inscríbete ya
        </a>

    </div>

</header>


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
</main>

<footer class="footer-powerfit">

    <div class="footer-col">
        <h3>Enlaces Rápidos</h3>
        <a href="indice.html">Inicio</a>
        <a href="clases.html">Clases</a>
        <a href="instructores.html">Instructores</a>
        <a href="ubicaciones.html">Ubicaciones</a>
        <a href="tienda.html">Tienda</a>
        <a href="inscripcion.html">Membresías</a>
    </div>

     <div class="footer-col">
        <h3>Contacto</h3>
        <p><strong>Tel:</strong> 0999999999</p>
        <p><strong>Email:</strong> powerfit@gmail.com</p>
        <p><strong>Dirección:</strong> Cuenca, Ecuador</p>
        <p><strong>Horario:</strong> Lunes a Sábado de 6:00 a 22:00</p>
    </div>

   <div class="footer-col">
    <h3>Síguenos</h3>

    <div class="redes-iconos">
        <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
        </a>

        <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
            <i class="bi bi-youtube"></i>
        </a>

        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <i class="bi bi-facebook"></i>
        </a>

        <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
            <i class="bi bi-tiktok"></i>
        </a>

        <a href="https://wa.me/593999999999" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
    </div>
</div>

    <div class="footer-bottom">
        <p>© 2026 PowerFit Gym. Todos los derechos reservados.</p>
    </div>

</footer>
<script src="js/script.js"></script>
</body>
</html>