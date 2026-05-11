<?php
session_start();

include("conexion.php");
include("funciones.php");

/*
    Acepta id_producto por POST o GET.
    Así funciona desde tarjetas normales y desde el modal.
*/
$id_producto = 0;

if (isset($_POST["id_producto"]) && $_POST["id_producto"] != "") {
    $id_producto = intval($_POST["id_producto"]);
} else if (isset($_GET["id_producto"]) && $_GET["id_producto"] != "") {
    $id_producto = intval($_GET["id_producto"]);
}

if ($id_producto <= 0) {
    echo "<script>
            alert('No se recibió el producto.');
            window.location='../tienda.php';
          </script>";
    exit();
}

$cantidad = 1;

if (isset($_POST["cantidad"]) && $_POST["cantidad"] != "") {
    $cantidad = intval($_POST["cantidad"]);
} else if (isset($_GET["cantidad"]) && $_GET["cantidad"] != "") {
    $cantidad = intval($_GET["cantidad"]);
}

if ($cantidad <= 0) {
    $cantidad = 1;
}

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

if ($cantidad > $producto["stock"]) {
    echo "<script>
            alert('No hay suficiente stock disponible.');
            window.location='../tienda.php';
          </script>";
    exit();
}

agregarProductoAlCarrito($producto, $cantidad);

header("Location: ../carrito.php");
exit();
?>