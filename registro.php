<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css?v=600">
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

        <form id="formCrearCuenta" class="form-card form-login" action="php/procesar_registro.php" method="POST" onsubmit="return validarRegistro(this)">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Ingresa tu nombre" name="nombre">
            <span class="mensaje-error-campo" id="errorNombre"></span>

            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" placeholder="Ingresa tu apellido" name="apellido">
            <span class="mensaje-error-campo" id="errorApellido"></span>

            <label for="email">Correo electrónico</label>
            <input type="email" id="email" placeholder="ejemplo@correo.com" name="email">
            <span class="mensaje-error-campo" id="errorEmail"></span>

            <label for="celular">Número de celular</label>
            <input type="tel" id="celular" placeholder="0999999999" name="celular">
            <span class="mensaje-error-campo" id="errorCelular"></span>

            <label for="clave">Contraseña</label>
            <input type="password" id="clave" placeholder="Crea una contraseña" name="clave">
            <span class="mensaje-error-campo" id="errorClave"></span>

            <label for="confirmarClave">Confirmar contraseña</label>
            <input type="password" id="confirmarClave" placeholder="Repite tu contraseña" name="confirmarClave">
            <span class="mensaje-error-campo" id="errorConfirmarClave"></span>

            <button type="submit">Crear cuenta</button>

            <p class="texto-cambio-form">
                ¿Ya tienes una cuenta?
                <a href="login.php">Inicia sesión aquí</a>
            </p>

        </form>

    </section>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js?v=300"></script>
</body>
</html>