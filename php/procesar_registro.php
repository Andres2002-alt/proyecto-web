<?php
    session_start();
    include("conexion.php");

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

    $sqlVerificar = "SELECT id_cliente FROM cliente WHERE email = ?";
    $stmtVerificar = mysqli_prepare($conn, $sqlVerificar);
    mysqli_stmt_bind_param($stmtVerificar, "s", $email);
    mysqli_stmt_execute($stmtVerificar);
    $resultado = mysqli_stmt_get_result($stmtVerificar);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<script>
                alert('Ese correo ya está registrado.');
                window.location='../registro.php';
              </script>";
        exit();
    }

    $claveHash = password_hash($clave, PASSWORD_DEFAULT);

    $sql = "INSERT INTO cliente(nombre, apellido, email, celular, clave)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nombre, $apellido, $email, $celular, $claveHash);

    if (mysqli_stmt_execute($stmt)) {

        $_SESSION["id_cliente"] = mysqli_insert_id($conn);
        $_SESSION["nombre"] = $nombre;
        $_SESSION["apellido"] = $apellido;
        $_SESSION["email"] = $email;

        if (isset($_SESSION["destino_pendiente"])) {
            $destino = $_SESSION["destino_pendiente"];
            unset($_SESSION["destino_pendiente"]);
            header("Location: ../" . $destino);
        } else {
            header("Location: ../index.php");
        }

    } else {
        echo "<script>
                alert('Error al registrar usuario.');
                window.location='../registro.php';
              </script>";
    }

    exit();
?>