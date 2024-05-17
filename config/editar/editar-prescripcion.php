<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_prescripcion = $_POST["id_prescripcion"];
    $fechaPrescripcion = $_POST["fechaP"];
    $id_medicamento = $_POST["id_medicamento"];
    $id_medico = $_POST["id_medico"];
    $id_paciente = $_POST["id_paciente"];


    $conn->begin_transaction();

    // Actualizar la tabla citas
    $sql_prescripcion = "UPDATE prescripciones
                    SET fecha_prescripcion = '$fechaPrescripcion',
                        id_medicamento = '$id_medicamento',
                         id_medico = '$id_medico',
                        id_paciente = '$id_paciente'
                    WHERE id_prescripcion = '$id_prescripcion'";
    $conn->query($sql_prescripcion);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
?>