<?php
require_once 'SalidaControlador.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../vista/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa'];
    $responsable = $_POST['responsable'];

    $controlador = new SalidaControlador();
    $mensaje = $controlador->registrar($placa, $responsable);
    echo $mensaje;
}
