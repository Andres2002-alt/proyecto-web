<?php
session_start();

include("conexion.php");
include("funciones.php");

if (!isset($_SESSION["id_cliente"])) {
    echo "<script>
            alert('Debes iniciar sesión para confirmar la membresía.');
            window.location='../login.php';
          </script>";
    exit();
}

// --- AJUSTE 1: VERIFICACIÓN DE PAYPAL ---
if (!isset($_GET['orderID'])) {
    echo "<script>
            alert('No se recibió la confirmación de pago de PayPal.');
            window.location='../inscripcion.php';
          </script>";
    exit();
}

if (!isset($_SESSION["id_plan"])) {
    echo "<script>
            alert('No se seleccionó ningún plan.');
            window.location='../inscripcion.php';
          </script>";
    exit();
}

$id_cliente = $_SESSION["id_cliente"];
$id_plan = $_SESSION["id_plan"];

$plan = consultarPlanPorId($conn, $id_plan);

if ($plan == null) {
    echo "<script>
            alert('El plan seleccionado no existe.');
            window.location='../inscripcion.php';
          </script>";
    exit();
}

$precio = $plan["precio"];
$duracion = $plan["duracion_dias"];

if ($duracion == null || $duracion == 0) {
    $duracion = 30;
}

$subtotal = $precio;
$iva = $subtotal * 0.15;
$total = $subtotal + $iva;

$fecha_inicio = date("Y-m-d");
$fecha_fin = date("Y-m-d", strtotime("+".$duracion." days"));
$estado_membresia = "Activa";

// --- DE PAYPAL ---
$orderID = $_GET['orderID']; 
$tipo_pago = "PayPal";
$metodo_pago = "Digital";
$estado_pago = "Aprobado";
$referencia = $orderID; 
// ----------------------------------------

mysqli_begin_transaction($conn);

try {

    $id_membresia = registrarMembresia(
        $conn,
        $id_cliente,
        $id_plan,
        $fecha_inicio,
        $fecha_fin,
        $estado_membresia
    );

    if ($id_membresia == 0) {
        throw new Exception("Error al registrar la membresía en la base de datos.");
    }

    $pagoRegistrado = registrarPagoMembresia(
        $conn,
        $id_cliente,
        $id_membresia,
        $tipo_pago,
        $metodo_pago,
        $total,
        $estado_pago,
        $referencia
    );

    if (!$pagoRegistrado) {
        throw new Exception("Error al registrar el pago de la membresía.");
    }

    mysqli_commit($conn);

    // Limpieza de sesión de la compra
    unset($_SESSION["id_plan"]);
    unset($_SESSION["nombre_plan"]);
    unset($_SESSION["precio_plan"]);
    unset($_SESSION["tipo_compra"]);
    unset($_SESSION["total_pago"]);

    header("Location: ../mensaje.php?status=success&type=membresia&ref=" . $referencia);
    exit();

} catch (Exception $e) {

    mysqli_rollback($conn);

    echo "<script>
            alert('Error al guardar la membresía: ".$e->getMessage()."');
            window.location='../inscripcion.php';
          </script>";
    exit();
}
?>