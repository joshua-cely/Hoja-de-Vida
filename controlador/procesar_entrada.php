<?php
require '../config/conexion.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placa = $_POST['placa']; // Número de serie del computador
    $responsable = $_POST['responsable']; // Persona responsable de la entrada

    // Verificar si la placa existe
    $stmt = $conn->prepare("SELECT id FROM computadores WHERE numero_serie = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("s", $placa);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("❌ Placa no encontrada en la base de datos.");
    }

    $computador_id = $result->fetch_assoc()['id'];

    // Registrar la entrada
    $stmt = $conn->prepare("INSERT INTO entradas (computador_id, responsable) VALUES (?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta para insertar: " . $conn->error);
    }
    $stmt->bind_param("is", $computador_id, $responsable);

    if ($stmt->execute()) {
        echo "✅ Entrada registrada correctamente.";
    } else {
        echo "❌ Error al registrar la entrada: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
