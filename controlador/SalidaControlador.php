<?php
require_once '../modelo/Salida.php';

class SalidaControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Salida();
    }

    public function registrar($numeroSerie, $responsable) {
        return $this->modelo->registrarSalida($numeroSerie, $responsable);
    }

    public function listar($filtro = '') {
        return $this->modelo->obtenerSalidas($filtro);
    }
}
