<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Exclusly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styler.css">
</head>
<body style="background-color: rgb(37, 35, 35); color: white;">

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

    
    <div class="container d-flex justify-content-center mt-5">
        <div class="card p-4" style="max-width: 400px; width: 100%; background-color: #e3e4e9; color: rgb(17, 35, 114);">
            <h2 class="text-center">Entrega de pedidos</h2>
            <form action="reser_exit.html">
                <div class="mb-3">
                    <label for="tipo_servicio" class="form-label" style="color: #000000;">Tipo de Servicio:</label>
                    <select id="tipo_servicio" name="tipo_servicio" class="form-select" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="domicilio">Domicilio</option>
                        <option value="recoger">Recoger en Tienda</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label" style="color: #000000;">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label" style="color: #000000;">Teléfono</label>
                    <input type="number" id="tel" name="telefono" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label" style="color: #000000;">Dirección de Entrega:</label>
                    <textarea id="direccion" name="direccion" class="form-control" rows="3" placeholder="Escribe tu dirección" required></textarea>
                </div>
        
                <div class="mb-3">
                    <label for="metodo_pago" class="form-label" style="color: #000000;">Método de Pago:</label>
                    <select id="metodo_pago" name="metodo_pago" class="form-select" onchange="redirigir()" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjeta">Tarjeta credito/debito</option>
                        <option value="transferencia">Transferencia</option>
                    </select>
                </div>
                <button type="button" class="btn btn-success w-100" onclick="redirigir()">Pagar</button>

            </form>
        </div>
    </div>
    <script>
        function redirigir() {
            const metodoPago = document.getElementById('metodo_pago').value;

            if (metodoPago === 'tarjeta') {
                window.location.href = 'pago.html';
            } else if (metodoPago === 'transferencia') {
                window.location.href = 'pago2.html';
            } else if (metodoPago === 'efectivo') {
                alert('Pedido enviado correctamente. Método de pago: Efectivo.');
            } else {
                alert('Por favor, selecciona un método de pago.');
            }
        }
    </script>


    


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