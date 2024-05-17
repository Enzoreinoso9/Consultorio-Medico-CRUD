<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sustitucion = $_POST["id_sustitucion"];
    $altaSuplencia = $_POST["alta"];
    $bajaSuplencia = $_POST["baja"];
    $tipoRevista = $_POST["revista"];
    $id_medico = $_POST["id_medico"];

    $conn->begin_transaction();

    $sql_revista = "UPDATE revistas 
    INNER JOIN sustituciones ON revistas.id_revista = sustituciones.id_revista
    SET revistas.tipo_revista = '$tipoRevista'
    WHERE sustituciones.id_sustitucion = '$id_sustitucion'";
    $conn->query($sql_revista);

    $sql_sustitucion = "UPDATE sustituciones
    SET alta_suplencia = '$altaSuplencia',
        baja_suplencia = '$bajaSuplencia',
        id_medico = '$id_medico'
        WHERE id_sustitucion = '$id_sustitucion'";
    $conn->query($sql_sustitucion);

    $conn->commit();

    echo '<script>alert("Registro modificado correctamente");</script>';
} else {
    echo '<script>alert("Error en la solicitud");</script>';
}

$conn->close();
?>