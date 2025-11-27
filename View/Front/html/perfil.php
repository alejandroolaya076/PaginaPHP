<?php
require_once __DIR__ . "/../../../Controller/UsuarioController.php";
require_once __DIR__ . "/../../../Controller/PlatoController.php";
require_once __DIR__ . "/../../../Controller/ReservaController.php";

$platoController = new PlatoController();
$platos = $platoController->listarPlatos();

$controller = new UsuarioController();
$usuarios = $controller->listarUsuarios();

$reservaController = new ReservaController();
$reservas = $reservaController->listarReservas();

session_start();
$nombreUsuario = $_SESSION['Usuario']['Nombre'] ?? "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../../Css/perfil.css">
    <link rel="stylesheet" href="../../Css/bootstrap/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c439753abb.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<header style="background-color: #141b3e; padding: 20px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="../../img/logo croque.png" alt="Foto Circular" class="rounded-circle img-fluid" style="max-width: 80px; height: auto;">
                </div>
                <div class="col-md-9">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item" >
                                <a class="nav-link" href="../../../index.html" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./menu.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">MENU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./sobre.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">SOBRE NOSOTROS</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="./reservar.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">RESERVAR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./domicilios.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">DOMICILIOS </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./inicio_sesion.php" style="font-size: clamp(0.8rem, 1.4vw, 3rem);">LOGIN</a>
                            </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
</header>

<section class="container mt-4 d-flex justify-content-between align-items-center alert alert-dark shadow">
    <div>
        <h2 class="mb-0">Bienvenid@, <?= htmlspecialchars($nombreUsuario) ?></h2>
    </div>
    <form action="../../../Controller/UsuarioController.php" method="POST" class="d-inline">
        <input type="hidden" name="accion" value="logout">
        <button type="submit" class="btn btn-dark btn-sm">
            <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
        </button>
    </form>
</section>

<div class="listas">

