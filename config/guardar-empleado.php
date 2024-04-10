<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $puesto = $_POST["puesto"];

//Iniciar Transacción
$conn->begin_transaction();

//1- Insertar tabla registros 
$sql_registro = "INSERT INTO registros (nombres, apellidos) VALUES ('$nombre', '$apellido')";
$conn->query($sql_registro);
$id_registro = $conn -> insert_id;


//2-Insertar tabla personas
$sql_persona = "INSERT INTO personas (sexo, fecha_nacimiento, id_registro) VALUES ('$sexo', '$fechaN', '$id_registro')";
$conn->query($sql_persona);
$id_persona = $conn -> insert_id;


//3-Insertar tabla datos personales
$sql_datos_personales = "INSERT INTO datos_personales (telefonos, correo, id_persona) VALUES ('$telefono', '$correo', '$id_persona')";
$conn->query($sql_datos_personales);


//4-Insertar tabla puesto de trabajo
$id_puesto = $conn-> insert_id;
$sql_puesto_trabajo = "INSERT INTO puestos_trabajos (id_puesto, nombre_puesto) VALUES ('$id_puesto', '$puesto')";
$conn->query($sql_puesto_trabajo);


//5-Insertar tabla empleados
$id_empleado = $conn->insert_id;
$sql_empleados = "INSERT INTO empleados (id_empleado, id_persona, id_puesto) VALUES ('$id_empleado', '$id_persona', '$id_puesto')";
$conn->query($sql_empleados);

// Confirmar la transacción si todo está bien
    $conn->commit();

    echo '<script>alert("Empleado registrado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

// Cerrar la conexión
$conn->close();
?>
