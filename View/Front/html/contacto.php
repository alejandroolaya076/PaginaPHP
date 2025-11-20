<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Exclusly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
    </style>

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


    <div class="container mt-5">
        <h2 class="text-center" style="color: rgb(0, 136, 255);">Contáctanos</h2>
        <p class="text-center" style="color: aliceblue;">Déjanos tu mensaje y te responderemos lo antes posible.</p>

        <form onsubmit="return mostrarAlerta()">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="correo@ejemplo.com" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" placeholder="Número de contacto" required>
            </div>

            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terminos" required>
                <label class="form-check-label" for="terminos">Acepto los términos y condiciones</label>
            </div>

            <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
        </form>
    </div>

    <script>
        function mostrarAlerta() {
            alert("¡Gracias por contactarnos! Hemos recibido tu mensaje correctamente.\n" +
                  "Nos pondremos en contacto contigo en un plazo de 24-48 horas.\n\n" +
                  "Si necesitas ayuda urgente, puedes llamarnos o escribirnos:\n" +
                  "Correo: soporte@ejemplo.com\nTeléfono: +57 123 456 7890\n\n" +
                  "Horario de atención: lunes a viernes, de 8:00 AM a 6:00 PM.");
            return false; 
        }
    </script>

    
        <br>

    
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div id="map"></div>
    </div>

    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
    
        var map = L.map('map').setView([4.630833, -74.086667], 16);

       
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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