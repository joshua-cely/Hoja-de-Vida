<?php
require_once '../includes/db.php';

class Entrada {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function registrarEntrada($numeroSerie, $responsable) {
        $stmt = $this->conn->prepare("SELECT id FROM computadores WHERE numero_serie = ?");
        $stmt->bind_param("s", $numeroSerie);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return "❌ Placa no encontrada.";
        }

        $computador_id = $result->fetch_assoc()['id'];

        $stmt = $this->conn->prepare("INSERT INTO entradas (computador_id, responsable) VALUES (?, ?)");
        $stmt->bind_param("is", $computador_id, $responsable);

        if ($stmt->execute()) {
            return "✅ Entrada registrada correctamente.";
        } else {
            return "❌ Error al registrar la entrada.";
        }
    }

    public function obtenerEntradas($filtro = '') {
        $query = "SELECT e.id, e.responsable, c.numero_serie, c.marca, c.modelo, e.fecha_entrada 
                  FROM entradas e 
                  JOIN computadores c ON e.computador_id = c.id 
                  WHERE c.numero_serie LIKE ?";

        $stmt = $this->conn->prepare($query);
        $searchParam = "%$filtro%";
        $stmt->bind_param("s", $searchParam);
        $stmt->execute();
        return $stmt->get_result();
    }
}
