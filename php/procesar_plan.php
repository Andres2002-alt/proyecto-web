<?php
    session_start();
    include("conexion.php");

    if (!isset($_POST["id_plan"])) {
        header("Location: ../inscripcion.php");
        exit();
    }

    $id_plan = $_POST["id_plan"];

    /* Verificamos que el plan exista en la base de datos */
    $sql = "SELECT id_plan, nombre, precio FROM plan WHERE id_plan = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_plan);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 0) {
        echo "<script>
                alert('El plan seleccionado no existe.');
                window.location='../inscripcion.php';
              </script>";
        exit();
    }

    $plan = mysqli_fetch_assoc($resultado);

    /* Guardamos el plan en sesión */
    $_SESSION["id_plan"] = $plan["id_plan"];
    $_SESSION["nombre_plan"] = $plan["nombre"];
    $_SESSION["precio_plan"] = $plan["precio"];
    $_SESSION["tipo_compra"] = "membresia";

    /* Si el usuario no inició sesión, primero debe loguearse */
    if (!isset($_SESSION["id_cliente"])) {
        $_SESSION["destino_pendiente"] = "pago.php";
        header("Location: ../login.php");
        exit();
    }

    /* Si ya inició sesión, va directo al pago */
    header("Location: ../pago.php");
    exit();
    ?>