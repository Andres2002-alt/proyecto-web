<?php
session_start();

include("conexion.php");
include("funciones.php");

$email = trim($_POST["email"]);
$clave = trim($_POST["clave"]);

if ($email == "" || $clave == "") {
    echo "<script>
            alert('Completa todos los campos.');
            window.location='../login.php';
          </script>";
    exit();
}

$cliente = consultarClientePorEmail($conn, $email);

if ($cliente == null) {
    echo "<script>
            alert('Correo o contraseña incorrectos.');
            window.location='../login.php';
          </script>";
    exit();
}

if (password_verify($clave, $cliente["clave"])) {

    $_SESSION["id_cliente"] = $cliente["id_cliente"];
    $_SESSION["nombre"] = $cliente["nombre"];
    $_SESSION["apellido"] = $cliente["apellido"];
    $_SESSION["email"] = $cliente["email"];

    if (isset($_SESSION["destino_pendiente"])) {
        $destino = $_SESSION["destino_pendiente"];
        unset($_SESSION["destino_pendiente"]);
        header("Location: ../" . $destino);
    } else {
        header("Location: ../indice.php");
    }

} else {
    echo "<script>
            alert('Correo o contraseña incorrectos.');
            window.location='../login.php';
          </script>";
}

exit();
?>