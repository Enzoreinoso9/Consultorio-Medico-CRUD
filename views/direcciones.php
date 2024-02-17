<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="direcciones.css">
</head>

<body>

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
  <h2 class="titulo">DIRECCIÓN</h2>

  <!--NAVEGADOR DE TABLAS-->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicos', event)">Medicos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="mostrarTabla('table-empleados',event)">Empleados</a>
    <li class="nav-item">
      <a class="nav-link " href="#" onclick="mostrarTabla('table-pacientes', event)">Pacientes</a>
    </li>
  </ul>

  <!--TABLAS-->
  <div class="conten-container">
    <div id="table-medicos" class="table-container">

      

        <table class="documentacion">
          <thead>
            <tr>
              <th>id</th>
              <th>Tipo de Residencia</th>
              <th>País</th>
              <th>Provincia</th>
              <th>Localidad</th>
              <th>Población</th>
              <th>Código Postal</th>
              <th>Barrio</th>
              <th>Calle</th>
              <th>Id Medico</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Deparrtamento</td>
              <td>Argentina</td>
              <td>Formosa</td>
              <td>Formosa</td>
              <td>606.041</td>
              <td>3600</td>
              <td>San Martin</td>
              <td>Corrientes 1090</td>
              <td>1</td>
              <td style="white-space: nowrap;">
                <button class="editarBtn" onclick="">Editar</button>
                <button class="eliminarBtn" onclick="">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="crud-buttons">
          <button class="agregarBtn">Agregar</button>
        </div>
      
    </div>
  


  <div id="table-empleados" class="table-container">

    

      <table class="documentacion">
        <thead>
          <tr>
            <th>id</th>
            <th>Tipo de Residencia</th>
            <th>País</th>
            <th>Provincia</th>
            <th>Localidad</th>
            <th>Población</th>
            <th>Código Postal</th>
            <th>Barrio</th>
            <th>Calle</th>
            <th>Id Empleado</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Casa</td>
            <td>Argentina</td>
            <td>Formosa</td>
            <td>Formosa</td>
            <td>606.041</td>
            <td>3600</td>
            <td>La Nueva Fsa</td>
            <td>Mz-60 C-19</td>
            <td>1</td>
            <td style="white-space: nowrap;">
              <button class="editarBtn" onclick="">Editar</button>
              <button class="eliminarBtn" onclick="">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="crud-buttons">
        <button  class="agregarBtn">Agregar</button>
      </div>
    
  </div>



  <div id="table-pacientes" class="table-container">

    

      <table class="documentacion">
        <thead>
          <tr>
            <th>id</th>
            <th>Tipo de Residencia</th>
            <th>País</th>
            <th>Provincia</th>
            <th>Localidad</th>
            <th>Población</th>
            <th>Código Postal</th>
            <th>Barrio</th>
            <th>Calle</th>
            <th>Id Paciente</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Casa</td>
            <td>Argentina</td>
            <td>Formosa</td>
            <td>Clorinda</td>
            <td>606.041</td>
            <td>3610</td>
            <td>8 de Diciembre</td>
            <td>Paraguay 1230</td>
            <td>1</td>
            <td style="white-space: nowrap;">
              <button class="editarBtn" onclick="">Editar</button>
              <button class="eliminarBtn" onclick="">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="crud-buttons">
        <button  class="agregarBtn">Agregar</button>
      </div>

    
  </div>
  </div>

  <!--FORMULARIO PARA AGREGAR DATOS-->
  <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Dirección</h2>
      <form class="direccion-form" action="../config/.php" method="post">

        <div class="form-grupo">
          <label for="">Tipo de Residencia:</label>
          <input type="text" name="residencia" id="residencia">
        </div>

        <div class="form-grupo">
          <label for="">País:</label>
          <input type="text" name="pais" id="pais">
        </div>

        <div class="form-grupo">
          <label for="">Provincia:</label>
          <input type="text" name="provincia" id="provincia">
        </div>

        <div class="form-grupo">
          <label for="">Localidad:</label>
          <input type="text" name="localidad" id="localidad">
        </div>

        <div class="form-grupo">
          <label for="">Población:</label>
          <input type="text" name="poblacion" id="poblacion">
        </div>

        <div class="form-grupo">
          <label for="">Código Postal:</label>
          <input type="text" name="codigoP" id="codigoP">
        </div>

        <div class="form-grupo">
          <label for="">Barrio:</label>
          <input type="text" name="barrio" id="barrio">
        </div>

        <div class="form-grupo">
          <label for="">Calle:</label>
          <input type="text" name="calle" id="calle">
        </div>

        <div class="form-grupo table-medicos">
          <label for="">Id del Medico:</label>
          <input type="text" name="medico" id="medico">
        </div>

        <div class="form-grupo table-empleados">
          <label for="">Id del Empleado:</label>
          <input type="text" name="empleado" id="empleado">
        </div>

        <div class="form-grupo table-pacientes">
          <label for="">Id del Paciente:</label>
          <input type="text" name="paciente" id="paciente">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>
  

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/direcciones.js"></script>
</body>

</html>