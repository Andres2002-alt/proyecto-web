function irInicio() {
    window.location.href = "index.html";
}
function irAlPago() {
    if (estaLogueado()) {
        window.location.href = "pago.html";
    } else {
        guardarDestinoPendiente("pago.html");
        window.location.href = "login.html";
    }
}

function aumentarImagen(imagen) {
    imagen.style.transform = "scale(1.03)";
    imagen.style.transition = "0.35s";
}

function volverImagen(imagen) {
    imagen.style.transform = "scale(1)";
    imagen.style.transition = "0.35s";
}

function clicImagen(imagen) {
    imagen.style.transform = "scale(1.03)";
    imagen.style.transition = "0.35s";
}

function reservarClase() {
    window.location.href = "formulario.html";
}

//FUNCION PARA AGREGAR PRODUCTOS AL CARRITO DE COMPRAS
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
    
  
    Swal.fire({
        title: '¡Añadido!',
        text: `Has agregado ${nombre} al carrito con éxito.`,
        icon: 'success',
        confirmButtonColor: '#ff6600', // Usa el naranja de tu marca
        timer: 2000, // Se cierra solo en 2 segundos
        showConfirmButton: false, // Oculta el botón para que sea más fluido
        toast: true, // Lo hace ver como una pequeña burbuja
        position: 'top-end' // Aparece en la esquina superior derecha
    });
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
    var subtotalGeneral = 0;
    var iva = 0;
    var total = 0;

    if (!tabla) {
        return;
    }

    tabla.innerHTML = "";

    if (carrito.length === 0) {
        tabla.innerHTML =
            "<tr>" +
                "<td colspan='5' class='carrito-vacio'>Tu carrito está vacío</td>" +
            "</tr>";

        if (document.getElementById("subtotalCompra")) {
            document.getElementById("subtotalCompra").innerHTML = "$0.00";
        }

        if (document.getElementById("ivaCompra")) {
            document.getElementById("ivaCompra").innerHTML = "$0.00";
        }

        if (document.getElementById("totalCompra")) {
            document.getElementById("totalCompra").innerHTML = "$0.00";
        }

        actualizarContadorVisual();
        return;
    }

    for (var i = 0; i < carrito.length; i++) {
        var producto = carrito[i];
        var subtotal = producto.precio * producto.cantidad;
        subtotalGeneral = subtotalGeneral + subtotal;

        tabla.innerHTML +=
            "<tr>" +
                "<td>" + producto.nombre + "</td>" +

                "<td class='cantidad-carrito'>" +
                    "<button type='button' class='btn-cantidad' onclick='disminuirCantidad(" + i + ")'>-</button>" +
                    "<span>" + producto.cantidad + "</span>" +
                    "<button type='button' class='btn-cantidad' onclick='aumentarCantidad(" + i + ")'>+</button>" +
                "</td>" +

                "<td>$" + producto.precio.toFixed(2) + "</td>" +
                "<td>$" + subtotal.toFixed(2) + "</td>" +

                "<td>" +
                    "<button type='button' class='btn-eliminar' onclick='eliminarProducto(" + i + ")'>Eliminar</button>" +
                "</td>" +
            "</tr>";
    }

    iva = subtotalGeneral * 0.15;
    total = subtotalGeneral + iva;

    if (document.getElementById("subtotalCompra")) {
        document.getElementById("subtotalCompra").innerHTML = "$" + subtotalGeneral.toFixed(2);
    }

    if (document.getElementById("ivaCompra")) {
        document.getElementById("ivaCompra").innerHTML = "$" + iva.toFixed(2);
    }

    if (document.getElementById("totalCompra")) {
        document.getElementById("totalCompra").innerHTML = "$" + total.toFixed(2);
    }

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

