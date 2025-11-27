<?php
require_once __DIR__ . '/../Model/domicilio.php';

$domicilio = new Domicilio();
$domicilios = $domicilio->listarDomicilio();  



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $domicilios = $domicilio->listarDomicilio();  
    require_once __DIR__ . '/../View/Front/html/domicilios.php'; 
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $accion = $_POST['accion'] ?? '';

    if ($accion === 'crearDomicilio') {
        $resultado = $domicilio->guardarPedido(
            $_POST['tipo_servicio'], $_POST['nombre'], $_POST['telefono'],
            $_POST['direccion'], $_POST['metodo_pago'], $_POST['fecha']
        );

        header('Location: ../View/Front/html/perfil.php');
        exit;
    }

    if ($accion === 'eliminarDomicilio') {
        $domicilio->eliminarDomicilio($_POST['id']);
        header('Location: ../View/Front/html/perfil.php');
        exit;
    }

    if ($accion === 'editarDomicilio') {
        $domicilio->editarDomicilio(
            $_POST['id'], $_POST['tipo_servicio'], $_POST['nombre'],
            $_POST['telefono'], $_POST['direccion'], $_POST['metodo_pago'], $_POST['fecha']
        );

        header('Location: ../View/Front/html/perfil.php');
        exit;
    }
}
?>
