<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar los datos del formulario
    $fecha_inicial = $_POST["fechaI"];
    $fecha_final = $_POST["fechaF"];
    $estado = $_POST["estado"];

    // Determinar si se está ingresando un médico o un empleado
    if (isset($_POST["id_medico"])) {
        $id_medico = $_POST["id_medico"];
        $id_empleado = null; // Establecer el ID de empleado como nulo
    } elseif (isset($_POST["id_empleado"])) {
        $id_empleado = $_POST["id_empleado"];
        $id_medico = null; 
    }

    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();

    // Insertar en la tabla vacaciones
    $sql_vacaciones = "INSERT INTO vacaciones (fecha_inicio, fecha_fin) VALUES ('$fecha_inicial', '$fecha_final')";
    $conn->query($sql_vacaciones);
    $id_vacaciones = $conn->insert_id;

    // Insertar en la tabla periodo_vacaciones
    $sql_periodoV = "INSERT INTO periodo_vacaciones (estado_vacaciones, id_empleado, id_medico, id_vacacione) VALUES ('$estado', ?, ?, '$id_vacaciones')";
    $stmt_periodoV = $conn->prepare($sql_periodoV);
    $stmt_periodoV->bind_param("ss", $id_empleado, $id_medico);
    $stmt_periodoV->execute();
    $id_periodoV = $stmt_periodoV->insert_id;
    $stmt_periodoV->close();


    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
