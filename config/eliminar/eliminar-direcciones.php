<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar tabla citas
    $eliminar_direccion = "DELETE FROM direcciones WHERE id_direccion='$id'";
    $resultado_direccion = mysqli_query($conn, $eliminar_direccion);

    // Verificar si la eliminación fue exitosa
    if (!$resultado_direccion) {
        echo "Error al intentar eliminar el registro de dirección: " . mysqli_error($conn);
        exit; // Salir del script si hay un error
    }

    echo '<script> alert("La dirección ha sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/direcciones.php");
exit;
?>
