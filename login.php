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

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>