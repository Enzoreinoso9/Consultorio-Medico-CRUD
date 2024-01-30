<?php
include 'connection.php';

if (isset($_POST["editar_med"])) {
    $id_medico = $_POST["id_medico_editar"]; 
    $telefono = $_POST["telefono_editar"];
    $correo = $_POST["correo_editar"];
    $tipo = $_POST["tipo_editar"];
    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();
    // Actualizar la tabla `datos_personales`
    $sql_datos_personales = "UPDATE datos_personales SET telefonos='$telefono', correo='$correo' WHERE id_persona = (SELECT id_persona FROM medicos WHERE id_medico='$id_medico')";
    $conn->query($sql_datos_personales);
    // Actualizar la tabla `medicos`
    $sql_medico = "UPDATE medicos SET tipo_medico='$tipo' WHERE id_medico='$id_medico'";
    $conn->query($sql_medico);
    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro actualizado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
?>