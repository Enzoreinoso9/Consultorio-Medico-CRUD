<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $residencia = $_POST["residencia"];
    $pais = $_POST["pais"];
    $provincia = $_POST["provincia"];
    $localidad = $_POST["localidad"];
    $barrio = $_POST["barrio"];
    $calle = $_POST["calle"];

  // Determina si ingresa medico, empleado o paciente
  if (isset($_POST["id_medico"])) {
    $id_medico = $_POST["id_medico"];
    $id_empleado = null; // Establecer como nulo
    $id_paciente = null;
} elseif (isset($_POST["id_empleado"])) {
    $id_empleado = $_POST["id_empleado"];
    $id_medico = null; 
    $id_paciente = null;
} elseif (isset($_POST["id_paciente"])) {
    $id_paciente = $_POST["id_paciente"];
    $id_medico = null;
    $id_empleado = null;
}
  
    // Confirmar la transacción si todo está bien
    $conn->commit();

//Insertar Calle
$sql_calles = "INSERT INTO calles (nombres_altura) VALUES ('$calle')";
$conn->query($sql_calles);
$id_calle = $conn->insert_id;

//Insertar Documentacion
$sql_direcciones = "INSERT INTO direcciones (tipo_residencia, id_pais, id_provincia, id_localidad, id_barrio, id_calle, id_medico, id_empleado, id_paciente) VALUES ('$residencia', '$pais', '$provincia', '$localidad', '$barrio', '$id_calle', ?, ?, ?)";
$stmt_direccion = $conn->prepare($sql_direcciones);
$stmt_direccion->bind_param("sss", $id_medico, $id_empleado, $id_paciente);
$stmt_direccion->execute();
$id_direccion =$stmt_direccion->insert_id;
$stmt_direccion->close();


    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
