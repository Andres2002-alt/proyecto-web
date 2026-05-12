<?php
session_start();

include("funciones.php"); 

if (!isset($_SESSION["carrito"]) || count($_SESSION["carrito"]) == 0) {
    echo "<script>
            alert('Tu carrito está vacío.');
            window.location='../tienda.php';
          </script>";
    exit();
}

// Definimos el tipo de compra para que el resto del sistema sepa qué procesar
$_SESSION["tipo_compra"] = "tienda";

// --- MEJORA: Calcular el total y guardarlo en sesión desde ahora ---
// Esto asegura que cuando llegues a pago_tienda.php, el monto ya esté listo.
$_SESSION["total_pago"] = calcularTotalCarrito();

if (!isset($_SESSION["id_cliente"])) {
    // Si no está logueado, lo mandamos al login y recordamos que quería ir a pagar la tienda
    $_SESSION["destino_pendiente"] = "pago_tienda.php";
    header("Location: ../login.php");
    exit();
}

// Si todo está bien, saltamos a la página donde está el botón de PayPal
header("Location: ../pago_tienda.php");
exit();
?>