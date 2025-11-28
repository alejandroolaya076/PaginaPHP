<?php
require_once __DIR__ . '/../Config/conexion.php';

class Plato {
    private $db;

    public function __construct() {
        $this->db = Database::connection();
    }

    public function listarPlatos() {
        $query = "SELECT * FROM producto";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarPlato($nombre, $precio, $tipo, $descripcion, $imagen) {
        $query = "INSERT INTO producto (Nombre_producto, Precio_producto, Tipo_producto, Descripcion, Imagen)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $precio, $tipo, $descripcion, $imagen]);
    }

    public function eliminarPlato($id) {
        $query = "DELETE FROM producto WHERE Id_producto = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    public function editarPlato($id, $nombre, $precio, $tipo, $descripcion, $imagen) {
        $query = "UPDATE producto 
                  SET Nombre_producto=?, Precio_producto=?, Tipo_producto=?, Descripcion=?, Imagen=? 
                  WHERE Id_producto=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $precio, $tipo, $descripcion, $imagen, $id]);
    }
}
?>
