<?php
require '../controlador/detalle_equipo_control.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Equipo</title>
    <link rel="stylesheet" href="../css/detalle.css">
    <script src="../js/script.js" defer></script>
</head>
    <body class="detalle-page">
    <div class="detalle-wrapper">
        <div class="detalle-card">
            <h2 class="detalle-title">Detalles del Equipo</h2>

            <div class="detalle-grid">

                <?php if ($equipo['imagen']): ?>

                    <div class="detalle-imagen">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($equipo['imagen']); ?>" alt="Imagen del equipo">
                    </div>
                <?php endif; ?>

                <!-- Información del equipo -->
                <div class="detalle-info">
                    <div class="detalle-dato"><strong>Número de Serie:</strong> <?php echo htmlspecialchars($equipo['numero_serie']); ?></div>
                    <div class="detalle-dato"><strong>Marca:</strong> <?php echo htmlspecialchars($equipo['marca']); ?></div>
                    <div class="detalle-dato"><strong>Modelo:</strong> <?php echo htmlspecialchars($equipo['modelo']); ?></div>
                    <div class="detalle-dato"><strong>Procesador:</strong> <?php echo htmlspecialchars($equipo['procesador']); ?></div>
                    <div class="detalle-dato"><strong>RAM:</strong> <?php echo htmlspecialchars($equipo['ram_gb']); ?> GB</div>
                    <div class="detalle-dato"><strong>Almacenamiento:</strong> <?php echo htmlspecialchars($equipo['almacenamiento_gb']); ?> GB</div>
                    <div class="detalle-dato"><strong>Sistema Operativo:</strong> <?php echo htmlspecialchars($equipo['sistema_operativo']); ?></div>
                    <div class="detalle-dato"><strong>Licencia:</strong> <?php echo htmlspecialchars($equipo['licencia_so']); ?></div>
                    <div class="detalle-dato"><strong>Antivirus Instalado:</strong> <?php echo htmlspecialchars($equipo['antivirus_instalado']); ?></div>
                    <div class="detalle-dato"><strong>Ubicación:</strong> <?php echo htmlspecialchars($equipo['ubicacion']); ?></div>
                    <div class="detalle-dato"><strong>Estado del Equipo:</strong> <?php echo htmlspecialchars($equipo['estado_equipo']); ?></div>
                    <div class="detalle-dato"><strong>Fecha de Ingreso:</strong> <?php echo htmlspecialchars($equipo['fecha_ingreso']); ?></div>
                    <div class="detalle-dato"><strong>Observaciones:</strong> <?php echo htmlspecialchars($equipo['observaciones']); ?></div>
                </div>
            </div>
            

            <!-- Botones -->
            <div class="detalle-buttons">
                <a href="ver_equipos.php" class="btn btn-secundario">← Volver</a>
                <?php if ($rol == 'admin' || $rol == 'usuario'): ?>
                <a href="editar.php?id=<?php echo $equipo['id']; ?>" class="btn btn-primario">✎ Editar Equipo</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
