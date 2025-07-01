<?php
require_once '../includes/db.php';
require_once '../modelo/Equipo.php';
require_once 'EquipoControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $controlador = new EquipoControlador();

    if ($controlador->eliminarEquipo($id)) {
        header("Location: ../vista/ver_equipos.php");
        exit();
    } else {
        echo "❌ Error al eliminar el equipo.";
    }
} else {
    header("Location: ../vista/ver_equipos.php");
    exit();
}
?>