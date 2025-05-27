<?php
session_start();
require '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar el usuario
    $stmt = $conn->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['contrasena'];

        // Comparar la contraseña ingresada con la almacenada
        if ($contrasena === $stored_password) {
            $_SESSION['usuario'] = $usuario;
            header("Location: ../vista/dashboard.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}
$conn->close();
?>
