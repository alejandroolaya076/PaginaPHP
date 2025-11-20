<?php
require_once __DIR__ . '/../Model/Plato.php';

class PlatoController {
    private $model;

    public function __construct() {
        $this->model = new Plato();
    }

    public function listarPlatos() {
        return $this->model->listarPlatos();
    }

    public function manejarAcciones() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'] ?? '';

            switch ($accion) {

                
                case 'registroPlato':
                    $nombre = $_POST['Nombre_producto'];
                    $precio = $_POST['Precio'];
                    $tipo = $_POST['Tipo_producto'];
                    $descripcion = $_POST['Descripcion'];

                    $imagen = null;
                    if (!empty($_FILES['Imagen']['name'])) {
                        $nombreImg = basename($_FILES['Imagen']['name']);
                        $rutaFisica = __DIR__ . "/../View/img/img/" . $nombreImg;
                        move_uploaded_file($_FILES['Imagen']['tmp_name'], $rutaFisica);

                       
                        $imagen = "View/img/img/" . $nombreImg;
                    }

                    $this->model->registrarPlato($nombre, $precio, $tipo, $descripcion, $imagen);
                    header("Location: ../View/Front/html/perfil.php");
                    break;

              
                case 'eliminarPlato':
                    $id = $_POST['id'];
                    $this->model->eliminarPlato($id);
                    header("Location: ../View/Front/html/perfil.php");
                    break;

                case 'editarPlato':
                    $id = $_POST['id'];
                    $nombre = $_POST['Nombre_producto'];
                    $precio = $_POST['Precio'];
                    $tipo = $_POST['Tipo_producto'];
                    $descripcion = $_POST['Descripcion'];
                    $imagen_actual = $_POST['Imagen_actual'];

                    if (!empty($_FILES['Imagen']['name'])) {
                        $nombreImg = basename($_FILES['Imagen']['name']);
                        $rutaFisica = __DIR__ . "/../View/img/img/" . $nombreImg;
                        move_uploaded_file($_FILES['Imagen']['tmp_name'], $rutaFisica);
                        $imagen = "View/img/img/" . $nombreImg;
                    } else {
                        $imagen = $imagen_actual;
                    }

                    $this->model->editarPlato($id, $nombre, $precio, $tipo, $descripcion, $imagen);
                    header("Location: ../View/Front/html/perfil.php");
                    break;
            }
        }
    }
}

$controller = new PlatoController();
$controller->manejarAcciones();
?>
