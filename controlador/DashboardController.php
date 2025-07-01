<?php
require_once '../includes/db.php';

class DashboardController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function mostrarDashboard() {
        session_start();
        
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../vista/login.php");
            exit();
        }

        $nombre = $_SESSION['usuario']; // Asignación correcta
        $rol = $_SESSION['rol'];

        // Obtener datos necesarios
        $totalEquipos = $this->contarEquipos();
        $totalUsuarios = $this->contarUsuarios();
        $totalEntradas = $this->contarEntradas();
        $totalSalidas = $this->contarSalidas();
        $registros = $this->obtenerRegistrosRecientes();

        // Pasar datos a la vista
        require_once '../vista/dashboard.php';
    }

    private function contarEquipos() {
        $sql = "SELECT COUNT(*) as total FROM computadores"; // Asegúrate que esta tabla exista
        $res = $this->conn->query($sql);
        if (!$res) {
            die("❌ Error en contarEquipos(): " . $this->conn->error);
        }
        return $res->fetch_assoc()['total'];
    }

    private function contarUsuarios() {
        $sql = "SELECT COUNT(*) as total FROM usuarios";
        $res = $this->conn->query($sql);
        if (!$res) {
            die("❌ Error en contarUsuarios(): " . $this->conn->error);
        }
        return $res->fetch_assoc()['total'];
    }

    private function contarEntradas() {
        $sql = "SELECT COUNT(*) as total FROM entradas";
        $res = $this->conn->query($sql);
        if (!$res) {
            die("❌ Error en contarEntradas(): " . $this->conn->error);
        }
        return $res->fetch_assoc()['total'];
    }

    private function contarSalidas() {
        $sql = "SELECT COUNT(*) as total FROM salidas";
        $res = $this->conn->query($sql);
        if (!$res) {
            die("❌ Error en contarSalidas(): " . $this->conn->error);
        }
        return $res->fetch_assoc()['total'];
    }

    private function obtenerRegistrosRecientes() {
        $sql = "SELECT fecha_entrada AS fecha, 'Entrada' AS tipo_accion, c.numero_serie AS equipo, e.responsable
                FROM entradas e
                JOIN computadores c ON e.computador_id = c.id
                UNION
                SELECT fecha_salida AS fecha, 'Salida' AS tipo_accion, c.numero_serie AS equipo, s.responsable
                FROM salidas s
                JOIN computadores c ON s.computador_id = c.id
                ORDER BY fecha DESC
                LIMIT 5";
        $res = $this->conn->query($sql);
        if (!$res) {
            die("❌ Error en obtenerRegistrosRecientes(): " . $this->conn->error);
        }
        return $res;
    }
}
