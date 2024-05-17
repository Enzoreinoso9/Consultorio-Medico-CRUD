<?php

include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paciente = $_POST["id_paciente"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $id_medico = $_POST["id_medico"];
    $informe = $_POST["informe"];

    $conn->begin_transaction();

    $sql_registro = "UPDATE registros
                        INNER JOIN personas ON registros.id_registro = personas.id_registro
                        INNER JOIN pacientes ON personas.id_persona = pacientes.id_persona
                        SET registros.nombres = '$nombre', registros.apellidos = '$apellido'
                        WHERE pacientes.id_paciente = '$id_paciente'";
    $conn->query($sql_registro);

    $sql_persona = "UPDATE personas
                    INNER JOIN pacientes ON personas.id_persona = pacientes.id_persona
                    SET personas.sexo = '$sexo', personas.fecha_nacimiento = '$fechaN'
                    WHERE pacientes.id_paciente = '$id_paciente'";
    $conn->query($sql_persona);

    $sql_datos_personales = "UPDATE datos_personales
                                INNER JOIN personas ON datos_personales.id_persona = personas.id_persona
                                INNER JOIN pacientes ON personas.id_persona = pacientes.id_persona
                                SET datos_personales.telefonos = '$telefono', datos_personales.correo = '$correo'
                                WHERE pacientes.id_paciente = '$id_paciente'";
    $conn->query($sql_datos_personales);

    $sql_paciente = "UPDATE pacientes
                    SET informacion_medica = '$informe',
                    id_medico = '$id_medico'
                    WHERE id_paciente = '$id_paciente'";
    $conn->query($sql_paciente);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
