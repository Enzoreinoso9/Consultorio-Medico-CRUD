
//NAV DE TABLAS
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






//FUNCION PARA AGREGAR Y EDITAR DATOS MEDICAMENTO
document.addEventListener("DOMContentLoaded", function () {
    var formularioMedicamentoAgregar = document.getElementById("formularioAgregarM");
    var formularioMedicamentoEditar = document.getElementById("formularioEditarM");
    var cerrarMedicamentoAgregar = document.getElementById("cerrarAgregarM");
    var cerrarMedicamentoEditar = document.getElementById("cerrarEditarM");

    // Funciones para abrir formularios
    document.getElementById("agregarM").addEventListener("click", function () {
        formularioMedicamentoAgregar.style.display = "flex";
    });

    // Delegación de eventos para cerrar formularios
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("cerrar-formulario")) {
            formularioMedicamentoAgregar.style.display = "none";
            formularioMedicamentoEditar.style.display = "none";
        }
        if (event.target.classList.contains("formulario-container")) {
            event.target.style.display = "none";
        }
    });

    // Delegación de eventos para botones de editar
    document.querySelector("table.medicamento").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idMedicamento = row.cells[0].innerText;
            var nombreMedicamento = row.cells[1].innerText;
            var descripcion = row.cells[2].innerText;
            var ingrediente = row.cells[3].innerText;
            var posologia = row.cells[4].innerText;
            var restriccion = row.cells[5].innerText;


            document.getElementById('id_medicamentoEditar').value = idMedicamento;
            document.getElementById('medicamentoEditar').value = nombreMedicamento;
            document.getElementById('descripcionEditar').value = descripcion;
            document.getElementById('ingredienteEditar').value = ingrediente;
            document.getElementById('posologiaEditar').value = posologia;
            document.getElementById('restriccionesEditar').value = restriccion;


            formularioMedicamentoEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.medicamento").addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminarBtn")) {
            if (!confirm("¿Quieres eliminar este registro?")) {
                event.preventDefault();
            }
        }
    });
});





//FUNCION PARA AGREGAR Y EDITAR DATOS PRESCRIPCION
document.addEventListener("DOMContentLoaded", function () {
    var formularioPrescripcionAgregar = document.getElementById("formularioAgregarP");
    var formularioPrescripcionEditar = document.getElementById("formularioEditarP");
    var cerrarMedicamentoAgregar = document.getElementById("cerrarAgregarP");
    var cerrarMedicamentoEditar = document.getElementById("cerrarAgregarP");

    // Funciones para abrir formularios
    document.getElementById("agregarP").addEventListener("click", function () {
        formularioPrescripcionAgregar.style.display = "flex";
    });

    // Delegación de eventos para cerrar formularios
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("cerrar-formulario")) {
            formularioPrescripcionAgregar.style.display = "none";
            formularioPrescripcionEditar.style.display = "none";
        }
        if (event.target.classList.contains("formulario-container")) {
            event.target.style.display = "none";
        }
    });

    // Delegación de eventos para botones de editar
    document.querySelector("table.prescripcion").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idPrescripcion = row.cells[0].innerText;
            var fechaP = row.cells[1].innerText;
            var idMedico = row.cells[2].innerText;
            var idMedicamento = row.cells[3].innerText;
            var idPaciente = row.cells[4].innerText;



            document.getElementById('id_prescripcionEditar').value = idPrescripcion;
            document.getElementById('fechaPEditar').value = fechaP;
            document.getElementById('id_medicoEditar').value = idMedico;
            document.getElementById('id_medicamentoEditar').value = idMedicamento;
            document.getElementById('id_pacienteEditar').value = idPaciente;


            formularioPrescripcionEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.prescripcion").addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminarBtn")) {
            if (!confirm("¿Quieres eliminar este registro?")) {
                event.preventDefault();
            }
        }
    });
});


//FUNCION PARA BUSCAR ID DE REGISTRO
document.getElementById('buscarInputM').addEventListener('input', function() {
    var input = document.getElementById('buscarInputM').value.toLowerCase();
    var tableBody = document.getElementById('medicamentoTableBody');
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


  //FUNCION PARA BUSCAR ID DE REGISTRO
document.getElementById('buscarInputP').addEventListener('input', function() {
    var input = document.getElementById('buscarInputP').value.toLowerCase();
    var tableBody = document.getElementById('prescripcionTableBody');
    var rows = tableBody.getElementsByTagName('tr');
    var busquedaNoResultada = document.getElementById('busquedaNoResultadaP');
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