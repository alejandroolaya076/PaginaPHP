<?php
require_once __DIR__ . "/../../../Config/conexion.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? 0;

    if (empty($nombre) || empty($descripcion) || $precio <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Datos incompletos']);
        exit;
    }

    try {
        $pdo = Database::connection();

        $stmt = $pdo->prepare("INSERT INTO carrito (nombre_producto, descripcion, precio) VALUES (:nombre, :descripcion, :precio)");
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio
        ]);

        // Obtenemos la cantidad actualizada
        $cantidad = $pdo->query("SELECT COUNT(*) FROM carrito")->fetchColumn();

        echo json_encode(['status' => 'ok', 'message' => 'Producto agregado al carrito', 'cantidad' => $cantidad]);

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
