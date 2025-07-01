<?php
require_once '../includes/db.php';
require_once '../modelo/Equipo.php';
require_once 'EquipoControlador.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vista/login.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$controlador = new EquipoControlador();
$equipo = $controlador->verDetalle($id);

if (!$equipo) {
    echo "❌ No se encontró el equipo.";
    exit();
}
?>
