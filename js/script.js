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

//FUNCION PARA AGREGAR PRODUCTOS AL CARRITO DE COMPRAS
// Al inicio del script, cargamos el conteo inicial basado en lo que ya hay en localStorage
let totalProductos = 0;

// Función para actualizar el número visual del carrito al cargar la página
function actualizarContadorVisual() {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    // Sumamos todas las cantidades de los productos en el carrito
    totalProductos = carrito.reduce((acc, prod) => acc + prod.cantidad, 0);
    
    const spanContador = document.getElementById("contador-carrito");
    if (spanContador) {
        spanContador.innerText = totalProductos;
    }
}


// Llama a esta función cada vez que cargue el DOM
document.addEventListener("DOMContentLoaded", actualizarContadorVisual);

function agregarCarrito(nombre, precio) {
    // Obtener el carrito actual
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    // Lógica para agregar o aumentar cantidad
    let productoExistente = carrito.find(p => p.nombre === nombre);

    if (productoExistente) {
        productoExistente.cantidad += 1;
    } else {
        carrito.push({
            nombre: nombre,
            precio: precio,
            cantidad: 1
        });
    }

    // Guardar en localStorage
    localStorage.setItem("carrito", JSON.stringify(carrito));

    // Actualizar el contador visual 
    actualizarContadorVisual();

    // Feedback visual
    const spanContador = document.getElementById("contador-carrito");
    if (spanContador) {
        spanContador.style.transform = "scale(1.4)";
        setTimeout(() => spanContador.style.transform = "scale(1)", 200);
    }
    
    // Cambié "producto" por "nombre" que es la variable correcta
    alert("Has agregado " + nombre + " al carrito");
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
    var carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    var tabla = document.getElementById("tablaCarrito");
    var total = 0;

    if (!tabla) return;

    tabla.innerHTML = "";

    if (carrito.length == 0) {
        tabla.innerHTML = "<tr><td colspan='5'>Tu carrito está vacío</td></tr>";
        document.getElementById("totalCompra").innerHTML = "Total: $0.00";
        actualizarContadorVisual();
        return;
    }

    for (var i = 0; i < carrito.length; i++) {
        var producto = carrito[i];
        var subtotal = producto.precio * producto.cantidad;
        total += subtotal;

        tabla.innerHTML +=
            "<tr>" +
            "<td>" + producto.nombre + "</td>" +
            "<td class='cantidad-carrito'>" +
                "<button class='btn-cantidad' onclick='disminuirCantidad(" + i + ")'>-</button>" +
                "<span>" + producto.cantidad + "</span>" +
                "<button class='btn-cantidad' onclick='aumentarCantidad(" + i + ")'>+</button>" +
            "</td>" +
            "<td>$" + producto.precio.toFixed(2) + "</td>" +
            "<td>$" + subtotal.toFixed(2) + "</td>" +
            "<td><button class='btn-eliminar' onclick='eliminarProducto(" + i + ")'>Eliminar</button></td>" +
            "</tr>";
    }

    document.getElementById("totalCompra").innerHTML = "Total: $" + total.toFixed(2);
    actualizarContadorVisual();
}
function aumentarCantidad(indice) {
    var carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    carrito[indice].cantidad = carrito[indice].cantidad + 1;

    localStorage.setItem("carrito", JSON.stringify(carrito));
    mostrarCarrito();
    actualizarContadorVisual();
}

function disminuirCantidad(indice) {
    var carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    if (carrito[indice].cantidad > 1) {
        carrito[indice].cantidad = carrito[indice].cantidad - 1;
    } else {
        carrito.splice(indice, 1);
    }

    localStorage.setItem("carrito", JSON.stringify(carrito));
    mostrarCarrito();
    actualizarContadorVisual();
}



//ELIMINAR PRODUCTOS 
function eliminarProducto(indice) {
    // 1. Obtenemos el carrito actual
    var carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    // 2. Eliminamos el elemento en esa posición del array
    // .splice(posicion, cuantos_elementos)
    carrito.splice(indice, 1);

    // 3. Guardamos el nuevo carrito en localStorage
    localStorage.setItem("carrito", JSON.stringify(carrito));

    // 4. Refrescamos la tabla y el contador del header
    mostrarCarrito();
    actualizarContadorVisual();
    
    console.log("Producto eliminado. Índice:", indice);
}

function vaciarCarrito() {
    localStorage.removeItem("carrito");
    mostrarCarrito(); // llama internamente a actualizarContadorVisual()
    alert("Carrito vaciado correctamente.");
}


// VALIDACION DE FORMULARIO
function validarRegistro(formulario) {
    // 1. Obtención de valores
    const nombre = formulario["nombre"].value.trim();
    const celular = formulario["celular"].value.trim();
    const fechaNacimiento = formulario["fecha_nacimiento"].value;

    // 2. Validar nombre (Solo letras)
    const regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    if (!regexLetras.test(nombre)) {
        alert("Por favor, ingresa un nombre válido.");
        return false; 
    }

    // 3. Validar celular (Ecuador: empieza con 09 y tiene 10 dígitos)
    const regexCelular = /^09\d{8}$/;
    if (!regexCelular.test(celular)) {
        alert("Número de celular no válido. Debe tener 10 dígitos y empezar con 09.");
        return false;
    }

    // 4. Validar edad mínima (Opcional)
    if (fechaNacimiento) {
        const hoy = new Date();
        const cumple = new Date(fechaNacimiento);
        let edad = hoy.getFullYear() - cumple.getFullYear();
        if (edad < 16) {
            alert("Debes ser mayor de 16 años para inscribirte.");
            return false;
        }
    }

    // Si llega aquí, es que todo pasó las pruebas
    return true;
}

