<header class="navbar">

    <div class="logo">
        <a href="indice.php">
            <h1>PowerFit</h1>
        </a>
    </div>

    <nav class="menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="clases.php">Clases</a></li>
            <li><a href="instructores.php">Instructores</a></li>
            <li><a href="ubicaciones.php">Ubicaciones</a></li>
            <li><a href="tienda.php">Tienda</a></li>
        </ul>
    </nav>

    <div class="nav-derecha">

        <?php if (isset($_SESSION["id_cliente"])) { ?>
            <a href="#" class="icono-usuario" title="Sesión iniciada">
                <i class="fa-regular fa-user"></i>
            </a>
        <?php } else { ?>
            <a href="login.php" class="icono-usuario" title="Iniciar sesión">
                <i class="fa-regular fa-user"></i>
            </a>
        <?php } ?>

        <a href="carrito.php" class="botonCarrito" title="Carrito de compras">
            <i class="fa-solid fa-cart-shopping"></i>
            <span id="contador-carrito">0</span>
        </a>

        <a href="inscripcion.php" class="btn-gym">
            Inscríbete ya
        </a>

        <?php if (isset($_SESSION["id_cliente"])) { ?>
            <a href="php/cerrar_sesion.php" class="btn-sesion">
                Salir
            </a>
        <?php } ?>

    </div>

</header>