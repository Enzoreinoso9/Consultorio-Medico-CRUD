<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="contenedor">


        <form method="post" action="../config/procesar-login.php">

            <div class="loginForm">

                <h2>¡Bienvenido!</h2>

                <label for="">Ingresar usuario:</label>
                <input type="text" name="usuario" class="controls" id="usuario">

                <label for="">Ingresar Contraseña:</label>
                <input type="password" name="contraseña" class="controls" id="contraseña">

                <input type="submit" value="Ingresar" class="boton">

            </div>
        </form>

        <footer>

        </footer>
    </div>
</body>

</html>