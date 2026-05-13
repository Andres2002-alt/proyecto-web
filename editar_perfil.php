<?php
    session_start();
    include("php/conexion.php"); // Conectamos a la base de datos

    // Verificamos que el usuario tenga la sesión iniciada
    if (!isset($_SESSION["id_cliente"])) {
        header("Location: login.php");
        exit();
    }

    $id_cliente = $_SESSION["id_cliente"];

    // Consultamos los datos actuales del usuario
    $sql = "SELECT nombre, apellido, email, celular FROM cliente WHERE id_cliente = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_cliente);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $datos = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Perfil - PowerFit Gym</title>
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
            <h2>Editar información</h2>
            <p>Actualiza tus datos personales. Por seguridad, el correo no puede ser modificado.</p>
        </div>

        <form id="formEditarCuenta" class="form-card form-login" action="php/procesar_edicion.php" method="POST">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($datos['nombre']); ?>" required>

            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($datos['apellido']); ?>" required>

            <!-- CAMPO BLOQUEADO (Readonly) -->
            <label for="email">Correo electrónico (No editable)</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($datos['email']); ?>" readonly style="background-color: #e9ecef; color: #6c757d; cursor: not-allowed;">

            <label for="celular">Número de celular</label>
            <input type="tel" id="celular" name="celular" value="<?php echo htmlspecialchars($datos['celular']); ?>" required>

            <!-- LA CONTRASEÑA ES OPCIONAL AL EDITAR -->
            <label for="clave">Nueva Contraseña (Opcional)</label>
            <input type="password" id="clave" name="clave" placeholder="Déjalo en blanco para mantener la actual">

            <button type="submit">Guardar cambios</button>

            <p class="texto-cambio-form">
                <a href="php/mi-cuenta.php">Cancelar y volver a Mi Cuenta</a>
            </p>

        </form>

    </section>
</main>

<?php include("footer.php"); ?>

<script src="js/script.js?v=300"></script>
</body>
</html>