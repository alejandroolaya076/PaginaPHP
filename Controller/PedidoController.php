<?php
require_once __DIR__ . '/../Model/pedido.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $tipo_servicio = $_POST["tipo_servicio"];
    $nombre        = $_POST["nombre"];
    $telefono      = $_POST["telefono"];
    $direccion     = $_POST["direccion"];
    $metodo_pago   = $_POST["metodo_pago"];
    $fecha         = $_POST["fecha"];

    $pedido = new Pedido();

    if ($pedido->registrarPedido($tipo_servicio, $nombre, $telefono, $direccion, $metodo_pago, $fecha)) {
        echo "<script>alert('Pedido registrado correctamente'); window.location.href='../View/Front/html/menu.php';</script>";
    } else {
        echo "<script>alert('Error al registrar el pedido'); window.history.back();</script>";
    }
}
