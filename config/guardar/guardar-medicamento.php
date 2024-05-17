<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener y validar los datos del formulario
    $medicamento = $_POST["medicamento"];
    $descripcion = $_POST["descripcion"];
    $ingrediente = $_POST["ingrediente"];
    $posologia = $_POST["posologia"];
    $restricciones = $_POST["restricciones"];

    $conn->begin_transaction();

    // Insertar medicamento
    $sql_medicamento = "INSERT INTO medicamentos (nombre, descripcion, ingrediente_activo, posologia, restricciones) VALUES ('$medicamento', '$descripcion', '$ingrediente', '$posologia', '$restricciones')";
    $conn->query($sql_medicamento);
    $id_medicamento = $conn->insert_id;

    
    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
?>
