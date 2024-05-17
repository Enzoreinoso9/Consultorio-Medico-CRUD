<?php
include '../connection.php';

// Verificar qué formulario se ha enviado
if (isset($_POST['editar_med'])) {

    $id_documentacionM = $_POST['id_documentacion'];
    $tipo_documentacion = $_POST['tipo'];
    $dni = $_POST['dni'];
    $nif = $_POST['nif'];
    $nss = $_POST['nss'];
    $nro_colegiado = $_POST['colegiado'];
    $id_medico = $_POST['id_medico'];

    $sql_profesionales = "UPDATE profesionales
INNER JOIN documentacionesxprofesionales ON profesionales.id_profesional = documentacionesxprofesionales.id_profesional
INNER JOIN documentaciones ON documentacionesxprofesionales.id_documentacion = documentaciones.id_documentacion
SET profesionales.nro_colegiado = '$nro_colegiado'
WHERE documentaciones.id_documentacion = '$id_documentacionM'";
    $conn->query($sql_profesionales);

    $sql_documentacionM = "UPDATE documentaciones
SET tipo_documento = '$tipo_documentacion',
dni = '$dni',
nif = '$nif',
nro_seguridad_social = '$nss',
id_medico = '$id_medico'
WHERE id_documentacion = '$id_documentacionM'";

    if (mysqli_query($conn, $sql_documentacionM)) {
        echo "Documentación del médico actualizados correctamente";
    } else {
        echo "Error actualizando los datos del médico: " . mysqli_error($conn);
    }
} elseif (isset($_POST['editar_emp'])) {

    $id_documentacionE = $_POST['id_documentacion'];
    $tipo_documentacion = $_POST['tipo'];
    $dni = $_POST['dni'];
    $nif = $_POST['nif'];
    $nss = $_POST['nss'];
    $id_empleado = $_POST['id_empleado'];


    $sql_documentacionE = "UPDATE documentaciones
    SET tipo_documento = '$tipo_documentacion',
    dni = '$dni',
    nif = '$nif',
    nro_seguridad_social = '$nss',
    id_empleado = '$id_empleado'
    WHERE id_documentacion = '$id_documentacionE'";

    if (mysqli_query($conn, $sql_documentacionE)) {
        echo "Documentación del empleado actualizados correctamente";
    } else {
        echo "Error actualizando los datos del empleado: " . mysqli_error($conn);
    }
} elseif (isset($_POST['editar_pac'])) {

    $id_documentacionP = $_POST['id_documentacion'];
    $tipo_documentacion = $_POST['tipo'];
    $dni = $_POST['dni'];
    $nif = $_POST['nif'];
    $nss = $_POST['nss'];
    $id_paciente = $_POST['id_paciente'];


    $sql_documentacionP = "UPDATE documentaciones
SET tipo_documento = '$tipo_documentacion',
dni = '$dni',
nif = '$nif',
nro_seguridad_social = '$nss',
id_paciente = '$id_paciente'
WHERE id_documentacion = '$id_documentacionP'";

    if (mysqli_query($conn, $sql_documentacionP)) {
        echo '<script>alert("Registro modificado correctamente");</script>';
    } else {
        echo "Error actualizando los datos del empleado: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
