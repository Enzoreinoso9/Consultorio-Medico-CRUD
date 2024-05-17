<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar tabla documentacion
    $eliminar_sustitucion = "DELETE FROM sustituciones WHERE id_sustitucion='$id'";
    $resultado_sustitucion = mysqli_query($conn, $eliminar_sustitucion);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_sustitucion) {
        echo "Error al intentar eliminar el registro de sustitución: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("La sustitución ha sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir después de 2 segundos
header("refresh:2;url=../views/sustituciones.php");
exit;
?>
