<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio | Documentaciones</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="documentacion.css">
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
    <h2 class="titulo">REGISTRO DE LAS DOCUMENTACIONES</h2>

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

            <table class="documentacionM">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tipo de Documento</th>
                        <th>DNI</th>
                        <th>NIF</th>
                        <th>NSS</th>
                        <th>Número Colegiado</th>
                        <th>id del Medico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="medicoTableBody">
                    <?php
                    include '../config/connection.php';

                    $sql =  "SELECT
            documentaciones.id_documentacion AS documentacion,
            documentaciones.tipo_documento AS tipo,
            documentaciones.dni,
            documentaciones.nif,
            documentaciones.nro_seguridad_social AS nss,
            profesionales.nro_colegiado,
            medicos.id_medico
    FROM
        documentaciones
        INNER JOIN documentacionesxprofesionales ON documentaciones.id_documentacion = documentacionesxprofesionales.id_documentacion
        INNER JOIN profesionales ON documentacionesxprofesionales.id_profesional = profesionales.id_profesional
        INNER JOIN medicos ON documentaciones.id_medico = medicos.id_medico";

                    $result = $conn->query($sql);

                    if ($result === false) {
                        die('Error en la consulta: ' . $conn->error);
                    }

                    if ($result->num_rows > 0) {


                        while ($row = $result->fetch_assoc()) {

                            //Registrar los datos
                            echo "<tr>";
                            echo "<td>" . $row["documentacion"] . "</td>";
                            echo "<td>" . $row["tipo"] . "</td>";
                            echo "<td>" . $row["dni"] . "</td>";
                            echo "<td>" . $row["nif"] . "</td>";
                            echo "<td>" . $row["nss"] . "</td>";
                            echo "<td>" . $row["nro_colegiado"] . "</td>";
                            echo "<td>" . $row["id_medico"] . "</td>";
                            echo '<td style="white-space: nowrap;">
                            <a href="#" id="editar" class="editarBtn">Editar</a>
                            <a href="../config/eliminar/eliminar-documentacion.php?id=' . $row["documentacion"] . '" class="eliminarBtn" >Eliminar</a>
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

            <p id="busquedaNoResultadaM" style="display:none; font-weight:bold; text-align:center">La documentación de medico que buscas no existe</p>


        </div>



        <div id="table-empleados" class="table-container">

        <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputE" placeholder="Buscar" aria-label="Search">
          </form>

            <div class="crud-buttons">
                <button id="agregarE" class="agregarBtn">Agregar</button>
            </div>

            <table class="documentacionE">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tipo de Documento</th>
                        <th>DNI</th>
                        <th>NIF</th>
                        <th>NSS</th>
                        <th>id del empleado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="empleadoTableBody">
                    <?php
                    include '../config/connection.php';

                    $sql =  "SELECT
            documentaciones.id_documentacion AS documentacion,
            documentaciones.tipo_documento AS tipo,
            documentaciones.dni,
            documentaciones.nif,
            documentaciones.nro_seguridad_social AS nss,
            empleados.id_empleado AS empleado
    FROM
        documentaciones
    INNER JOIN empleados ON documentaciones.id_empleado = empleados.id_empleado";

                    $result = $conn->query($sql);

                    if ($result === false) {
                        die('Error en la consulta: ' . $conn->error);
                    }

                    if ($result->num_rows > 0) {


                        while ($row = $result->fetch_assoc()) {

                            //Registrar los datos
                            echo "<tr>";
                            echo "<td>" . $row["documentacion"] . "</td>";
                            echo "<td>" . $row["tipo"] . "</td>";
                            echo "<td>" . $row["dni"] . "</td>";
                            echo "<td>" . $row["nif"] . "</td>";
                            echo "<td>" . $row["nss"] . "</td>";
                            echo "<td>" . $row["empleado"] . "</td>";
                            echo '<td style="white-space: nowrap;">
                            <a href="#" id="editar" class="editarBtn">Editar</a>
              <a href="../config/eliminar/eliminar-documentacion.php?id=' . $row["documentacion"] . '" class="eliminarBtn" >Eliminar</a>
              </td>';
                            echo "</tr>";
                        }
                    } else { //No hay registros ingresados
                        echo "<tr>";
                        echo "<td colspan='7'>No hay registros</td>";
                        echo "</tr>";
                    }

                    //Cerrar conexión
                    $conn->close();

                    ?>
                </tbody>
            </table>
            <p id="busquedaNoResultadaE" style="display:none; font-weight:bold; text-align:center">La documentación de empleado que buscas no existe</p>
        </div>



        <div id="table-pacientes" class="table-container">

        <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputP" placeholder="Buscar" aria-label="Search">
            </form>

            <div class="crud-buttons">
                <button id="agregarP" class="agregarBtn">Agregar</button>
            </div>


            <table class="documentacionP">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tipo de Documento</th>
                        <th>DNI</th>
                        <th>NIF</th>
                        <th>NSS</th>
                        <th>Id del Paciente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="pacienteTableBody">
                    <?php
                    include '../config/connection.php';

                    $sql =  "SELECT
            documentaciones.id_documentacion AS documentacion,
            documentaciones.tipo_documento AS tipo,
            documentaciones.dni,
            documentaciones.nif,
            documentaciones.nro_seguridad_social AS nss,
            pacientes.id_paciente AS paciente
    FROM
        documentaciones
    INNER JOIN pacientes ON documentaciones.id_paciente = pacientes.id_paciente";

                    $result = $conn->query($sql);

                    if ($result === false) {
                        die('Error en la consulta: ' . $conn->error);
                    }

                    if ($result->num_rows > 0) {


                        while ($row = $result->fetch_assoc()) {

                            //Registrar los datos
                            echo "<tr>";
                            echo "<td>" . $row["documentacion"] . "</td>";
                            echo "<td>" . $row["tipo"] . "</td>";
                            echo "<td>" . $row["dni"] . "</td>";
                            echo "<td>" . $row["nif"] . "</td>";
                            echo "<td>" . $row["nss"] . "</td>";
                            echo "<td>" . $row["paciente"] . "</td>";
                            echo '<td style="white-space: nowrap;">
                            <a href="#" id="editar" class="editarBtn">Editar</a>
              <a href="../config/eliminar/eliminar-documentacion.php?id=' . $row["documentacion"] . '" class="eliminarBtn" >Eliminar</a>
              </td>';
                            echo "</tr>";
                        }
                    } else { //No hay registros ingresados
                        echo "<tr>";
                        echo "<td colspan='7'>No hay registros</td>";
                        echo "</tr>";
                    }

                    //Cerrar conexión
                    $conn->close();

                    ?>
                </tbody>
            </table>
            <p id="busquedaNoResultadaP" style="display:none; font-weight:bold; text-align:center">La documentacion del paciente que buscas no existe</p>

        </div>

    </div>


    <!--FORMULARIO PARA AGREGAR DOCUMENTACION MEDICOS-->
    <div id="formularioAgregarM" class="formulario-container">
        <div class="formulario">
            <span id="cerrarAgregarM" class="cerrar-formulario">&times;</span>
            <h2>Registrar Medicos</h2>
            <form class="documentacion-form" action="../config/guardar/guardar-documentacion.php" method="post">

                <div class="form-grupo">
                    <label for="">Tipo de Documento:</label>
                    <input type="text" name="tipo" id="tipo">
                </div>

                <div class="form-grupo">
                    <label for="">DNI:</label>
                    <input type="text" name="dni" id="dni">
                </div>

                <div class="form-grupo">
                    <label for="">NIF:</label>
                    <input type="text" name="nif" id="nif">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Seguridad Social:</label>
                    <input type="text" name="nss" id="nss">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Colegiado:</label>
                    <input type="text" name="colegiado" id="colegiado">
                </div>

                <div class="form-grupo">
                    <label for="">Id del Medico:</label>
                    <input type="text" name="id_medico" id="id_medico">
                </div>

                <input type="submit" name="Guardar" class="guardar" value="Guardar">

            </form>

        </div>

    </div>



    <!--FORMULARIO PARA EDITAR DOCUMENTACION MEDICOS-->
    <div id="formularioEditarM" class="formulario-container">
        <div class="formulario">
            <span id="cerrarEditarM" class="cerrar-formulario">&times;</span>
            <h2>Editar Medicos</h2>
            <form class="documentacion-form" action="../config/editar/editar-documentacion.php" method="post">

                <input type="hidden" name="id_documentacion" id="id_documentacionEditarM">

                <div class="form-grupo">
                    <label for="">Tipo de Documento:</label>
                    <input type="text" name="tipo" id="tipoEditarM">
                </div>

                <div class="form-grupo">
                    <label for="">DNI:</label>
                    <input type="text" name="dni" id="dniEditarM">
                </div>

                <div class="form-grupo">
                    <label for="">NIF:</label>
                    <input type="text" name="nif" id="nifEditarM">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Seguridad Social:</label>
                    <input type="text" name="nss" id="nssEditarM">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Colegiado:</label>
                    <input type="text" name="colegiado" id="colegiadoEditarM">
                </div>

                <div class="form-grupo">
                    <label for="">Id del Medico:</label>
                    <input type="text" name="id_medico" id="id_medicoEditarM">
                </div>

                <input type="submit" name="editar_med" class="editar" value="Actualizar">

            </form>

        </div>

    </div>








    <!--FORMULARIO PARA AGREGAR DOCUMENTACION EMPLEADOS-->
    <div id="formularioAgregarE" class="formulario-container">
        <div class="formulario">
            <span id="cerrarAgregarE" class="cerrar-formulario">&times;</span>
            <h2>Registrar Empleados</h2>
            <form class="documentacion-form" action="../config/guardar/guardar-documentacion.php" method="post">

                <div class="form-grupo">
                    <label for="">Tipo de Documento:</label>
                    <input type="text" name="tipo" id="tipo">
                </div>

                <div class="form-grupo">
                    <label for="">DNI:</label>
                    <input type="text" name="dni" id="dni">
                </div>

                <div class="form-grupo">
                    <label for="">NIF:</label>
                    <input type="text" name="nif" id="nif">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Seguridad Social:</label>
                    <input type="text" name="nss" id="nss">
                </div>

                <div class="form-grupo">
                    <label for="">Id del Empleado:</label>
                    <input type="text" name="id_empleado" id="id_empleado">
                </div>

                <input type="submit" name="Guardar" class="guardar" value="Guardar">

            </form>

        </div>

    </div>



    <!--FORMULARIO PARA EDITAR DOCUMENTACION EMPLEADOS-->
    <div id="formularioEditarE" class="formulario-container">
        <div class="formulario">
            <span id="cerrarEditarE" class="cerrar-formulario">&times;</span>
            <h2>Registrar Empleados</h2>
            <form class="documentacion-form" action="../config/editar/editar-documentacion.php" method="post">

                <input type="hidden" name="id_documentacion" id="id_documentacionEditarE">

                <div class="form-grupo">
                    <label for="">Tipo de Documento:</label>
                    <input type="text" name="tipo" id="tipoEditarE">
                </div>

                <div class="form-grupo">
                    <label for="">DNI:</label>
                    <input type="text" name="dni" id="dniEditarE">
                </div>

                <div class="form-grupo">
                    <label for="">NIF:</label>
                    <input type="text" name="nif" id="nifEditarE">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Seguridad Social:</label>
                    <input type="text" name="nss" id="nssEditarE">
                </div>

                <div class="form-grupo">
                    <label for="">Id del Empleado:</label>
                    <input type="text" name="id_empleado" id="id_empleadoEditarE">
                </div>

                <input type="submit" name="editar_emp" class="editar" value="Actualizar">

            </form>

        </div>

    </div>









    <!--FORMULARIO PARA AGREGAR DOCUMENTACION PACIENTES-->
    <div id="formularioAgregarP" class="formulario-container">
        <div class="formulario">
            <span id="cerrarAgregarP" class="cerrar-formulario">&times;</span>
            <h2>Registrar Pacientes</h2>
            <form class="documentacion-form" action="../config/guardar/guardar-documentacion.php" method="post">

                <div class="form-grupo">
                    <label for="">Tipo de documento:</label>
                    <input type="text" name="tipo" id="tipo">
                </div>

                <div class="form-grupo">
                    <label for="">DNI:</label>
                    <input type="text" name="dni" id="dni">
                </div>

                <div class="form-grupo">
                    <label for="">NIF:</label>
                    <input type="text" name="nif" id="nif">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Seguridad Social:</label>
                    <input type="text" name="nss" id="nss">
                </div>

                <div class="form-grupo">
                    <label for="">Id del Paciente:</label>
                    <input type="text" name="id_paciente" id="id_paciente">
                </div>

                <input type="submit" name="Guardar" class="guardar" value="Guardar">

            </form>

        </div>

    </div>


    <!--FORMULARIO PARA AGREGAR DOCUMENTACION PACIENTES-->
    <div id="formularioEditarP" class="formulario-container">
        <div class="formulario">
            <span id="cerrarEditarP" class="cerrar-formulario">&times;</span>
            <h2>Registrar Pacientes</h2>
            <form class="documentacion-form" action="../config/editar/editar-documentacion.php" method="post">

                <input type="hidden" name="id_documentacion" id="id_documentacionEditarP">

                <div class="form-grupo">
                    <label for="">Tipo de documento:</label>
                    <input type="text" name="tipo" id="tipoEditarP">
                </div>

                <div class="form-grupo">
                    <label for="">DNI:</label>
                    <input type="text" name="dni" id="dniEditarP">
                </div>

                <div class="form-grupo">
                    <label for="">NIF:</label>
                    <input type="text" name="nif" id="nifEditarP">
                </div>

                <div class="form-grupo">
                    <label for="">Número de Seguridad Social:</label>
                    <input type="text" name="nss" id="nssEditarP">
                </div>

                <div class="form-grupo">
                    <label for="">Id del Paciente:</label>
                    <input type="text" name="id_paciente" id="id_pacienteEditarP">
                </div>

                <input type="submit" name="editar_pac" class="editar" value="Actualizar">

            </form>

        </div>

    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../functions/documentacion.js"></script>
    <script src="../functions/busqueda.js"></script>
    <script src="../functions/jquery.js"></script>
</body>

</html>