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

    <section class="login-contenedor login-simple">

        <div class="login-info">
            <h2>Iniciar sesión</h2>
            <p>Accede a tu cuenta para continuar con tu inscripción, compra o pago.</p>
        </div>

        <form class="form-card form-login" onsubmit="iniciarSesion(event)">

            <label for="correoLogin">Correo electrónico</label>
            <input type="email" id="correoLogin" placeholder="ejemplo@correo.com" required>

            <label for="claveLogin">Contraseña</label>
            <input type="password" id="claveLogin" placeholder="Ingresa tu contraseña" required>

            <button type="submit">Entrar</button>

            <p class="texto-cambio-form">
                ¿No tienes una cuenta?
                <a href="registro.html">Regístrate aquí</a>
            </p>

        </form>

    </section>

</main>

<footer class="footer-powerfit">

    <div class="footer-col">
        <h3>Enlaces rápidos</h3>
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
        <p><strong>Horario:</strong> Lunes a sábado de 6:00 a 22:00</p>
    </div>

    <div class="footer-col">
        <h3>Síguenos</h3>
        <div class="redes-iconos">
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                <i class="fa-brands fa-youtube"></i>
            </a>

            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                <i class="fa-brands fa-facebook-f"></i>
            </a>

            <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                <i class="fa-brands fa-tiktok"></i>
            </a>

            <a href="https://wa.me/593999999999" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
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