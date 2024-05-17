<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultorio | Sustituciones</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="sustituciones.css">
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
  <h2 class="titulo">SUSTITUCIÓN DE MEDICOS</h2>

  <!--NAVEGADOR DE TABLAS-->

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Sustituciones</a>
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

    <table class="sustitucion">
      <thead>
        <tr>
          <th>id</th>
          <th>Alta Suplencia</th>
          <th>Baja Suplencia</th>
          <th>Tipo de Revista</th>
          <th>Id del Medico</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody id="sustitucionTableBody">
        <?php
        include '../config/connection.php';


        $sql =  "SELECT
    sustituciones.id_sustitucion AS id,
    sustituciones.alta_suplencia AS Alta_Suplencia,
    sustituciones.baja_suplencia AS Baja_Suplencia,
    revistas.tipo_revista AS Tipo_Revista,
    sustituciones.id_medico AS Id_Medico
FROM
    sustituciones
    INNER JOIN revistas ON sustituciones.id_revista = revistas.id_revista";

        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            //Registrar los datos
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["Alta_Suplencia"] . "</td>";
            echo "<td>" . $row["Baja_Suplencia"] . "</td>";
            echo "<td>" . $row["Tipo_Revista"] . "</td>";
            echo "<td>" . $row["Id_Medico"] . "</td>";
            echo '<td style="white-space: nowrap;">
            <a href="#" id="editar" class="editarBtn">Editar</a>
          <a href="../config/eliminar/eliminar-sustitucion.php?id=' . $row["id"] . '" class="eliminarBtn" >Eliminar</a>
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
    <p id="busquedaNoResultada" style="display:none; font-weight:bold; text-align:center">La sustitución que buscas no existe</p>

  </div>

  <!--FORMULARIO PARA AGREGAR DATOS-->
  <div id="formularioContainer" class="formulario-container">
    <div class="formulario">
      <span id="cerrarAgregar" class="cerrar-formulario">&times;</span>
      <h2>Registrar Sustitución</h2>
      <form class="sustitucion-form" action="../config/guardar/guardar-sustitucion.php" method="post">

        <div class="form-grupo">
          <label for="">Alta Suplencia:</label>
          <input type="text" name="alta" id="alta">
        </div>

        <div class="form-grupo">
          <label for="">Baja Suplencia:</label>
          <input type="text" name="baja" id="baja">
        </div>

        <div class="form-grupo">
          <label for="">Tipo de Revista:</label>
          <input type="text" name="revista" id="revista">
        </div>

        <div class="form-grupo">
          <label for="">Id del Medico:</label>
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
      <h2>Registrar Sustitución</h2>
      <form class="sustitucion-form" action="../config/editar/editar-sustitucion.php" method="post">

        <input type="hidden" name="id_sustitucion" id="id_sustitucionEditar">

        <div class="form-grupo">
          <label for="">Alta Suplencia:</label>
          <input type="text" name="alta" id="altaEditar">
        </div>

        <div class="form-grupo">
          <label for="">Baja Suplencia:</label>
          <input type="text" name="baja" id="bajaEditar">
        </div>

        <div class="form-grupo">
          <label for="">Tipo de Revista:</label>
          <input type="text" name="revista" id="revistaEditar">
        </div>

        <div class="form-grupo">
          <label for="">Id del Medico:</label>
          <input type="text" name="id_medico" id="id_medicoEditar">
        </div>

        <input type="submit" name="editar_sust" class="editar" value="Actualizar">

      </form>

    </div>

  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/jquery.js"></script>
  <script src="../functions/sustituciones.js"></script>
  <script src="../functions/busqueda.js"></script>
</body>

</html>