<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar los datos del formulario
    $diaLaboral = $_POST["dialaboral"];
    $id_horario = $_POST["horainicio"];
    $id_turno = $_POST["turno"];
    $id_medico = $_POST["id_medico"];


    // Iniciar una transacción para asegurar la integridad de los datos
    $conn->begin_transaction();

    //Insertar en la tabla `dias`
    $sql_dia = "INSERT INTO dias (dia_semana) VALUES ('$diaLaboral')";
    $conn->query($sql_dia);
    $id_dia = $conn->insert_id;


    //Insertar en la tabla `Cronograma`
    $id_cronograma = $conn->insert_id;
    $sql_cronograma = "INSERT INTO cronogramas (id_medico, id_horario, id_dia, id_turno) VALUES ('$id_medico', '$id_horario', '$id_dia', '$id_turno')";
    $conn->query($sql_cronograma);

    // Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
