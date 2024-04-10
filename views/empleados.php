<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empleados</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="empleados.css">
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
  <h2 class="titulo">REGISTRO DE LOS EMPLEADOS</h2>

  <!--NAVEGADOR DE TABLAS-->

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Empleados</a>
    </li>
  </ul>

  <!--TABLA-->
  <div class="conten-container">

    <table class="empleado">
      <thead>
        <tr>
          <th>id</th>
          <th>Nombres</th>
          <th>Apellido</th>
          <th>Sexo</th>
          <th>Fecha Nacimiento</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Puesto</th>
          <th>Acciones</th>
        </tr>
      </thead>


      <tbody>
        <?php
      include '../config/connection.php';

        $sql =  "SELECT
      empleados.id_empleado,
      registros.nombres AS nombres,
      registros.apellidos AS apellidos,
      personas.sexo,
      personas.fecha_nacimiento,
      datos_personales.telefonos,
      datos_personales.correo,
      puestos_trabajos.nombre_puesto AS puesto
  FROM
      empleados
      INNER JOIN personas ON empleados.id_persona = personas.id_persona
      INNER JOIN datos_personales ON personas.id_persona = datos_personales.id_persona
      INNER JOIN puestos_trabajos ON empleados.id_puesto = puestos_trabajos.id_puesto
      INNER JOIN registros ON personas.id_registro = registros.id_registro";

        $result = $conn->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $conn->error);
        }

        if ($result->num_rows > 0) {


          while ($row = $result->fetch_assoc()) {

            //Registrar los datos
            echo "<tr>";
            echo "<td>" . $row["id_empleado"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            echo "<td>" . $row["apellidos"] . "</td>";
            echo "<td>" . $row["sexo"] . "</td>";
            echo "<td>" . $row["fecha_nacimiento"] . "</td>";
            echo "<td>" . $row["telefonos"] . "</td>";
            echo "<td>" . $row["correo"] . "</td>";
            echo "<td>" . $row["puesto"] . "</td>";
            echo '<td style="white-space: nowrap;">
            <button class="editarBtn" onclick="">Editar</button>
            <a href="../config/eliminar-empleado.php?id=' . $row["id_empleado"] . '" class="eliminarBtn" >Eliminar</a>
            </td>';
            echo "</tr>";
          }
        } else { //No hay registros ingresados
          echo "<tr>";
          echo "<td colspan='9'>No hay registros</td>";
          echo "</tr>";
        }

        //Cerrar conexión
        $conn->close();

        ?>
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
      <h2>Registrar Empleado</h2>
      <form class="empleado-form" action="../config/guardar-empleado.php" method="post">

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
  <script src="../functions/empleados.js"></script>
</body>

</html>