<section class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fa-solid fa-users"></i> Lista de usuarios</h5>
            <button type="button" class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#registroModal">
                <i class="fa-solid fa-user-plus"></i> Registrar nuevo usuario
            </button>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)): ?>
                            <?php foreach ($usuarios as $u): ?>
                                <tr>
                                    <td><?= htmlspecialchars($u['Nombre']); ?></td>
                                    <td><?= htmlspecialchars($u['Apellido']); ?></td>
                                    <td><?= htmlspecialchars($u['Documento']); ?></td>
                                    <td><?= htmlspecialchars($u['Telefono']); ?></td>
                                    <td><?= htmlspecialchars($u['Correo_electronico']); ?></td>
                                    <td class="text-center">
                                        <form method="POST" action="../../../Controller/UsuarioController.php" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $u['Id_usuario']; ?>">
                                            <button type="submit" name="accion" value="eliminar" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                                <i class="fa-solid fa-trash"></i> Eliminar
                                            </button>
                                            <button type="button" class="btn btn-dark btn-sm" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editarModal<?= $u['Id_usuario']; ?>">
                                                <i class="fa-solid fa-pen"></i> Editar
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editarModal<?= $u['Id_usuario']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Usuario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../../../Controller/UsuarioController.php">
                                                    <input type="hidden" name="id" value="<?= $u['Id_usuario']; ?>">
                                                    <input type="text" name="Nombre" value="<?= htmlspecialchars($u['Nombre']); ?>" class="form-control mb-2" required>
                                                    <input type="text" name="Apellido" value="<?= htmlspecialchars($u['Apellido']); ?>" class="form-control mb-2" required>
                                                    <input type="number" name="Documento" value="<?= htmlspecialchars($u['Documento']); ?>" class="form-control mb-2" required>
                                                    <input type="number" name="Telefono" value="<?= htmlspecialchars($u['Telefono']); ?>" class="form-control mb-2" required>
                                                    <input type="email" name="Correo_electronico" value="<?= htmlspecialchars($u['Correo_electronico']); ?>" class="form-control mb-2" required>
                                                    <input type="hidden" name="accion" value="editar">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center text-muted py-3">No hay usuarios registrados.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fa-solid fa-bowl-food"></i> Lista de platos</h5>
            <button type="button" class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#registroModalPlato">
                <i class="fa-solid fa-plus"></i> Registrar nuevo plato
            </button>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($platos)): ?>
                            <?php foreach ($platos as $u): ?>
                                <tr>
                                    <td><?= htmlspecialchars($u['Nombre_producto']); ?></td>
                                    <td><?= htmlspecialchars($u['Precio_producto']); ?></td>
                                    <td><?= htmlspecialchars($u['Tipo_producto']); ?></td>
                                    <td><?= htmlspecialchars($u['Descripcion']); ?></td>
                                    <td><img src="/PaginaPHP/View/img<?= htmlspecialchars($u['Imagen']); ?>" width="80" height="80" style="object-fit: cover; border-radius: 8px;"></td>
                                    <td class="text-center">
                                        <form method="POST" action="../../../Controller/PlatoController.php" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $u['Id_producto']; ?>">
                                            <button type="submit" name="accion" value="eliminarPlato" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que deseas eliminar este plato?');">
                                                <i class="fa-solid fa-trash"></i> Eliminar
                                            </button>
                                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editarModalplato<?= $u['Id_producto']; ?>">
                                                <i class="fa-solid fa-pen"></i> Editar
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editarModalplato<?= $u['Id_producto']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar plato</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../../../Controller/PlatoController.php" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $u['Id_producto']; ?>">
                                                    <input type="text" name="Nombre_producto" value="<?= htmlspecialchars($u['Nombre_producto']); ?>" class="form-control mb-2" required>
                                                    <input type="number" name="Precio" value="<?= htmlspecialchars($u['Precio_producto']); ?>" class="form-control mb-2" required>
                                                    <input type="text" name="Tipo_producto" value="<?= htmlspecialchars($u['Tipo_producto']); ?>" class="form-control mb-2" required>
                                                    <input type="text" name="Descripcion" value="<?= htmlspecialchars($u['Descripcion']); ?>" class="form-control mb-2" required>
                                                    <input type="hidden" name="Imagen_actual" value="<?= htmlspecialchars($u['Imagen']); ?>">
                                                    <label>Imagen actual:</label><br>
                                                    <img src="../../../img<?= htmlspecialchars($u['Imagen']); ?>" width="80" height="80" style="object-fit: cover; border-radius: 8px;"><br>
                                                    <input type="file" name="Imagen" class="form-control mb-2">
                                                    <input type="hidden" name="accion" value="editarPlato">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center text-muted py-3">No hay platos registrados.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

</div>

<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registrar nuevo usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="../../../Controller/UsuarioController.php" method="POST" class="form">
                    <input type="text" name="Nombre" class="form-control mb-2" placeholder="Nombre" required>
                    <input type="text" name="Apellido" class="form-control mb-2" placeholder="Apellido" required>
                    <input type="number" name="Documento" class="form-control mb-2" placeholder="Documento" required>
                    <input type="number" name="Telefono" class="form-control mb-2" placeholder="Teléfono" required>
                    <input type="email" name="Correo_electronico" class="form-control mb-2" placeholder="Email" required>
                    <input type="password" name="Contrasena" class="form-control mb-2" placeholder="Contraseña" required>
                    <input type="hidden" name="accion" value="registro">
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registroModalPlato" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registrar nuevo plato</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="../../../Controller/PlatoController.php" method="POST" class="form" enctype="multipart/form-data">
                    <input type="text" name="Nombre_producto" class="form-control mb-2" placeholder="Nombre de producto" required>
                    <input type="number" name="Precio" class="form-control mb-2" placeholder="Precio" required>
                    <input type="text" name="Tipo_producto" class="form-control mb-2" placeholder="Tipo de producto" required>
                    <input type="text" name="Descripcion" class="form-control mb-2" placeholder="Descripción" required>
                    <input type="file" name="Imagen" class="form-control mb-2" required>
                    <input type="hidden" name="accion" value="registroPlato">
                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (session_status() === PHP_SESSION_NONE) {
session_start();
}

