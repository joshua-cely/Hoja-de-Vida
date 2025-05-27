<?php
require '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo']; // 'tipo_equipo'
    $marca = $_POST['marca']; // 'marca'
    $modelo = $_POST['modelo']; // 'modelo'
    $numero_serie = $_POST['numero_serie']; // 'numero_serie'
    $procesador = $_POST['procesador']; // 'procesador'
    $ram = $_POST['ram']; // 'ram_gb'
    $tipo_ram = $_POST['tipo_ram']; // 'tipo_ram'
    $almacenamiento = $_POST['almacenamiento']; // 'almacenamiento_gb'
    $tipo_almacenamiento = $_POST['tipo_almacenamiento']; // 'tipo_almacenamiento'
    $sistema = $_POST['sistema_operativo']; // 'sistema_operativo'
    $licencia = $_POST['licencia']; // 'licencia_so'
    $antivirus = $_POST['antivirus_instalado']; // 'antivirus_instalado'
    $ubicacion = $_POST['ubicacion']; // 'ubicacion'
    $estado = $_POST['estado_equipo']; // 'estado_equipo'
    $fecha_ingreso = $_POST['fecha_ingreso']; // 'fecha_ingreso'
    $observaciones = $_POST['observaciones']; // 'observaciones'

    // Procesar imagen
    $imagen = null;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Leer el contenido del archivo de imagen
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    }

    // Insertar en base de datos
    $stmt = $conn->prepare("INSERT INTO computadores 
        (tipo_equipo, marca, modelo, numero_serie, procesador, ram_gb, tipo_ram, almacenamiento_gb, tipo_almacenamiento, sistema_operativo, licencia_so, antivirus_instalado, ubicacion, estado_equipo, fecha_ingreso, observaciones, imagen) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Asegúrate de que los tipos de datos en bind_param coincidan con la estructura de tu tabla
    $stmt->bind_param("ssssssisisssssssb", 
        $tipo, $marca, $modelo, $numero_serie, $procesador, $ram, $tipo_ram, $almacenamiento, $tipo_almacenamiento, $sistema, $licencia, $antivirus, $ubicacion, $estado, $fecha_ingreso, $observaciones, $imagen);

    if ($stmt->execute()) {
        echo "✅ Equipo guardado correctamente. <br><a href='../vista/agregar_equipo.php'>Agregar otro</a> | <a href='../vista/ver_equipos.php'>Ver equipos</a>";
    } else {
        echo "❌ Error al guardar equipo: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
