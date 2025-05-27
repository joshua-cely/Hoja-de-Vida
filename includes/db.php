<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "inventario";

$conn = new mysqli($host, $usuario, $clave, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
