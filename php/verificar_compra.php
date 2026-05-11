<?php
session_start();

if (!isset($_SESSION["carrito"]) || count($_SESSION["carrito"]) == 0) {
    echo "<script>
            alert('Tu carrito está vacío.');
            window.location='../tienda.php';
          </script>";
    exit();
}

$_SESSION["tipo_compra"] = "tienda";

if (!isset($_SESSION["id_cliente"])) {
    $_SESSION["destino_pendiente"] = "pago_tienda.php";
    header("Location: ../login.php");
    exit();
}

header("Location: ../pago_tienda.php");
exit();
?>