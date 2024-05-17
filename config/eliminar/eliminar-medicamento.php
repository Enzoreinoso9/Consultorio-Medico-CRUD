<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar tabla documentacion
    $eliminar_medicamento = "DELETE FROM medicamentos WHERE id_medicamento='$id'";
    $resultado_medicamento = mysqli_query($conn, $eliminar_medicamento);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_medicamento) {
        echo "Error al intentar eliminar el registro de medicamento: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("El medicamento ha sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicamentos.php");
exit;
?>
