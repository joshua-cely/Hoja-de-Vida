<?php
require_once '../includes/db.php';
require_once '../modelo/Equipo.php';
require_once 'EquipoControlador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $imagen = null;

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    }

    $data = [
        'tipo' => $_POST['tipo'],
        'marca' => $_POST['marca'],
        'modelo' => $_POST['modelo'],
        'numero_serie' => $_POST['numero_serie'],
        'procesador' => $_POST['procesador'],
        'ram' => $_POST['ram'],
        'tipo_ram' => $_POST['tipo_ram'] ?? null,
        'almacenamiento' => $_POST['almacenamiento'],
        'tipo_almacenamiento' => $_POST['tipo_almacenamiento'],
        'sistema_operativo' => $_POST['sistema_operativo'] ?? null,
        'licencia' => $_POST['licencia'] ?? null,
        'antivirus_instalado' => $_POST['antivirus_instalado'] ?? null,
        'ubicacion' => $_POST['ubicacion'] ?? null,
        'estado_equipo' => $_POST['estado_equipo'] ?? null,
        'fecha_ingreso' => $_POST['fecha_ingreso'],
        'observaciones' => $_POST['observaciones'] ?? null,
        'imagen' => $imagen
    ];

    $controlador = new EquipoControlador();
    if ($controlador->editarEquipo($id, $data)) {
        header("Location: ../vista/ver_equipos.php");
        exit();
    } else {
        echo "❌ Error al actualizar equipo.";
    }
}
?>
