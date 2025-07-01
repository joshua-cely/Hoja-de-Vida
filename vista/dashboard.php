<?php
// dashboard.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
// Aquí se asume que el controlador ya ha sido llamado y los datos están disponibles
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Gestión de Equipos</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="https://kit.fontawesome.com/a2e0c6f5c9.js" crossorigin="anonymous"></script>
</head>
<body class="dashboard-page">

    <!-- ENCABEZADO -->
    <header class="header">
        <div class="header-content">
            <h1 class="system-title"><i class="fas fa-network-wired"></i> Gestión de Equipos</h1>
            <div class="user-info">
                <img src="../img/avatar.png" alt="Usuario" class="user-avatar">
                <div>
                    <p><strong><?php echo htmlspecialchars($nombre); ?></strong></p>
                    <p class="user-role">Rol: <?php echo ucfirst($rol); ?></p>
                </div>
            </div>
        </div>
    </header>

    <!-- RESUMEN -->
    <section class="resumen-section">
        <div class="resumen-card">
            <i class="fas fa-desktop resumen-icon"></i>
            <div>
                <p>Equipos Registrados</p>
                <h3><?php echo $totalEquipos; ?></h3>
            </div>
        </div>
        <div class="resumen-card">
            <i class="fas fa-users resumen-icon"></i>
            <div>
                <p>Usuarios</p>
                <h3><?php echo $totalUsuarios; ?></h3>
            </div>
        </div>
        <div class="resumen-card">
            <i class="fas fa-sign-in-alt resumen-icon"></i>
            <div>
                <p>Entradas</p>
                <h3><?php echo $totalEntradas; ?></h3>
            </div>
        </div>
        <div class="resumen-card">
            <i class="fas fa-sign-out-alt resumen-icon"></i>
            <div>
                <p>Salidas</p>
                <h3><?php echo $totalSalidas; ?></h3>
            </div>
        </div>
    </section>

    <!-- ACCIONES -->
    <section class="acciones-section">
        <h2 class="section-title">Acciones rápidas</h2>
        <div class="dashboard-buttons">
            <?php if ($rol == 'admin'): ?>
                <a href="../controlador/procesar_equipo.php" class="btn btn-primario"><i class="fas fa-plus-circle"></i> Nuevo Computador</a>
                <a href="../vista/agregar_usuario.php" class="btn btn-primario"><i class="fas fa-user-plus"></i> Nuevo Usuario</a>
            <?php endif; ?>

            <?php if ($rol == 'admin' || $rol == 'usuario'): ?>
                <a href="../vista/ver_equipos.php" class="btn btn-secundario"><i class="fas fa-desktop"></i> Ver Equipos</a>
                <a href="../vista/agregar_entrada.php" class="btn btn-secundario"><i class="fas fa-sign-in-alt"></i> Registrar Entrada</a>
                <a href="../vista/agregar_salida.php" class="btn btn-secundario"><i class="fas fa-sign-out-alt"></i> Registrar Salida</a>
            <?php endif; ?>

            <a href="../vista/ver_registros.php" class="btn btn-secundario"><i class="fas fa-search"></i> Consultar Registros</a>
            <a href="../logout.php" class="btn btn-peligro"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
        </div>
    </section>

    <!-- REGISTROS RECIENTES -->
    <section class="recientes-section">
        <h2 class="section-title">Últimos movimientos</h2>
        <table class="tabla-recientes">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Acción</th>
                    <th>Equipo</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($registros && $registros->num_rows > 0): ?>
                    <?php while ($r = $registros->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($r['fecha']); ?></td>
                            <td><?php echo htmlspecialchars($r['tipo_accion']); ?></td>
                            <td><?php echo htmlspecialchars($r['equipo']); ?></td>
                            <td><?php echo htmlspecialchars($r['responsable']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4">Sin registros recientes.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <!-- PIE DE PÁGINA -->
    <footer class="footer">
        <p>&copy; <?php echo date('Y'); ?> Sistema de Gestión de Equipos - Desarrollado por Market Mix</p>
    </footer>

</body>
</html>
