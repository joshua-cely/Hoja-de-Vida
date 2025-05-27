<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "inventario"; // Asegúrate de que esta BD existe en phpMyAdmin

$conn = new mysqli($host, $usuario, $contrasena, $basededatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
