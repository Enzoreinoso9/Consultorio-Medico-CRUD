<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="pacientes.css">
</head>
<body>
    <!--NAVEGADOR-->
  <div class="navegador">
    <nav class="navbar navbar-expand-lg bg-body-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu.php" style="color: white;"><b>MAPRIFOR</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="medicos.php"><b>Medicos</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empleados.php"><b>Empleados</b></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <b>Opciones</b>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cronograma.php">Cronograma Medicos</a></li>
                <li><a class="dropdown-item" href="citas.php">Citas</a></li>
                <li><a class="dropdown-item" href="vacaciones.php">Vacaciones</a></li>
                <li><a class="dropdown-item" href="sustituciones.php">Sustituciones</a></li>
                <li><a class="dropdown-item" href="medicamentos.php">Medicamentos</a></li>
                <li><a class="dropdown-item" href="documentacion.php">Documentación</a></li>
                <li><a class="dropdown-item" href="direcciones.php">Direcciones</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pacientes.php"><b>Pacientes</b></a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit" style="color: white;">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!--TITULO-->
    <h2 class="titulo">PACIENTES</h2>

<!--TABLA-->
    <div class="tabla">
  
      <table class="paciente">
        <thead>
          <tr>
            <th>id</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Medico Encargado</th>
            <th>Informe Medico</th>
            <th>Acciones</th>
          </tr>
        </thead>
  
        <tbody>
          <tr>
            <td>1</td>
            <td>Gianna Micaela</td>
            <td>Reinoso</td>
            <td>Masculino</td>
            <td>06/10/2008</td>
            <td>3704232312</td>
            <td>gianna@gmail.com</td>
            <td>1</td>
            <td>El paciente se presenta con dolor abdominal y malestar general.</td>
            <td style="white-space: nowrap;">
              <button class="editarBtn" onclick="">Editar</button>
              <button class="eliminarBtn" onclick="">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <div class="crud-buttons">
        <button id="agregar" class="agregarBtn" onclick="">Agregar</button>
      </div>
    </div>


     <!--FORMULARIO PARA AGREGAR DATOS-->
  <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Medico</h2>
      <form class="paciente-form" action="../config/guardar-medico.php" method="post">

        <div class="form-grupo">
          <label for="">Nombres:</label>
          <input type="text" name="nombre" id="nombre">
        </div>

        <div class="form-grupo">
          <label for="">Apellido:</label>
          <input type="text" name="apellido" id="apellido">
        </div>

        <div class="form-grupo">
          <label for="">Sexo:</label>
          <input type="text" name="sexo" id="sexo">
        </div>

        <div class="form-grupo">
          <label for="">Fecha Nacimiento:</label>
          <input type="text" name="fechaN" id="fechaN">
        </div>

        <div class="form-grupo">
          <label for="">Telefono:</label>
          <input type="text" name="telefono" id="telefono">
        </div>

        <div class="form-grupo">
          <label for="">Correo:</label>
          <input type="email" name="correo" id="correo">
        </div>

        <div class="form-grupo">
          <label for="">Medico Encargado:</label>
          <input type="text" name="tipo" id="tipo">
        </div>

        <div class="form-grupo">
          <label for="">Informe Medico:</label>
          <textarea name="informe" id="informe" cols="60" rows="4" placeholder="Escribe aquí la información del paciente.."></textarea>
        </div>


        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>

  
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/pacientes.js"></script>
</body>
</html>