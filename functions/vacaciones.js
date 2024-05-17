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




//FUNCION PARA AGREGAR Y EDITAR DATOS MEDICO
document.addEventListener("DOMContentLoaded", function () {
    var formularioMedicoAgregar = document.getElementById("formularioAgregarM");
    var formularioMedicoEditar = document.getElementById("formularioEditarM");
    var cerrarMedicoAgregar = document.getElementById("cerrarAgregarM");
    var cerrarMedicoEditar = document.getElementById("cerrarEditarM");

    // Funciones para abrir formularios
    document.getElementById("agregarM").addEventListener("click", function () {
        formularioMedicoAgregar.style.display = "flex";
    });

    // Delegación de eventos para cerrar formularios
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("cerrar-formulario")) {
            formularioMedicoAgregar.style.display = "none";
            formularioMedicoEditar.style.display = "none";
        }
        if (event.target.classList.contains("formulario-container")) {
            event.target.style.display = "none";
        }
    });

    // Delegación de eventos para botones de editar
    document.querySelector("table.vacacionesM").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idVacaciones = row.cells[0].innerText;
            var fechaInicial = row.cells[1].innerText;
            var fechaFinal = row.cells[2].innerText;
            var estado = row.cells[3].innerText;
            var idMedico = row.cells[4].innerText;


            document.getElementById('id_vacacionMEditar').value = idVacaciones;
            document.getElementById('fechaIEditar').value = fechaInicial;
            document.getElementById('fechaFEditar').value = fechaFinal;
            document.getElementById('estadoEditar').value = estado;
            document.getElementById('id_medicoEditar').value = idMedico;


            formularioMedicoEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.vacacionesM").addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminarBtn")) {
            if (!confirm("¿Quieres eliminar este registro?")) {
                event.preventDefault();
            }
        }
    });
});





//FUNCION PARA AGREGAR Y EDITAR DATOS EMPLEADO
document.addEventListener("DOMContentLoaded", function () {
    var formularioEmpleadoAgregar = document.getElementById("formularioAgregarE");
    var formularioEmpleadoEditar = document.getElementById("formularioEditarE");
    var cerrarEmpleadoAgregar = document.getElementById("cerrarAgregarE");
    var cerrarEmpleadoEditar = document.getElementById("cerrarEditarE");

    // Funciones para abrir formularios
    document.getElementById("agregarE").addEventListener("click", function () {
        formularioEmpleadoAgregar.style.display = "flex";
    });

    // Delegación de eventos para cerrar formularios
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("cerrar-formulario")) {
            formularioEmpleadoAgregar.style.display = "none";
            formularioEmpleadoEditar.style.display = "none";
        }
        if (event.target.classList.contains("formulario-container")) {
            event.target.style.display = "none";
        }
    });

    // Delegación de eventos para botones de editar
    document.querySelector("table.vacacionesE").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idVacacionesE = row.cells[0].innerText;
            var fechaInicialE = row.cells[1].innerText;
            var fechaFinalE = row.cells[2].innerText;
            var estadoE = row.cells[3].innerText;
            var idEmpleado = row.cells[4].innerText;



            document.getElementById('id_vacacionEditarE').value = idVacacionesE;
            document.getElementById('fechaIEditarE').value = fechaInicialE;
            document.getElementById('fechaFEditarE').value = fechaFinalE;
            document.getElementById('estadoEditarE').value = estadoE;
            document.getElementById('id_empleadoEditar').value = idEmpleado;


            formularioEmpleadoEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.vacacionesE").addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminarBtn")) {
            if (!confirm("¿Quieres eliminar este registro?")) {
                event.preventDefault();
            }
        }
    });
});




//FUNCION PARA BUSCAR ID DE REGISTRO MEDICO
document.getElementById('buscarInputM').addEventListener('input', function() {
    var input = document.getElementById('buscarInputM').value.toLowerCase();
    var tableBody = document.getElementById('medicoTableBody');
    var rows = tableBody.getElementsByTagName('tr');
    var busquedaNoResultada = document.getElementById('busquedaNoResultadaM');
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


  //FUNCION PARA BUSCAR ID DE REGISTRO EMPLEADO
document.getElementById('buscarInputE').addEventListener('input', function() {
    var input = document.getElementById('buscarInputE').value.toLowerCase();
    var tableBody = document.getElementById('empleadoTableBody');
    var rows = tableBody.getElementsByTagName('tr');
    var busquedaNoResultada = document.getElementById('busquedaNoResultadaE');
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