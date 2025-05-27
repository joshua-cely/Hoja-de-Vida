<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vista/login.php");
    exit();
}

// Obtener el nombre y rol del usuario desde la base de datos
require '../config/conexion.php';
$usuario = $_SESSION['usuario'];
$sql = "SELECT nombre, rol FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$nombre = $row['nombre']; // Obtener el nombre
$rol = $row['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/script.js" defer></script>
</head>
<body class="dashboard-page">
    <div class="dashboard-container">
        <h2 class="dashboard-title">Bienvenido, <?php echo htmlspecialchars($nombre); ?></h2> <!-- Mostrar el nombre -->
        <div class="dashboard-buttons">
    <?php if ($rol == 'admin'): ?>
        <a href="agregar_equipo.php" class="btn btn-primario">Agregar Nuevo Computador</a>
        <a href="agregar_usuario.php" class="btn btn-primario">Agregar Usuario</a>
        <a href="ver_equipos.php" class="btn btn-secundario">Ver Equipos</a>
        <a href="agregar_entrada.php" class="btn btn-secundario">Registrar Entradas</a>
        <a href="agregar_salida.php" class="btn btn-secundario">Registrar Salidas</a>
        <a href="ver_registros.php" class="btn btn-secundario">Ver Registros</a>
    <?php elseif ($rol == 'usuario'): ?>
        <a href="ver_equipos.php" class="btn btn-secundario">Ver Equipos</a>
        <a href="agregar_equipo.php" class="btn btn-primario">Agregar Computador</a>
        <a href="agregar_entrada.php" class="btn btn-secundario">Registrar Entradas</a>
        <a href="agregar_salida.php" class="btn btn-secundario">Registrar Salidas</a>
    <?php elseif ($rol == 'invitado'): ?>
        <a href="ver_equipos.php" class="btn btn-secundario">Ver Equipos</a>
    <?php endif; ?>
    <a href="logout.php" class="btn btn-peligro">Salir</a>
</div>

    </div>
</body>
</html>
