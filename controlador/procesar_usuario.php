<?php
require '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena']; // Almacenar la contraseña tal como se ingresa
    $rol = $_POST['rol'];

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, usuario, contrasena, rol) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssss", $nombre, $usuario, $contrasena, $rol); // Almacenar la contraseña sin hash

    if ($stmt->execute()) {
        echo "✅ Usuario guardado correctamente. <br><a href='../vista/agregar_usuario.php'>Agregar otro</a> | <a href='../vista/dashboard.php'>Volver al Dashboard</a>";
    } else {
        echo "❌ Error al guardar usuario: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
