<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_medicamento = $_POST["id_medicamento"];
    $nombreMedicamento = $_POST["medicamento"];
    $descripcion = $_POST["descripcion"];
    $ingrediente = $_POST["ingrediente"];
    $posologia = $_POST["posologia"];
    $restricciones = $_POST["restricciones"];

    $conn->begin_transaction();

    // Actualizar la tabla citas
    $sql_medicamento = "UPDATE medicamentos
                    SET nombre = '$nombreMedicamento',
                        descripcion = '$descripcion',
                        ingrediente_activo = '$ingrediente',
                        posologia = '$posologia',
                        restricciones = '$restricciones'
                    WHERE id_medicamento = '$id_medicamento'";
    $conn->query($sql_medicamento);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
?>