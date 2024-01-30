<?php 

include 'connection.php';

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $eliminar_relaciones = "DELETE FROM medicosxespecialidades WHERE id_medico='$id'";
    $resultado_relaciones = mysqli_query($conn, $eliminar_relaciones);
    // Preparar la consulta de eliminación
    $eliminar = "DELETE FROM medicos WHERE id_medico='$id'";
    $resultado = mysqli_query($conn, $eliminar);
    // Preparar la consulta de eliminación
    $eliminar = "DELETE FROM medicos WHERE id_medico='$id'";
    $resultado = mysqli_query($conn, $eliminar);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "El médico ha sido eliminado exitosamente.";
    } else {
        echo "Error al intentar eliminar el médico: " . mysqli_error($conn);
    }
} else {
    echo "ID no proporcionado o no válido.";
}

mysqli_close($conn);

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/medicos.php");
exit;

?>