<?php
require '../includes/db.php';

class Usuario {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function agregarUsuario($data) {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, usuario, contrasena, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data['nombre'], $data['usuario'], $data['contrasena'], $data['rol']);
        return $stmt->execute();
    }
}

$db = new Database();
$usuarioModel = new Usuario($db->getConnection());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'nombre' => $_POST['nombre'],
        'usuario' => $_POST['usuario'],
        'contrasena' => $_POST['contrasena'],
        'rol' => $_POST['rol']
    ];

    if ($usuarioModel->agregarUsuario($data)) {
        echo "✅ Usuario guardado correctamente.";
    } else {
        echo "❌ Error al guardar usuario.";
    }
}
?>
