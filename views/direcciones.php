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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
<h2 class="titulo">DIRECCIÓN</h2>

<!--NAVEGADOR DE TABLAS-->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#" onclick="mostrarTabla('table-medicos', event)">Medicos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"  onclick="mostrarTabla('table-empleados',event)">Empleados</a>
    <li class="nav-item">
        <a class="nav-link " href="#" onclick="mostrarTabla('table-pacientes', event)">Pacientes</a>
    </li>
</ul>

<!--TABLAS-->
<div id="table-medicos" class="table-container">

    <div class="tabla">

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
            <button id="agregar" class="agregarBtn">Agregar</button>
        </div>
    </div>
</div>



<div id="table-empleados" class="table-container">

    <div class="tabla">

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
            <button id="agregar" class="agregarBtn">Agregar</button>
        </div>
    </div>
</div>



<div id="table-pacientes" class="table-container">

    <div class="tabla">

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
            <button id="agregar" class="agregarBtn">Agregar</button>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../functions/direcciones.js"></script>
</body>
</html>