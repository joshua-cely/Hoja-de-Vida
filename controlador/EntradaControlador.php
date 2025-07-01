<?php
require_once '../modelo/Entrada.php';

class EntradaControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new Entrada();
    }

    public function registrar($numeroSerie, $responsable) {
        return $this->modelo->registrarEntrada($numeroSerie, $responsable);
    }

    public function listar($filtro = '') {
        return $this->modelo->obtenerEntradas($filtro);
    }
}
