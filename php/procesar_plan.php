<?php
session_start();

include("conexion.php");
include("funciones.php");

if (!isset($_POST["id_plan"])) {
    header("Location: ../inscripcion.php");
    exit();
}

$id_plan = $_POST["id_plan"];

$plan = consultarPlanPorId($conn, $id_plan);

if ($plan == null) {
    echo "<script>
            alert('El plan seleccionado no existe.');
            window.location='../inscripcion.php';
          </script>";
    exit();
}

$_SESSION["id_plan"] = $plan["id_plan"];
$_SESSION["nombre_plan"] = $plan["nombre"];
$_SESSION["precio_plan"] = $plan["precio"];
$_SESSION["tipo_compra"] = "membresia";

if (!isset($_SESSION["id_cliente"])) {
    $_SESSION["destino_pendiente"] = "pago.php";
    header("Location: ../login.php");
    exit();
}

header("Location: ../pago.php");
exit();
?>