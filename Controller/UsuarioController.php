<?php

require_once __DIR__ . '../../Config/conexion.php';
require_once __DIR__ . '../../Model/usuario.php';

class UsuarioController {

    private $modelUser;

    public function __construct() {
        $this -> modelUser = new Usuario();
    }


 
    public function validarUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $this->modelUser->login($_POST['email'], $_POST['contrasena']);

        if ($usuario) {
            session_start();
            $_SESSION['Usuario'] = $usuario;

       
            if ($usuario['Tipo_usuario'] === 'administrador') {
                header("Location:../View/Front/html/perfil.php"); 
            } else {
                header("Location:../View/Front/html/menu.php"); 
            }
            exit();

        } else {
            echo "usuario no encontrado";
        }

    } else {
        header("Location:../View/Front/html/inicio_sesion.php");
        exit();
    }
}


   
    public function registrar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $db = Database::connection();
                $usuario = new Usuario();

                $nombre = trim($_POST['Nombre']);
                $apellido = trim($_POST['Apellido']);
                $documento = ($_POST['Documento']);
                $telefono = ($_POST['Telefono']);
                $correo = ($_POST['Correo_electronico']);
                $contrasena = password_hash($_POST['Contrasena'], PASSWORD_BCRYPT);

                $usuario->registrar($nombre, $apellido, $documento, $telefono, $correo,$contrasena);

                header("Location:../View/Front/html/inicio_sesion.php ");
            } catch (PDOException $e) {
                echo "Error en el registro: " . $e->getMessage();
            }
        }
    }

    public function cerrarSesion() {
        session_start();
        session_destroy();
        header("Location:../View/Front/html/inicio_sesion.php");
        exit();
    }

   
    public function listarUsuarios() {
    return $this->modelUser->listar_usuario();
}

   
    public function eliminar() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
        $this->modelUser->eliminar($_POST['id']);
        header("Location:../View/Front/html/perfil.php");
        exit();
    }
}

   
    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
            $id = $_POST['id'];
            $nombre = trim($_POST['Nombre']);
            $apellido = trim($_POST['Apellido']);
            $documento = $_POST['Documento'];
            $telefono = $_POST['Telefono'];
            $correo = $_POST['Correo_electronico'];

            $this->modelUser->editar($id, $nombre, $apellido, $documento, $telefono, $correo);

            header("Location:../View/Front/html/perfil.php");
            exit();
        }
    }
}

$controller = new UsuarioController();

if (isset($_POST['accion'])) {
    if ($_POST['accion'] === 'login') {
        $controller->validarUser();
    } elseif ($_POST['accion'] === 'registro') {
        $controller->registrar();
    } elseif ($_POST['accion'] === 'eliminar') {
        $controller->eliminar();
    }elseif($_POST['accion'] === "logout") {
        $controller->cerrarSesion();
    }elseif($_POST['accion'] === "editar") {
        $controller->editar();
    }
}
?>