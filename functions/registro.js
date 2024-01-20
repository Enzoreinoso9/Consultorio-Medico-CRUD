
//Seleccion de Cargo
function mostrarCampos() {
  var tipoUsuario = document.getElementById("tipoUsuario").value;

// Ocultar todas las opciones por defecto
  document.querySelector('.opcionMedico').style.display = 'none';
  document.querySelector('.opcionEmpleado').style.display = 'none';
  document.querySelector('.opcionPaciente').style.display = 'none';

// Mostrar la opción seleccionada
    if (tipoUsuario === 'medico') {
      document.querySelector('.opcionMedico').style.display = 'block';
  } else if (tipoUsuario === 'empleado') {
      document.querySelector('.opcionEmpleado').style.display = 'block';
  } else if (tipoUsuario === 'paciente') {
      document.querySelector('.opcionPaciente').style.display = 'block';
 }
}


