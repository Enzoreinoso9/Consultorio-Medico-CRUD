<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $alta = $_POST["alta"];
    $baja = $_POST["baja"];
    $revistas = $_POST["revista"];
    $id_medico = $_POST["id_medico"];

    //iniciar transacción
    $conn->begin_transaction();

 //insertar revistas 
    $sql_revista = "INSERT INTO revistas (tipo_revista) VALUES ('$revistas')";
    $conn->query($sql_revista);
    $id_revista = $conn->insert_id;

    //insertar sustituciones
    $id_sustitucion = $conn->insert_id;
    $sql_sustitucion = "INSERT INTO sustituciones (id_sustitucion, alta_suplencia, baja_suplencia, id_medico, id_revista) VALUES ('$id_sustitucion', '$alta', '$baja', '$id_medico', '$id_revista')";
    $conn->query($sql_sustitucion);

    //confirmar transaccion
    $conn->commit();

    echo '<script>alert("Registro insertado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';

}

//cerrar conexión
$conn->close();
?>