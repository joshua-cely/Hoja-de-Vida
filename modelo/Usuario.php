<?php
class Usuario {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function agregar($nombre, $usuario, $contrasena, $rol) {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, usuario, contrasena, rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $usuario, $contrasena, $rol);
        return $stmt->execute();
    }

    public function verificarCredenciales($usuario, $contrasena) {
    $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        return $result->fetch_assoc(); // Devuelve datos del usuario
    } else {
        return false;
    }
    }
}
