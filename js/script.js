function irInicio() {
    window.location.href = "index.html";
}
function irAlPago() {
    window.location.href = "formulario.html";
}


function aumentarImagen(imagen) {
    imagen.style.transform = "scale(1.08)";
    imagen.style.transition = "0.3s";
}

function volverImagen(imagen) {
    imagen.style.transform = "scale(1)";
}

function clicImagen(imagen) {
    if (imagen.style.transform === "scale(1.18)") {
        imagen.style.transform = "scale(1)";
    } else {
        imagen.style.transform = "scale(1.18)";
    }

    imagen.style.transition = "0.3s";
}

function reservarClase() {
    window.location.href = "formulario.html";
}

function agregarCarrito(nombre,precio) {
    var carrito = localStorage.getItem("carrito");

    if (carrito == null) {
        carrito = [];
    } else {
        carrito = JSON.parse(carrito);
    }

    var productoExistente = false;

    for (var i = 0; i < carrito.length; i++) {
        if (carrito[i].nombre == nombre) {
            carrito[i].cantidad = carrito[i].cantidad + 1;
            productoExistente = true;
        }
    }

    if (productoExistente == false) {
        carrito.push({
            nombre: nombre,
            precio: precio,
            cantidad: 1
        });
    }

    localStorage.setItem("carrito", JSON.stringify(carrito));
    alert("Has agregado " + producto + " al carrito");
}

function irAlPago() {
    window.location.href = "formulario.html";
}

function calcularTotal() {
    var cantidad1 = 1;
    var precio1 = 35.00;
    var subtotal1 = cantidad1 * precio1;

    var cantidad2 = 2;
    var precio2 = 25.00;
    var subtotal2 = cantidad2 * precio2;

    var total = subtotal1 + subtotal2;

    document.getElementById("subtotal1").innerHTML = "$" + subtotal1.toFixed(2);
    document.getElementById("subtotal2").innerHTML = "$" + subtotal2.toFixed(2);
    document.getElementById("totalCompra").innerHTML = "Total: $" + total.toFixed(2);
}

function confirmarRegistro() {
    alert("Formulario enviado correctamente");
}
function mostrarCarrito() {
    var carrito = localStorage.getItem("carrito");

    if (carrito == null) {
        carrito = [];
    } else {
        carrito = JSON.parse(carrito);
    }

    var tabla = document.getElementById("tablaCarrito");
    var total = 0;

    tabla.innerHTML = "";
    if (carrito.length == 0) {
        tabla.innerHTML = "<tr><td colspan='4'>Tu carrito está vacío</td></tr>";
        document.getElementById("totalCompra").innerHTML = "Total: $0.00";
        return;
    }

    for (var i = 0; i < carrito.length; i++) {
        var producto = carrito[i];
        var subtotal = producto.precio * producto.cantidad;
        total = total + subtotal;

        tabla.innerHTML +=
            "<tr>" +
            "<td>" + producto.nombre + "</td>" +
            "<td>" + producto.cantidad + "</td>" +
            "<td>$" + producto.precio.toFixed(2) + "</td>" +
            "<td>$" + subtotal.toFixed(2) + "</td>" +
            "</tr>";
    }

    document.getElementById("totalCompra").innerHTML = "Total: $" + total.toFixed(2);
}

function vaciarCarrito() {
    localStorage.removeItem("carrito");
    mostrarCarrito();
}
