<?php
session_start();
include("php/conexion.php");

if (!isset($_SESSION["id_cliente"])) {
    $_SESSION["destino_pendiente"] = "pago.php";
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION["tipo_compra"])) {
    echo "<script>
            alert('No hay una compra pendiente.');
            window.location='index.php';
          </script>";
    exit();
}

$subtotal = 0;
$iva = 0;
$total = 0;
$descripcionCompra = "";
$nombrePlan = "";

if ($_SESSION["tipo_compra"] == "membresia") {

    if (!isset($_SESSION["id_plan"])) {
        echo "<script>
                alert('No se seleccionó ningún plan.');
                window.location='inscripcion.php';
              </script>";
        exit();
    }

    $id_plan = $_SESSION["id_plan"];

    $sql = "SELECT id_plan, nombre, precio, duracion_dias 
            FROM plan 
            WHERE id_plan = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_plan);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 0) {
        echo "<script>
                alert('El plan seleccionado no existe.');
                window.location='inscripcion.php';
              </script>";
        exit();
    }

    $plan = mysqli_fetch_assoc($resultado);

    $nombrePlan = $plan["nombre"];
    $subtotal = $plan["precio"];
    $iva = $subtotal * 0.15;
    $total = $subtotal + $iva;
    $descripcionCompra = "Membresía: " . $plan["nombre"];

} else {
    echo "<script>
            alert('Por ahora el pago está configurado para membresías. Luego se migrará tienda/carrito.');
            window.location='index.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pago - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<?php include("header.php"); ?>

<main>

    <section class="login-contenedor login-simple">

        <div class="login-info">
            <h2>Resumen de pago</h2>
            <p>Revisa los datos de tu membresía antes de confirmar.</p>
        </div>

        <div class="form-card form-login">

            <h3>Detalle de la compra</h3>

            <p>
                <strong>Cliente:</strong>
                <?php echo $_SESSION["nombre"] . " " . $_SESSION["apellido"]; ?>
            </p>

            <p>
                <strong>Correo:</strong>
                <?php echo $_SESSION["email"]; ?>
            </p>

            <p>
                <strong>Compra:</strong>
                <?php echo $descripcionCompra; ?>
            </p>

            <p>
                <strong>Subtotal:</strong>
                $<?php echo number_format($subtotal, 2); ?>
            </p>

            <p>
                <strong>IVA 15%:</strong>
                $<?php echo number_format($iva, 2); ?>
            </p>

            <p>
                <strong>Total:</strong>
                $<?php echo number_format($total, 2); ?>
            </p>

            <form action="php/confirmar_membresia.php" method="POST">
                <button type="submit">
                    Confirmar membresía
                </button>
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