// registrarCliente
function registrarCliente(event) {
    event.preventDefault();

    const nombre = document.getElementById("nombreCliente").value.trim();
    const apellido = document.getElementById("apellidoCliente").value.trim();
    const email = document.getElementById("emailCliente").value.trim();
    const celular = document.getElementById("celularCliente").value.trim();
    const clave = document.getElementById("claveCliente").value;
    const confirmarClave = document.getElementById("confirmarClaveCliente").value;

    const cedulaInput = document.getElementById("cedulaCliente");
    const cedula = cedulaInput ? cedulaInput.value.trim() : "";

    const regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    const regexCelular = /^09\d{8}$/;
    const regexCedula = /^\d{10}$/;

    if (!regexLetras.test(nombre)) {
        alert("Ingresa un nombre válido.");
        return;
    }

    if (!regexLetras.test(apellido)) {
        alert("Ingresa un apellido válido.");
        return;
    }

    if (cedulaInput && !regexCedula.test(cedula)) {
        alert("La cédula debe tener exactamente 10 dígitos.");
        return;
    }

    if (!regexCelular.test(celular)) {
        alert("El número de celular debe empezar con 09 y tener 10 dígitos.");
        return;
    }

    if (clave.length < 6) {
        alert("La contraseña debe tener al menos 6 caracteres.");
        return;
    }

    if (clave !== confirmarClave) {
        alert("Las contraseñas no coinciden.");
        return;
    }

    const cliente = {
        nombre: nombre,
        apellido: apellido,
        cedula: cedula,
        email: email,
        celular: celular
    };

    localStorage.setItem("clientePowerFit", JSON.stringify(cliente));
    localStorage.setItem("clienteLogueado", "true");

    alert("Cuenta creada correctamente.");
    window.location.href = "pago.html";
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

document.addEventListener("DOMContentLoaded", function() {
    const miFormulario = document.getElementById("formRegistro");

    if (miFormulario == null) {
        return;
    }

    miFormulario.addEventListener("submit", function(evento) {
        const esValido = validarRegistro(miFormulario);

        if (esValido) {
            alert("Validación correcta. Procesando inscripción...");
            console.log("Datos listos para enviar.");
        } else {
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

function mostrarDetalles(nombreClase, duracion, intensidad, disponibilidad) {
    const modal = document.getElementById("modalHorarios");
    const titulo = document.getElementById("modalTitulo");
    const cuerpo = document.getElementById("modalCuerpo");

    titulo.innerText = "Clase: " + nombreClase;
    cuerpo.innerHTML = `
        <p><strong>Duración:</strong> ${duracion}</p>
        <p><strong>Intensidad:</strong> ${intensidad}</p>
        <p><strong>Disponibilidad:</strong> ${disponibilidad}</p>
    `;
    
    modal.style.display = "block";
}

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

document.addEventListener("DOMContentLoaded", function () {
    const heroSlider = document.getElementById("heroSlider");

    if (!heroSlider) return;

    const heroSlides = heroSlider.querySelectorAll(".hero-slide");
    let heroIndex = 0;
    const totalSlides = heroSlides.length;

    function moverHero() {
        heroIndex++;
        heroSlider.style.transition = "transform 0.8s ease-in-out";
        heroSlider.style.transform = `translateX(-${heroIndex * 100}%)`;

        if (heroIndex === totalSlides - 1) {
            setTimeout(() => {
                heroSlider.style.transition = "none";
                heroSlider.style.transform = "translateX(0)";
                heroIndex = 0;
            }, 800);
        }
    }

    setInterval(moverHero, 2000);
});

function finalizarPago(evento) {
    evento.preventDefault();

    localStorage.removeItem("carrito");
    localStorage.removeItem("planSeleccionado");

    alert("Pago realizado correctamente.");
    window.location.href = "mensaje.html";
}
/* =========================================================
   MODAL DE PRODUCTO - TIENDA CON CARRITO PHP
========================================================= */

var productoDetalleCantidad = 1;

function verDetalleProducto(nombre, precio, imagen, descripcion, tamano, ingredientes, especificaciones, idProducto) {
    var modal = document.getElementById("modalProducto");
    var titulo = document.getElementById("modalTitulo");
    var descripcionModal = document.getElementById("modalDescripcion");
    var cuerpo = document.getElementById("modalCuerpo");
    var imagenProducto = document.getElementById("modalImagen");
    var cantidadTexto = document.getElementById("cantidadDetalle");
    var inputCantidad = document.getElementById("cantidadProductoModal");
    var inputProducto = document.getElementById("idProductoModal");

    productoDetalleCantidad = 1;

    if (titulo) {
        titulo.innerText = nombre;
    }

    if (descripcionModal) {
        descripcionModal.innerText = descripcion;
    }

    if (imagenProducto) {
        imagenProducto.src = imagen;
    }

    if (cuerpo) {
        cuerpo.innerHTML =
            "<p><strong>Precio:</strong> $" + parseFloat(precio).toFixed(2) + "</p>" +
            "<p><strong>Tamaño:</strong> " + tamano + "</p>" +
            "<p><strong>Ingredientes:</strong> " + ingredientes + "</p>" +
            "<p><strong>Especificaciones:</strong> " + especificaciones + "</p>";
    }

    if (cantidadTexto) {
        cantidadTexto.innerText = productoDetalleCantidad;
    }

    if (inputCantidad) {
        inputCantidad.value = productoDetalleCantidad;
    }

    if (inputProducto) {
        inputProducto.value = idProducto;
    }

    if (modal) {
        modal.style.display = "flex";
    }
}

function cerrarModalProducto() {
    var modal = document.getElementById("modalProducto");

    if (modal) {
        modal.style.display = "none";
    }
}

function aumentarCantidadDetalle() {
    var cantidadTexto = document.getElementById("cantidadDetalle");
    var inputCantidad = document.getElementById("cantidadProductoModal");

    productoDetalleCantidad = productoDetalleCantidad + 1;

    if (cantidadTexto) {
        cantidadTexto.innerText = productoDetalleCantidad;
    }

    if (inputCantidad) {
        inputCantidad.value = productoDetalleCantidad;
    }
}

function disminuirCantidadDetalle() {
    var cantidadTexto = document.getElementById("cantidadDetalle");
    var inputCantidad = document.getElementById("cantidadProductoModal");

    if (productoDetalleCantidad > 1) {
        productoDetalleCantidad = productoDetalleCantidad - 1;
    }

    if (cantidadTexto) {
        cantidadTexto.innerText = productoDetalleCantidad;
    }

    if (inputCantidad) {
        inputCantidad.value = productoDetalleCantidad;
    }
}

window.addEventListener("click", function(evento) {
    var modal = document.getElementById("modalProducto");

    if (modal && evento.target === modal) {
        cerrarModalProducto();
    }
});
