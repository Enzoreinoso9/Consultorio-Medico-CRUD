<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cronograma = $_POST["id_cronograma"];
    $diaLaboral = $_POST["dialaboral"];
    $id_horario = $_POST["horainicio"];
    $id_turno = $_POST["turno"];
    $id_medico = $_POST["id_medico"];

    $conn->begin_transaction();

    $sql_dias = "UPDATE dias 
    INNER JOIN cronogramas ON dias.id_dia = cronogramas.id_dia
    SET dias.dia_semana = '$diaLaboral'
    WHERE cronogramas.id_cronograma = '$id_cronograma'";
    $conn->query($sql_dias);

    $sql_cronograma = "UPDATE cronogramas
    SET id_horario = '$id_horario',
        id_turno = '$id_turno',
        id_medico = '$id_medico'
        WHERE id_cronograma = '$id_cronograma'";
    $conn->query($sql_cronograma);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
?>