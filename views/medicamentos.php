<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio | Medicamentos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="medicamentos.css">
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
    <h2 class="titulo">REGISTRO DE LOS MEDICAMENTOS</h2>

    <!--NAVEGADOR DE TABLAS-->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicamentos', event)">Medicamentos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="mostrarTabla('table-prescripcion',event)">Prescripciones</a>
        </li>
    </ul>

    <!--TABLA DE MEDICAMENTOS-->
    <div class="conten-container">
        <div id="table-medicamentos" class="table-container">

        <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputM" placeholder="Buscar" aria-label="Search">
          </form>

            <div class="crud-buttons">
                <button id="agregarM" class="agregarBtn">Agregar</button>
            </div>

            <table class="medicamento">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre del Medicamento</th>
                        <th>Descripción</th>
                        <th>Ingrediente Activo</th>
                        <th>Posología</th>
                        <th>Restriscciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="medicamentoTableBody">
                    <?php
                    include '../config/connection.php';

                    $sql = "SELECT
                        medicamentos.id_medicamento,
                        medicamentos.nombre,
                        medicamentos.descripcion,
                        medicamentos.ingrediente_activo AS ingrediente,
                        medicamentos.posologia,
                        medicamentos.restricciones
                        FROM
                        medicamentos";

                    $result = $conn->query($sql);

                    if ($result === false) {
                        die('Error en la consulta: ' . $conn->error);
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            //Registrar los datos
                            echo "<tr>";
                            echo "<td>" . $row["id_medicamento"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["descripcion"] . "</td>";
                            echo "<td>" . $row["ingrediente"] . "</td>";
                            echo "<td>" . $row["posologia"] . "</td>";
                            echo "<td>" . $row["restricciones"] . "</td>";
                            echo '<td style="white-space: nowrap;">
                            <a href="#" id="editar" class="editarBtn">Editar</a>
                                <a href="../config/eliminar/eliminar-medicamento.php?id=' . $row["id_medicamento"] . '" class="eliminarBtn" >Eliminar</a>
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
            <p id="busquedaNoResultadaM" style="display:none; font-weight:bold; text-align:center">El medicamento que buscas no existe</p>

        </div>


        <!--TABLA DE PRESCRIPCIÓN-->
        <div id="table-prescripcion" class="table-container">

        <form class="d-flex" id="buscarForm" role="search">
            <input class="form-control me-2" type="search" id="buscarInputP" placeholder="Buscar" aria-label="Search">
          </form>

            <div class="crud-buttons">
                <button id="agregarP" class="agregarBtn">Agregar</button>
            </div>

            <table class="prescripcion">
                <thead>
                    <tr>
                        <th>Id Prescripción</th>
                        <th>Fecha de Prescripción</th>
                        <th>Medico Encargado</th>
                        <th>Medicamento</th>
                        <th>Paciente Recetado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="prescripcionTableBody">
                    <?php
                    include '../config/connection.php';

                    $sql =  "SELECT
                    prescripciones.id_prescripcion AS id,
                    prescripciones.fecha_prescripcion AS fecha,
                    medicos.id_medico,
                    medicamentos.nombre,
                    pacientes.id_paciente
    FROM
        prescripciones
        INNER JOIN medicamentos ON prescripciones.id_medicamento = medicamentos.id_medicamento
        INNER JOIN medicos ON prescripciones.id_medico = medicos.id_medico
        INNER JOIN pacientes ON prescripciones.id_paciente = pacientes.id_paciente";

                    $result = $conn->query($sql);

                    if ($result === false) {
                        die('Error en la consulta: ' . $conn->error);
                    }

                    if ($result->num_rows > 0) {


                        while ($row = $result->fetch_assoc()) {

                            //Registrar los datos
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["fecha"] . "</td>";
                            echo "<td>" . $row["id_medico"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["id_paciente"] . "</td>";
                            echo '<td style="white-space: nowrap;">
                            <a href="#" id="editar" class="editarBtn">Editar</a>
                                    <a href="../config/eliminar/eliminar-prescripcion.php?id=' . $row["id"] . '" class="eliminarBtn" >Eliminar</a>
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
            <p id="busquedaNoResultadaP" style="display:none; font-weight:bold; text-align:center">La prescripción que buscas no existe</p>

        </div>




        <!--FORMULARIO PARA AGREGAR MEDICAMENTOS-->
        <div id="formularioAgregarM" class="formulario-container">
            <div class="formulario">
                <span id="cerrarAgregarM" class="cerrar-formulario">&times;</span>
                <h2>Registrar Medicamento</h2>
                <form class="medicamentos-form" action="../config/guardar/guardar-medicamento.php" method="post">

                    <div class="form-grupo">
                        <label for="">Nombre del medicamento:</label>
                        <input type="text" name="medicamento" id="medicamento">
                    </div>

                    <div class="form-grupo">
                        <label for="">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion">
                    </div>

                    <div class="form-grupo">
                        <label for="">Ingrediente activo: </label>
                        <input type="text" name="ingrediente" id="ingrediente">
                    </div>

                    <div class="form-grupo">
                        <label for="">Posología: </label>
                        <input type="text" name="posologia" id="posologia">
                    </div>

                    <div class="form-grupo">
                        <label for="">Restriscciones: </label>
                        <input type="text" name="restricciones" id="restricciones">
                    </div>

                    <input type="submit" name="Guardar" class="guardar" value="Guardar">

                </form>

            </div>

        </div>


        <!--FORMULARIO PARA EDITAR MEDICAMENTOS-->
        <div id="formularioEditarM" class="formulario-container">
            <div class="formulario">
                <span id="cerrarEditarM" class="cerrar-formulario">&times;</span>
                <h2>Editar Medicamento</h2>
                <form class="medicamentos-form" action="../config/editar/editar-medicamento.php" method="post">

                    <input type="hidden" name="id_medicamento" id="id_medicamentoEditar">

                    <div class="form-grupo">
                        <label for="">Nombre del medicamento:</label>
                        <input type="text" name="medicamento" id="medicamentoEditar">
                    </div>

                    <div class="form-grupo">
                        <label for="">Descripción:</label>
                        <input type="text" name="descripcion" id="descripcionEditar">
                    </div>

                    <div class="form-grupo">
                        <label for="">Ingrediente activo: </label>
                        <input type="text" name="ingrediente" id="ingredienteEditar">
                    </div>

                    <div class="form-grupo">
                        <label for="">Posología: </label>
                        <input type="text" name="posologia" id="posologiaEditar">
                    </div>

                    <div class="form-grupo">
                        <label for="">Restriscciones: </label>
                        <input type="text" name="restricciones" id="restriccionesEditar">
                    </div>

                    <input type="submit" name="editar_medic" class="editar" value="Actualizar">

                </form>

            </div>

        </div>



        <!--FORMULARIO PARA AGREGAR PRESCRIPCIONES-->
        <div id="formularioAgregarP" class="formulario-container">
            <div class="formulario">
                <span id="cerrarAgregarP" class="cerrar-formulario">&times;</span>
                <h2>Registrar Prescripciones</h2>
                <form class="medicamentos-form" action="../config/guardar/guardar-prescripcion.php" method="post">

                    <div class="form-grupo">
                        <label for="">Fecha de prescripción:</label>
                        <input type="text" name="fechaP" id="fechaP">
                    </div>

                    <div class="form-grupo">
                        <label for="">Medico encargado:</label>
                        <input type="text" name="id_medico" id="id_medico">
                    </div>


                    <div class="form-grupo">
                        <label for="">Ingresa el ID del Medicamento:</label>
                        <input type="text" name="id_medicamento" id="id_medicamento">
                    </div>


                    <div class="form-grupo">
                        <label for="">Paciente recetado:</label>
                        <input type="text" name="id_paciente" id="id_paciente">
                    </div>

                    <input type="submit" name="Guardar" class="guardar" value="Guardar">

                </form>
            </div>
        </div>



        <!--FORMULARIO PARA EDITAR PRESCRIPCIONES-->
        <div id="formularioEditarP" class="formulario-container">
            <div class="formulario">
                <span id="cerrarEditarP" class="cerrar-formulario">&times;</span>
                <h2>Editar Prescripciones</h2>
                <form class="medicamentos-form" action="../config/editar/editar-prescripcion.php" method="post">

                    <input type="hidden" name="id_prescripcion" id="id_prescripcionEditar">

                    <div class="form-grupo">
                        <label for="">Fecha de prescripción:</label>
                        <input type="text" name="fechaP" id="fechaPEditar">
                    </div>

                    <div class="form-grupo">
                        <label for="">Medico encargado:</label>
                        <input type="text" name="id_medico" id="id_medicoEditar">
                    </div>


                    <div class="form-grupo">
                        <label for="">Ingresa el ID del Medicamento:</label>
                        <input type="text" name="id_medicamento" id="id_medicamentoEditar">
                    </div>


                    <div class="form-grupo">
                        <label for="">Paciente recetado:</label>
                        <input type="text" name="id_paciente" id="id_pacienteEditar">
                    </div>

                    <input type="submit" name="editar_pres" class="editar" value="Actualizar">

                </form>
            </div>
        </div>

        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../functions/medicamentos.js"></script>
        <script src="../functions//busqueda.js"></script>
        <script src="../functions//jquery.js"></script>
</body>

</html>