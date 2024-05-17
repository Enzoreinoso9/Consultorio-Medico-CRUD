<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultorio | Direcciones</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="direcciones.css">
</head>

<body>

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
  <h2 class="titulo">REGISTRO DE LAS DIRECCIONES</h2>

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

    <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputM" placeholder="Buscar" aria-label="Search">
          </form>

      <div class="crud-buttons">
        <button id="agregarM" class="agregarBtn">Agregar</button>
      </div>


      <table class="direccionM">
        <thead>
          <tr>
            <th>id</th>
            <th>Tipo de Residencia</th>
            <th>País</th>
            <th>Provincia</th>
            <th>Población</th>
            <th>Localidad</th>
            <th>Código Postal</th>
            <th>Barrio</th>
            <th>Calle</th>
            <th>Id Medico</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody id="medicoTableBody">
          <?php
          include '../config/connection.php';

          $sql =  "SELECT
        direcciones.id_direccion AS direccion,
        direcciones.tipo_residencia AS residencia,
        paises.nombres AS pais,
        provincias.nombres AS provincia,
        provincias.poblacion,
        localidades.nombres AS localidad,
        localidades.codigo_postal,
        barrios.nombres AS barrio,
        calles.nombres_altura AS calle,
        medicos.id_medico
    FROM
        direcciones
        INNER JOIN paises ON direcciones.id_pais = paises.id_pais
        INNER JOIN provincias ON direcciones.id_provincia = provincias.id_provincia
        INNER JOIN localidades ON direcciones.id_localidad = localidades.id_localidad
        INNER JOIN barrios ON direcciones.id_barrio = barrios.id_barrio
        INNER JOIN calles ON direcciones.id_calle = calles.id_calle
        INNER JOIN medicos ON direcciones.id_medico = medicos.id_medico";


          $result = $conn->query($sql);

          if ($result === false) {
            die('Error en la consulta: ' . $conn->error);
          }

          if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {

              //Registrar los datos
              echo "<tr>";
              echo "<td>" . $row["direccion"] . "</td>";
              echo "<td>" . $row["residencia"] . "</td>";
              echo "<td>" . $row["pais"] . "</td>";
              echo "<td>" . $row["provincia"] . "</td>";
              echo "<td>" . $row["poblacion"] . "</td>";
              echo "<td>" . $row["localidad"] . "</td>";
              echo "<td>" . $row["codigo_postal"] . "</td>";
              echo "<td>" . $row["barrio"] . "</td>";
              echo "<td>" . $row["calle"] . "</td>";
              echo "<td>" . $row["id_medico"] . "</td>";
              echo '<td style="white-space: nowrap;">
            <a href="#" id="editar" class="editarBtn">Editar</a>
        <a href="../config/eliminar/eliminar-direcciones.php?id=' . $row["direccion"] . '" class="eliminarBtn">Eliminar</a>
      </td>';
              echo "</tr>";
            }
          } else { //No hay registros ingresados
            echo "<tr>";
            echo "<td colspan='11'>No hay registros</td>";
            echo "</tr>";
          }

          //Cerrar conexión
          $conn->close();
          ?>
        </tbody>
      </table>
      <p id="busquedaNoResultadaM" style="display:none; font-weight:bold; text-align:center">La dirección del medico que buscas no existe</p>
    </div>



    <div id="table-empleados" class="table-container">

    <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputE" placeholder="Buscar" aria-label="Search">
          </form>

      <div class="crud-buttons">
        <button id="agregarE" class="agregarBtn">Agregar</button>
      </div>

      <table class="direccionE">
        <thead>
          <tr>
            <th>id</th>
            <th>Tipo de Residencia</th>
            <th>País</th>
            <th>Provincia</th>
            <th>Población</th>
            <th>Localidad</th>
            <th>Código Postal</th>
            <th>Barrio</th>
            <th>Calle</th>
            <th>Id Empleado</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody id="empleadoTableBody">
          <?php
          include '../config/connection.php';

          $sql =  "SELECT
        direcciones.id_direccion AS direccion,
        direcciones.tipo_residencia AS residencia,
        paises.nombres AS pais,
        provincias.nombres AS provincia,
        provincias.poblacion,
        localidades.nombres AS localidad,
        localidades.codigo_postal,
        barrios.nombres AS barrio,
        calles.nombres_altura AS calle,
        empleados.id_empleado
    FROM
        direcciones
        INNER JOIN paises ON direcciones.id_pais = paises.id_pais
        INNER JOIN provincias ON direcciones.id_provincia = provincias.id_provincia
        INNER JOIN localidades ON direcciones.id_localidad = localidades.id_localidad
        INNER JOIN barrios ON direcciones.id_barrio = barrios.id_barrio
        INNER JOIN calles ON direcciones.id_calle = calles.id_calle
        INNER JOIN empleados ON direcciones.id_empleado = empleados.id_empleado";


          $result = $conn->query($sql);

          if ($result === false) {
            die('Error en la consulta: ' . $conn->error);
          }

          if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {

              //Registrar los datos
              echo "<tr>";
              echo "<td>" . $row["direccion"] . "</td>";
              echo "<td>" . $row["residencia"] . "</td>";
              echo "<td>" . $row["pais"] . "</td>";
              echo "<td>" . $row["provincia"] . "</td>";
              echo "<td>" . $row["poblacion"] . "</td>";
              echo "<td>" . $row["localidad"] . "</td>";
              echo "<td>" . $row["codigo_postal"] . "</td>";
              echo "<td>" . $row["barrio"] . "</td>";
              echo "<td>" . $row["calle"] . "</td>";
              echo "<td>" . $row["id_empleado"] . "</td>";
              echo '<td style="white-space: nowrap;">
            <a href="#" class="editarBtn">Editar</a>
        <a href="../config/eliminar/eliminar-direcciones.php?id=' . $row["direccion"] . '" class="eliminarBtn">Eliminar</a>
      </td>';
              echo "</tr>";
            }
          } else { //No hay registros ingresados
            echo "<tr>";
            echo "<td colspan='11'>No hay registros</td>";
            echo "</tr>";
          }

          //Cerrar conexión
          $conn->close();
          ?>
        </tbody>
      </table>

      <p id="busquedaNoResultadaE" style="display:none; font-weight:bold; text-align:center">La dirección del empleado que buscas no existe</p>

    </div>



    <div id="table-pacientes" class="table-container">

    <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputP" placeholder="Buscar" aria-label="Search">
          </form>

      <div class="crud-buttons">
        <button id="agregarP" class="agregarBtn">Agregar</button>
      </div>

      <table class="direccionP">
        <thead>
          <tr>
            <th>id</th>
            <th>Tipo de Residencia</th>
            <th>País</th>
            <th>Provincia</th>
            <th>Población</th>
            <th>Localidad</th>
            <th>Código Postal</th>
            <th>Barrio</th>
            <th>Calle</th>
            <th>Id Paciente</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody id="pacienteTableBody">
          <?php
          include '../config/connection.php';

          $sql =  "SELECT
        direcciones.id_direccion AS direccion,
        direcciones.tipo_residencia AS residencia,
        paises.nombres AS pais,
        provincias.nombres AS provincia,
        provincias.poblacion,
        localidades.nombres AS localidad,
        localidades.codigo_postal,
        barrios.nombres AS barrio,
        calles.nombres_altura AS calle,
        pacientes.id_paciente
    FROM
        direcciones
        INNER JOIN paises ON direcciones.id_pais = paises.id_pais
        INNER JOIN provincias ON direcciones.id_provincia = provincias.id_provincia
        INNER JOIN localidades ON direcciones.id_localidad = localidades.id_localidad
        INNER JOIN barrios ON direcciones.id_barrio = barrios.id_barrio
        INNER JOIN calles ON direcciones.id_calle = calles.id_calle
        INNER JOIN pacientes ON direcciones.id_paciente = pacientes.id_paciente";


          $result = $conn->query($sql);

          if ($result === false) {
            die('Error en la consulta: ' . $conn->error);
          }

          if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {

              //Registrar los datos
              echo "<tr>";
              echo "<td>" . $row["direccion"] . "</td>";
              echo "<td>" . $row["residencia"] . "</td>";
              echo "<td>" . $row["pais"] . "</td>";
              echo "<td>" . $row["provincia"] . "</td>";
              echo "<td>" . $row["poblacion"] . "</td>";
              echo "<td>" . $row["localidad"] . "</td>";
              echo "<td>" . $row["codigo_postal"] . "</td>";
              echo "<td>" . $row["barrio"] . "</td>";
              echo "<td>" . $row["calle"] . "</td>";
              echo "<td>" . $row["id_paciente"] . "</td>";
              echo '<td style="white-space: nowrap;">
            <a href="#" class="editarBtn">Editar</a>
        <a href="../config/eliminar/eliminar-direcciones.php?id=' . $row["direccion"] . '" class="eliminarBtn">Eliminar</a>
      </td>';
              echo "</tr>";
            }
          } else { //No hay registros ingresados
            echo "<tr>";
            echo "<td colspan='11'>No hay registros</td>";
            echo "</tr>";
          }

          //Cerrar conexión
          $conn->close();
          ?>
        </tbody>
      </table>
      <p id="busquedaNoResultadaP" style="display:none; font-weight:bold; text-align:center">La dirección del paciente que buscas no existe</p>
    </div>
  </div>






  <!--FORMULARIO PARA AGREGAR DIRECCION MEDICOS-->
  <div id="formularioAgregarM" class="formulario-container">
    <div class="formulario">
      <span id="cerrarAgregarM" class="cerrar-formulario">&times;</span>
      <h2>Registrar Dirección de Medicos</h2>
      <form class="direccion-form" action="../config/guardar/guardar-direcciones.php" method="post">

        <div class="form-grupo">
          <label for="">Tipo de Residencia:</label>
          <input type="text" name="residencia" id="residencia">
        </div>

        <div class="form-grupo">
          <label for="">País:</label>
          <select name="pais" id="pais">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Paraguay</option>
            <option value="4">Uruguay</option>
            <option value="5">Chile</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Provincia:</label>
          <select name="provincia" id="provincia">
            <option value="1">Formosa</option>
            <option value="2">Corrientes</option>
            <option value="3">Misiones</option>
            <option value="4">Chaco</option>
            <option value="5">Buenos Aires</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Localidad:</label>
          <select name="localidad" id="localidad">
            <option value="1">Clorinda</option>
            <option value="2">Formosa</option>
            <option value="3">Pirane</option>
            <option value="4">Corrientes</option>
            <option value="5">Mercedes</option>
            <option value="6">Posadas</option>
            <option value="7">El Dorado</option>
            <option value="8">Resistencia</option>
            <option value="9">Saenz Peña</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Barrio:</label>
          <select name="barrio" id="barrio">
            <option value="1">La Nueva Formosa</option>
            <option value="2">Guadalupe</option>
            <option value="3">San Martin</option>
            <option value="4">Independencia</option>
            <option value="5">San Francisco</option>
            <option value="6">San Miguel</option>
            <option value="7">Evita</option>
            <option value="8">2 de Abril</option>
            <option value="9">República Argentina</option>
            <option value="10">San Agustin</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Calle:</label>
          <input type="text" name="calle" id="calle">
        </div>

        <div class="form-grupo table-medicos">
          <label for="">Id del Medico:</label>
          <input type="text" name="id_medico" id="id_medico">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>


  <!--FORMULARIO PARA EDITAR DIRECCION DE MEDICOS-->
  <div id="formularioEditarM" class="formulario-container">
    <div class="formulario">
      <span id="cerrarEditarM" class="cerrar-formulario">&times;</span>
      <h2>Editar Dirección de Medicos</h2>
      <form class="direccion-form" action="../config/editar/editar-direcciones.php" method="post">

        <input type="hidden" name="id_direccion" id="id_direccionEditarM">

        <div class="form-grupo">
          <label for="">Tipo de Residencia:</label>
          <input type="text" name="residencia" id="residenciaEditarM">
        </div>

        <div class="form-grupo">
          <label for="">País:</label>
          <select name="pais" id="paisEditarM">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Paraguay</option>
            <option value="4">Uruguay</option>
            <option value="5">Chile</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Provincia:</label>
          <select name="provincia" id="provinciaEditarM">
            <option value="1">Formosa</option>
            <option value="2">Corrientes</option>
            <option value="3">Misiones</option>
            <option value="4">Chaco</option>
            <option value="5">Buenos Aires</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Localidad:</label>
          <select name="localidad" id="localidadEditarM">
            <option value="1">Clorinda</option>
            <option value="2">Formosa</option>
            <option value="3">Pirane</option>
            <option value="4">Corrientes</option>
            <option value="5">Mercedes</option>
            <option value="6">Posadas</option>
            <option value="7">El Dorado</option>
            <option value="8">Resistencia</option>
            <option value="9">Saenz Peña</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Barrio:</label>
          <select name="barrio" id="barrioEditarM">
            <option value="1">La Nueva Formosa</option>
            <option value="2">Guadalupe</option>
            <option value="3">San Martin</option>
            <option value="4">Independencia</option>
            <option value="5">San Francisco</option>
            <option value="6">San Miguel</option>
            <option value="7">Evita</option>
            <option value="8">2 de Abril</option>
            <option value="9">República Argentina</option>
            <option value="10">San Agustin</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Calle:</label>
          <input type="text" name="calle" id="calleEditarM">
        </div>

        <div class="form-grupo table-medicos">
          <label for="">Id del Medico:</label>
          <input type="text" name="id_medico" id="id_medicoEditarM">
        </div>

        <input type="submit" name="editar_med" class="editar" value="Actualizar">

      </form>

    </div>
  </div>








  <!--FORMULARIO PARA AGREGAR DIRECCION DE EMPLEADOS-->
  <div id="formularioAgregarE" class="formulario-container">
    <div class="formulario">
      <span id="cerrarAgregarE" class="cerrar-formulario">&times;</span>
      <h2>Registrar Dirección de Empleados</h2>
      <form class="direccion-form" action="../config/guardar/guardar-direcciones.php" method="post">

        <div class="form-grupo">
          <label for="">Tipo de Residencia:</label>
          <input type="text" name="residencia" id="residencia">
        </div>

        <div class="form-grupo">
          <label for="">País:</label>
          <select name="pais" id="pais">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Paraguay</option>
            <option value="4">Uruguay</option>
            <option value="5">Chile</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Provincia:</label>
          <select name="provincia" id="provincia">
            <option value="1">Formosa</option>
            <option value="2">Corrientes</option>
            <option value="3">Misiones</option>
            <option value="4">Chaco</option>
            <option value="5">Buenos Aires</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Localidad:</label>
          <select name="localidad" id="localidad">
            <option value="1">Clorinda</option>
            <option value="2">Formosa</option>
            <option value="3">Pirane</option>
            <option value="4">Corrientes</option>
            <option value="5">Mercedes</option>
            <option value="6">Posadas</option>
            <option value="7">El Dorado</option>
            <option value="8">Resistencia</option>
            <option value="9">Saenz Peña</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Barrio:</label>
          <select name="barrio" id="barrio">
            <option value="1">La Nueva Formosa</option>
            <option value="2">Guadalupe</option>
            <option value="3">San Martin</option>
            <option value="4">Independencia</option>
            <option value="5">San Francisco</option>
            <option value="6">San Miguel</option>
            <option value="7">Evita</option>
            <option value="8">2 de Abril</option>
            <option value="9">República Argentina</option>
            <option value="10">San Agustin</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Calle:</label>
          <input type="text" name="calle" id="calle">
        </div>

        <div class="form-grupo table-empleados">
          <label for="">Id del Empleado:</label>
          <input type="text" name="id_empleado" id="id_empleado">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>
  </div>



  <!--FORMULARIO PARA EDITAR DIRECCION DE EMPLEADOS-->
  <div id="formularioEditarE" class="formulario-container">
    <div class="formulario">
      <span id="cerrarEditarE" class="cerrar-formulario">&times;</span>
      <h2>Registrar Dirección de Empleados</h2>
      <form class="direccion-form" action="../config/editar/editar-direcciones.php" method="post">

