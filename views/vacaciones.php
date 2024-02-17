<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vacaciones</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="vacaciones.css">
</head>

<body>

  <!--NAVEGADOR-->
  <div class="navegador">
    <nav class="navbar navbar-expand-lg bg-body-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu.php" style="color: white;"><b>MAPRIFOR</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
  <h2 class="titulo"> VACACIONES</h2>


  <!--NAVEGADOR DE TABLAS-->

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicos', event)">Medicos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="mostrarTabla('table-empleados',event)">Empleados</a>
  </ul>

  <!--TABLAS-->
  <div class="conten-container">
    <div id="table-medicos" class="table-container">

      

        <table class="vacaciones">
          <thead>
            <tr>
              <th>id</th>
              <th>Apellido</th>
              <th>Especialidad</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Fecha Inicialización</th>
              <th>Fecha Finalización</th>
              <th>Estado</th>
              <th>Id Medico</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Gon</td>
              <td>Kinesiología</td>
              <td>magali@gmail.com</td>
              <td>3704-212134</td>
              <td>2024-01-19</td>
              <td>2024-02-04</td>
              <td>Aprobado</td>
              <td>1</td>
              <td style="white-space: nowrap;">
                <button class="editarBtn" onclick="">Editar</button>
                <button class="eliminarBtn" onclick="">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="crud-buttons">
          <button id="agregar" class="agregarBtn">Agregar</button>
        </div>
      
    </div>



    <div id="table-empleados" class="table-container">

      <div class="tabla">

        <table class="vacaciones">
          <thead>
            <tr>
              <th>id</th>
              <th>Apellido</th>
              <th>Puesto de Trabajo</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Fecha Inicialización</th>
              <th>Fecha Finalización</th>
              <th>Estado</th>
              <th>Id Empleado</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Reinoso</td>
              <td>Aux. Enfermeria</td>
              <td>enzo@gmail.com</td>
              <td>3704-123244</td>
              <td>2024-02-15</td>
              <td>2024-02-28</td>
              <td>Pendiente</td>
              <td>1</td>
              <td style="white-space: nowrap;">
                <button class="editarBtn" onclick="">Editar</button>
                <button class="eliminarBtn" onclick="">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="crud-buttons">
          <button id="agregar" class="agregarBtn">Agregar</button>
        </div>
      </div>
    </div>
  </div>

  <!--FORMULARIO PARA AGREGAR DATOS-->
  <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Empleado</h2>
      <form class="vacaciones-form" action="../config/.php" method="post">

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
          <label for="">Puesto de Trabajo:</label>
          <input type="text" name="puesto" id="puesto">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/vacaciones.js"></script>
</body>

</html>