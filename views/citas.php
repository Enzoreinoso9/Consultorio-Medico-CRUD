<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultorio | Citas</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="citas.css">
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
          <form class="d-flex" id ="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscar" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit" style="color: white;">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
  </div>


  <!--TITULO-->
  <h2 class="titulo">CITAS DE PACIENTES</h2>

  <!--NAVEGADOR DE TABLAS-->

 <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#" >Citas</a>
    </li>
  </ul>


  <!--TABLA-->
  <div class="conten-container">

  <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInput" placeholder="Buscar" aria-label="Search">
          </form>

  <div class="crud-buttons">
      <button id="agregar" class="agregarBtn" onclick="">Agregar</button>
    </div>

    <table class="cita">
      <thead>
        <tr>
          <th>id</th>
          <th>Paciente Programado</th>
          <th>Número de Orden</th>
          <th>Fecha del Turno</th>
          <th>Horario</th>
          <th>Estado de la cita</th>
          <th>Medico encargado</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody id="citaTableBody">
      <?php
                    include '../config/connection.php';

                    $sql =  "SELECT
            citas.id_cita AS cita,
            pacientes.id_paciente,
            citas.numero_orden AS orden,
            citas.fecha_turno AS turno,
            horarios.hora_inicio AS hora,
            citas.estado_cita AS estado,
            medicos.id_medico
    FROM
        citas
    INNER JOIN pacientes ON citas.id_paciente = pacientes.id_paciente
    INNER JOIN horarios ON citas.id_horario = horarios.id_horario
    INNER JOIN medicos ON citas.id_medico = medicos.id_medico";

                    $result = $conn->query($sql);

                    if ($result === false) {
                        die('Error en la consulta: ' . $conn->error);
                    }

                    if ($result->num_rows > 0) {


                        while ($row = $result->fetch_assoc()) {

                            //Registrar los datos
                            echo "<tr>";
                            echo "<td>" . $row["cita"] . "</td>";
                            echo "<td>" . $row["id_paciente"] . "</td>";
                            echo "<td>" . $row["orden"] . "</td>";
                            echo "<td>" . $row["turno"] . "</td>";
                            echo "<td>" . $row["hora"] . "</td>";
                            echo "<td>" . $row["estado"] . "</td>";
                            echo "<td>" . $row["id_medico"] . "</td>";
                            echo '<td style="white-space: nowrap;">
                            <a href="#" id="editar" class="editarBtn">Editar</a>
              <a href="../config/eliminar/eliminar-cita.php?id=' . $row["cita"] . '" class="eliminarBtn" >Eliminar</a>
              </td>';
                            echo "</tr>";
                        }
                    } else { //No hay registros ingresados
                        echo "<tr>";
                        echo "<td colspan='8'>No hay registros</td>";
                        echo "</tr>";
                    }

                    //Cerrar conexión
                    $conn->close();

                    ?>
      </tbody>
    </table>
    <p id="busquedaNoResultada" style="display:none; font-weight:bold; text-align:center">La cita que buscas no existe</p>
  </div>


  <!--FORMULARIO PARA AGREGAR DATOS-->
  <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrarAgregar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Cita</h2>
      <form class="citas-form" action="../config/guardar/guardar-cita.php" method="post">

        <div class="form-grupo">
          <label for="">Paciente Programado: </label>
          <input type="text" name="id_paciente" id="id_paciente">
        </div>

        <div class="form-grupo">
          <label for="">Número de Orden:</label>
          <input type="text" name="numero" id="numero">
        </div>

        <div class="form-grupo">
          <label for="">Fecha del Turno:</label>
          <input type="text" name="fechaTurno" id="fechaTurno">
        </div>

        <div class="form-grupo">
          <label for="">Horario:</label>
          <select name="horario" id="horario">
            <option value="1">8:00 hs</option>
            <option value="2">9:00 hs</option>
            <option value="3">10:00 hs</option>
            <option value="4">11:00 hs</option>
            <option value="5">12:00 hs</option>
            <option value="6">16:00 hs</option>
            <option value="7">17:00 hs</option>
            <option value="8">18:00 hs</option>
            <option value="9">19:00 hs</option>
            <option value="10">20:00 hs</option>
            <option value="11">21:00 hs</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Estado de la Cita:</label>
          <input type="text" name="estado" id="estado">
        </div>

        <div class="form-grupo">
          <label for="">Medico Encargado:</label>
          <input type="text" name="id_medico" id="id_medico">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>


   <!--FORMULARIO PARA EDITAR DATOS-->
   <div id="formularioEditar" class="formulario-container">
    <div class="formulario">
      <span id="cerrarEditar" class="cerrar-formulario">&times;</span>
      <h2>Editar Cita</h2>
      <form class="citas-form" action="../config/editar/editar-cita.php" method="post">

      <input type="hidden" name="id_cita" id="id_citaEditar">

        <div class="form-grupo">
          <label for="">Paciente Programado: </label>
          <input type="text" name="id_paciente" id="id_pacienteEditar">
        </div>

        <div class="form-grupo">
          <label for="">Número de Orden:</label>
          <input type="text" name="numero" id="numeroEditar">
        </div>

        <div class="form-grupo">
          <label for="">Fecha del Turno:</label>
          <input type="text" name="fechaTurno" id="fechaTurnoEditar">
        </div>

        <div class="form-grupo">
          <label for="">Horario:</label>
          <select name="horario" id="horarioEditar">
            <option value="1">8:00 hs</option>
            <option value="2">9:00 hs</option>
            <option value="3">10:00 hs</option>
            <option value="4">11:00 hs</option>
            <option value="5">12:00 hs</option>
            <option value="6">16:00 hs</option>
            <option value="7">17:00 hs</option>
            <option value="8">18:00 hs</option>
            <option value="9">19:00 hs</option>
            <option value="10">20:00 hs</option>
            <option value="11">21:00 hs</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Estado de la Cita:</label>
          <input type="text" name="estado" id="estadoEditar">
        </div>

        <div class="form-grupo">
          <label for="">Medico Encargado:</label>
          <input type="text" name="id_medico" id="id_medicoEditar">
        </div>

        <input type="submit" name="editar_cita" class="editar" value="Actualizar">

      </form>

    </div>

  </div>


  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/citas.js"></script>
  <script src="../functions//busqueda.js"></script>
</body>

</html>