<?php
require_once __DIR__ . "/../Config/conexion.php";

class Reserva {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connection();
    }

   
    public function crearReserva($nombre, $email, $telefono, $numero_personas, $fecha, $hora) {
        $sql = "INSERT INTO reservas (Nombre, Email, Telefono, Numero_personas, Fecha_reserva, Hora_reserva) 
                VALUES (:nombre, :email, :telefono, :numero_personas, :fecha, :hora)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':telefono' => $telefono,
            ':numero_personas' => $numero_personas,
            ':fecha' => $fecha,
            ':hora' => $hora
        ]);
        return $this->pdo->lastInsertId();
    }
    public function editarReserva($id, $nombre, $email, $telefono, $numero_personas, $fecha, $hora) {
    $sql = "UPDATE reservas
            SET Nombre = :nombre,
                Email = :email,
                Telefono = :telefono,
                Numero_personas = :numero_personas,
                Fecha_reserva = :fecha,
                Hora_reserva = :hora
            WHERE Id_reserva = :id";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':nombre' => $nombre,
        ':email' => $email,
        ':telefono' => $telefono,
        ':numero_personas' => $numero_personas,
        ':fecha' => $fecha,
        ':hora' => $hora
    ]);
}



    public function listarReservas() {
        $sql = "SELECT * FROM reservas ORDER BY Fecha_reserva, Hora_reserva";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerReserva($id) {
        $sql = "SELECT * FROM reservas WHERE Id_reserva = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function eliminarReserva($id) {
        $sql = "DELETE FROM reservas WHERE Id_reserva = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>
