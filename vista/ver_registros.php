<?php
require_once '../controlador/EntradaControlador.php';
require_once '../controlador/SalidaControlador.php';

$entradaCtrl = new EntradaControlador();
$salidaCtrl = new SalidaControlador();

$search = isset($_POST['search']) ? $_POST['search'] : '';
$entrada_result = $entradaCtrl->listar($search);
$salida_result = $salidaCtrl->listar($search);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Movimiento</title>
    <link rel="stylesheet" href="../css/ver_registros.css">
</head>
<body class="equipos-page">
    <div class="equipos-container">
        <h2 class="equipos-title">Historial de Movimiento de Equipos</h2>

        <form method="POST" class="search-form">
            <input type="text" name="search" placeholder="Buscar por número de serie" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Buscar">
        </form>

        <section class="registro-section">
            <h3 class="registro-subtitle">Entradas</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Entrada</th>
                        <th>Número de Serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $entrada_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['fecha_entrada']); ?></td>
                        <td><?php echo htmlspecialchars($row['numero_serie']); ?></td>
                        <td><?php echo htmlspecialchars($row['marca']); ?></td>
                        <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($row['responsable']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <section class="registro-section">
            <h3 class="registro-subtitle">Salidas</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Salida</th>
                        <th>Número de Serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $salida_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['fecha_salida']); ?></td>
                        <td><?php echo htmlspecialchars($row['numero_serie']); ?></td>
                        <td><?php echo htmlspecialchars($row['marca']); ?></td>
                        <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($row['responsable']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <div style="margin-top: 30px;">
            <a href="../controlador/Iniciar_dashboard.php" class="btn btn-primario">Volver al Dashboard</a>
        </div>
    </div>
</body>
</html>

<?php
$entrada_stmt->close();
$salida_stmt->close();
$conn->close();
?>
