<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tipo_documentacion = $_POST["tipo"];
    $dni = $_POST["dni"];
    $nif = $_POST["nif"];
    $nss = $_POST["nss"];

  // Determina si ingresa medico, empleado o paciente
  if (isset($_POST["id_medico"])) {
    $id_medico = $_POST["id_medico"];
    $id_empleado = null; // Establecer como nulo
    $id_paciente = null;
    $nro_colegiado = $_POST["colegiado"];
} elseif (isset($_POST["id_empleado"])) {
    $id_empleado = $_POST["id_empleado"];
    $id_medico = null; 
    $id_paciente = null;
    $nro_colegiado = null;
} elseif (isset($_POST["id_paciente"])) {
    $id_paciente = $_POST["id_paciente"];
    $id_medico = null;
    $id_empleado = null;
    $nro_colegiado = null;
}
  
    // Confirmar la transacción si todo está bien
    $conn->commit();

//Insertar Profesionales
$sql_profesional = "INSERT INTO profesionales (nro_colegiado) VALUES ('$nro_colegiado')";
$conn->query($sql_profesional);
$id_profresional = $conn->insert_id;


//Insertar Documentacion
$sql_documentacion = "INSERT INTO documentaciones (tipo_documento, dni, nif, nro_seguridad_social, id_medico, id_empleado, id_paciente) VALUES ('$tipo_documentacion', '$dni', '$nif', '$nss', ?, ?, ?)";
$stmt_documentacion = $conn->prepare($sql_documentacion);
$stmt_documentacion->bind_param("sss", $id_medico, $id_empleado, $id_paciente);
$stmt_documentacion->execute();
$id_documentacion =$stmt_documentacion->insert_id;
$stmt_documentacion->close();

//Insertar documentacionXprofesionales

$sql_docuxpro = "INSERT INTO documentacionesxprofesionales (id_documentacion, id_profesional) VALUES ('$id_documentacion', '$id_profresional')";
$conn->query($sql_docuxpro);
$id_docuxpro = $conn->insert_id;


    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
