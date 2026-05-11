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
            <h2>Crear cuenta</h2>
            <p>Regístrate para comprar productos, adquirir membresías y continuar con tus pagos.</p>
        </div>

        <form class="form-card form-login" onsubmit="registrarCliente(event)">

            <label for="nombreCliente">Nombre</label>
            <input type="text" id="nombreCliente" placeholder="Ingresa tu nombre" required>

            <label for="apellidoCliente">Apellido</label>
            <input type="text" id="apellidoCliente" placeholder="Ingresa tu apellido" required>

            <label for="emailCliente">Correo electrónico</label>
            <input type="email" id="emailCliente" placeholder="ejemplo@correo.com" required>

            <label for="celularCliente">Número de celular</label>
            <input type="tel" id="celularCliente" placeholder="0999999999" required>

            <label for="claveCliente">Contraseña</label>
            <input type="password" id="claveCliente" placeholder="Crea una contraseña" required>

            <label for="confirmarClaveCliente">Confirmar contraseña</label>
            <input type="password" id="confirmarClaveCliente" placeholder="Repite tu contraseña" required>

            <button type="submit">Crear cuenta</button>

            <p class="texto-cambio-form">
                ¿Ya tienes una cuenta?
                <a href="login.html">Inicia sesión aquí</a>
            </p>

        </form>

    </section>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>