<?php
require_once __DIR__ . '/../Config/Conexion.php';

class Pedido {
    private $db;

    public function __construct() {
        $this->db = new Conexion();
    }

    public function registrarPedido($tipo_servicio, $nombre, $telefono, $direccion, $metodo_pago, $fecha) {
        $conn = $this->db->getConexion();

        $sql = "INSERT INTO pedidos (tipo_servicio, nombre, telefono, direccion, metodo_pago, fecha)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $tipo_servicio, $nombre, $telefono, $direccion, $metodo_pago, $fecha);

        return $stmt->execute();
    }
}
