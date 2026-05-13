<?php
    session_start();    


    include("php/funciones.php");

    $carrito = obtenerCarrito();
    $subtotal = calcularSubtotalCarrito();
    $iva = calcularIvaCarrito();
    $total = calcularTotalCarrito();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css?v=2000">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

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

                    <tbody>

                    <?php if (count($carrito) == 0) { ?>

                    <tr>
                        <td colspan="5" class="carrito-vacio">
                            Tu carrito está vacío.
                        </td>
                    </tr>

                    <?php } else { ?>

                    <?php foreach ($carrito as $producto) { ?>

                        <tr>
                            <td><?php echo $producto["nombre"]; ?></td>

                            <td>
                                <div class="cantidad-carrito">
                                    <a href="php/disminuir_carrito.php?id_producto=<?php echo $producto["id_producto"]; ?>">
                                        <button type="button" class="btn-cantidad">-</button>
                                    </a>

                                    <span><?php echo $producto["cantidad"]; ?></span>

                                    <a href="php/aumentar_carrito.php?id_producto=<?php echo $producto["id_producto"]; ?>">
                                        <button type="button" class="btn-cantidad">+</button>
                                    </a>
                                </div>
                            </td>

                            <td>$<?php echo number_format($producto["precio"], 2); ?></td>

                            <td>
                                $<?php echo number_format($producto["precio"] * $producto["cantidad"], 2); ?>
                            </td>

                            <td>
                                <a href="php/eliminar_carrito.php?id_producto=<?php echo $producto["id_producto"]; ?>">
                                    <button type="button" class="btn-eliminar">Eliminar</button>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                <?php } ?>

            </tbody>

            </table>

            </div>

           <aside class="resumen-compra">
            <h3>Resumen de compra</h3>

            <div class="fila-resumen">
                <span>Subtotal</span>
                <strong>$<?php echo number_format($subtotal, 2); ?></strong>
            </div>

            <div class="fila-resumen">
                <span>IVA 15%</span>
                <strong>$<?php echo number_format($iva, 2); ?></strong>
            </div>

            <div class="fila-resumen total-final">
                <span>Total</span>
                <strong>$<?php echo number_format($total, 2); ?></strong>
            </div>

            <a href="php/verificar_compra.php">
                <button type="button" class="btn-pago">
                    Continuar al pago
                </button>
            </a>
        </aside>

        </div>

    </section>

</main>

    <?php include("footer.php"); ?>

<script src="js/script.js?v=2000"></script>
</body>
</html>