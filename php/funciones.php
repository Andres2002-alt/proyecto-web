<?php

/* =========================================================
   FUNCIONES DE CLIENTE
========================================================= */

function consultarClientePorEmail($conn, $email) {
    $sql = "SELECT id_cliente, nombre, apellido, email, clave 
            FROM cliente 
            WHERE email = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    }

    return null;
}

function registrarCliente($conn, $nombre, $apellido, $email, $celular, $claveHash) {
    $sql = "INSERT INTO cliente(nombre, apellido, email, celular, clave)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nombre, $apellido, $email, $celular, $claveHash);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_insert_id($conn);
    }

    return 0;
}


/* =========================================================
   FUNCIONES DE PLANES Y MEMBRESÍAS
========================================================= */

function consultarPlanPorId($conn, $id_plan) {
    $sql = "SELECT id_plan, nombre, precio, duracion_dias, descripcion 
            FROM plan 
            WHERE id_plan = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_plan);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    }

    return null;
}

function registrarMembresia($conn, $id_cliente, $id_plan, $fecha_inicio, $fecha_fin, $estado) {
    $sql = "INSERT INTO membresia(id_cliente, id_plan, fecha_inicio, fecha_fin, estado)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iisss", $id_cliente, $id_plan, $fecha_inicio, $fecha_fin, $estado);

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_insert_id($conn);
    }

    return 0;
}

function registrarPagoMembresia($conn, $id_cliente, $id_membresia, $tipo_pago, $metodo_pago, $monto, $estado, $referencia) {
    $sql = "INSERT INTO pago(id_cliente, id_membresia, tipo_pago, metodo_pago, monto, estado, referencia)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "iissdss",
        $id_cliente,
        $id_membresia,
        $tipo_pago,
        $metodo_pago,
        $monto,
        $estado,
        $referencia
    );

    return mysqli_stmt_execute($stmt);
}


/* =========================================================
   FUNCIONES DE PRODUCTOS
========================================================= */

function listarProductos($conn) {
    $sql = "SELECT id_producto, nombre, descripcion, precio, stock
            FROM producto";

    $rs = mysqli_query($conn, $sql);

    $lista = array();

    while ($fila = mysqli_fetch_assoc($rs)) {
        $lista[] = $fila;
    }

    return $lista;
}

function consultarProductoPorId($conn, $id_producto) {
    $sql = "SELECT id_producto, nombre, descripcion, precio, stock
            FROM producto
            WHERE id_producto = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_producto);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    }

    return null;
}

function actualizarStockProducto($conn, $id_producto, $cantidad) {
    $sql = "UPDATE producto
            SET stock = stock - ?
            WHERE id_producto = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $cantidad, $id_producto);

    return mysqli_stmt_execute($stmt);
}


/* =========================================================
   IMÁGENES DE PRODUCTOS
   No se guardan en la base de datos.
   Se relacionan por id_producto.
========================================================= */

function obtenerImagenProducto($id_producto) {
    $imagenes = array(
        1 => "proteinawhey.png",
        2 => "creatina.png",
        3 => "BCCA.png",
        4 => "preworkout.png",
        5 => "glutamina.jpg",
        6 => "quemadorgrasa.png",
        7 => "multivitaminico.png",
        8 => "barraenergetica.png"
    );

    if (isset($imagenes[$id_producto])) {
        return $imagenes[$id_producto];
    }

    return "producto-default.png";
}


/* =========================================================
   FUNCIONES DEL CARRITO EN SESIÓN
========================================================= */

function obtenerCarrito() {
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = array();
    }

    return $_SESSION["carrito"];
}

function agregarProductoAlCarrito($producto) {
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = array();
    }

    $id = $producto["id_producto"];

    if (isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id]["cantidad"] += 1;
    } else {
        $_SESSION["carrito"][$id] = array(
            "id_producto" => $producto["id_producto"],
            "nombre" => $producto["nombre"],
            "precio" => $producto["precio"],
            "cantidad" => 1
        );
    }
}

function aumentarProductoCarrito($id_producto) {
    if (isset($_SESSION["carrito"][$id_producto])) {
        $_SESSION["carrito"][$id_producto]["cantidad"] += 1;
    }
}

function disminuirProductoCarrito($id_producto) {
    if (isset($_SESSION["carrito"][$id_producto])) {
        $_SESSION["carrito"][$id_producto]["cantidad"] -= 1;

        if ($_SESSION["carrito"][$id_producto]["cantidad"] <= 0) {
            unset($_SESSION["carrito"][$id_producto]);
        }
    }
}

function eliminarProductoCarrito($id_producto) {
    if (isset($_SESSION["carrito"][$id_producto])) {
        unset($_SESSION["carrito"][$id_producto]);
    }
}

function calcularSubtotalCarrito() {
    $subtotal = 0;

    if (isset($_SESSION["carrito"])) {
        foreach ($_SESSION["carrito"] as $producto) {
            $subtotal += $producto["precio"] * $producto["cantidad"];
        }
    }

    return $subtotal;
}

function calcularIvaCarrito() {
    return calcularSubtotalCarrito() * 0.15;
}

function calcularTotalCarrito() {
    return calcularSubtotalCarrito() + calcularIvaCarrito();
}

function contarProductosCarrito() {
    $cantidadTotal = 0;

    if (isset($_SESSION["carrito"])) {
        foreach ($_SESSION["carrito"] as $producto) {
            $cantidadTotal += $producto["cantidad"];
        }
    }

    return $cantidadTotal;
}


/* =========================================================
   FUNCIONES DE COMPRA
========================================================= */

function registrarCompra($conn, $id_cliente, $subtotal, $iva, $total, $estado) {
    $sql = "INSERT INTO compra(id_cliente, subtotal, iva, total, estado)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "iddds",
        $id_cliente,
        $subtotal,
        $iva,
        $total,
        $estado
    );

    if (mysqli_stmt_execute($stmt)) {
        return mysqli_insert_id($conn);
    }

    return 0;
}

function registrarDetalleCompra($conn, $id_compra, $id_producto, $precio_unitario, $cantidad, $subtotal) {
    $sql = "INSERT INTO detalle_compra(id_compra, id_producto, precio_unitario, cantidad, subtotal)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "iidid",
        $id_compra,
        $id_producto,
        $precio_unitario,
        $cantidad,
        $subtotal
    );

    return mysqli_stmt_execute($stmt);
}

function registrarPagoCompra($conn, $id_cliente, $id_compra, $tipo_pago, $metodo_pago, $monto, $estado, $referencia) {
    $sql = "INSERT INTO pago(id_cliente, id_compra, tipo_pago, metodo_pago, monto, estado, referencia)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "iissdss",
        $id_cliente,
        $id_compra,
        $tipo_pago,
        $metodo_pago,
        $monto,
        $estado,
        $referencia
    );

    return mysqli_stmt_execute($stmt);
}

?>