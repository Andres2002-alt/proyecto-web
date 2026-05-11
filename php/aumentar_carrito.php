<?php
session_start();

include("funciones.php");

if (isset($_GET["id_producto"])) {
    $id_producto = $_GET["id_producto"];
    aumentarProductoCarrito($id_producto);
}

header("Location: ../carrito.php");
exit();
?>