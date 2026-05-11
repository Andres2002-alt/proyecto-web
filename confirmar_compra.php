<?php
session_start();

include("conexion.php");
include("funciones.php");

if (!isset($_SESSION["id_cliente"])) {
    echo "<script>
            alert('Debes iniciar sesión.');
            window.location='../login.php';
          </script>";
    exit();
}

if (!isset($_SESSION["carrito"]) || count($_SESSION["carrito"]) == 0) {
    echo "<script>
            alert('Tu carrito está vacío.');
            window.location='../tienda.php';
          </script>";
    exit();
}

$id_cliente = $_SESSION["id_cliente"];
$carrito = obtenerCarrito();

$subtotal = calcularSubtotalCarrito();
$iva = calcularIvaCarrito();
$total = calcularTotalCarrito();

$estado_compra = "Pendiente";
$tipo_pago = "Pendiente PayPhone";
$metodo_pago = "Pasarela pendiente";
$estado_pago = "Pendiente";
$referencia = "PAGO-PENDIENTE";

mysqli_begin_transaction($conn);

try {

    $id_compra = registrarCompra(
        $conn,
        $id_cliente,
        $subtotal,
        $iva,
        $total,
        $estado_compra
    );

    if ($id_compra == 0) {
        throw new Exception(mysqli_error($conn));
    }

    foreach ($carrito as $producto) {

        $id_producto = $producto["id_producto"];
        $precio_unitario = $producto["precio"];
        $cantidad = $producto["cantidad"];
        $subtotal_producto = $precio_unitario * $cantidad;

        $detalleRegistrado = registrarDetalleCompra(
            $conn,
            $id_compra,
            $id_producto,
            $precio_unitario,
            $cantidad,
            $subtotal_producto
        );

        if (!$detalleRegistrado) {
            throw new Exception(mysqli_error($conn));
        }

        $stockActualizado = actualizarStockProducto($conn, $id_producto, $cantidad);

        if (!$stockActualizado) {
            throw new Exception(mysqli_error($conn));
        }
    }

    $pagoRegistrado = registrarPagoCompra(
        $conn,
        $id_cliente,
        $id_compra,
        $tipo_pago,
        $metodo_pago,
        $total,
        $estado_pago,
        $referencia
    );

    if (!$pagoRegistrado) {
        throw new Exception(mysqli_error($conn));
    }

    mysqli_commit($conn);

    unset($_SESSION["carrito"]);
    unset($_SESSION["tipo_compra"]);

    header("Location: ../mensaje.php");
    exit();

} catch (Exception $e) {

    mysqli_rollback($conn);

    echo "<script>
            alert('Error al guardar la compra: ".$e->getMessage()."');
            window.location='../carrito.php';
          </script>";
    exit();
}
?>