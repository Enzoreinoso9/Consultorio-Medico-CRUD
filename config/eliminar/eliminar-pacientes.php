<?php
include '../connection.php';

// Verificar si se proporciona un ID válido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar relaciones en la tabla medicosXespecialidades
    $eliminar_paciente = "DELETE FROM pacientes WHERE id_paciente='$id'";
    $resultado_paciente = mysqli_query($conn, $eliminar_paciente);

    echo '<script> alert("El paciente ha sido eliminado exitosamente.");</script>.';
} else {
    echo "ID no proporcionado o no válido.";
}

// Redirigir a medicos.php después de 2 segundos
header("refresh:2;url=../views/pacientes.php");
exit;
?>