<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener el rol del usuario
require '../config/conexion.php';
$usuario = $_SESSION['usuario'];
$sql = "SELECT rol FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$rol = $row['rol'];

if ($rol != 'admin') {
    header("Location: ver_equipos.php"); // Redirigir a ver equipos si no es admin
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Equipo</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body class="form-page">
    <div class="form-container">
        <h2 class="form-title">Agregar Nuevo Equipo</h2>
        <form action="../controlador/procesar_equipo.php" method="POST" enctype="multipart/form-data" class="form-grid">
            <div class="form-group">
                <label for="tipo">Tipo de equipo</label>
                <select name="tipo" required>
                    <option value="Torre">Torre</option>
                    <option value="Todo en uno">Todo en uno</option>
                </select>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" name="marca" required>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" required>
            </div>

            <div class="form-group">
                <label for="numero_serie">Número de Serie</label>
                <input type="text" name="numero_serie" required>
            </div>

            <div class="form-group">
                <label for="procesador">Procesador</label>
                <input type="text" name="procesador" required>
            </div>

            <div class="form-group">
                <label for="ram">Memoria RAM (GB)</label>
                <input type="number" name="ram" required>
            </div>

            <div class="form-group">
                <label for="tipo_ram">Tipo de RAM</label>
                <input type="text" name="tipo_ram">
            </div>

            <div class="form-group">
                <label for="almacenamiento">Almacenamiento (GB)</label>
                <input type="number" name="almacenamiento" required>
            </div>

            <div class="form-group">
                <label for="tipo_almacenamiento">Tipo de Almacenamiento</label>
                <select name="tipo_almacenamiento" required>
                    <option value="HDD">HDD</option>
                    <option value="SSD">SSD</option>
                    <option value="Híbrido">Híbrido</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sistema_operativo">Sistema Operativo</label>
                <input type="text" name="sistema_operativo">
            </div>

            <div class="form-group">
                <label for="licencia">Licencia</label>
                <input type="text" name="licencia">
            </div>

            <div class="form-group">
                <label for="antivirus_instalado">Antivirus Instalado</label>
                <input type="text" name="antivirus_instalado">
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion">
            </div>

            <div class="form-group">
                <label for="estado_equipo">Estado del Equipo</label>
                <select name="estado_equipo" required>
                    <option value="Operativo">Operativo</option>
                    <option value="En reparación">En reparación</option>
                    <option value="Dañado">Dañado</option>
                    <option value="Obsoleto">Obsoleto</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" required>
            </div>

            <div class="form-group" style="grid-column: 1 / -1;">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones"></textarea>
            </div>

            <div class="form-group" style="grid-column: 1 / -1;">
                <label for="imagen">Imagen del equipo</label>
                <input type="file" name="imagen" accept="image/*" required>
            </div>

            <div class="form-actions">
                <input type="submit" value="Guardar equipo" class="btn btn-primario">
                <a href="../vista/dashboard.php" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
