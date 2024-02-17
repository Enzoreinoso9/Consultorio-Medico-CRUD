<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="registro.css">
</head>


<body>

    <div class="contenedor">

        <!--REEGISTRO DE USUARIO-->
        <form method="post">
            <div class="usuarioForm">
                <h2>Usuario y Contraseña</h2>

                <label for="username">Usuario:</label>
                <input type="text" id="username" class="controls" name="username" style="width: 100%;" required>

                <label for="correo">Correo:</label>
                <input type="email" name="correo" class="controls" id="correo" required>

                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" class="controls" id="contraseña" required>

                <label for="confirmar">Confirmar Contraseña:</label>
                <input type="password" name="confirmar" class="controls" id="confirmar" required>

                <button type="button" onclick="mostrardatosForm()"><span>&rarr;</span></button>

            </div>
        </form>


        <!--REGISTRO PRINCIPAL-->
        <form method="post">

            <div class="datosForm">
                <h2>Datos Personales</h2><br><br>

                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" class="controls" id="nombres" style="width: 100%;" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" class="controls" name="apellido" style="width: 100%;" required>

                <label>Sexo:</label>

                <label for="masculino">Masculino</label>
                <input type="radio" id="masculino" name="sexo" class="" value="masculino" required>
                <label for="femenino">Femenino</label>
                <input type="radio" id="femenino" name="sexo" class="" value="femenino" required><br><br>


                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fechaNacimiento" class="controls" name="fechaNacimiento" required>

                <button type="button"><span>&rarr;</span></button>
                <br><br>

                <div id="mensajeError" style="color: red;"></div>

            </div>
        </form>


    </div>
    <script src="functions/registro.js"></script>
</body>

</html>