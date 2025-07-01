<?php
require_once '../includes/db.php';
require_once '../modelo/Equipo.php';

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vista/login.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();
$usuario = $_SESSION['usuario'];

// Verificar rol del usuario
$stmt = $conn->prepare("SELECT rol FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$fila = $resultado->fetch_assoc();
$rol = $fila['rol'] ?? null;

// Si no es admin, redirigir
if ($rol !== 'admin') {
    header("Location: ../vista/ver_equipos.php");
    exit();
}

// Si es POST: procesar guardado del equipo
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $equipo = new Equipo($conn);

    $data = [
        'tipo_equipo' => $_POST['tipo'],
        'marca' => $_POST['marca'],
        'modelo' => $_POST['modelo'],
        'numero_serie' => $_POST['numero_serie'],
        'procesador' => $_POST['procesador'],
        'ram_gb' => $_POST['ram'],
        'tipo_ram' => $_POST['tipo_ram'] ?? null,
        'almacenamiento_gb' => $_POST['almacenamiento'],
        'tipo_almacenamiento' => $_POST['tipo_almacenamiento'],
        'sistema_operativo' => $_POST['sistema_operativo'] ?? null,
        'licencia_so' => !empty($_POST['licencia']) ? 1 : 0,
        'antivirus_instalado' => $_POST['antivirus_instalado'] ?? null,
        'ubicacion' => $_POST['ubicacion'] ?? null,
        'estado_equipo' => $_POST['estado_equipo'],
        'fecha_ingreso' => $_POST['fecha_ingreso'],
        'observaciones' => $_POST['observaciones'] ?? null,
        'imagen' => file_get_contents($_FILES['imagen']['tmp_name'])
    ];

    if ($equipo->guardar($data)) {
        header("Location: ../controlador/Iniciar_dashboard.php?msg=equipo_guardado");
        exit();
    } else {
        echo "❌ Error al guardar equipo.";
    }
} else {
    // Si es GET: mostrar el formulario
    require_once '../vista/agregar_equipo.php';
}
