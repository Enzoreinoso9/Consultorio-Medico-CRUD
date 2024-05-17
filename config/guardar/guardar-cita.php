<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_paciente = $_POST["id_paciente"];
    $num_orden = $_POST["numero"];
    $fecha_turno = $_POST["fechaTurno"];
    $id_horario = $_POST["horario"];
    $estado = $_POST["estado"];
    $id_medico = $_POST["id_medico"];

    $conn->begin_transaction();

    //insertar citas
    $sql_citas = "INSERT INTO citas (numero_orden, estado_cita, fecha_turno, id_paciente, id_medico, id_horario) VALUES ('$num_orden', '$estado', '$fecha_turno', '$id_paciente', '$id_medico', '$id_horario')";
    $conn->query($sql_citas);
    $id_citas = $conn->insert_id;



    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
