<?php
require '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $numero_serie = $_POST['numero_serie'];
    $procesador = $_POST['procesador'];
    $ram = $_POST['ram'];
    $tipo_ram = isset($_POST['tipo_ram']) ? $_POST['tipo_ram'] : null; // Puede ser nulo
    $almacenamiento = $_POST['almacenamiento'];
    $tipo_almacenamiento = $_POST['tipo_almacenamiento'];
    $sistema = isset($_POST['sistema_operativo']) ? $_POST['sistema_operativo'] : null; // Puede ser nulo
    $licencia = isset($_POST['licencia']) ? $_POST['licencia'] : null; // Puede ser nulo
    $antivirus = isset($_POST['antivirus_instalado']) ? $_POST['antivirus_instalado'] : null; // Puede ser nulo
    $ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : null; // Puede ser nulo
    $estado = isset($_POST['estado_equipo']) ? $_POST['estado_equipo'] : null; // Puede ser nulo
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : null; // Puede ser nulo 

    // Procesar imagen
    $imagen = null;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    }

    // Actualizar en base de datos
    $stmt = $conn->prepare("UPDATE computadores SET 
        tipo_equipo = ?, marca = ?, modelo = ?, numero_serie = ?, procesador = ?, ram_gb = ?, tipo_ram = ?, 
        almacenamiento_gb = ?, tipo_almacenamiento = ?, sistema_operativo = ?, licencia_so = ?, 
        antivirus_instalado = ?, ubicacion = ?, estado_equipo = ?, fecha_ingreso = ?, observaciones = ?, 
        imagen = ? WHERE id = ?");

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Asegúrate de que los tipos de datos en bind_param coincidan con la estructura de tu tabla
    // Cambia la cadena de tipos para manejar NULL
    $stmt->bind_param("sssssisissssssisbi", 
        $tipo, $marca, $modelo, $numero_serie, $procesador, $ram, 
        $tipo_ram, $almacenamiento, $tipo_almacenamiento, $sistema, 
        $licencia, $antivirus, $ubicacion, $estado, $fecha_ingreso, 
        $observaciones, $imagen, $id); // Asegúrate de que $id esté al final

    if ($stmt->execute()) {
        echo "✅ Equipo actualizado correctamente. <br><a href='../vista/ver_equipos.php'>Ver equipos</a>";
    } else {
        echo "❌ Error al actualizar equipo: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
