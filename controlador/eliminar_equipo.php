<?php
require '../config/conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id <= 0) {
        die("ID inválido para eliminar.");
    }

    // Preparar la consulta para eliminar el equipo
    $sql = "DELETE FROM computadores WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redireccionar a la lista de equipos después de eliminar
        header("Location: ../vista/ver_equipos.php?msg=Equipo eliminado correctamente");
        exit();
    } else {
        echo "❌ Error al eliminar el equipo: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>

