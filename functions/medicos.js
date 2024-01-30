
//FUNCION PARA AGREGAR MEDICOS
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


//FUNCION PARA ELIMINAR MEDICOS

function confirmacion(event) {
    if (confirm("¿Quieres eliminar este registro?")) {
        return true;
    } else {
        event.preventDefault();
    }
}


let linkdelete = document.querySelectorAll(".eliminarBtn");
for (var i = 0 ; i < linkdelete.length ; i++) {
    linkdelete[i].addEventListener("click", confirmacion);
}





