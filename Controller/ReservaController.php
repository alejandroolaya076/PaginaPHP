<?php
require_once __DIR__ . "/../Model/Reserva.php";

class ReservaController {
    private $model;

    public function __construct() {
        $this->model = new Reserva();
    }

    public function manejarAcciones() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? '';

            switch($accion) {
              case 'crearReserva':
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    // Verificar si existe clave "numero_personas" en POST
    $numero_personas = isset($_POST['numero_personas']) ? $_POST['numero_personas'] : 0;
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';

    $this->model->crearReserva($nombre, $email, $telefono, $numero_personas, $fecha, $hora);
    header("Location: ../View/Front/html/reservar.php");
    exit;
    break;


                case 'eliminarReserva':
                    $this->model->eliminarReserva($_POST['id']);
                    header("Location: ../View/Back/html/panel_reservas.php");
                    exit;
                    break;

                case 'editarReserva':
                    $this->model->editarReserva(
                        $_POST['id'],
                        $_POST['nombre'],
                        $_POST['email'],
                        $_POST['telefono'],
                        $_POST['numero_personas'],
                        $_POST['fecha'],
                        $_POST['hora']
                    );
                    header("Location: ../View/Back/html/panel_reservas.php");
                    exit;
                    break;
            }
        }
    }

    // Listar reservas para la vista
    public function listarReservas() {
        return $this->model->listarReservas();
    }
}

// Ejecutar automáticamente si es un POST
$controller = new ReservaController();
$controller->manejarAcciones();
?>
