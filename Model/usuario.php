<?php 
require_once __DIR__ . '/../Config/conexion.php';



class Usuario {
    public $db;

    public function __construct() {
        $this->db = Database::connection();
    }

    /*-----------------
        OBTENER USUARIO 
    -----------------*/ 
    public function obtener_usuario($email) {
        $sql = "SELECT * FROM usuario WHERE Correo_electronico = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":email" => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* --------------
        VALIDAR LOGIN
    ---------------*/
    public function login($email, $pass) {
        $usuario = $this->obtener_usuario($email);
        if ($usuario && password_verify($pass, $usuario['Contrasena'])) {
            return $usuario;
        } else {
            return false;
        }
    }

    /*-------------------
        REGISTRAR USUARIO
    -------------------*/
    public function registrar($nombre, $apellido, $documento, $telefono, $correo, $contrasena, $tipo = 'cliente') {
        $sql = 'INSERT INTO usuario 
                (Nombre, Apellido, Documento, Telefono, Correo_electronico, Contrasena, Tipo_usuario)
                VALUES (:nombre, :apellido, :documento, :telefono, :correo, :contrasena, :tipo_usuario)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':documento' => $documento,
            ':telefono' => $telefono,
            ':correo' => $correo,
            ':contrasena' =>($contrasena),
            ':tipo_usuario' => $tipo
        ]);
    }

    /*-----------------
        LISTAR USUARIOS
    -----------------*/
    public function listar_usuario() {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*-------------------
        ELIMINAR USUARIOS
    -------------------*/
    public function eliminar($id) {
    $sql = "DELETE FROM Usuario WHERE Id_usuario = :id";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([":id" => $id]);
}

    /*-------------------
        EDITAR USUARIO
    -------------------*/
    public function editar($id, $nombre, $apellido, $documento, $telefono, $correo) {
        $sql = "UPDATE usuario 
                SET Nombre = :nombre, Apellido = :apellido, Documento = :documento, 
                    Telefono = :telefono, Correo_electronico = :correo
                WHERE Id_usuario = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':documento' => $documento,
            ':telefono' => $telefono,
            ':correo' => $correo
        ]);
}
}
?>
