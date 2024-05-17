<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $tipo = $_POST["tipo"];
    $especialidad = $_POST["especialidad"];

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();

    // 1. Insertar en la tabla `registros`
    $sql_registro = "INSERT INTO registros (nombres, apellidos) VALUES ('$nombre', '$apellido')";
    $conn->query($sql_registro);
    $id_registro = $conn->insert_id; // Obtener el ID generado para la tabla `registros`


    // 2. Insertar en la tabla `personas`
    $sql_persona = "INSERT INTO personas (sexo, fecha_nacimiento, id_registro) VALUES ('$sexo', '$fechaN', '$id_registro')";
    $conn->query($sql_persona);
    $id_persona = $conn->insert_id; // Obtener el ID generado para la tabla `personas`


    // 3. Insertar en la tabla `datos_personales`
    $sql_datos_personales = "INSERT INTO datos_personales (telefonos, correo, id_persona) VALUES ('$telefono', '$correo', '$id_persona')";
    $conn->query($sql_datos_personales);


    // 4. Insertar en la tabla `medicos`
    $sql_medico = "INSERT INTO medicos (tipo_medico, id_persona) VALUES ('$tipo', '$id_persona')";
    $conn->query($sql_medico);
    $id_medico = $conn->insert_id; // Obtener el ID generado para la tabla `medicos`


// 5. Insertar en la tabla `especialidades`
    /*$id_especialidad = $conn->insert_id;
    $sql_especialidad = "INSERT INTO especialidades (id_especialidad, nombre) VALUES ('$id_especialidad', '$especialidad')";
    $conn->query($sql_especialidad);*/


    //6.Insertar MedicoxEspecialidad
    $id_medicoespe = $conn->insert_id;
    $sql_medicoxespe = "INSERT INTO medicosxespecialidades (id_medicoespe, id_medico, id_especialidad) VALUES ('$id_medicoespe', '$id_medico', '$especialidad')";
    $conn->query($sql_medicoxespe);



    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