<input type="hidden" name="id_direccion" id="id_direccionEditarE">

        <div class="form-grupo">
          <label for="">Tipo de Residencia:</label>
          <input type="text" name="residencia" id="residenciaEditarE">
        </div>

        <div class="form-grupo">
          <label for="">País:</label>
          <select name="pais" id="paisEditarE">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Paraguay</option>
            <option value="4">Uruguay</option>
            <option value="5">Chile</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Provincia:</label>
          <select name="provincia" id="provinciaEditarE">
            <option value="1">Formosa</option>
            <option value="2">Corrientes</option>
            <option value="3">Misiones</option>
            <option value="4">Chaco</option>
            <option value="5">Buenos Aires</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Localidad:</label>
          <select name="localidad" id="localidadEditarE">
            <option value="1">Clorinda</option>
            <option value="2">Formosa</option>
            <option value="3">Pirane</option>
            <option value="4">Corrientes</option>
            <option value="5">Mercedes</option>
            <option value="6">Posadas</option>
            <option value="7">El Dorado</option>
            <option value="8">Resistencia</option>
            <option value="9">Saenz Peña</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Barrio:</label>
          <select name="barrio" id="barrioEditarE">
            <option value="1">La Nueva Formosa</option>
            <option value="2">Guadalupe</option>
            <option value="3">San Martin</option>
            <option value="4">Independencia</option>
            <option value="5">San Francisco</option>
            <option value="6">San Miguel</option>
            <option value="7">Evita</option>
            <option value="8">2 de Abril</option>
            <option value="9">República Argentina</option>
            <option value="10">San Agustin</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Calle:</label>
          <input type="text" name="calle" id="calleEditarE">
        </div>

        <div class="form-grupo table-empleados">
          <label for="">Id del Empleado:</label>
          <input type="text" name="id_empleado" id="id_empleadoEditarE">
        </div>

        <input type="submit" name="editar_emp" class="editar" value="Actualizar">

      </form>

    </div>
  </div>








  <!--FORMULARIO PARA AGREGAR DIRECCION DE PACIENTES-->
  <div id="formularioAgregarP" class="formulario-container">
    <div class="formulario">
      <span id="cerrarAgregarP" class="cerrar-formulario">&times;</span>
      <h2>Registrar Dirección de Pacientes</h2>
      <form class="direccion-form" action="../config/guardar/guardar-direcciones.php" method="post">

        <div class="form-grupo">
          <label for="">Tipo de Residencia:</label>
          <input type="text" name="residencia" id="residencia">
        </div>

        <div class="form-grupo">
          <label for="">País:</label>
          <select name="pais" id="pais">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Paraguay</option>
            <option value="4">Uruguay</option>
            <option value="5">Chile</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Provincia:</label>
          <select name="provincia" id="provincia">
            <option value="1">Formosa</option>
            <option value="2">Corrientes</option>
            <option value="3">Misiones</option>
            <option value="4">Chaco</option>
            <option value="5">Buenos Aires</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Localidad:</label>
          <select name="localidad" id="localidad">
            <option value="1">Clorinda</option>
            <option value="2">Formosa</option>
            <option value="3">Pirane</option>
            <option value="4">Corrientes</option>
            <option value="5">Mercedes</option>
            <option value="6">Posadas</option>
            <option value="7">El Dorado</option>
            <option value="8">Resistencia</option>
            <option value="9">Saenz Peña</option>
          </select>
        </div>


        <div class="form-grupo">
          <label for="">Barrio:</label>
          <select name="barrio" id="barrio">
            <option value="1">La Nueva Formosa</option>
            <option value="2">Guadalupe</option>
            <option value="3">San Martin</option>
            <option value="4">Independencia</option>
            <option value="5">San Francisco</option>
            <option value="6">San Miguel</option>
            <option value="7">Evita</option>
            <option value="8">2 de Abril</option>
            <option value="9">República Argentina</option>
            <option value="10">San Agustin</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Calle:</label>
          <input type="text" name="calle" id="calle">
        </div>

        <div class="form-grupo table-pacientes">
          <label for="">Id del Paciente:</label>
          <input type="text" name="id_paciente" id="id_paciente">
        </div>

        <input type="submit" name="Guardar" class="guardar" value="Guardar">

      </form>

    </div>

  </div>



  <!--FORMULARIO PARA EDITAR DIRECCION PACIENTES-->
  <div id="formularioEditarP" class="formulario-container">
    <div class="formulario">
      <span id="cerrarEditarP" class="cerrar-formulario">&times;</span>
      <h2>Registrar Dirección de Pacientes</h2>
      <form class="direccion-form" action="../config/editar/editar-direcciones.php" method="post">

