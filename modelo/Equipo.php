<?php
class Equipo {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function guardar($data) {
        $sql = "INSERT INTO computadores (tipo_equipo, marca, modelo, numero_serie, procesador, ram_gb, tipo_ram, almacenamiento_gb, tipo_almacenamiento, sistema_operativo, licencia_so, antivirus_instalado, ubicacion, estado_equipo, fecha_ingreso, observaciones, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "sssssisississsssb",
            $data['tipo_equipo'],
            $data['marca'],
            $data['modelo'],
            $data['numero_serie'],
            $data['procesador'],
            $data['ram_gb'],
            $data['tipo_ram'],
            $data['almacenamiento_gb'],
            $data['tipo_almacenamiento'],
            $data['sistema_operativo'],
            $data['licencia_so'],
            $data['antivirus_instalado'],
            $data['ubicacion'],
            $data['estado_equipo'],
            $data['fecha_ingreso'],
            $data['observaciones'],
            $data['imagen']
        );

        return $stmt->execute();
    }

    public function listar($search = '', $limit = 5, $offset = 0) {
    $sql = "SELECT * FROM computadores WHERE numero_serie LIKE ? LIMIT ?, ?";
    $stmt = $this->conn->prepare($sql);
    $searchParam = "%$search%";
    $stmt->bind_param("sii", $searchParam, $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $equipos = [];
    while ($row = $result->fetch_assoc()) {
        $equipos[] = $row;
    }

    return $equipos;
    }

    public function obtenerPorId($id) {
    $sql = "SELECT * FROM computadores WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_assoc(); // Puede retornar null si no existe
    }

    public function actualizar($id, $data) {
    $stmt = $this->conn->prepare("UPDATE computadores SET 
        tipo_equipo = ?, marca = ?, modelo = ?, numero_serie = ?, procesador = ?, ram_gb = ?, tipo_ram = ?, 
        almacenamiento_gb = ?, tipo_almacenamiento = ?, sistema_operativo = ?, licencia_so = ?, 
        antivirus_instalado = ?, ubicacion = ?, estado_equipo = ?, fecha_ingreso = ?, observaciones = ?, 
        imagen = ? WHERE id = ?");

    $stmt->bind_param("sssssisissssssisbi",
        $data['tipo'], $data['marca'], $data['modelo'], $data['numero_serie'], $data['procesador'], $data['ram'],
        $data['tipo_ram'], $data['almacenamiento'], $data['tipo_almacenamiento'], $data['sistema_operativo'],
        $data['licencia'], $data['antivirus_instalado'], $data['ubicacion'], $data['estado_equipo'],
        $data['fecha_ingreso'], $data['observaciones'], $data['imagen'], $id);

    return $stmt->execute();
    }

    public function eliminar($id) {
    $stmt = $this->conn->prepare("DELETE FROM computadores WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
    }
}
