<?php
include '../connection.php';

// Verificar qué formulario se ha enviado
if (isset($_POST['editar_med'])) {
    

    $id_vacacionM = $_POST['id_vacacionM'];
    $fechaI = $_POST['fechaI'];
    $fechaF = $_POST['fechaF'];
    $estado = $_POST['estado'];
    $id_medico = $_POST['id_medico'];


        $sql_vacacionesM = "UPDATE vacaciones
    INNER JOIN periodo_vacaciones ON vacaciones.id_vacacione = periodo_vacaciones.id_vacacione
    SET vacaciones.fecha_inicio = '$fechaI',
    vacaciones.fecha_fin = '$fechaF'
    WHERE periodo_vacaciones.id_periodo = '$id_vacacionM' ";
    $conn->query($sql_vacacionesM);

    $sql_peridoVacacionesM = "UPDATE periodo_vacaciones
    SET estado_vacaciones='$estado', 
        id_medico='$id_medico' 
    WHERE id_periodo='$id_vacacionM'";

    if (mysqli_query($conn,$sql_peridoVacacionesM )) {
        echo "Datos de las vacaciones del médico actualizados correctamente";
    } else {
        echo "Error actualizando los datos del médico: " . mysqli_error($conn);
    }
} elseif (isset($_POST['editar_emp'])) {
    

    $id_vacacionE = $_POST['id_vacacionE'];
    $fechaI = $_POST['fechaI'];
    $fechaF = $_POST['fechaF'];
    $estado = $_POST['estado'];
    $id_empleado = $_POST['id_empleado'];

    $sql_vacacionesE = "UPDATE vacaciones
    INNER JOIN periodo_vacaciones ON vacaciones.id_vacacione = periodo_vacaciones.id_vacacione
    SET vacaciones.fecha_inicio = '$fechaI',
    vacaciones.fecha_fin = '$fechaF'
    WHERE periodo_vacaciones.id_periodo = '$id_vacacionE' ";
    $conn->query($sql_vacacionesE);

    $sql_peridoVacacionesE = "UPDATE periodo_vacaciones
    SET estado_vacaciones='$estado', 
        id_empleado='$id_empleado' 
    WHERE id_periodo='$id_vacacionE'";

    if (mysqli_query($conn, $sql_peridoVacacionesE)) {
        echo '<script>alert("Registro modificado correctamente");</script>';
    } else {
        echo "Error actualizando los datos del empleado: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>