<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_cita = $_POST["id_cita"];
    $id_paciente = $_POST["id_paciente"];
    $nro_orden = $_POST["numero"];
    $fecha_turno = $_POST["fechaTurno"];
    $horario = $_POST["horario"];
    $estado = $_POST["estado"];
    $id_medico = $_POST["id_medico"];

    $conn->begin_transaction();

    // Actualizar la tabla citas
    $sql_cita = "UPDATE citas
                    SET id_paciente = '$id_paciente',
                        numero_orden = '$nro_orden',
                        fecha_turno = '$fecha_turno',
                        id_horario = '$horario',
                        estado_cita = '$estado',
                        id_medico = '$id_medico'
                    WHERE id_cita = '$id_cita'";
    $conn->query($sql_cita);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
?>