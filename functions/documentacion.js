//NAVEGADOR DE TABLAS
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



//FUNCION PARA AGREGAR Y EDITAR DATOS MEDICOS
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
    document.querySelector("table.documentacionM").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idDocumentacion = row.cells[0].innerText;
            var tipoDocumento = row.cells[1].innerText;
            var dni = row.cells[2].innerText;
            var nif = row.cells[3].innerText;
            var nss = row.cells[4].innerText;
            var nroColegiado = row.cells[5].innerText;
            var idMedico = row.cells[6].innerText;


            document.getElementById('id_documentacionEditarM').value = idDocumentacion;
            document.getElementById('tipoEditarM').value = tipoDocumento;
            document.getElementById('dniEditarM').value = dni;
            document.getElementById('nifEditarM').value = nif;
            document.getElementById('nssEditarM').value = nss;
            document.getElementById('colegiadoEditarM').value = nroColegiado;
            document.getElementById('id_medicoEditarM').value = idMedico;


            formularioMedicoEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.documentacionM").addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminarBtn")) {
            if (!confirm("¿Quieres eliminar este registro?")) {
                event.preventDefault();
            }
        }
    });
});






//FUNCION PARA AGREGAR Y EDITAR DATOS EMPLEADOS
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
    document.querySelector("table.documentacionE").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idDocumentacion = row.cells[0].innerText;
            var tipoDocumento = row.cells[1].innerText;
            var dni = row.cells[2].innerText;
            var nif = row.cells[3].innerText;
            var nss = row.cells[4].innerText;
            var idEmpleado = row.cells[5].innerText;


            document.getElementById('id_documentacionEditarE').value = idDocumentacion;
            document.getElementById('tipoEditarE').value = tipoDocumento;
            document.getElementById('dniEditarE').value = dni;
            document.getElementById('nifEditarE').value = nif;
            document.getElementById('nssEditarE').value = nss;
            document.getElementById('id_empleadoEditarE').value = idEmpleado;

            formularioEmpleadoEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.documentacionE").addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminarBtn")) {
            if (!confirm("¿Quieres eliminar este registro?")) {
                event.preventDefault();
            }
        }
    });
});










//FUNCION PARA AGREGAR Y EDITAR DATOS PACIENTES
document.addEventListener("DOMContentLoaded", function () {
    var formularioPacienteAgregar = document.getElementById("formularioAgregarP");
    var formularioPacienteEditar = document.getElementById("formularioEditarP");
    var cerrarPacienteAgregar = document.getElementById("cerrarAgregarP");
    var cerrarPacienteEditar = document.getElementById("cerrarEditarP");

    // Funciones para abrir formularios
    document.getElementById("agregarP").addEventListener("click", function () {
        formularioPacienteAgregar.style.display = "flex";
    });

    // Delegación de eventos para cerrar formularios
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("cerrar-formulario")) {
            formularioPacienteAgregar.style.display = "none";
            formularioPacienteEditar.style.display = "none";
        }
        if (event.target.classList.contains("formulario-container")) {
            event.target.style.display = "none";
        }
    });

    // Delegación de eventos para botones de editar
    document.querySelector("table.documentacionP").addEventListener("click", function (event) {
        if (event.target.classList.contains("editarBtn")) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var idDocumentacion = row.cells[0].innerText;
            var tipoDocumento = row.cells[1].innerText;
            var dni = row.cells[2].innerText;
            var nif = row.cells[3].innerText;
            var nss = row.cells[4].innerText;
            var idPaciente = row.cells[5].innerText;

            document.getElementById('id_documentacionEditarP').value = idDocumentacion;
            document.getElementById('tipoEditarP').value = tipoDocumento;
            document.getElementById('dniEditarP').value = dni;
            document.getElementById('nifEditarP').value = nif;
            document.getElementById('nssEditarP').value = nss;
            document.getElementById('id_pacienteEditarP').value = idPaciente;

            formularioPacienteEditar.style.display = "flex";
        }
    });

    // Delegación de eventos para botones de eliminar
    document.querySelector("table.documentacionP").addEventListener("click", function (event) {
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


  //FUNCION PARA BUSCAR ID DE REGISTRO
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


  //FUNCION PARA BUSCAR ID DE REGISTRO
document.getElementById('buscarInputP').addEventListener('input', function() {
    var input = document.getElementById('buscarInputP').value.toLowerCase();
    var tableBody = document.getElementById('pacienteTableBody');
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