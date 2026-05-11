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

        <form class="form-card form-login" action="php/procesar_registro.php" method="POST">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Ingresa tu nombre" required name="nombre">

            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" placeholder="Ingresa tu apellido" required name="apellido">

            <label for="email">Correo electrónico</label>
            <input type="email" id="email" placeholder="ejemplo@correo.com" required name="email">

            <label for="celular">Número de celular</label>
            <input type="tel" id="celular" placeholder="0999999999" required name="celular">

            <label for="clave">Contraseña</label>
            <input type="password" id="clave" placeholder="Crea una contraseña" required name="clave">

            <label for="confirmarClave">Confirmar contraseña</label>
            <input type="password" id="confirmarClave" placeholder="Repite tu contraseña" required name="confirmarClave">


            <button type="submit">Crear cuenta</button>

            <p class="texto-cambio-form">
                ¿Ya tienes una cuenta?
                <a href="login.php">Inicia sesión aquí</a>
            </p>

        </form>

    </section>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>