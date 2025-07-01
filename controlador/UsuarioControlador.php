<?php
require_once '../includes/db.php';
require_once '../modelo/Usuario.php';

class UsuarioControlador {
    private $modelo;

    public function __construct() {
        $db = new Database();
        $this->modelo = new Usuario($db->getConnection());
    }

    public function login($usuario, $contrasena) {
        return $this->modelo->verificarCredenciales($usuario, $contrasena);
    }

    public function guardarUsuario() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena']; // Puedes agregar password_hash aquí si quieres
            $rol = $_POST['rol'];

            if ($this->modelo->agregar($nombre, $usuario, $contrasena, $rol)) {
                header("Location: ../controlador/Iniciar_dashboard.php?msg=usuario_guardado");
                exit();
            } else {
                echo "❌ Error al guardar el usuario.";
            }
        }
    }
}

// Ejecutar si este archivo se llama directamente desde un formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controlador = new UsuarioControlador();
    $controlador->guardarUsuario();
}