if (isset($_GET['nuevaReserva'])): ?>
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        <strong>¡Reserva creada exitosamente!</strong> Se ha registrado en el sistema.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    
<?php endif; ?>

<?php

if (isset($_GET['eliminado'])): ?>
    <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
        <strong>Reserva eliminada correctamente.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php

if (isset($_GET['update'])): ?>
    <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
        <strong>Datos actualizados correctamente.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
?>



<section class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fa-solid fa-calendar-days"></i> Lista de reservas</h5>
            <button type="button" class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#registroModalReserva">
                <i class="fa-solid fa-plus"></i> Registrar nueva reserva
            </button>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Número de personas</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($reservas)): ?>
                            <?php foreach ($reservas as $r): ?>
                                <tr>
                                    <td><?= htmlspecialchars($r['Nombre']); ?></td>
                                    <td><?= htmlspecialchars($r['Email']); ?></td>
                                    <td><?= htmlspecialchars($r['Telefono']); ?></td>
                                    <td><?= htmlspecialchars($r['Numero_personas']); ?></td>
                                    <td><?= htmlspecialchars($r['Fecha_reserva']); ?></td>
                                    <td><?= htmlspecialchars($r['Hora_reserva']); ?></td>

                                    <td class="text-center">
                                    
                                        <form method="POST" action="../../../Controller/ReservaController.php" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $r['Id_reserva']; ?>">
                                            <input type="hidden" name="accion" value="eliminarReserva">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro que deseas eliminar esta reserva?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                       
                                        <button type="button"
                                            class="btn btn-dark btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editarModalReserva<?= $r['Id_reserva']; ?>">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </td>
                                </tr>

                            
                                <div class="modal fade" id="editarModalReserva<?= $r['Id_reserva']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title"><i class="fa-solid fa-pen-to-square"></i> Editar reserva</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form method="POST" action="../../../Controller/ReservaController.php">
                                                    <input type="hidden" name="id" value="<?= $r['Id_reserva']; ?>">

                                                    <input type="text" name="nombre" value="<?= htmlspecialchars($r['Nombre']); ?>" class="form-control mb-3" required>
                                                    <input type="email" name="email" value="<?= htmlspecialchars($r['Email']); ?>" class="form-control mb-3" required>
                                                    <input type="number" name="telefono" value="<?= htmlspecialchars($r['Telefono']); ?>" class="form-control mb-3" required>
                                                    <input type="number" name="numero_personas" value="<?= htmlspecialchars($r['Numero_personas']); ?>" class="form-control mb-3" required>
                                                    <input type="date" name="fecha" value="<?= htmlspecialchars($r['Fecha_reserva']); ?>" class="form-control mb-3" required>
                                                    <input type="time" name="hora" value="<?= htmlspecialchars($r['Hora_reserva']); ?>" class="form-control mb-3" required>

                                                    <input type="hidden" name="accion" value="editarReserva">

                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-dark">
                                                            <i class="fa-solid fa-save"></i> Guardar cambios
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="text-center text-muted py-3">No hay reservas registradas.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="registroModalReserva" tabindex="-1" aria-labelledby="registroModalReservaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="registroModalReservaLabel">
                    <i class="fa-solid fa-calendar-plus"></i> Registrar nueva reserva
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="../../../Controller/ReservaController.php" method="POST">
                    <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
                    <input type="email" name="email" class="form-control mb-2" placeholder="Correo" required>
                    <input type="text" name="telefono" class="form-control mb-2" placeholder="Teléfono" required>
                    <input type="number" name="numero_personas" class="form-control mb-2" placeholder="Número de personas" required>
                    <input type="date" name="fecha" class="form-control mb-2" required>
                    <input type="time" name="hora" class="form-control mb-2" required>

                    <input type="hidden" name="accion" value="crearReserva">

                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">
                            <i class="fa-solid fa-check"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['nuevoDomicilio'])): ?>
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        <strong>Domicilio creado exitosamente</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (isset($_GET['eliminado'])): ?>
    <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
        <strong>Domicilio eliminado correctamente.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (isset($_GET['update'])): ?>
    <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
        <strong>Datos actualizados correctamente.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<section class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fa-solid fa-motorcycle"></i> Lista de Domicilios</h5>
            <button type="button" class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#modalNuevoDomicilio">
                <i class="fa-solid fa-plus"></i> Registrar nuevo domicilio
            </button>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Tipo de servicio</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Método de pago</th>
                            <th>Fecha</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($domicilios)): ?>
                            <?php foreach ($domicilios as $d): ?>
                                <tr>
                                    <td><?= htmlspecialchars($d['tipo_servicio']); ?></td>
                                    <td><?= htmlspecialchars($d['nombre']); ?></td>
                                    <td><?= htmlspecialchars($d['telefono']); ?></td>
                                    <td><?= htmlspecialchars($d['direccion']); ?></td>
                                    <td><?= htmlspecialchars($d['metodo_pago']); ?></td>
                                    <td><?= htmlspecialchars($d['fecha']); ?></td>
                                    <td class="text-center">
                                        <form method="POST" action="../../../Controller/domicilioController.php" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                            <input type="hidden" name="accion" value="eliminarDomicilio">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Seguro deseas eliminar este domicilio?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                        <button type="button"
                                            class="btn btn-dark btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditarDomicilio<?= $d['id']; ?>">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-3">No hay domicilios registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modales de edición -->
