<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Exclusly</title>
    <link rel="stylesheet" href="../../Css/iniciar_sesion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: rgb(34, 32, 32); color: #c7b61e;">

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
                                <a class="nav-link" href="./contacto.php" style="font-size: clamp(0.8rem, 1.3vw, 3rem);">CONTACTOS </a>
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
    
    <main class="container__formu">
        <article class="seccionSede">
            <form action="../../../Controller/UsuarioController.php" method="POST" class="sede">
                <div id="tituloReservaAhora">
                    <h2 id="ReservaAhoraLetra">INICIA SESIÓN</h2>
                </div>
                <div id="seleccionaMesa">
                    <label  class="letraFormulario" for="">Ingresa tu Correo</label>
                    <input type="email" name="email" class="inputSeleccionarMesa" required>
                    <input type="hidden" name="accion" value="login">
                </div>
                
                <div id="seleccionaSede">
                    <label  class="letraFormulario" for="">Ingresa tu contraseña</label>
                    <input type="password" name="contrasena" class="inputSeleccionarSede" required>
                </div>

                <input type="submit" class="btn btn-primary"  style="background: #008b07ff;color: black;border: none;margin:8px 45%;width: 70%;padding: 10px;font-size: 25px;">


                <div id="registrarse">
                    <label for="">¿No tienes cuenta aún?</label>
                    <a href="./registro.php">Regístrarse</a>
                </div>
            </form>
        </article>
    </main>

<!--Pié de página -->
<footer style="background-color: #141b3e; color: white; padding: 20px 0;">
    <div class="container text-center p-4 pb-0">
        <section class="mb-4 d-flex justify-content-center">
            <a class="btn btn-primary btn-floating m-1" href="https://www.facebook.com/" target="_blank" role="button">
                <img src="../../img/facebook.png" alt="Facebook" width="30" height="30">
            </a>
            <a class="btn btn-primary btn-floating m-1" href="https://twitter.com/" target="_blank" role="button">
                <img src="../../img/gorjeo.png" alt="Twitter" width="30" height="30">
            </a>
            <a class="btn btn-primary btn-floating m-1" href="https://www.instagram.com/" target="_blank" role="button">
                <img src="../../img/instagram.png" alt="Instagram" width="30" height="30">
            </a>
            <a class="btn btn-primary btn-floating m-1" href="https://web.whatsapp.com/" target="_blank" role="button">
                <img src="../../img/whatsapp.png" alt="WhatsApp" width="30" height="30">
            </a>
        </section>
    </div>
    
    <div class="container">

        <hr>
        <div class="row">
            <div class="col-12 text-center">
                <p>&copy; 2025 Grupo Neptuno. Todos los derechos reservados. Copyray</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-4 text-center">
                <p><i class="fas fa-map-marker-alt"></i> Bogotá, Colombia</p>
            </div>
            <div class="col-md-4 text-center">
                <p><i class="fas fa-phone-alt"></i> PBX: 3133030</p>
            </div>
            <div class="col-md-4 text-center">
                <p><i class="fas fa-envelope"></i> Eltriocapitan@gmail.com</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>