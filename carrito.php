<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body onload="mostrarCarrito()">

<?php include("header.php"); ?>
<main>

    <section class="carrito carrito-layout">

        <h2>Carrito de compras</h2>

        <div class="carrito-contenido">

            <div class="tabla-carrito-contenedor">

                <table class="tabla-carrito">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="tablaCarrito">
                    </tbody>
                </table>

            </div>

            <aside class="resumen-compra">
                <h3>Resumen de compra</h3>

                <div class="fila-resumen">
                    <span>Subtotal</span>
                    <strong id="subtotalCompra">$0.00</strong>
                </div>

                <div class="fila-resumen">
                    <span>IVA 15%</span>
                    <strong id="ivaCompra">$0.00</strong>
                </div>

                <div class="fila-resumen total-final">
                    <span>Total</span>
                    <strong id="totalCompra">$0.00</strong>
                </div>

                <button onclick="irAlPago()" class="btn-pago">
                    Continuar al pago
                </button>
            </aside>

        </div>

    </section>

</main>

    <?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>