<?php if (!empty($domicilios)): ?>
    <?php foreach ($domicilios as $d): ?>
        <div class="modal fade" id="modalEditarDomicilio<?= $d['id']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title"><i class="fa-solid fa-pen-to-square"></i> Editar Domicilio</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="../../../Controller/domicilioController.php">
                            <input type="hidden" name="id" value="<?= $d['id']; ?>">

                            <input type="text" name="tipo_servicio" value="<?= htmlspecialchars($d['tipo_servicio']); ?>" class="form-control mb-2" placeholder="Tipo de servicio" required>
                            <input type="text" name="nombre" value="<?= htmlspecialchars($d['nombre']); ?>" class="form-control mb-2" placeholder="Nombre" required>
                            <input type="text" name="telefono" value="<?= htmlspecialchars($d['telefono']); ?>" class="form-control mb-2" placeholder="Teléfono" required>
                            <input type="text" name="direccion" value="<?= htmlspecialchars($d['direccion']); ?>" class="form-control mb-2" placeholder="Dirección" required>

                            <select class="form-control mb-2" name="metodo_pago" required>
                                <option value="Efectivo" <?= $d['metodo_pago'] == 'Efectivo' ? 'selected' : ''; ?>>Efectivo</option>
                            </select>

                            <input type="date" name="fecha" value="<?= htmlspecialchars($d['fecha']); ?>" class="form-control mb-3" required>

                            <input type="hidden" name="accion" value="editarDomicilio">

                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">
                                    <i class="fa-solid fa-save"></i> Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Modal Nuevo Domicilio -->
<div class="modal fade" id="modalNuevoDomicilio" tabindex="-1" aria-labelledby="modalNuevoDomicilioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="modalNuevoDomicilioLabel">
                    <i class="fa-solid fa-motorcycle"></i> Registrar nuevo domicilio
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="../../../Controller/domicilioController.php" method="POST">
                    <input type="text" name="tipo_servicio" class="form-control mb-2" placeholder="Tipo de servicio" required>
                    <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
                    <input type="text" name="telefono" class="form-control mb-2" placeholder="Teléfono" required>
                    <input type="text" name="direccion" class="form-control mb-2" placeholder="Dirección" required>

                    <select class="form-control mb-2" name="metodo_pago" required>
                        <option value="Efectivo">Efectivo</option>
                    </select>

                    <input type="date" name="fecha" class="form-control mb-3" required>

                    <input type="hidden" name="accion" value="crearDomicilio">

                    <div class="text-end">
                        <button type="submit" class="btn btn-dark">
                            <i class="fa-solid fa-check"></i> Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>
