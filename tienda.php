<?php
    session_start();
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

<h2>Suplementos Deportivos</h2>

<p>Encuentra suplementos para mejorar tu rendimiento y recuperación.</p>

<div class="catalogo">

    <div class="producto">
        <img src="imagenes/proteinawhey.png" alt="Proteína Whey">
        <h3>Proteína Whey</h3>
        <p>$35.00</p>
        <button onclick="verDetalleProducto(
            'Proteína Whey', 35, 'imagenes/proteinawhey.png',
            'Suplemento ideal para apoyar el crecimiento muscular y la recuperación.',
            '2 lb (907 g)',
            'Proteína de suero, aminoácidos esenciales, enzimas digestivas',
            'Consumir 1 scoop después del entrenamiento con agua o leche'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('Proteína Whey',35)">Agregar al carrito</button>
    </div>

    <div class="producto">
        <img src="imagenes/creatina.png" alt="Creatina">
        <h3>Creatina</h3>
        <p>$25.00</p>
        <button onclick="verDetalleProducto(
            'Creatina', 25, 'imagenes/creatina.png',
            'Mejora fuerza, potencia y rendimiento en entrenamientos intensos.',
            '300 g',
            'Monohidrato de creatina',
            'Consumir 5 g diarios disueltos en agua o jugo'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('Creatina',25)">Agregar al carrito</button>
    </div>

    <div class="producto">
        <img src="imagenes/BCCA.png" alt="BCAA">
        <h3>BCAA</h3>
        <p>$20.00</p>
        <button onclick="verDetalleProducto(
            'BCAA', 20, 'imagenes/BCCA.png',
            'Aminoácidos esenciales que ayudan a la recuperación muscular.',
            '250 g',
            'Leucina, isoleucina, valina',
            'Consumir antes o después del entrenamiento'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('BCAA',20)">Agregar al carrito</button>
    </div>

    <div class="producto">
        <img src="imagenes/preworkout.png" alt="Pre Workout">
        <h3>Pre Workout</h3>
        <p>$30.00</p>
        <button onclick="verDetalleProducto(
            'Pre Workout', 30, 'imagenes/preworkout.png',
            'Suplemento para aumentar energía y concentración antes de entrenar.',
            '300 g',
            'Cafeína, beta-alanina, citrulina',
            'Consumir 1 scoop 20 min antes del entrenamiento'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('Pre Workout',30)">Agregar al carrito</button>
    </div>

    <div class="producto">
        <img src="imagenes/glutamina.jpg" alt="Glutamina">
        <h3>Glutamina</h3>
        <p>$28.00</p>
        <button onclick="verDetalleProducto(
            'Glutamina', 28, 'imagenes/glutamina.jpg',
            'Apoya la recuperación muscular y el sistema inmune.',
            '250 g',
            'L-glutamina pura',
            'Consumir 5 g después del entrenamiento'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('Glutamina',28)">Agregar al carrito</button>
    </div>

    <div class="producto">
        <img src="imagenes/quemadorgrasa.png" alt="Quemador de Grasa">
        <h3>Quema Grasa</h3>
        <p>$32.00</p>
        <button onclick="verDetalleProducto(
            'Quemador de Grasa', 32, 'imagenes/quemadorgrasa.png',
            'Apoya el metabolismo y la quema de calorías.',
            '90 cápsulas',
            'Extracto de té verde, cafeína, L-carnitina',
            'Consumir 2 cápsulas al día con abundante agua'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('Quemador de Grasa',32)">Agregar al carrito</button>
    </div>

    <div class="producto">
        <img src="imagenes/multivitaminico.png" alt="Multivitamínico">
        <h3>Multivitamínico</h3>
        <p>$18.00</p>
        <button onclick="verDetalleProducto(
            'Multivitamínico', 18, 'imagenes/multivitaminico.png',
            'Complemento con vitaminas y minerales para energía y bienestar.',
            '60 tabletas',
            'Vitaminas A, C, D, complejo B, minerales',
            'Consumir 1 tableta diaria con alimentos'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('Multivitamínico',18)">Agregar al carrito</button>
    </div>

    <div class="producto">
        <img src="imagenes/barraenergetica.png" alt="Barra Energética">
        <h3>Barra Nutritiva</h3>
        <p>$5.00</p>
        <button onclick="verDetalleProducto(
            'Barra Energética', 5, 'imagenes/barraenergetica.png',
            'Snack práctico para energía rápida.',
            '50 g',
            'Avena, miel, frutos secos',
            'Consumir antes del entrenamiento o como snack'
        )">Ver detalle</button>
        <button onclick="agregarCarrito('Barra Energética',5)">Agregar al carrito</button>
    </div>

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