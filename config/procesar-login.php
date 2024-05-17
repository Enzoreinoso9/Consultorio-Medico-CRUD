<?php

session_start();
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if (empty($usuario) || empty($contraseña)) {
        // Validar campos vacíos
        echo "Por favor, complete todos los campos.";
    } else {

        // Escapar variables para prevenir inyección SQL
        $usuario = $conn->real_escape_string($usuario);
        $contraseña = $conn->real_escape_string($contraseña);

        
        $sql = "SELECT id_usuario, username, contraseña FROM usuarios WHERE username = '$usuario'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verificar la contraseña
            if ($contraseña == $row['contraseña']) {
                // Guardar información del usuario
                $_SESSION['usuario_id'] = $row['id_usuario'];
                $_SESSION['username'] = $row['username'];
                // Redirigir a la página de menú
                header("Location: ../views/menu.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    }
}

$conn->close();
?>

