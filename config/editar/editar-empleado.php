<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empleado = $_POST["id_empleado"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $sexo = $_POST["sexo"];
    $fechaN = $_POST["fechaN"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $puesto = $_POST["puesto"];

    $conn->begin_transaction();

    $sql_registro = "UPDATE registros
                        INNER JOIN personas ON registros.id_registro = personas.id_registro
                        INNER JOIN empleados ON personas.id_persona = empleados.id_persona
                        SET registros.nombres = '$nombre', registros.apellidos = '$apellido'
                        WHERE empleados.id_empleado = '$id_empleado'";
    $conn->query($sql_registro);

    $sql_persona = "UPDATE personas
                    INNER JOIN empleados ON personas.id_persona = empleados.id_persona
                    SET personas.sexo = '$sexo', personas.fecha_nacimiento = '$fechaN'
                    WHERE empleados.id_empleado = '$id_empleado'";
    $conn->query($sql_persona);

    $sql_datos_personales = "UPDATE datos_personales
                                INNER JOIN personas ON datos_personales.id_persona = personas.id_persona
                                INNER JOIN empleados ON personas.id_persona = empleados.id_persona
                                SET datos_personales.telefonos = '$telefono', datos_personales.correo = '$correo'
                                WHERE empleados.id_empleado = '$id_empleado'";
    $conn->query($sql_datos_personales);


    $sql_empleado = "UPDATE empleados
                            SET id_puesto = '$puesto'
                            WHERE id_empleado = '$id_empleado'";
    $conn->query($sql_empleado);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
?>