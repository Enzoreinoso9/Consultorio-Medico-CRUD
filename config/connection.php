<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = ""; //Ingresar base de datos


$conn = new mysqli($host,$username,$password,$database);

if (!$conn) {
    die("Conexión fallida: ".$conn ->connect_error);
}
?>