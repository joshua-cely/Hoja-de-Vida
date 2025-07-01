<?php
require_once '../includes/db.php';
require_once '../modelo/Equipo.php';
require_once 'EquipoControlador.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vista/login.php");
    exit();
}

// Conexión directa para obtener el rol (puedes refactorizar esto después)
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

// Parámetros de búsqueda y paginación
$search = $_POST['search'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Obtener equipos
$controlador = new EquipoControlador();
$equipos = $controlador->listarEquipos($search, $page);

