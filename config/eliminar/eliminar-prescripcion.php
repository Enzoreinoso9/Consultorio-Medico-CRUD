<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar tabla documentacion
    $eliminar_prescripcion = "DELETE FROM prescripciones WHERE id_prescripcion='$id'";
    $resultado_prescripcion = mysqli_query($conn, $eliminar_prescripcion);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_prescripcion) {
        echo "Error al intentar eliminar el registro de prescripción: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("La prescripción ha sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicamentos.php");
exit;
?>
