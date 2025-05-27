<?php
require '../config/conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


// Lógica para búsqueda
$search = isset($_POST['search']) ? $_POST['search'] : '';


// Consultas para obtener registros de entradas y salidas
$entrada_sql = "SELECT e.id, e.responsable, c.numero_serie, c.marca, c.modelo 
                FROM entradas e 
                JOIN computadores c ON e.computador_id = c.id 
                WHERE c.numero_serie LIKE ?";


$salida_sql = "SELECT s.id, s.responsable, c.numero_serie, c.marca, c.modelo 
                FROM salidas s 
                JOIN computadores c ON s.computador_id = c.id 
                WHERE c.numero_serie LIKE ?";


$searchParam = "%$search%";


// Preparar y ejecutar consultas
$entrada_stmt = $conn->prepare($entrada_sql);
$entrada_stmt->bind_param("s", $searchParam);
$entrada_stmt->execute();
$entrada_result = $entrada_stmt->get_result();


$salida_stmt = $conn->prepare($salida_sql);
$salida_stmt->bind_param("s", $searchParam);
$salida_stmt->execute();
$salida_result = $salida_stmt->get_result();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Registros de Entradas y Salidas</title>
    <link rel="stylesheet" href="../css/equipos.css">
</head>
<body>
    <div class="equipos-container">
        <h2 class="equipos-title">Registros de Entradas y Salidas</h2>


        <form method="POST" class="search-form">
            <input type="text" name="search" placeholder="Buscar por placa" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Buscar">
        </form>


        <h3>Entradas</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
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
                    <td><?php echo htmlspecialchars($row['numero_serie']); ?></td>
                    <td><?php echo htmlspecialchars($row['marca']); ?></td>
                    <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                    <td><?php echo htmlspecialchars($row['responsable']); ?></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
        </table>


        <h3>Salidas</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
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
                    <td><?php echo htmlspecialchars($row['numero_serie']); ?></td>
                    <td><?php echo htmlspecialchars($row['marca']); ?></td>
                    <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                    <td><?php echo htmlspecialchars($row['responsable']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


        <div style="margin-top: 30px;">
            <a href="dashboard.php" class="btn btn-primario">Volver al Dashboard</a>
        </div>
    </div>
</body>
</html>


<?php
// Cerrar conexiones
$entrada_stmt->close();
$salida_stmt->close();
$conn->close();
?>