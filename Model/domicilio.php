<?php
require_once __DIR__ . '/../Config/conexion.php';

class Domicilio {

    private $db;

    public function __construct() {
        $this->db = Database::connection(); 
    }

    
    public function guardarPedido($tipo_servicio, $nombre, $telefono, $direccion, $metodo_pago, $fecha) {
        $sql = "INSERT INTO domicilio (tipo_servicio, nombre, telefono, direccion, metodo_pago, fecha)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$tipo_servicio, $nombre, $telefono, $direccion, $metodo_pago, $fecha]);
    }

    
    public function listarDomicilio() {
        $sql = "SELECT * FROM domicilio ORDER BY fecha DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function editarDomicilio($id, $tipo_servicio, $nombre, $telefono, $direccion, $metodo_pago, $fecha) {
        $sql = "UPDATE domicilio 
                SET tipo_servicio=?, nombre=?, telefono=?, direccion=?, metodo_pago=?, fecha=? 
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$tipo_servicio, $nombre, $telefono, $direccion, $metodo_pago, $fecha, $id]);
    }

   
    public function eliminarDomicilio($id) {
        $sql = "DELETE FROM domicilio WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
