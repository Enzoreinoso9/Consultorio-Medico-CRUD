<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar tabla documentacion
    $eliminar_documentacion = "DELETE FROM documentaciones WHERE id_documentacion='$id'";
    $resultado_documentacion = mysqli_query($conn, $eliminar_documentacion);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_documentacion) {
        echo "Error al intentar eliminar el registro de documentación: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo "La documentación registrada ha sido eliminado exitosamente.";
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/documentacion.php");
exit;
?>
