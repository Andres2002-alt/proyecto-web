<?php
session_start();
include("conexion.php"); // Correcto: están en la misma carpeta

if (!isset($_SESSION["id_cliente"])) {
    header("Location: ../login.php");
    exit();
}

$id_cliente = $_SESSION["id_cliente"];
$nombre = trim($_POST["nombre"]);
$apellido = trim($_POST["apellido"]);
$celular = trim($_POST["celular"]);
$clave = trim($_POST["clave"]);

if ($nombre == "" || $apellido == "" || $celular == "") {
    echo "<script>
            alert('Por favor, completa los campos obligatorios.');
            window.location='../editar_perfil.php';
          </script>";
    exit();
}

if (empty($clave)) {
    $sql = "UPDATE cliente SET nombre = ?, apellido = ?, celular = ? WHERE id_cliente = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nombre, $apellido, $celular, $id_cliente);
} else {
    $claveHash = password_hash($clave, PASSWORD_DEFAULT);
    $sql = "UPDATE cliente SET nombre = ?, apellido = ?, celular = ?, clave = ? WHERE id_cliente = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $apellido, $celular, $claveHash, $id_cliente);
}

if (mysqli_stmt_execute($stmt)) {
    $_SESSION["nombre"] = $nombre; // Actualiza el nombre en el header
    echo "<script>
            window.location='../mi-cuenta.php'; // 
          </script>";
} else {
    echo "<script>
            alert('Error al actualizar los datos.');
            window.location='../editar_perfil.php';
          </script>";
}
exit();
?>