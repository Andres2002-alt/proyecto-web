<?php
//include("php/conexion.php");
//include("php/funciones.php");

// Por ahora simulamos el usuario 1 (luego será con $_SESSION)
//$id_usuario = 1; 
//$datos = obtenerPerfilCompleto($conn, $id_usuario);

// Cálculo de fecha de próximo pago
//$fecha_inicio = new DateTime($datos['fecha_inicio']);
//$meses = $datos['duracion_meses'] ?? 1; // Si no tiene plan, asumimos 1 para evitar error
//$proximo_pago = $fecha_inicio->modify("+$meses month")->format('d/m/Y');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Cuenta - PowerFit</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-cuenta">

<div class="dashboard-container">
    <aside class="sidebar-cuenta">
        <div class="logo-cuenta">
            <h2>POWER<span>FIT</span></h2>
        </div>
        <nav>
            <a href="#" class="active"><i class="bi bi-grid"></i> Descripción general</a>
            <a href="#"><i class="bi bi-credit-card"></i> Membresía</a>
            <a href="#"><i class="bi bi-shield-lock"></i> Seguridad</a>
            <a href="#"><i class="bi bi-person-gear"></i> Perfiles</a>
            <hr>
            <a href="index.php" class="btn-volver"><i class="bi bi-arrow-left"></i> Volver a la tienda</a>
        </nav>
    </aside>

    <main class="main-cuenta">
        <header class="header-main">
            <h1>Configuración de la cuenta</h1>
        </header>

        <section class="seccion-perfil">
            <div class="card-premium">
                <div class="card-badge">MIEMBRO ACTIVO</div>
                <div class="card-body-p">
                    <div class="info-principal">
                        <h3>Plan Actual: <span><?php echo $datos['nombre_plan'] ?? 'Sin Plan'; ?></span></h3>
                        <p>Tu próxima fecha de facturación es el <strong><?php echo $proximo_pago; ?></strong>.</p>
                    </div>
                    <div class="metodo-pago">
                        <p><i class="bi bi-credit-card-2-back"></i> Visa **** 1155</p>
                        <a href="#">Administrar forma de pago</a>
                    </div>
                </div>
                <div class="card-footer-p">
                    <a href="#">Cambiar de plan <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>

            <div class="opciones-grid">
                <div class="opcion-item">
                    <div class="texto">
                        <strong>Email de contacto</strong>
                        <span><?php echo $datos['email']; ?></span>
                    </div>
                    <a href="#">Cambiar</a>
                </div>
                <div class="opcion-item">
                    <div class="texto">
                        <strong>Contraseña</strong>
                        <span>********</span>
                    </div>
                    <a href="#">Actualizar</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer-powerfit">

    <div class="footer-col">
        <h3>Enlaces rápidos</h3>
        <a href="indice.php">Inicio</a>
        <a href="clases.php">Clases</a>
        <a href="instructores.php">Instructores</a>
        <a href="ubicaciones.php">Ubicaciones</a>
        <a href="tienda.php">Tienda</a>
        <a href="inscripcion.php">Membresías</a>
    </div>

    <div class="footer-col">
        <h3>Contacto</h3>
        <p><strong>Tel:</strong> 0999999999</p>
        <p><strong>Email:</strong> powerfit@gmail.com</p>
        <p><strong>Dirección:</strong> Cuenca, Ecuador</p>
        <p><strong>Horario:</strong> Lunes a sábado de 6:00 a 22:00</p>
    </div>

    <div class="footer-col">
        <h3>Síguenos</h3>

        <div class="redes-iconos">
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
            </a>

            <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                <i class="bi bi-youtube"></i>
            </a>

            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                <i class="bi bi-facebook"></i>
            </a>

            <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                <i class="bi bi-tiktok"></i>
            </a>

            <a href="https://wa.me/593999999999" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2026 PowerFit Gym. Todos los derechos reservados.</p>
    </div>
</footer>
</div>

</body>
</html>