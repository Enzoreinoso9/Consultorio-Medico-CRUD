//FUNCION PARA AGREGAR Y EDITAR DATOS EN EL FORMULARIO
document.addEventListener("DOMContentLoaded", function () {
    var contenedorFormularioAgregar = document.getElementById("formularioContainer");
    var contenedorFormularioEditar = document.getElementById("formularioEditar");
    var botonCerrarAgregar = document.getElementById("cerrarAgregar");
    var botonCerrarEditar = document.getElementById("cerrarEditar");

    // Funciones para abrir formularios
    document.getElementById("agregar").addEventListener("click", function () {
        contenedorFormularioAgregar.style.display = "flex";
    });

    // Delegación de eventos para cerrar formularios
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("cerrar-formulario")) {
            contenedorFormularioAgregar.style.display = "none";
            contenedorFormularioEditar.style.display = "none";
        }
        if (event.target.classList.contains("formulario-container")) {
            event.target.style.display = "none";
        }
    });

    // Delegación de eventos para botones de editar
    document.querySelector("table.sustitucion").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idSustitucion = row.cells[0].innerText;
            var altaSuplencia = row.cells[1].innerText;
            var bajaSuplencia = row.cells[2].innerText;
            var revista = row.cells[3].innerText;
            var idMedico = row.cells[4].innerText;



            document.getElementById('id_sustitucionEditar').value = idSustitucion;
            document.getElementById('altaEditar').value = altaSuplencia;
            document.getElementById('bajaEditar').value = bajaSuplencia;
            document.getElementById('revistaEditar').value = revista;
            document.getElementById('id_medicoEditar').value = idMedico;


            contenedorFormularioEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.sustitucion").addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminarBtn")) {
            if (!confirm("¿Quieres eliminar este registro?")) {
                event.preventDefault();
            }
        }
    });
});



//FUNCION PARA BUSCAR ID DE REGISTRO
document.getElementById('buscarInput').addEventListener('input', function() {
    var input = document.getElementById('buscarInput').value.toLowerCase();
    var tableBody = document.getElementById('sustitucionTableBody');
    var rows = tableBody.getElementsByTagName('tr');
    var busquedaNoResultada = document.getElementById('busquedaNoResultada');
    var found = false;

    for (var i = 0; i < rows.length; i++) {
      var idCelda = rows[i].getElementsByTagName('td')[0];
      if (idCelda) {
        var idValue = idCelda.textContent || idCelda.innerText;
        if (idValue.toLowerCase().indexOf(input) > -1) {
          rows[i].style.display = '';
          found = true;
        } else {
          rows[i].style.display = 'none';
        }
      }
    }

    if (!found && input !== '') {
      busquedaNoResultada.style.display = '';
    } else {
      busquedaNoResultada.style.display = 'none';
    }
  });