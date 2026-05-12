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

// --- AJUSTE 1: GUARDAR EL TOTAL EN SESIÓN ---
$_SESSION['total_pago'] = $total; 
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

            <div id="paypal-button-container" style="margin-top: 20px;"></div>

            <p class="texto-cambio-form" style="margin-top: 15px;">
                Tu compra se procesará de forma segura a través de PayPal.
            </p>
        </div>
    </section>
</main>

<?php include("footer.php"); ?>

<script src="https://www.paypal.com/sdk/js?client-id=AWlRuCsQyJzhXd7yhUrMinsRtEYqOW-44xBHKPZuMpmkpckQyEP5ge7fTVaBn6uWPZaw7zbXicNvcuXY&currency=USD"></script>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        // Formato estricto de PayPal (punto decimal)
                        value: '<?php echo number_format($total, 2, '.', ''); ?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // --- AJUSTE 2: REDIRIGIR CON EL ID DE ORDEN ---
                window.location.href = "php/confirmar_compra.php?orderID=" + data.orderID;
            });
        },
        onError: function(err) {
            console.error('Error PayPal:', err);
            alert('No se pudo completar el pago de la tienda.');
        }
    }).render('#paypal-button-container');
</script>

<script src="js/script.js"></script>
</body>
</html>