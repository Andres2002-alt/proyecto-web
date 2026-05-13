<?php
    include_once("php/funciones.php");
    // Asegúrate de que session_start() esté al inicio de tus archivos
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Inicializamos el contador
    $cantidadCarritoHeader = 0;

    // Si existe la sesión del carrito, sumamos las cantidades
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $producto) {
            // Sumamos la cantidad de cada producto
            $cantidadCarritoHeader += $producto['cantidad'];
        }
    }
?>
<header class="navbar">

    <div class="logo">
        <a href="indice.php">
            <h1>PowerFit</h1>
        </a>
    </div>

    <nav class="menu">
        <ul>
            <li><a href="indice.php">Inicio</a></li>
            <li><a href="clases.php">Clases</a></li>
            <li><a href="instructores.php">Instructores</a></li>
            <li><a href="ubicaciones.php">Ubicaciones</a></li>
            <li><a href="tienda.php">Tienda</a></li>
        </ul>
    </nav>

    <div class="nav-derecha">

        <div class="user-dropdown">

            <?php if (isset($_SESSION["id_cliente"])) { ?>

                <div class="usuario-header-mini">

                    <a href="#" class="icono-usuario">
                        <i class="fa-regular fa-user"></i>
                    </a>

                    <span class="texto-usuario-header">
                        Hola, <?php echo $_SESSION["nombre"]; ?>
                    </span>

                </div>

                <div class="dropdown-content">

                    <a href="mi-cuenta.php">
                        <i class="fa-solid fa-gear"></i> Mi Cuenta
                    </a>

                    <a href="php/cerrar_sesion.php" class="txt-rojo">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Salir
                    </a>

                </div>

            <?php } else { ?>

                <a href="login.php" class="icono-usuario" title="Iniciar sesión">
                    <i class="fa-regular fa-user"></i>
                </a>

            <?php } ?>

        </div>

        <a href="carrito.php" class="botonCarrito">
            <i class="fa-solid fa-cart-shopping"></i>
            <span id="contador-carrito"><?php echo $cantidadCarritoHeader; ?></span>
        </a>

       <?php if (isset($_SESSION["id_cliente"])): ?>
               
               <a href="inscripcion.php" class="btn-gym">
                   Inscríbete ya
               </a>
           <?php else: ?>
               
               <a href="login.php" class="btn-gym">
                   Inscríbete ya
               </a>
           <?php endif; ?>

    </div>

</header>