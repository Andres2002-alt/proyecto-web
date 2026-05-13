<?php
session_start();
include("conexion.php");

// Verificamos sesión
if (!isset($_SESSION["id_cliente"])) {
    header("Location: ../login.php");
    exit();
}

$id_cliente = $_SESSION["id_cliente"];
$nombre = trim($_POST["nombre"]);
$apellido = trim($_POST["apellido"]);
$celular = trim($_POST["celular"]);
$clave = trim($_POST["clave"]);

// Validación básica
if ($nombre == "" || $apellido == "" || $celular == "") {
    echo "<script>
            alert('Por favor, completa los campos obligatorios.');
            window.location='../editar_perfil.php';
          </script>";
    exit();
}

// Lógica de actualización (Con o sin contraseña nueva)
if (empty($clave)) {
    // Si la clave está vacía, NO la actualizamos en la base de datos
    $sql = "UPDATE cliente SET nombre = ?, apellido = ?, celular = ? WHERE id_cliente = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nombre, $apellido, $celular, $id_cliente);
} else {
    // Si escribió una clave, la encriptamos y la actualizamos
    $claveHash = password_hash($clave, PASSWORD_DEFAULT);
    $sql = "UPDATE cliente SET nombre = ?, apellido = ?, celular = ?, clave = ? WHERE id_cliente = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $apellido, $celular, $claveHash, $id_cliente);
}

// Ejecutamos la consulta preparada
if (mysqli_stmt_execute($stmt)) {
    // Actualizamos la variable de sesión para que el header refleje el cambio de nombre
    $_SESSION["nombre"] = $nombre;
    
    echo "<script>
            alert('Tus datos han sido actualizados correctamente.');
            window.location='../php/mi-cuenta.php';
          </script>";
} else {
    echo "<script>
            alert('Error al actualizar los datos.');
            window.location='../editar_perfil.php';
          </script>";
}

exit();
?>