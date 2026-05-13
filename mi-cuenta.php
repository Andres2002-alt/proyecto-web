<?php
session_start();
include("php/conexion.php");

if (!isset($_SESSION["id_cliente"])) {
    header("Location: login.php");
    exit();
}

$id_cliente = $_SESSION["id_cliente"];

$sql = "SELECT c.*, p.nombre AS nombre_plan, p.precio, m.fecha_inicio, p.duracion_dias 
        FROM cliente c
        LEFT JOIN membresia m ON c.id_cliente = m.id_cliente
        LEFT JOIN plan p ON m.id_plan = p.id_plan
        WHERE c.id_cliente = $id_cliente";

$resultado = mysqli_query($conn, $sql);
$datos = mysqli_fetch_assoc($resultado);

$proximo_pago = "No activo";
if ($datos && $datos['fecha_inicio']) {
    $fecha = new DateTime($datos['fecha_inicio']);
    $dias = $datos['duracion_dias'] ?? 30;
    $proximo_pago = $fecha->modify("+$dias days")->format('d/m/Y');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Cuenta - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="body-mi-cuenta">

 
    <?php include("header.php"); ?>

    <main class="contenedor-perfil-centrado">
        <div class="cuenta-wrapper">
            
            <nav class="nav-retorno">
                <a href="indice.php">
                    <i class="bi bi-arrow-left-short"></i> Volver al inicio
                </a>
            </nav>

            <header class="cuenta-header">
                <h1>Hola, <span><?php echo htmlspecialchars($datos['nombre']); ?></span></h1>
                <p>Gestiona los detalles de tu cuenta y tu suscripción al gimnasio.</p>
            </header>

            <section class="cuenta-card-principal">
                <div class="card-status-tag">
                    <?php echo $datos['nombre_plan'] ? 'MIEMBRO POWERFIT' : 'SIN MEMBRESÍA'; ?>
                </div>
                
                <div class="card-contenido">
                    <div class="plan-detalle">
                        <h3>Plan actual: <strong><?php echo $datos['nombre_plan'] ?? 'Ninguno seleccionado'; ?></strong></h3>
                        <p>Tu próxima fecha de facturación es el <b><?php echo $proximo_pago; ?></b>.</p>
                    </div>
                    
                    <div class="pago-detalle">
                        <p><i class="bi bi-credit-card"></i> PAYPAL</p>
                    </div>
                </div>

                <div class="card-footer-acciones">
                    <a href="inscripcion.php">Cambiar de plan <i class="bi bi-chevron-right"></i></a>
                </div>
            </section>

            <div class="cuenta-grid-info">
                <div class="info-item">
                    <div class="info-texto">
                        <strong>Datos del usuario</strong>
                        <span><?php echo $datos['nombre']. "  ".$datos['apellido']; ?></span>
                    </div>
                    <a href="editar_perfil.php" class="btn-editar-perfil">Cambiar</a>
                </div>
            </div>

        </div>
    </main>

    <?php include("footer.php"); ?>

</body>
</html>