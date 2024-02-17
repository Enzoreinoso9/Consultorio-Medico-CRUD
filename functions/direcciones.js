//PESTAÑAS DE TABLAS
function mostrarTabla(tablaId) {

    // Ocultar todas las tablas
    var tablas = document.getElementsByClassName('table-container');
    for (var i = 0; i < tablas.length; i++) {
        tablas[i].style.display = 'none';
    }

    // Mostrar la tabla correspondiente
    document.getElementById(tablaId).style.display = 'block';

    // Quitar la clase "active" de todos los enlaces
    var enlaces = document.getElementsByClassName('nav-link');
    for (var i = 0; i < enlaces.length; i++) {
        enlaces[i].classList.remove('active');
    }

    // Agregar la clase "active" al enlace seleccionado
    event.currentTarget.classList.add('active');
}


//FUNCION PARA AGREGAR
document.addEventListener("DOMContentLoaded", function () {
    var botonesAgregar = document.querySelectorAll(".agregarBtn");
    var contenedorFormulario = document.getElementById("formularioContainer");
    var botonCerrar = document.getElementById("cerrar");

    botonesAgregar.forEach(function(botonAgregar) {
        botonAgregar.addEventListener("click", function () {
            contenedorFormulario.style.display = "flex";
        });
    });

    botonCerrar.addEventListener("click", function () {
        contenedorFormulario.style.display = "none";
    });

    // Cierra el formulario si se hace clic fuera de él
    window.addEventListener("click", function (event) {
        if (event.target == contenedorFormulario) {
            contenedorFormulario.style.display = "none";
        }
    });

    // Evita que el clic en el formulario cierre la ventana emergente
    contenedorFormulario.querySelector(".formulario").addEventListener("click", function (event) {
        event.stopPropagation();
    });
});



