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

// Verificamos que venga el ID de PayPal para asegurar que el pago se realizó
if (!isset($_GET['orderID'])) {
    echo "<script>
            alert('No se detectó un pago válido.');
            window.location='../tienda.php';
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

// --- PAYPAL ---
$orderID = $_GET['orderID']; // Capturamos el ID que viene de la URL
$estado_compra = "Pagado";   // Cambiamos de Pendiente a Pagado
$tipo_pago = "PayPal";       // Identificamos el origen
$metodo_pago = "Digital";    
$estado_pago = "Aprobado";   // El pago ya fue capturado por el JS
$referencia = $orderID;      // Usamos el ID de PayPal como referencia real
// ---------------------------

mysqli_begin_transaction($conn);

try {
    // 1. Registrar la cabecera de la compra
    $id_compra = registrarCompra(
        $conn,
        $id_cliente,
        $subtotal,
        $iva,
        $total,
        $estado_compra
    );

    if ($id_compra == 0) {
        throw new Exception("Error al crear la cabecera de compra.");
    }

    // 2. Registrar el detalle y actualizar stock
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
            throw new Exception("Error al registrar producto: " . $id_producto);
        }

        $stockActualizado = actualizarStockProducto($conn, $id_producto, $cantidad);

        if (!$stockActualizado) {
            throw new Exception("Error al actualizar stock del producto: " . $id_producto);
        }
    }

    // 3. Registrar el pago con la referencia de PayPal
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
        throw new Exception("Error al registrar el pago en la base de datos.");
    }

    mysqli_commit($conn);

    // Limpiamos la sesión solo si todo salió bien
    unset($_SESSION["carrito"]);
    unset($_SESSION["tipo_compra"]);

    header("Location: ../mensaje.php?status=success&ref=" . $referencia);
    exit();

} catch (Exception $e) {
    mysqli_rollback($conn);

    echo "<script>
            alert('Error en la transacción: " . $e->getMessage() . "');
            window.location='../carrito.php';
          </script>";
    exit();
}
?>