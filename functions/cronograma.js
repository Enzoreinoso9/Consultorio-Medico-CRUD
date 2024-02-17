//FUNCION PARA AGREGAR 
document.addEventListener("DOMContentLoaded", function () {
    var botonAgregar = document.getElementById("agregar");
    var contenedorFormulario = document.getElementById("formularioContainer");
    var botonCerrar = document.getElementById("cerrar");

    botonAgregar.addEventListener("click", function () {
        contenedorFormulario.style.display = "flex";
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