<input type="hidden" name="id_direccion" id="id_direccionEditarP">

        <div class="form-grupo">
          <label for="">Tipo de Residencia:</label>
          <input type="text" name="residencia" id="residenciaEditarP">
        </div>

        <div class="form-grupo">
          <label for="">País:</label>
          <select name="pais" id="paisEditarP">
            <option value="1">Argentina</option>
            <option value="2">Brasil</option>
            <option value="3">Paraguay</option>
            <option value="4">Uruguay</option>
            <option value="5">Chile</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Provincia:</label>
          <select name="provincia" id="provinciaEditarP">
            <option value="1">Formosa</option>
            <option value="2">Corrientes</option>
            <option value="3">Misiones</option>
            <option value="4">Chaco</option>
            <option value="5">Buenos Aires</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Localidad:</label>
          <select name="localidad" id="localidadEditarP">
            <option value="1">Clorinda</option>
            <option value="2">Formosa</option>
            <option value="3">Pirane</option>
            <option value="4">Corrientes</option>
            <option value="5">Mercedes</option>
            <option value="6">Posadas</option>
            <option value="7">El Dorado</option>
            <option value="8">Resistencia</option>
            <option value="9">Saenz Peña</option>
          </select>
        </div>


        <div class="form-grupo">
          <label for="">Barrio:</label>
          <select name="barrio" id="barrioEditarP">
            <option value="1">La Nueva Formosa</option>
            <option value="2">Guadalupe</option>
            <option value="3">San Martin</option>
            <option value="4">Independencia</option>
            <option value="5">San Francisco</option>
            <option value="6">San Miguel</option>
            <option value="7">Evita</option>
            <option value="8">2 de Abril</option>
            <option value="9">República Argentina</option>
            <option value="10">San Agustin</option>
          </select>
        </div>

        <div class="form-grupo">
          <label for="">Calle:</label>
          <input type="text" name="calle" id="calleEditarP">
        </div>

        <div class="form-grupo table-pacientes">
          <label for="">Id del Paciente:</label>
          <input type="text" name="id_paciente" id="id_pacienteEditarP">
        </div>

        <input type="submit" name="editar_pac" class="editar" value="Actualizar">

      </form>

    </div>

  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../functions/direcciones.js"></script>
  <script src="../functions/busqueda.js"></script>
</body>

</html>