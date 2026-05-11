<?php
    session_start();
    include("php/conexion.php");
    include("php/funciones.php");
    $productos=listarProductos($conn);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PowerFit Gym</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="imagenes/favicon.png?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<?php include("header.php"); ?>

<main>

<section class="tienda">

    <h2>Tienda PowerFit</h2>
    <p>Encuentra productos para complementar tu entrenamiento.</p>

    <div class="catalogo">

        <?php foreach ($productos as $producto) { ?>

            <?php
                $imagen = obtenerImagenProducto($producto["id_producto"]);
            ?>

            <div class="producto">

                <img src="imagenes/<?php echo $imagen; ?>" alt="<?php echo $producto["nombre"]; ?>">

                <h3><?php echo $producto["nombre"]; ?></h3>

                <p><?php echo $producto["descripcion"]; ?></p>

                <p>$<?php echo number_format($producto["precio"], 2); ?></p>

                <form action="php/agregar_carrito.php" method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"]; ?>">
                    <button type="submit">Agregar al carrito</button>
                </form>

            </div>

        <?php } ?>

    </div>

</section>

<div id="modalProducto" class="modal-producto">

    <div class="contenido-modal">

        <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>

        <img id="modalImagen" src="" alt="Producto">

        <div class="modal-info">
            <h2 id="modalTitulo"></h2>
            <p id="modalDescripcion"></p>
            <div id="modalCuerpo"></div>

            <label>Cantidad:</label>

            <div class="selector-cantidad">
                <button onclick="disminuirCantidadDetalle()">-</button>
                <span id="cantidadDetalle">1</span>
                <button onclick="aumentarCantidadDetalle()">+</button>
            </div>

            <button onclick="agregarDesdeDetalle()">
                Agregar al carrito
            </button>
        </div>

    </div>

</div>


</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
</body>
</html>