<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar tabla documentacion
    $eliminar_vacaciones = "DELETE FROM periodo_vacaciones WHERE id_periodo='$id'";
    $resultado_vacaciones = mysqli_query($conn, $eliminar_vacaciones);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_vacaciones) {
        echo "Error al intentar eliminar el registro de vacaciones: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("Las vacaciones han sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicamentos.php");
exit;
?>
