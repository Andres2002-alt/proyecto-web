<?php
session_start();

include("php/funciones.php");

if (!isset($_SESSION["id_cliente"])) {
    $_SESSION["destino_pendiente"] = "pago_tienda.php";
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["carrito"]) || count($_SESSION["carrito"]) == 0) {
    echo "<script>
            alert('Tu carrito está vacío.');
            window.location='tienda.php';
          </script>";
    exit();
}

$carrito = obtenerCarrito();
$subtotal = calcularSubtotalCarrito();
$iva = calcularIvaCarrito();
$total = calcularTotalCarrito();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pago de tienda - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php include("header.php"); ?>

<main>

    <section class="login-contenedor login-simple">

        <div class="login-info">
            <h2>Resumen de compra</h2>
            <p>Revisa los productos antes de confirmar la compra.</p>
        </div>

        <div class="form-card form-login">

            <h3>Detalle de productos</h3>

            <?php foreach ($carrito as $producto) { ?>
                <p>
                    <strong><?php echo $producto["nombre"]; ?></strong>
                    x <?php echo $producto["cantidad"]; ?>
                    -
                    $<?php echo number_format($producto["precio"] * $producto["cantidad"], 2); ?>
                </p>
            <?php } ?>

            <hr>

            <p><strong>Subtotal:</strong> $<?php echo number_format($subtotal, 2); ?></p>
            <p><strong>IVA 15%:</strong> $<?php echo number_format($iva, 2); ?></p>
            <p><strong>Total:</strong> $<?php echo number_format($total, 2); ?></p>

            <form action="php/confirmar_compra.php" method="POST">
                <button type="submit">Confirmar compra</button>
            </form>

            <p class="texto-cambio-form">
                El pago será registrado temporalmente como pendiente hasta integrar la pasarela de pago.
            </p>

        </div>

    </section>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>