<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras - PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body onload="mostrarCarrito()">

<header class="navbar">

    <div class="logo">
        <a href="indice.html">
            <h1>PowerFit</h1>
        </a>
    </div>

    <nav class="menu">
        <ul>
            <li><a href="indice.html">Inicio</a></li>
            <li><a href="clases.html">Clases</a></li>
            <li><a href="instructores.html">Instructores</a></li>
            <li><a href="ubicaciones.html">Ubicaciones</a></li>
            <li><a href="tienda.html">Tienda</a></li>
        </ul>
    </nav>

    <div class="nav-derecha">

        <a href="login.html" class="icono-usuario" title="Iniciar sesión">
            <i class="fa-regular fa-user"></i>
        </a>

        <a href="carrito.html" class="botonCarrito" title="Carrito de compras">
            <i class="fa-solid fa-cart-shopping"></i>
            <span id="contador-carrito">0</span>
        </a>

        <a href="inscripcion.html" class="btn-gym">
            Inscríbete ya
        </a>

    </div>

</header>

<main>

    <section class="carrito carrito-layout">

        <h2>Carrito de compras</h2>

        <div class="carrito-contenido">

            <div class="tabla-carrito-contenedor">

                <table class="tabla-carrito">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="tablaCarrito">
                    </tbody>
                </table>

            </div>

            <aside class="resumen-compra">
                <h3>Resumen de compra</h3>

                <div class="fila-resumen">
                    <span>Subtotal</span>
                    <strong id="subtotalCompra">$0.00</strong>
                </div>

                <div class="fila-resumen">
                    <span>IVA 15%</span>
                    <strong id="ivaCompra">$0.00</strong>
                </div>

                <div class="fila-resumen total-final">
                    <span>Total</span>
                    <strong id="totalCompra">$0.00</strong>
                </div>

                <button onclick="irAlPago()" class="btn-pago">
                    Continuar al pago
                </button>
            </aside>

        </div>

    </section>

</main>

<footer class="footer-powerfit">

    <div class="footer-col">
        <h3>Enlaces Rápidos</h3>
        <a href="indice.html">Inicio</a>
        <a href="clases.html">Clases</a>
        <a href="instructores.html">Instructores</a>
        <a href="ubicaciones.html">Ubicaciones</a>
        <a href="tienda.html">Tienda</a>
        <a href="inscripcion.html">Membresías</a>
    </div>

    <div class="footer-col">
        <h3>Contacto</h3>
        <p><strong>Tel:</strong> 0999999999</p>
        <p><strong>Email:</strong> powerfit@gmail.com</p>
        <p><strong>Dirección:</strong> Cuenca, Ecuador</p>
        <p><strong>Horario:</strong> Lunes a Sábado de 6:00 a 22:00</p>
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

<script src="js/script.js"></script>
</body>
</html>