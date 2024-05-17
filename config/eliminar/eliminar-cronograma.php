<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar registro de cronograma
    $eliminar_cronograma = "DELETE FROM cronogramas WHERE id_cronograma='$id'";
    $resultado_cronograma = mysqli_query($conn, $eliminar_cronograma);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_cronograma) {
        echo "Error al intentar eliminar el registro de cronograma: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("El cronograma ha sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/cronograma.php");
exit;
?>
