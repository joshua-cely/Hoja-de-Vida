<?php
require_once '../controlador/UsuarioControlador.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $controlador = new UsuarioControlador();
    $datos = $controlador->login($usuario, $contrasena);

    if ($datos) {
    session_start();
    $_SESSION['usuario'] = $datos['usuario'];
    $_SESSION['rol'] = $datos['rol'];
    $_SESSION['nombre'] = $datos['nombre']; // Asegúrate de tener esto
    $_SESSION['usuario_id'] = $datos['id']; // Necesario para el dashboard

    header("Location: ../controlador/iniciar_dashboard.php");
    exit();
} else {
    header("Location: ../vista/login.php?error=1");
    exit();
}
}
?>
