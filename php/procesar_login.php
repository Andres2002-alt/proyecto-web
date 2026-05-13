<?php
    session_start();

    include("conexion.php");
    include("funciones.php");

    $email = trim($_POST["email"]);
    $clave = trim($_POST["clave"]);

    if ($email == "" || $clave == "") {
        $_SESSION["error_login"] = "Completa todos los campos.";
        $_SESSION["email_login"] = $email;

        header("Location: ../login.php");
        exit();
    }

    $cliente = consultarClientePorEmail($conn, $email);

    if ($cliente != null && password_verify($clave, $cliente["clave"])) {

        $_SESSION["id_cliente"] = $cliente["id_cliente"];
        $_SESSION["nombre"] = $cliente["nombre"];
        $_SESSION["apellido"] = $cliente["apellido"];
        $_SESSION["email"] = $cliente["email"];

        if (isset($_SESSION["destino_pendiente"])) {
            $destino = $_SESSION["destino_pendiente"];
            unset($_SESSION["destino_pendiente"]);

            header("Location: ../" . $destino);
            exit();
        }

        header("Location: ../indice.php");
        exit();

    } else {

        $_SESSION["error_login"] = "Correo o contraseña incorrectos.";
        $_SESSION["email_login"] = $email;

        header("Location: ../login.php");
        exit();
    }
?>