<?php
require '../controlador/editar_equipo_control.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Equipo</title>
    <link rel="stylesheet" href="../css/editar.css">
</head>
<body class="form-page">
    <div class="form-container">
        <h2 class="form-title">Editar Equipo</h2>
        <form action="../controlador/procesar_editar.php?id=<?php echo $equipo['id']; ?>" method="POST" enctype="multipart/form-data" class="form-grid">
            <div class="form-group">
                <label for="tipo">Tipo de equipo</label>
                <select name="tipo" required>
                    <option value="Torre" <?php echo ($equipo['tipo_equipo'] == 'Torre') ? 'selected' : ''; ?>>Torre</option>
                    <option value="Todo en uno" <?php echo ($equipo['tipo_equipo'] == 'Todo en uno') ? 'selected' : ''; ?>>Todo en uno</option>
                </select>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" name="marca" value="<?php echo htmlspecialchars($equipo['marca']); ?>" required>
            </div>

            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" value="<?php echo htmlspecialchars($equipo['modelo']); ?>" required>
            </div>

            <div class="form-group">
                <label for="numero_serie">Número de Serie</label>
                <input type="text" name="numero_serie" value="<?php echo htmlspecialchars($equipo['numero_serie']); ?>" required>
            </div>

            <div class="form-group">
                <label for="procesador">Procesador</label>
                <input type="text" name="procesador" value="<?php echo htmlspecialchars($equipo['procesador']); ?>" required>
            </div>

            <div class="form-group">
                <label for="ram">Memoria RAM (GB)</label>
                <input type="number" name="ram" value="<?php echo htmlspecialchars($equipo['ram_gb']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo_ram">Tipo de RAM</label>
                <input type="text" name="tipo_ram" value="<?php echo htmlspecialchars($equipo['tipo_ram']); ?>">
            </div>

            <div class="form-group">
                <label for="almacenamiento">Almacenamiento (GB)</label>
                <input type="number" name="almacenamiento" value="<?php echo htmlspecialchars($equipo['almacenamiento_gb']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo_almacenamiento">Tipo de Almacenamiento</label>
                <select name="tipo_almacenamiento" required>
                    <option value="HDD" <?php echo ($equipo['tipo_almacenamiento'] == 'HDD') ? 'selected' : ''; ?>>HDD</option>
                    <option value="SSD" <?php echo ($equipo['tipo_almacenamiento'] == 'SSD') ? 'selected' : ''; ?>>SSD</option>
                    <option value="Híbrido" <?php echo ($equipo['tipo_almacenamiento'] == 'Híbrido') ? 'selected' : ''; ?>>Híbrido</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sistema_operativo">Sistema Operativo</label>
                <input type="text" name="sistema_operativo" value="<?php echo htmlspecialchars($equipo['sistema_operativo']); ?>">
            </div>

            <div class="form-group">
                <label for="licencia">Licencia</label>
                <input type="text" name="licencia" value="<?php echo htmlspecialchars($equipo['licencia_so']); ?>">
            </div>

            <div class="form-group">
                <label for="antivirus_instalado">Antivirus Instalado</label>
                <input type="text" name="antivirus_instalado" value="<?php echo htmlspecialchars($equipo['antivirus_instalado']); ?>">
            </div>

            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" value="<?php echo htmlspecialchars($equipo['ubicacion']); ?>">
            </div>

            <div class="form-group">
                <label for="estado_equipo">Estado del Equipo</label>
                <select name="estado_equipo" required>
                    <option value="Operativo" <?php echo ($equipo['estado_equipo'] == 'Operativo') ? 'selected' : ''; ?>>Operativo</option>
                    <option value="En reparación" <?php echo ($equipo['estado_equipo'] == 'En reparación') ? 'selected' : ''; ?>>En reparación</option>
                    <option value="Dañado" <?php echo ($equipo['estado_equipo'] == 'Dañado') ? 'selected' : ''; ?>>Dañado</option>
                    <option value="Obsoleto" <?php echo ($equipo['estado_equipo'] == 'Obsoleto') ? 'selected' : ''; ?>>Obsoleto</option>
                </select>
            </div>

            <div class="form-group" style="grid-column: 1 / -1;">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" value="<?php echo htmlspecialchars($equipo['fecha_ingreso']); ?>" required>
            </div>

            <div class="form-group" style="grid-column: 1 / -1;">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones"><?php echo htmlspecialchars($equipo['observaciones']); ?></textarea>
            </div>

            <div class="form-group" style="grid-column: 1 / -1;">
                <label for="imagen">Imagen del equipo</label>
                <input type="file" name="imagen" accept="image/*">
            </div>

            <div class="form-actions">
                <input type="submit" value="Actualizar equipo" class="btn btn-primario">
                <a href="../controlador/Iniciar_dashboard.php" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
