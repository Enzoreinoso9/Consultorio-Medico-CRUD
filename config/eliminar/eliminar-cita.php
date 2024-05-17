<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar tabla citas
    $eliminar_cita = "DELETE FROM citas WHERE id_cita='$id'";
    $resultado_cita = mysqli_query($conn, $eliminar_cita);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_cita) {
        echo "Error al intentar eliminar el registro citas: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("La cita ha sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/citas.php");
exit;
?>
