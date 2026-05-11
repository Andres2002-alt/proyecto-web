<?php
session_start();

include("conexion.php");
include("funciones.php");

$nombre = trim($_POST["nombre"]);
$apellido = trim($_POST["apellido"]);
$email = trim($_POST["email"]);
$celular = trim($_POST["celular"]);
$clave = trim($_POST["clave"]);
$confirmarClave = trim($_POST["confirmar_clave"]);

if ($nombre == "" || $apellido == "" || $email == "" || $celular == "" || $clave == "" || $confirmarClave == "") {
    echo "<script>
            alert('Completa todos los campos.');
            window.location='../registro.php';
          </script>";
    exit();
}

if ($clave != $confirmarClave) {
    echo "<script>
            alert('Las contraseñas no coinciden.');
            window.location='../registro.php';
          </script>";
    exit();
}

$clienteExistente = consultarClientePorEmail($conn, $email);

if ($clienteExistente != null) {
    echo "<script>
            alert('Ese correo ya está registrado.');
            window.location='../registro.php';
          </script>";
    exit();
}

$claveHash = password_hash($clave, PASSWORD_DEFAULT);

$id_cliente = registrarCliente($conn, $nombre, $apellido, $email, $celular, $claveHash);

if ($id_cliente > 0) {

    $_SESSION["id_cliente"] = $id_cliente;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["apellido"] = $apellido;
    $_SESSION["email"] = $email;

    if (isset($_SESSION["destino_pendiente"])) {
        $destino = $_SESSION["destino_pendiente"];
        unset($_SESSION["destino_pendiente"]);
        header("Location: ../" . $destino);
    } else {
        header("Location: ../indice.php");
    }

} else {
    echo "<script>
            alert('Error al registrar usuario.');
            window.location='../registro.php';
          </script>";
}

exit();
?>