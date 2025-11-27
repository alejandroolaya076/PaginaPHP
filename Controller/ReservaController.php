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

            switch ($accion) {

                
             case 'crearReserva':
                    if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }


                    $nombre = $_POST['nombre'];
                    $email = $_POST['email'];
                    $telefono = $_POST['telefono'];
                    $numero_personas = $_POST['numero_personas'];
                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora'];

                    $this->model->crearReserva($nombre, $email, $telefono, $numero_personas, $fecha, $hora);

                    if (isset($_SESSION['Usuario']) && $_SESSION['Usuario']['Rol'] === 'admin') {
                        header("Location: ../View/Front/html/perfil.php?nuevaReserva=1");
                        exit;
                    } else {
                        header("Location: ../View/Front/html/perfil.php?nuevaReserva=1");
                        exit;
                    }

              
                case 'eliminarReserva':
                    $id = $_POST['id'] ?? null;

                    if ($id) {
                        $this->model->eliminarReserva($id);
                    }

                   header("Location: ../View/Front/html/perfil.php?eliminado=1");

                    exit;


                
                case 'editarReserva':
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $email = $_POST['email'];
                    $telefono = $_POST['telefono'];
                    $numero_personas = $_POST['numero_personas'];
                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora'];

                    $this->model->editarReserva($id, $nombre, $email, $telefono, $numero_personas, $fecha, $hora);

                    header("Location: ../View/Front/html/perfil.php?update=1");

                    exit;
            }
        }
    }

    public function listarReservas() {
        return $this->model->listarReservas();
    }
}

$controller = new ReservaController();
$controller->manejarAcciones();
?>
