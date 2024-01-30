<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="medicamentos.css">
</head>
<body>

    <!--NAVEGADOR-->
    <div class="navegador">
        <nav class="navbar navbar-expand-lg bg-body-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="menu.php" style="color: white;"><b>MAPRIFOR</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="medicos.php"><b>Medicos</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="empleados.html"><b>Empleados</b></a>
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
    <h2 class="titulo">MEDICAMENTOS</h2>

    <!--NAVEGADOR DE TABLAS-->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicamentos', event)">Medicamentos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"  onclick="mostrarTabla('table-prescripcion',event)">Prescripciones</a>
        <li class="nav-item">
            <a class="nav-link " href="#" onclick="mostrarTabla('table-historial', event)">Historial de Medicamentos</a>
        </li>
    </ul>

    <!--TABLAS-->
    <div id="table-medicamentos" class="table-container">

        <div class="tabla">

            <table class="medicamento">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre del Medicamento</th>
                        <th>Descripción</th>
                        <th>Ingrediente Activo</th>
                        <th>Posología</th>
                        <th>Retriscciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Acetofin</td>
                        <td>Medicamento analgesico, para el alivio temporal de dolores moderado como dolores de cabeza.</td>
                        <td>Acetaminofeno</td>
                        <td>Tomar 1 o 2 tabletas de 500mg cada 4 a 6 horas, segun sea necesario.</td>
                        <td>No exceder de 8 tabletas en un periodo de 24 horas.</td>
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



    <div id="table-prescripcion" class="table-container">

        <div class="tabla">

            <table class="medicamento">
                <thead>
                    <tr>
                        <th>Id Prescripción</th>
                        <th>Fecha de Prescripción</th>
                        <th>Medicamento</th>
                        <th>Medico Encargado</th>
                        <th>Paciente Recetado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024-01-24</td>
                        <td>Acetofin</td>
                        <td>1</td>
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



    <div id="table-historial" class="table-container">

        <div class="tabla">

            <table class="medicamento">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Paciente Medicado</th>
                        <th>Medicamento Recetado</th>
                        <th>Fecha Inicial de Consumo</th>
                        <th>Fecha de Finalización de Consumo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>Acetofin</td>
                        <td>2024-01-24</td>
                        <td>2024-02-01</td>
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


    
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../functions/medicamentos.js"></script>
</body>
</html>