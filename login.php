<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("header.php"); ?>

<main>

    <section class="login-contenedor login-simple">

        <div class="login-info">
            <h2>Iniciar sesión</h2>
            <p>Accede a tu cuenta para continuar con tu inscripción, compra o pago.</p>
        </div>

        <form class="form-card form-login" action="php/procesar_login.php" method="POST">

            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>

            <label for="clave">Contraseña</label>
            <input type="password" id="clave" name="clave" placeholder="Ingresa tu contraseña" required>

            <button type="submit">Entrar</button>

            <p class="texto-cambio-form">
                ¿No tienes una cuenta?
                <a href="registro.php">Regístrate aquí</a>
            </p>

        </form>

    </section>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>