<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultorio | Vacaciones</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="vacaciones.css">
</head>

<body>

  <!--NAVEGADOR-->
  <div class="navegador">
    <nav class="navbar navbar-expand-lg bg-body-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="menu.php" style="color: white;"><b>CONSULTORIO</b></a>
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
          <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscar" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit" style="color: white;">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <!--TITULO-->
  <h2 class="titulo">REGISTRO DE VACACIONES</h2>


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

    <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputM" placeholder="Buscar" aria-label="Search">
          </form>

      <div class="crud-buttons">
        <button id="agregarM" class="agregarBtn">Agregar</button>
      </div>

      <table class="vacacionesM">
        <thead>
          <tr>
            <th>id</th>
            <th>Fecha Inicialización</th>
            <th>Fecha Finalización</th>
            <th>Estado</th>
            <th>Id Medico</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody id="medicoTableBody">
          <?php
          include '../config/connection.php';

          $sql =  "SELECT
        periodo_vacaciones.id_periodo,
        vacaciones.fecha_inicio,
        vacaciones.fecha_fin,
        periodo_vacaciones.estado_vacaciones AS estado,
        medicos.id_medico
    FROM
        periodo_vacaciones
    INNER JOIN vacaciones ON periodo_vacaciones.id_vacacione = vacaciones.id_vacacione
    INNER JOIN medicos ON periodo_vacaciones.id_medico = medicos.id_medico";

          $result = $conn->query($sql);

          if ($result === false) {
            die('Error en la consulta: ' . $conn->error);
          }

          if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {

              //Registrar los datos
              echo "<tr>";
              echo "<td>" . $row["id_periodo"] . "</td>";
              echo "<td>" . $row["fecha_inicio"] . "</td>";
              echo "<td>" . $row["fecha_fin"] . "</td>";
              echo "<td>" . $row["estado"] . "</td>";
              echo "<td>" . $row["id_medico"] . "</td>";
              echo '<td style="white-space: nowrap;">
              <a href="#" id="editar" class="editarBtn">Editar</a>
              <a href="../config/eliminar/eliminar-vacaciones.php?id=' . $row["id_periodo"] . '" class="eliminarBtn" >Eliminar</a>
              </td>';
              echo "</tr>";
            }
          } else { //No hay registros ingresados
            echo "<tr>";
            echo "<td colspan='6'>No hay registros</td>";
            echo "</tr>";
          }

          //Cerrar conexión
          $conn->close();

          ?>
        </tbody>
      </table>
      <p id="busquedaNoResultadaM" style="display:none; font-weight:bold; text-align:center">El medico que buscas no existe</p>

    </div>



    <div id="table-empleados" class="table-container">

    <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputE" placeholder="Buscar" aria-label="Search">
          </form>

      <div class="crud-buttons">
        <button id="agregarE" class="agregarBtn">Agregar</button>
      </div>

      <div class="tabla">

        <table class="vacacionesE">
          <thead>
            <tr>
              <th>id</th>
              <th>Fecha Inicialización</th>
              <th>Fecha Finalización</th>
              <th>Estado</th>
              <th>Id Empleado</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody id="empleadoTableBody">
            <?php
            include '../config/connection.php';

            $sql =  "SELECT
        periodo_vacaciones.id_periodo,
        vacaciones.fecha_inicio,
        vacaciones.fecha_fin,
        periodo_vacaciones.estado_vacaciones AS estado,
        empleados.id_empleado
    FROM
        periodo_vacaciones
    INNER JOIN vacaciones ON periodo_vacaciones.id_vacacione = vacaciones.id_vacacione
    INNER JOIN empleados ON periodo_vacaciones.id_empleado = empleados.id_empleado";

            $result = $conn->query($sql);

            if ($result === false) {
              die('Error en la consulta: ' . $conn->error);
            }

            if ($result->num_rows > 0) {


              while ($row = $result->fetch_assoc()) {

                //Registrar los datos
                echo "<tr>";
                echo "<td>" . $row["id_periodo"] . "</td>";
                echo "<td>" . $row["fecha_inicio"] . "</td>";
                echo "<td>" . $row["fecha_fin"] . "</td>";
                echo "<td>" . $row["estado"] . "</td>";
                echo "<td>" . $row["id_empleado"] . "</td>";
                echo '<td style="white-space: nowrap;">
                <a href="#" id="editar" class="editarBtn">Editar</a>
              <a href="../config/eliminar/eliminar-vacaciones.php?id=' . $row["id_periodo"] . '" class="eliminarBtn" >Eliminar</a>
              </td>';
                echo "</tr>";
              }
            } else { //No hay registros ingresados
              echo "<tr>";
              echo "<td colspan='6'>No hay registros</td>";
              echo "</tr>";
            }

            //Cerrar conexión
            $conn->close();

            ?>
          </tbody>
        </table>
        <p id="busquedaNoResultadaE" style="display:none; font-weight:bold; text-align:center">El empleado que buscas no existe</p>

      </div>
    </div>
  </div>



  <!--FORMULARIO PARA AGREGAR VACACIONES MEDICO-->
  <div id="formularioAgregarM" class="formulario-container">
    <div class="formulario">
      <span id="cerrarAgregarM" class="cerrar-formulario">&times;</span>
      <h2>Registrar Medico:</h2>
      <form class="vacaciones-form" action="../config/guardar/guardar-vacaciones.php" method="post">


        <div class="form-grupo">
          <label for="">Fecha de Inicialización:</label>
          <input type="text" name="fechaI" id="fechaI">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de Finalización:</label>
          <input type="text" name="fechaF" id="fechaF">
        </div>

        <div class="form-grupo">
          <label for="">Estado:</label>
          <input type="text" name="estado" id="estado">
        </div>

        <div class="form-grupo">
          <label for="">Id del Medico:</label>
          <input type="text" name="id_medico" id="id_medico">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>


  <!--FORMULARIO PARA EDITAR VACACIONES MEDICO-->
  <div id="formularioEditarM" class="formulario-container">
    <div class="formulario">
      <span id="cerrarEditarM" class="cerrar-formulario">&times;</span>
      <h2>Editar Medico:</h2>
      <form class="vacaciones-form" action="../config/editar/editar-vacaciones.php" method="post">

        <input type="hidden" name="id_vacacionM" id="id_vacacionMEditar">

        <div class="form-grupo">
          <label for="">Fecha de Inicialización:</label>
          <input type="text" name="fechaI" id="fechaIEditar">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de Finalización:</label>
          <input type="text" name="fechaF" id="fechaFEditar">
        </div>

        <div class="form-grupo">
          <label for="">Estado:</label>
          <input type="text" name="estado" id="estadoEditar">
        </div>

        <div class="form-grupo">
          <label for="">Id del Medico:</label>
          <input type="text" name="id_medico" id="id_medicoEditar">
        </div>

        <input type="submit" name="editar_med" class="editar" value="Actualizar">

      </form>

    </div>

  </div>








  <!--FORMULARIO PARA AGREGAR VACACIONES EMPLEADO-->
  <div id="formularioAgregarE" class="formulario-container">
    <div class="formulario">
      <span id="cerrarAgregarE" class="cerrar-formulario">&times;</span>
      <h2>Registrar Empleado</h2>
      <form class="vacaciones-form" action="../config/guardar/guardar-vacaciones.php" method="post">

        <div class="form-grupo">
          <label for="">Fecha de Inicialización:</label>
          <input type="text" name="fechaI" id="fechaI">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de Finalización:</label>
          <input type="text" name="fechaF" id="fechaF">
        </div>

        <div class="form-grupo">
          <label for="">Estado:</label>
          <input type="text" name="estado" id="estado">
        </div>

        <div class="form-grupo">
          <label for="">Id del Empleado:</label>
          <input type="text" name="id_empleado" id="id_empleado">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>


  <!--FORMULARIO PARA EDITAR VACACIONES EMPLEADO-->
  <div id="formularioEditarE" class="formulario-container">
    <div class="formulario">
      <span id="cerrarEditarE" class="cerrar-formulario">&times;</span>
      <h2>Editar Empleado</h2>
      <form class="vacaciones-form" action="../config/editar/editar-vacaciones.php" method="post">

        <input type="hidden" name="id_vacacionE" id="id_vacacionEditarE">

        <div class="form-grupo">
          <label for="">Fecha de Inicialización:</label>
          <input type="text" name="fechaI" id="fechaIEditarE">
        </div>

        <div class="form-grupo">
          <label for="">Fecha de Finalización:</label>
          <input type="text" name="fechaF" id="fechaFEditarE">
        </div>

        <div class="form-grupo">
          <label for="">Estado:</label>
          <input type="text" name="estado" id="estadoEditarE">
        </div>

        <div class="form-grupo">
          <label for="">Id del Empleado:</label>
          <input type="text" name="id_empleado" id="id_empleadoEditar">
        </div>

        <input type="submit" name="editar_emp" class="editar" value="Actualizar">

      </form>

    </div>

  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/vacaciones.js"></script>
  <script src="../functions/busqueda.js"></script>
  <script src="../functions/jquery.js"></script>
</body>

</html>