<?php
require '../config/conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtener el rol del usuario
$usuario = $_SESSION['usuario'];
$sql = "SELECT rol FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$rol = $row['rol'];

// Lógica para paginación y búsqueda
$limit = 5; // Número de equipos por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Búsqueda
$search = isset($_POST['search']) ? $_POST['search'] : '';
$sql = "SELECT * FROM computadores WHERE numero_serie LIKE ? LIMIT ?, ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$searchParam = "%$search%";
$stmt->bind_param("sii", $searchParam, $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Equipos</title>
    <link rel="stylesheet" href="../css/equipos.css">
    <script src="../js/script.js" defer></script>
</head>
<body class="equipos-page">
    <div class="equipos-container">
        <h2 class="equipos-title">Equipos Registrados</h2>

        <form method="POST" class="search-form">
            <input type="text" name="search" placeholder="Buscar por número de serie" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Buscar">
        </form>

        <table>
            <thead>
                <tr>
                    <th>Número de Serie</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['numero_serie']); ?></td>
                    <td><?php echo htmlspecialchars($row['marca']); ?></td>
                    <td><?php echo htmlspecialchars($row['modelo']); ?></td>
                    <td>
                        <a href="detalle_equipo.php?id=<?php echo $row['id']; ?>" class="btn btn-primario">Ver</a>
                        <?php if ($rol == 'admin' || $rol == 'usuario'): ?>
                            <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-secundario">Editar</a>
                        <?php endif; ?>
                        <?php if ($rol == 'admin'): ?>
                            <form action="eliminar_equipo.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este equipo?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-peligro">Eliminar</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="pagination" style="margin-top: 20px;">
            <a href="?page=<?php echo max(1, $page - 1); ?>" class="btn btn-secundario">Anterior</a>
            <a href="?page=<?php echo $page + 1; ?>" class="btn btn-secundario">Siguiente</a>
        </div>

        <div style="margin-top: 30px;">
            <a href="dashboard.php" class="btn btn-primario">Volver al Dashboard</a>
        </div>
    </div>
</body>
</html>
