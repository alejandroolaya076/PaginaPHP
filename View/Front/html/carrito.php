<?php
session_start();
require_once "../../Config/conexion.php";


if (!isset($_SESSION['Usuario']['Id_usuario'])) {
    echo "NO_LOGIN";
    exit;
}

$Id_usuario = $_SESSION['Usuario']['Id_usuario'];
$Id_producto = $_POST['id_producto'];

try {
    $db = Database::connection();
    $sql = "INSERT INTO carrito (Id_usuario, Id_producto, Cantidad)
            VALUES (:usuario, :producto, 1)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':usuario' => $Id_usuario,
        ':producto' => $Id_producto
    ]);

    echo "OK";

} catch (PDOException $e) {
    echo "ERROR: ".$e->getMessage();
}
?>
