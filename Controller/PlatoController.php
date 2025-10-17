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
                        $rutaFisica = __DIR__ . "/../View/Assets/img/" . $nombreImg; // ruta para guardar en el servidor
                            move_uploaded_file($_FILES['Imagen']['tmp_name'], $rutaFisica);
                            
                            // Ruta pública que se guarda en BD
                            $imagen = "View/Assets/img/" . $nombreImg;

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

    // Verificar si se subió una nueva imagen
    if (!empty($_FILES['Imagen']['name'])) {
        $nombreArchivo = $_FILES['Imagen']['name'];
        $rutaTemporal = $_FILES['Imagen']['tmp_name'];
        $carpetaDestino = "../View/Front/html/img/" . $nombreArchivo;

        // Mover la imagen a la carpeta img
        move_uploaded_file($rutaTemporal, $carpetaDestino);

        // Guardar solo el nombre o la ruta, según tu base de datos
        $imagen = "img/" . $nombreArchivo;
    } else {
        // Si no se seleccionó nueva imagen, conservar la anterior
        $imagen = $_POST['imagen_actual'];
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
