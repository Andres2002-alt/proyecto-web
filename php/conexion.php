<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "powerfit";

$conn = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if ($conn) {
    //ESTO QUITAR SOLO ES PARA PROBAR
    //echo "Conexion Exitosa";
}else{
    die("Error de conexión: " . mysqli_connect_error());
}
?>