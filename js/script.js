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

// VALIDACION DE FORMULARIO DE REGISTRO
function validarRegistro(formulario) {
    var nombre = formulario["nombre"].value.trim();
    var apellido = formulario["apellido"].value.trim();
    var email = formulario["email"].value.trim();
    var celular = formulario["celular"].value.trim();
    var clave = formulario["clave"].value.trim();
    var confirmarClave = formulario["confirmarClave"].value.trim();

    var regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    var regexCelular = /^09\d{8}$/;
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    var valido = true;

    limpiarErroresRegistro();

    if (nombre == "") {
        mostrarErrorCampo("nombre", "errorNombre", "Debe ingresar el nombre.");
        valido = false;
    } else if (!regexLetras.test(nombre)) {
        mostrarErrorCampo("nombre", "errorNombre", "El nombre solo debe contener letras.");
        valido = false;
    } else {
        marcarCampoCorrecto("nombre");
    }

    if (apellido == "") {
        mostrarErrorCampo("apellido", "errorApellido", "Debe ingresar el apellido.");
        valido = false;
    } else if (!regexLetras.test(apellido)) {
        mostrarErrorCampo("apellido", "errorApellido", "El apellido solo debe contener letras.");
        valido = false;
    } else {
        marcarCampoCorrecto("apellido");
    }

    if (email == "") {
        mostrarErrorCampo("email", "errorEmail", "Debe ingresar el correo electrónico.");
        valido = false;
    } else if (!regexEmail.test(email)) {
        mostrarErrorCampo("email", "errorEmail", "Debe ingresar un correo electrónico válido.");
        valido = false;
    } else {
        marcarCampoCorrecto("email");
    }

    if (celular == "") {
        mostrarErrorCampo("celular", "errorCelular", "Debe ingresar el número de celular.");
        valido = false;
    } else if (!regexCelular.test(celular)) {
        mostrarErrorCampo("celular", "errorCelular", "El celular debe empezar con 09 y tener exactamente 10 dígitos.");
        valido = false;
    } else {
        marcarCampoCorrecto("celular");
    }

    if (clave == "") {
        mostrarErrorCampo("clave", "errorClave", "Debe ingresar una contraseña.");
        valido = false;
    } else if (clave.length < 6) {
        mostrarErrorCampo("clave", "errorClave", "La contraseña debe tener al menos 6 caracteres.");
        valido = false;
    } else {
        marcarCampoCorrecto("clave");
    }

    if (confirmarClave == "") {
        mostrarErrorCampo("confirmarClave", "errorConfirmarClave", "Debe confirmar la contraseña.");
        valido = false;
    } else if (clave != confirmarClave) {
        mostrarErrorCampo("confirmarClave", "errorConfirmarClave", "Las contraseñas no coinciden.");
        valido = false;
    } else {
        marcarCampoCorrecto("confirmarClave");
    }

    return valido;
}

function mostrarErrorCampo(idCampo, idError, mensaje) {
    var campo = document.getElementById(idCampo);
    var error = document.getElementById(idError);

    if (campo) {
        campo.classList.add("campo-error");
        campo.classList.remove("campo-correcto");
    }

    if (error) {
        error.innerHTML = mensaje;
    }
}

function marcarCampoCorrecto(idCampo) {
    var campo = document.getElementById(idCampo);

    if (campo) {
        campo.classList.remove("campo-error");
        campo.classList.add("campo-correcto");
    }
}

function limpiarErroresRegistro() {
    var campos = ["nombre", "apellido", "email", "celular", "clave", "confirmarClave"];
    var errores = ["errorNombre", "errorApellido", "errorEmail", "errorCelular", "errorClave", "errorConfirmarClave"];

    for (var i = 0; i < campos.length; i++) {
        var campo = document.getElementById(campos[i]);

        if (campo) {
            campo.classList.remove("campo-error");
            campo.classList.remove("campo-correcto");
        }
    }

    for (var j = 0; j < errores.length; j++) {
        var error = document.getElementById(errores[j]);

        if (error) {
            error.innerHTML = "";
        }
    }
}

