<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener computadores para el select
require '../config/conexion.php';
$sql = "SELECT id, marca, modelo FROM computadores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Salida</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body class="form-page">
    <div class="form-container">
        <h2 class="form-title">Registrar Salida de Computador</h2>
        <form action="../controlador/procesar_salida.php" method="POST">
            <div class="form-group">
                <label for="placa">Placa del Computador</label>
                <input type="text" name="placa" required>
            </div>

            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input type="text" name="responsable" required>
            </div>

            <div class="form-actions">
                <input type="submit" value="Registrar Salida" class="btn btn-primario">
                <a href="../vista/dashboard.php" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>