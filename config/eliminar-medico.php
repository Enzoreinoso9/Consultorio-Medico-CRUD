<?php
include 'connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar relaciones en la tabla medicosXespecialidades
    $eliminar_relaciones = "DELETE FROM medicosXespecialidades WHERE id_medico='$id'";
    $resultado_relaciones = mysqli_query($conn, $eliminar_relaciones);

    // Verificar si la eliminación de relaciones fue exitosa
    if (!$resultado_relaciones) {
        echo "Error al intentar eliminar relaciones: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    // Eliminar al médico de la tabla medicos
    $eliminar_medico = "DELETE FROM medicos WHERE id_medico='$id'";
    $resultado_medico = mysqli_query($conn, $eliminar_medico);

    // Verificar si la eliminación del médico fue exitosa
    if (!$resultado_medico) {
        echo "Error al intentar eliminar el médico: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    // Si llegamos aquí, la eliminación fue exitosa
    echo "El médico ha sido eliminado exitosamente.";
} else {
    // Si no se proporciona un ID válido
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicos.php");
exit;
?>
