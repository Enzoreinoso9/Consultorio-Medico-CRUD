<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $fechaNacimiento = $_POST['fechaN'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $id_medico = $_POST['id_medico']; // ID del médico encargado proporcionado en el formulario
    $informeMedico = $_POST['informe'];

    $conn -> begin_transaction();

    $sql_registro ="INSERT INTO registros (nombres, apellidos) VALUES ('$nombre', '$apellido')";
    $conn->query($sql_registro);
    $id_registro = $conn->insert_id;

    $sql_persona ="INSERT INTO personas (sexo, fecha_nacimiento, id_registro) VALUES ('$sexo', '$fechaNacimiento', '$id_registro')";
    $conn->query($sql_persona);
    $id_persona = $conn->insert_id;

    $sql_datos_personales = "INSERT INTO datos_personales (telefonos, correo, id_persona) VALUES ('$telefono', '$correo', '$id_persona')";
    $conn->query($sql_datos_personales);
    $id_datos_personales = $conn->insert_id;

    $id_pacientes = $conn->insert_id;
    $sql_pacientes = "INSERT INTO pacientes (informacion_medica, id_persona, id_medico) VALUES ('$informeMedico', '$id_persona', '$id_medico')";
    $conn->query($sql_pacientes);
    

    
    
    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
