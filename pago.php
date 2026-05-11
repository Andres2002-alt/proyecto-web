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
<section class="registro">
    <h2>Formulario de Pago</h2>
    <p>Completa tus datos para finalizar tu compra.</p>

    <form id="formPago" onsubmit="finalizarPago(event)">
        <h3>Datos Personales</h3>

        <label>Nombre</label>
        <input type="text" required>

        <label>Apellido</label>
        <input type="text" required>

        <label for="cedulaPago">Cédula</label>
        <input type="text" id="cedulaPago" maxlength="10" required>

        <label>Cédula</label>
        <input type="text" required>

        <label>Email</label>
        <input type="email" required>

        <label>Número de celular</label>
        <input type="tel" required>

        <h3>Datos de Pago</h3>

        <label>Dirección de cobro</label>
        <input type="text" required>

        <label>Método de pago</label>
        <select required>
            <option>Tarjeta de crédito</option>
            <option>Tarjeta de débito</option>
            <option>Transferencia bancaria</option>
        </select>

        <label>Nombre en la tarjeta</label>
        <input type="text">

        <label>Número de tarjeta</label>
        <input type="text">

        <label>Fecha de expiración</label>
        <input type="month">

        <label>CVV</label>
        <input type="text">

        <button type="submit">Confirmar Pago</button>
    </form>
</section>
</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>
