<?php
require_once __DIR__ . "/../../../Controller/UsuarioController.php";
$controller = new UsuarioController();
$usuarios = $controller->listarUsuarios();
session_start();
// // Evitar que el navegador guarde en caché
// header("Cache-Control: no-cache, must-revalidate");
// header("Pragma: no-cache");
// header("Expires: 0");

// // Verificar si existe la sesión
// if (!isset($_SESSION['Usuario'])) {
//     header("Location: ./inicio_sesion.php");
//     exit();
// }
$nombreUsuario = $_SESSION['Usuario']['Nombre'] ?? "Administrador";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - FASTIE</title>
    <link rel="stylesheet" href="../../Css/domicilios.css">
    <link rel="stylesheet" href="../../Css/bootstrap/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c439753abb.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

    <!---------------------
        Barra de navegación
    ---------------------->
    <header >
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark"id="barranav" >
            <div class="container-fluid">
                <img src="../../Assets/img/Logo/logo.png" alt="" style="height: 8vw;max-height: 200px; min-width: 150px; min-height:150px;">
                <a class="navbar-brand" href="#" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;  font-size: clamp(1rem, 5vw, 3rem); color: #FFD43B; ">FASTIE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
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
                                <a class="nav-link" href="./contacto.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">CONTACTOS </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./reservar.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">RESERVAR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./domicilios.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">DOMICILIOS </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./inicio_sesion.php" style="font-size: clamp(0.8rem, 1.4vw, 3rem);">Iniciar Sesión </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./perfil.php" style="font-size: clamp(0.8rem, 1.4vw, 3rem);">Perfil </a>
                            </li>
                            </ul>
                    </div>
            </div>
        </nav>
    </header>

    <!------------ 
        Bienvenida
    ------------->
    <section class="container mt-4 d-flex justify-content-between align-items-center alert alert-dark shadow">
        
        <div class="">
            <h2 class="mb-0"> Bienvenid@,<?= htmlspecialchars($nombreUsuario) ?></h2>
        </div>

        <form action="../../../Controller/UsuarioController.php" method="POST" class="d-inline">
            <input type="hidden" name="accion" value="logout">
            <button type="submit" class="btn btn-dark btn-sm">
                <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
            </button>
        </form>

    
    </section>


    <!-------------------
        Tabla de usuarios
    -------------------->
    <section class="container">
        
        <div class="card shadow">

            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center ">

                <h5 class="mb-0"><i class="fa-solid fa-users"></i> Lista de usuarios</h5>

                <!-- Botón Registrar -->
            <section class="container my-3 text-end">
                <button type="button" class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#registroModal">
                    <i class="fa-solid fa-user-plus"></i> Registrar nuevo usuario
                </button>
            </section>

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
                                                <button type="submit" name="accion" value="eliminar" 
                                                        class="btn btn-danger btn-sm"
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
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">No hay usuarios registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
        <!-------------------------
            Modal registrar usuario
        -------------------------->
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
        <!-------- 
            Header
        --------->
        <div class="modal-header">
            <h5 class="modal-title" id="registroModalLabel">Registrar nuevo usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        
        <!------------------------ 
            Body con el formulario
        ------------------------->
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

        <!-- -------------------
            Modal Editar Usuario
        ----------------------->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
