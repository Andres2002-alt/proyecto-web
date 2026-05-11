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

<header class="navbar">

    <div class="logo">
        <a href="indice.php">
            <h1>PowerFit</h1>
        </a>
    </div>

    <nav class="menu">
        <ul>
            <li><a href="indice.php">Inicio</a></li>
            <li><a href="clases.php">Clases</a></li>
            <li><a href="instructores.php">Instructores</a></li>
            <li><a href="ubicaciones.php">Ubicaciones</a></li>
            <li><a href="tienda.php">Tienda</a></li>
        </ul>
    </nav>

    <div class="nav-derecha">

        <a href="login.php" class="icono-usuario" title="Iniciar sesión">
            <i class="fa-regular fa-user"></i>
        </a>

        <div class="icono-carrito">
            <a href="carrito.php" class="botonCarrito">
                <i class="fa-solid fa-cart-shopping"></i>
                <span id="contador-carrito">0</span>
            </a>
        </div>

        <div id="estadoSesion" class="estado-sesion"></div>

        <a href="inscripcion.php" class="btn-gym">
            Inscríbete ya
        </a>

    </div>

</header>



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