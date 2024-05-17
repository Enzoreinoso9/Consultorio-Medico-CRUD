<?php

include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_medico = $_POST["id_medico"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $tipo = $_POST["tipo"];
    $especialidad = $_POST["especialidad"];

    $conn->begin_transaction();

    $sql_registro = "UPDATE registros
                        INNER JOIN personas ON registros.id_registro = personas.id_registro
                        INNER JOIN medicos ON personas.id_persona = medicos.id_persona
                        SET registros.nombres = '$nombre', registros.apellidos = '$apellido'
                        WHERE medicos.id_medico = '$id_medico'";
    $conn->query($sql_registro);

    $sql_persona = "UPDATE personas
                    INNER JOIN medicos ON personas.id_persona = medicos.id_persona
                    SET personas.sexo = '$sexo', personas.fecha_nacimiento = '$fechaN'
                    WHERE medicos.id_medico = '$id_medico'";
    $conn->query($sql_persona);

    $sql_datos_personales = "UPDATE datos_personales
                                INNER JOIN personas ON datos_personales.id_persona = personas.id_persona
                                INNER JOIN medicos ON personas.id_persona = medicos.id_persona
                                SET datos_personales.telefonos = '$telefono', datos_personales.correo = '$correo'
                                WHERE medicos.id_medico = '$id_medico'";
    $conn->query($sql_datos_personales);

    $sql_medico = "UPDATE medicos
                    SET tipo_medico = '$tipo'
                    WHERE id_medico = '$id_medico'";
    $conn->query($sql_medico);

    $sql_especialidad = "UPDATE medicosXespecialidades
                            SET id_especialidad = '$especialidad'
                            WHERE id_medico = '$id_medico'";
    $conn->query($sql_especialidad);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
