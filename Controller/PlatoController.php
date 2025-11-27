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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $accion = $_POST['accion'] ?? '';

        switch ($accion) {
            case 'registroPlato':
                $this->registroPlato();
                break;

            case 'eliminarPlato':
                $this->eliminarPlato();
                break;

            case 'editarPlato':
                $this->editarPlato();
                break;

            default:
                header("Location: ../View/Front/html/perfil.php");
                exit();
        }
    }

    private function registroPlato() {
        $nombre = $_POST['Nombre_producto'] ?? '';
        $precio = $_POST['Precio'] ?? 0;
        $tipo = $_POST['Tipo_producto'] ?? '';
        $descripcion = $_POST['Descripcion'] ?? '';

        $imagen = null;

        if (!empty($_FILES['Imagen']['name'])) {
            $imagen = $this->procesarImagen($_FILES['Imagen']);
            if ($imagen === false) {
                header("Location: ../View/Front/html/perfil.php?errorImagen=1");
                exit();
            }
        }

        $this->model->registrarPlato($nombre, $precio, $tipo, $descripcion, $imagen);
        header("Location: ../View/Front/html/perfil.php?platoRegistrado=ok");
        exit();
    }

    private function eliminarPlato() {
        $id = $_POST['id'] ?? null;
        if ($id) {
            $this->model->eliminarPlato($id);
        }
        header("Location: ../View/Front/html/perfil.php?platoEliminado=ok");
        exit();
    }

    private function editarPlato() {
        $id = $_POST['id'] ?? null;
        $nombre = $_POST['Nombre_producto'] ?? '';
        $precio = $_POST['Precio'] ?? 0;
        $tipo = $_POST['Tipo_producto'] ?? '';
        $descripcion = $_POST['Descripcion'] ?? '';
        $imagen_actual = $_POST['Imagen_actual'] ?? null;

        $imagen = $imagen_actual;

        if (!empty($_FILES['Imagen']['name'])) {
            $procesada = $this->procesarImagen($_FILES['Imagen']);
            if ($procesada === false) {
                header("Location: ../View/Front/html/perfil.php?errorImagen=1");
                exit();
            }
            $imagen = $procesada;
        }

        if ($id) {
            $this->model->editarPlato($id, $nombre, $precio, $tipo, $descripcion, $imagen);
        }

        header("Location: ../View/Front/html/perfil.php?platoEditado=ok");
        exit();
    }

    private function procesarImagen(array $file) {
        $extPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        $originalName = basename($file['name']);
        $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        if (!in_array($ext, $extPermitidas)) {
            return false;
        }

        $nuevoNombre = uniqid('plato_') . '.' . $ext;
        $rutaFisica = $_SERVER['DOCUMENT_ROOT'] . "/PAGINAPHP/View/img" . $nuevoNombre;

        $dir = dirname($rutaFisica);
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0755, true)) {
                return false;
            }
        }

        if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
            return false;
        }

        return "PAGINAPHP/View/img" . $nuevoNombre;
    }
}


$controller = new PlatoController();
$controller->manejarAcciones();
