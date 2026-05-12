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
                <a href="#" class="icono-usuario">
                    <i class="fa-regular fa-user"></i>
                </a>
                    <div class="dropdown-content">
                        <div class="user-info-mini">
                            <p>Hola, <strong><?php echo $_SESSION["nombre"]; ?></strong></p>
                        </div>
                            <a href="php/mi-cuenta.php">
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