<?php
    session_start();
    include("conexion.php");

    $email = trim($_POST["email"]);
    $clave = trim($_POST["clave"]);

    if ($email == "" || $clave == "") {
        echo "<script>
                alert('Completa todos los campos.');
                window.location='../login.php';
              </script>";
        exit();
    }

    $sql = "SELECT id_cliente, nombre, apellido, email, clave 
            FROM cliente 
            WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 0) {
        echo "<script>
                alert('Correo o contraseña incorrectos.');
                window.location='../login.php';
              </script>";
        exit();
    }

    $fila = mysqli_fetch_assoc($resultado);

    if (password_verify($clave, $fila["clave"])) {

        $_SESSION["id_cliente"] = $fila["id_cliente"];
        $_SESSION["nombre"] = $fila["nombre"];
        $_SESSION["apellido"] = $fila["apellido"];
        $_SESSION["email"] = $fila["email"];

        if (isset($_SESSION["destino_pendiente"])) {
            $destino = $_SESSION["destino_pendiente"];
            unset($_SESSION["destino_pendiente"]);
            header("Location: ../" . $destino);
        } else {
            header("Location: ../index.php");
        }

    } else {
        echo "<script>
                alert('Correo o contraseña incorrectos.');
                window.location='../login.php';
              </script>";
    }

    exit();
?>