// --- ESCUCHA DEL EVENTO ---
document.addEventListener("DOMContentLoaded", function() {
    const miFormulario = document.getElementById("formRegistro");

    miFormulario.addEventListener("submit", function(evento) {
        // Ejecutamos la función y guardamos el resultado
        const esValido = validarRegistro(miFormulario);

        if (esValido) {
            // Si la función nos dio el "OK"
            alert("Validación correcta. Procesando inscripción...");
            // Aquí se enviaría a la base de datos en el futuro
            console.log("Datos listos para enviar.");
        } else {
            // Si la función retornó false, detenemos el envío del formulario
            evento.preventDefault(); 
        }
    });
});

var imagenesCarrusel = [
    "imagenes/instalacion1.jpg",
    "imagenes/instalacion2.jpg",
    "imagenes/instalacion3.jpg",
    "imagenes/instalacion4.jpg",
    "imagenes/instalacion5.jpg",
    "imagenes/instalacion6.jpg",
    "imagenes/instalacion7.jpg",
    "imagenes/instalacion8.jpg",
    "imagenes/instalacion9.jpg"
];

var posicionCarrusel = 0;

function cambiarImagen(direccion) {
    posicionCarrusel = posicionCarrusel + direccion;

    if (posicionCarrusel >= imagenesCarrusel.length) {
        posicionCarrusel = 0;
    }

    if (posicionCarrusel < 0) {
        posicionCarrusel = imagenesCarrusel.length - 1;
    }

    document.getElementById("imagenCarrusel").src = imagenesCarrusel[posicionCarrusel];
}
function reservarInstructor(nombreInstructor, clase) {
    localStorage.setItem("tipoFormulario", "reservaInstructor");
    localStorage.setItem("instructorSeleccionado", nombreInstructor);
    localStorage.setItem("claseSeleccionada", clase);

    window.location.href = "formulario.html";
}

function mostrarReservaSeleccionada() {
    var tipoFormulario = localStorage.getItem("tipoFormulario");
    var instructor = localStorage.getItem("instructorSeleccionado");
    var clase = localStorage.getItem("claseSeleccionada");
    var mensaje = document.getElementById("reservaSeleccionada");

    if (mensaje == null) {
        return;
    }

    if (tipoFormulario == "reservaInstructor" && instructor != null && clase != null) {
        mensaje.innerHTML = "Estás reservando una clase de " + clase + " con " + instructor + ".";
        mensaje.style.display = "block";
    } else {
        mensaje.innerHTML = "";
        mensaje.style.display = "none";
    }
}

function limpiarReserva() {
    localStorage.removeItem("tipoFormulario");
    localStorage.removeItem("instructorSeleccionado");
    localStorage.removeItem("claseSeleccionada");
}

/**
 * Muestra la ventana con los horarios de la clase seleccionada
 */
function mostrarHorarios(nombreClase, horario) {
    const modal = document.getElementById("modalHorarios");
    const titulo = document.getElementById("modalTitulo");
    const cuerpo = document.getElementById("modalCuerpo");

    titulo.innerText = "Horarios: " + nombreClase;
    cuerpo.innerText = horario;
    
    modal.style.display = "block";
}

/**
 * Cierra la ventana modal
 */
function cerrarModal() {
    document.getElementById("modalHorarios").style.display = "none";
}

// Cerrar si el usuario hace clic fuera de la cajita blanca
window.onclick = function(event) {
    const modal = document.getElementById("modalHorarios");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//VENTANA EMERGENTE TIENDA
var productoDetalleNombre = "";
var productoDetallePrecio = 0;
var productoDetalleCantidad = 1;

function verDetalleProducto(nombre, precio, imagen, descripcion) {
    productoDetalleNombre = nombre;
    productoDetallePrecio = precio;
    productoDetalleCantidad = 1;

    document.getElementById("modalNombre").innerHTML = nombre;
    document.getElementById("modalPrecio").innerHTML = "$" + precio.toFixed(2);
    document.getElementById("modalImagen").src = imagen;
    document.getElementById("modalDescripcion").innerHTML = descripcion;
    document.getElementById("cantidadDetalle").innerHTML = productoDetalleCantidad;

    document.getElementById("modalProducto").style.display = "flex";
}

function cerrarDetalleProducto() {
    document.getElementById("modalProducto").style.display = "none";
}

function aumentarCantidadDetalle() {
    productoDetalleCantidad = productoDetalleCantidad + 1;
    document.getElementById("cantidadDetalle").innerHTML = productoDetalleCantidad;
}

function disminuirCantidadDetalle() {
    if (productoDetalleCantidad > 1) {
        productoDetalleCantidad = productoDetalleCantidad - 1;
    }

    document.getElementById("cantidadDetalle").innerHTML = productoDetalleCantidad;
}

function agregarDesdeDetalle() {
    for (var i = 1; i <= productoDetalleCantidad; i++) {
        agregarCarrito(productoDetalleNombre, productoDetallePrecio);
    }

    cerrarDetalleProducto();
}


function actualizarNavbar() {
    const navbar = document.querySelector(".navbar");

    if (!navbar) return;

    if (window.scrollY > 80) {
        navbar.classList.add("nav-transparente");
    } else {
        navbar.classList.remove("nav-transparente");
    }
}

window.addEventListener("scroll", actualizarNavbar);
document.addEventListener("DOMContentLoaded", actualizarNavbar);