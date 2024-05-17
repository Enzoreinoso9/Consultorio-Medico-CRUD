<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener y validar los datos del formulario
    $fecha_prescripcion = $_POST["fechaP"];
    $id_medicamento = $_POST["id_medicamento"];
    $id_medico = $_POST["id_medico"];
    $id_paciente = $_POST["id_paciente"];

    $conn->begin_transaction();

    // Insertar medicamento
    $sql_prescripcion = "INSERT INTO prescripciones (fecha_prescripcion, id_medico, id_paciente, id_medicamento) VALUES ('$fecha_prescripcion', '$id_medico', '$id_paciente', '$id_medicamento')";
    $conn->query($sql_prescripcion);
    $id_prescripcion = $conn->insert_id;

    
    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
?>
