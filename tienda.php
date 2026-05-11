<?php
session_start();

include("php/conexion.php");
include("php/funciones.php");

$productos = listarProductos($conn);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tienda - PowerFit Gym</title>
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

    <h2>Suplementos Deportivos</h2>
    <p>Encuentra suplementos para mejorar tu rendimiento y recuperación.</p>

    <div class="catalogo">

        <?php if ($productos != null) { ?>

            <?php foreach ($productos as $producto) { ?>

                <?php
                    $imagen = obtenerImagenProducto($producto["id_producto"]);
                    $detalles = obtenerDetallesProducto($producto["id_producto"]);

                    if ($imagen == null || $imagen == "") {
                        $imagen = "producto-default.png";
                    }

                    if ($detalles == null) {
                        $detalles = array(
                            "tamano" => "No especificado",
                            "ingredientes" => "No especificado",
                            "especificaciones" => "No especificado"
                        );
                    }
                ?>

                <div class="producto">

                    <img src="imagenes/<?php echo $imagen; ?>" alt="<?php echo $producto["nombre"]; ?>">

                    <h3><?php echo $producto["nombre"]; ?></h3>

                    <p class="precio-producto">
                        $<?php echo number_format($producto["precio"], 2); ?>
                    </p>

                    <button type="button"
                        onclick='verDetalleProducto(
                            <?php echo json_encode($producto["nombre"]); ?>,
                            <?php echo json_encode($producto["precio"]); ?>,
                            <?php echo json_encode("imagenes/" . $imagen); ?>,
                            <?php echo json_encode($producto["descripcion"]); ?>,
                            <?php echo json_encode($detalles["tamano"]); ?>,
                            <?php echo json_encode($detalles["ingredientes"]); ?>,
                            <?php echo json_encode($detalles["especificaciones"]); ?>,
                            <?php echo json_encode($producto["id_producto"]); ?>
                        )'>
                        Ver detalle
                    </button>

                    <form action="php/agregar_carrito.php" method="POST">
                        <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"]; ?>">
                        <input type="hidden" name="cantidad" value="1">

                        <button type="submit">
                            Agregar al carrito
                        </button>
                    </form>

                </div>

            <?php } ?>

        <?php } else { ?>

            <p>No existen productos disponibles en la tienda.</p>

        <?php } ?>

    </div>

</section>

<div id="modalProducto" class="modal-producto">

    <div class="contenido-modal">

        <span class="cerrar-modal" onclick="cerrarModalProducto()">&times;</span>

        <img id="modalImagen" src="" alt="Producto">

        <div class="modal-info">

            <h2 id="modalTitulo"></h2>

            <p id="modalDescripcion"></p>

            <div id="modalCuerpo"></div>

            <label>Cantidad:</label>

            <div class="selector-cantidad">
                <button type="button" onclick="disminuirCantidadDetalle()">-</button>
                <span id="cantidadDetalle">1</span>
                <button type="button" onclick="aumentarCantidadDetalle()">+</button>
            </div>

            <form action="php/agregar_carrito.php" method="POST">
                <input type="hidden" name="id_producto" id="idProductoModal">
                <input type="hidden" name="cantidad" id="cantidadProductoModal" value="1">

                <button type="submit">
                    Agregar al carrito
                </button>
            </form>

        </div>

    </div>

</div>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js?v=101"></script>

</body>
</html>