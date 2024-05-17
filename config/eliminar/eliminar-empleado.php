<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar registro de empleado
    $eliminar_empleado = "DELETE FROM empleados WHERE id_empleado='$id'";
    $resultado_empleado = mysqli_query($conn, $eliminar_empleado);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_empleado) {
        echo "Error al intentar eliminar el registro del empleado: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("El empleado ha sido eliminado exitosamente.");</script>.';
} else {
    echo '<script> alert("ID no proporcionado o no válido.");</script>';
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/empleados.php");
exit;
?>
