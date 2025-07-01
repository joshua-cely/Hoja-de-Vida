<?php
require_once '../includes/db.php';
require_once '../modelo/Equipo.php';
require_once 'EquipoControlador.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vista/login.php");
    exit();
}

// Obtener rol del usuario
$db = new Database();
$conn = $db->getConnection();
$usuario = $_SESSION['usuario'];
$sql = "SELECT rol FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$rol = $row['rol'];

// Obtener equipo por ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$controlador = new EquipoControlador();
$equipo = $controlador->verDetalle($id);

// Validar existencia
if (!$equipo) {
    echo "No se encontró el equipo.";
    exit();
}
