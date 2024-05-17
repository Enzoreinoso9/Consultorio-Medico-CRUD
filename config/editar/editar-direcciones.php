<?php
include '../connection.php';

// Verificar qué formulario se ha enviado
if (isset($_POST['editar_med'])) {
    
    $id_direccionM = $_POST['id_direccion'];
    $residencia = $_POST['residencia'];
    $pais = $_POST['pais'];
    $provincia = $_POST['provincia'];
    $localidad = $_POST['localidad'];
    $barrio = $_POST['barrio'];
    $calle = $_POST['calle'];
    $id_medico = $_POST['id_medico'];

$sql_calle= "UPDATE calles
INNER JOIN direcciones ON calles.id_calle = direcciones.id_calle
SET calles.nombres_altura = '$calle'
WHERE direcciones.id_direccion = '$id_direccionM'";
$conn->query($sql_calle);

    $sql_direccionesM = "UPDATE direcciones
    SET tipo_residencia = '$residencia',
    id_pais = '$pais',
    id_provincia = '$provincia',
    id_localidad = '$localidad',
    id_barrio = '$barrio',
    id_medico = '$id_medico'
    WHERE id_direccion = '$id_direccionM'";


    if (mysqli_query($conn, $sql_direccionesM )) {
        echo "Dirección del médico actualizados correctamente";
    } else {
        echo "Error actualizando los datos del médico: " . mysqli_error($conn);
    }
} elseif (isset($_POST['editar_emp'])) {
    
    $id_direccionE = $_POST['id_direccion'];
    $residencia = $_POST['residencia'];
    $pais = $_POST['pais'];
    $provincia = $_POST['provincia'];
    $localidad = $_POST['localidad'];
    $barrio = $_POST['barrio'];
    $calle = $_POST['calle'];
    $id_empleado = $_POST['id_empleado'];

    $sql_calle= "UPDATE calles
    INNER JOIN direcciones ON calles.id_calle = direcciones.id_calle
    SET calles.nombres_altura = '$calle'
    WHERE direcciones.id_direccion = '$id_direccionE'";
    $conn->query($sql_calle);
    
        $sql_direccionesE = "UPDATE direcciones
        SET tipo_residencia = '$residencia',
        id_pais = '$pais',
        id_provincia = '$provincia',
        id_localidad = '$localidad',
        id_barrio = '$barrio',
        id_empleado = '$id_empleado'
        WHERE id_direccion = '$id_direccionE'";

    if (mysqli_query($conn, $sql_direccionesE )) {
        echo "Dirección del empleado actualizados correctamente";
    } else {
        echo "Error actualizando los datos del empleado: " . mysqli_error($conn);
    }
}elseif (isset($_POST['editar_pac'])) {
    
    $id_direccionP = $_POST['id_direccion'];
    $residencia = $_POST['residencia'];
    $pais = $_POST['pais'];
    $provincia = $_POST['provincia'];
    $localidad = $_POST['localidad'];
    $barrio = $_POST['barrio'];
    $calle = $_POST['calle'];
    $id_paciente = $_POST['id_paciente'];


    $sql_calle= "UPDATE calles
    INNER JOIN direcciones ON calles.id_calle = direcciones.id_calle
    SET calles.nombres_altura = '$calle'
    WHERE direcciones.id_direccion = '$id_direccionP'";
    $conn->query($sql_calle);
    
        $sql_direccionesP = "UPDATE direcciones
        SET tipo_residencia = '$residencia',
        id_pais = '$pais',
        id_provincia = '$provincia',
        id_localidad = '$localidad',
        id_barrio = '$barrio',
        id_paciente = '$id_paciente'
        WHERE id_direccion = '$id_direccionP'";


    if (mysqli_query($conn, $sql_direccionesP)) {
        echo '<script>alert("Registro modificado correctamente");</script>';
    } else {
        echo "Error actualizando los datos del empleado: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>