// VALIDACIÓN DE FORMULARIO PARA EDITAR PERFIL
function validarEdicion(formulario) {
    var nombre = formulario["nombre"].value.trim();
    var apellido = formulario["apellido"].value.trim();
    var celular = formulario["celular"].value.trim();
    var clave = formulario["clave"].value.trim();
    // Nota: Si agregaste el campo confirmarClave en editar_perfil.php, úsalo aquí:
    var confirmarClave = formulario["confirmarClave"] ? formulario["confirmarClave"].value.trim() : "";

    var regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    var regexCelular = /^09\d{8}$/;

    var valido = true;

    limpiarErroresEdicion();

    // Validar Nombre
    if (nombre == "") {
        mostrarErrorCampo("nombre", "errorNombre", "El nombre es obligatorio.");
        valido = false;
    } else if (!regexLetras.test(nombre)) {
        mostrarErrorCampo("nombre", "errorNombre", "El nombre solo debe contener letras.");
        valido = false;
    } else {
        marcarCampoCorrecto("nombre");
    }

    // Validar Apellido
    if (apellido == "") {
        mostrarErrorCampo("apellido", "errorApellido", "El apellido es obligatorio.");
        valido = false;
    } else if (!regexLetras.test(apellido)) {
        mostrarErrorCampo("apellido", "errorApellido", "El apellido solo debe contener letras.");
        valido = false;
    } else {
        marcarCampoCorrecto("apellido");
    }

    // Validar Celular
    if (celular == "") {
        mostrarErrorCampo("celular", "errorCelular", "El número de celular es obligatorio.");
        valido = false;
    } else if (!regexCelular.test(celular)) {
        mostrarErrorCampo("celular", "errorCelular", "Debe empezar con 09 y tener 10 dígitos.");
        valido = false;
    } else {
        marcarCampoCorrecto("celular");
    }

    // Validar Contraseña (SOLO si el usuario escribió algo)
    if (clave !== "") {
        if (clave.length < 6) {
            mostrarErrorCampo("clave", "errorClave", "La nueva contraseña debe tener al menos 6 caracteres.");
            valido = false;
        } else {
            marcarCampoCorrecto("clave");
            
            // Validar confirmación solo si existe el campo y se escribió una clave
            if (formulario["confirmarClave"] && clave !== confirmarClave) {
                mostrarErrorCampo("confirmarClave", "errorConfirmarClave", "Las contraseñas no coinciden.");
                valido = false;
            } else if (formulario["confirmarClave"]) {
                marcarCampoCorrecto("confirmarClave");
            }
        }
    }

    return valido;
}

function limpiarErroresEdicion() {
    var campos = ["nombre", "apellido", "celular", "clave", "confirmarClave"];
    var errores = ["errorNombre", "errorApellido", "errorCelular", "errorClave", "errorConfirmarClave"];

    campos.forEach(id => {
        var campo = document.getElementById(id);
        if (campo) {
            campo.classList.remove("campo-error", "campo-correcto");
        }
    });

    errores.forEach(id => {
        var error = document.getElementById(id);
        if (error) error.innerHTML = "";
    });
}


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


/*MODAL DE PRODUCTO - TIENDA CON CARRITO PHP */

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

function validarLogin(formulario) {
    var email = formulario["email"].value.trim();
    var clave = formulario["clave"].value.trim();

    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    var valido = true;

    limpiarErroresLogin();

    if (email == "") {
        mostrarErrorCampo("email", "errorEmailLogin", "Debe ingresar el correo electrónico.");
        valido = false;
    } else if (!regexEmail.test(email)) {
        mostrarErrorCampo("email", "errorEmailLogin", "Debe ingresar un correo electrónico válido.");
        valido = false;
    } else {
        marcarCampoCorrecto("email");
    }

    if (clave == "") {
        mostrarErrorCampo("clave", "errorClaveLogin", "Debe ingresar la contraseña.");
        valido = false;
    } else {
        marcarCampoCorrecto("clave");
    }

    return valido;
}

function limpiarErroresLogin() {
    var campos = ["email", "clave"];
    var errores = ["errorEmailLogin", "errorClaveLogin"];

    for (var i = 0; i < campos.length; i++) {
        var campo = document.getElementById(campos[i]);

        if (campo) {
            campo.classList.remove("campo-error");
            campo.classList.remove("campo-correcto");
        }
    }

    for (var j = 0; j < errores.length; j++) {
        var error = document.getElementById(errores[j]);

        if (error) {
            error.innerHTML = "";
        }
    }
}