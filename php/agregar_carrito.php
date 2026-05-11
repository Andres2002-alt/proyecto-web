<?php
session_start();

include("conexion.php");
include("funciones.php");

if (!isset($_POST["id_producto"])) {
    header("Location: ../tienda.php");
    exit();
}

$id_producto = $_POST["id_producto"];

$producto = consultarProductoPorId($conn, $id_producto);

if ($producto == null) {
    echo "<script>
            alert('El producto no existe.');
            window.location='../tienda.php';
          </script>";
    exit();
}

if ($producto["stock"] <= 0) {
    echo "<script>
            alert('Producto sin stock disponible.');
            window.location='../tienda.php';
          </script>";
    exit();
}

agregarProductoAlCarrito($producto);

header("Location: ../carrito.php");
exit();
?>