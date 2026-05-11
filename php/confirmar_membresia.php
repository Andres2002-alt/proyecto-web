<?php
session_start();
include("conexion.php");

if (!isset($_SESSION["id_cliente"])) {
    echo "<script>
            alert('Debes iniciar sesión para confirmar la membresía.');
            window.location='../login.php';
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

$sqlPlan = "SELECT precio, duracion_dias FROM plan WHERE id_plan = ?";
$stmtPlan = mysqli_prepare($conn, $sqlPlan);
mysqli_stmt_bind_param($stmtPlan, "i", $id_plan);
mysqli_stmt_execute($stmtPlan);
$resultadoPlan = mysqli_stmt_get_result($stmtPlan);

if (mysqli_num_rows($resultadoPlan) == 0) {
    echo "<script>
            alert('El plan seleccionado no existe.');
            window.location='../inscripcion.php';
          </script>";
    exit();
}

$plan = mysqli_fetch_assoc($resultadoPlan);

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

$tipo_pago = "Pendiente PayPal";
$estado_pago = "Pendiente";
$referencia = "PAGO-PENDIENTE";

mysqli_begin_transaction($conn);

try {

    $sqlMembresia = "INSERT INTO membresia(id_cliente, id_plan, fecha_inicio, fecha_fin, estado)
                     VALUES (?, ?, ?, ?, ?)";

    $stmtMembresia = mysqli_prepare($conn, $sqlMembresia);
    mysqli_stmt_bind_param(
        $stmtMembresia,
        "iisss",
        $id_cliente,
        $id_plan,
        $fecha_inicio,
        $fecha_fin,
        $estado_membresia
    );

    if (!mysqli_stmt_execute($stmtMembresia)) {
        throw new Exception(mysqli_error($conn));
    }

    $id_membresia = mysqli_insert_id($conn);

    $sqlPago = "INSERT INTO pago(id_cliente, id_membresia, tipo_pago, metodo_pago, monto, estado, referencia)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

    $metodo_pago = "PayPal Sandbox pendiente";

    $stmtPago = mysqli_prepare($conn, $sqlPago);
    mysqli_stmt_bind_param(
        $stmtPago,
        "iissdss",
        $id_cliente,
        $id_membresia,
        $tipo_pago,
        $metodo_pago,
        $total,
        $estado_pago,
        $referencia
    );

    if (!mysqli_stmt_execute($stmtPago)) {
        throw new Exception(mysqli_error($conn));
    }

    mysqli_commit($conn);

    unset($_SESSION["id_plan"]);
    unset($_SESSION["nombre_plan"]);
    unset($_SESSION["precio_plan"]);
    unset($_SESSION["tipo_compra"]);

    header("Location: ../mensaje.php");
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