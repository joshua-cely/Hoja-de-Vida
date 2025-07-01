<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener computadores para el select
require '../includes/db.php';
$db = new Database();
$conn = $db->getConnection();

$sql = "SELECT id, marca, modelo FROM computadores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Entrada</title>
    <link rel="stylesheet" href="../css/entrada.css">
</head>
<body class="form-page">
    <div class="form-container">
        <h2 class="form-title">Registrar Entrada de Computador</h2>
        <form action="../controlador/procesar_entrada.php" method="POST">
            <div class="form-group">
                <label for="placa">Placa del Computador</label>
                <input type="text" name="placa" required>
            </div>

            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input type="text" name="responsable" required>
            </div>

            <div class="form-actions">
                <input type="submit" value="Registrar Entrada" class="btn btn-primario">
                <a href="../controlador/Iniciar_dashboard.php" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>