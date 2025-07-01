<?php
require_once '../modelo/Equipo.php';
require_once '../includes/db.php'; // Usamos la clase Database

class EquipoControlador {
    private $modelo;

    public function __construct() {
        $db = new Database();
        $conn = $db->getConnection();
        $this->modelo = new Equipo($conn);
    }

    public function agregar($post, $file) {
        $data = [
            'tipo_equipo' => $post['tipo'],
            'marca' => $post['marca'],
            'modelo' => $post['modelo'],
            'numero_serie' => $post['numero_serie'],
            'procesador' => $post['procesador'],
            'ram_gb' => $post['ram'],
            'tipo_ram' => $post['tipo_ram'] ?? null,
            'almacenamiento_gb' => $post['almacenamiento'],
            'tipo_almacenamiento' => $post['tipo_almacenamiento'],
            'sistema_operativo' => $post['sistema_operativo'] ?? null,
            'licencia_so' => !empty($post['licencia']) ? 1 : 0,
            'antivirus_instalado' => $post['antivirus_instalado'] ?? null,
            'ubicacion' => $post['ubicacion'] ?? null,
            'estado_equipo' => $post['estado_equipo'],
            'fecha_ingreso' => $post['fecha_ingreso'],
            'observaciones' => $post['observaciones'] ?? null,
            'imagen' => file_get_contents($file['imagen']['tmp_name'])
        ];

        return $this->modelo->guardar($data);
    }

    public function listarEquipos($search = '', $page = 1, $limit = 5) {
    $offset = ($page - 1) * $limit;
    return $this->modelo->listar($search, $limit, $offset);
    }

    public function verDetalle($id) {
    return $this->modelo->obtenerPorId($id);
    }

    public function editarEquipo($id, $data) {
    return $this->modelo->actualizar($id, $data);
    }

    public function eliminarEquipo($id) {
    return $this->modelo->eliminar($id);
    }

    public function mostrarFormularioAgregar() {
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../vista/login.php");
        exit();
    }

    // Verificar rol desde la base de datos
    $db = new Database();
    $conn = $db->getConnection();
    $usuario = $_SESSION['usuario'];
    $stmt = $conn->prepare("SELECT rol FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    $rol = $fila['rol'] ?? null;

    if ($rol !== 'admin') {
        header("Location: ../vista/ver_equipos.php");
        exit();
    }

    // Si pasa, cargar la vista
    require_once '../vista/agregar_equipo.php';
    }

}
