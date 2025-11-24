<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Exclusly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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
   <?php
require_once __DIR__ . "/../../../Config/conexion.php";

$pdo = Database::connection();
// Traemos todos los productos de la tabla "producto"
$productos = $pdo->query("SELECT * FROM producto")->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">🍔 Domicilios Croque</a>
        <button class="cart-button btn btn-outline-light" data-bs-toggle="offcanvas" data-bs-target="#productosOffcanvas">
            🛒 Productos <span id="cartButton" class="badge bg-danger"><?= $cantidad ?? 0 ?></span>
        </button>
    </div>
</nav>

<!-- Offcanvas de productos -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="productosOffcanvas" aria-labelledby="productosLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="productosLabel">Productos Disponibles</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
        <?php if (empty($productos)): ?>
            <p>No hay productos disponibles.</p>
        <?php else: ?>
            <ul class="list-group" id="lista-productos">
                <?php foreach ($productos as $item): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= $item['Nombre_producto'] ?></div>
                            <?= $item['Descripcion'] ?><br>
                            Tipo: <?= $item['Tipo_producto'] ?><br>
                            <strong>$<?= $item['Precio_producto'] ?></strong>
                        </div>
                        <?php if(!empty($item['Imagen'])): ?>
                            <img src="<?= $item['Imagen'] ?>" alt="<?= $item['Nombre_producto'] ?>" style="max-width:60px; margin-left:10px;">
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>




    
          
            <div id="entradas" class="mb-4">
                <h2 class="text-primary text-center">Entradas</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/hamburguesa3.jpeg" class="card-img-top" alt="Sopa">
                            <div class="card-body">
                                <h5 class="card-title">La Clásica Gourmet</h5>
                                <p class="card-text">Carne de res, queso cheddar y mayonesa especial.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $12.000</strong></p>
                                                  <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('La Clásica Gourmet', 'Carne de res, queso cheddar y mayonesa especial.', 12000)"> Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/hamburguesa4.jpeg" class="card-img-top" alt="Ensalada">
                            <div class="card-body">
                                <h5 class="card-title">La Explosión Mexicana</h5>
                                <p class="card-text">Carne con guacamole y jalapeños.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $30.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('La Explosión Mexicana', 'Carne con guacamole, jalapeños y salsa picante.', 30000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/hamburguesa12.jpeg" class="card-img-top" alt="Bruschetta">
                            <div class="card-body">
                                <h5 class="card-title">BBQ</h5>
                                <p class="card-text">Carne jugosa con guacamole y jalapeños.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $25.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('BBQ', 'Carne de res, cebolla crispy, tocineta y salsa BBQ.', 25000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
          
            <div id="platos-principales" class="mb-4">
                <h2 class="text-primary text-center">Platos Fuertes</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/perroc1.png" class="card-img-top" alt="Pasta">
                            <div class="card-body">
                                <h5 class="card-title">Picante Explosivo</h5>
                                <p class="card-text">Salchicha, mostaza y ketchup, sobre un pan suave y delicioso.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $10.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('Picante Explosivo', 'Salchicha, mostaza y ketchup, sobre un pan suave y delicioso.', 10000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/perros7c.avif" class="card-img-top" alt="Asado">
                            <div class="card-body">
                                <h5 class="card-title">Super Quesoso</h5>
                                <p class="card-text">nachos triturados, salsa de queso cheddar y extra de queso fundido.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $15.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('Super Quesoso', 'Nachos triturados, salsa de queso cheddar y extra de queso fundido.', 15000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/perro3c.jpg" class="card-img-top" alt="Pollo">
                            <div class="card-body">
                                <h5 class="card-title">El Monstruo Ahumado</h5>
                                <p class="card-text">Completo con salsa BBQ ahumada, cebolla crujiente y tiras de costilla desmenuzada.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $25.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('El Monstruo Ahumado', 'Salsa BBQ ahumada, cebolla crujiente y costilla desmenuzada.', 25000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
           
            <div id="postres" class="mb-4">
                <h2 class="text-primary text-center">Postres</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/postres.jpg" class="card-img-top" alt="Pastel">
                            <div class="card-body">
                                <h5 class="card-title">Pastel de miel</h5>
                                <p class="card-text">Pastel rico en miel con cobertura cremosa.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $10.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('Pastel de miel', 'Pastel rico en miel con cobertura cremosa.', 10000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/postres2.jpg" class="card-img-top" alt="Helado">
                            <div class="card-body">
                                <h5 class="card-title">Helado de Vainilla</h5>
                                <p class="card-text">Helado artesanal con toque de vainilla helada.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $12.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('Helado de Vainilla', 'Helado artesanal con toque de vainilla.', 12000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/postre3.jpg" class="card-img-top" alt="Frutas">
                            <div class="card-body">
                                <h5 class="card-title">Postre de Frutas</h5>
                                <p class="card-text">Frutas frescas con fresas rojas y un toque de miel.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $20.000</strong></p>
                                        <button class="btn btn-success" 
                                        onclick="agregarAlCarrito('Postre de Frutas', 'Frutas frescas con fresas y miel.', 20000)">
                                            Agregar al carrito
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
          
            <div id="bebidas" class="mb-4">
                <h2 class="text-primary text-center">Bebidas</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/bebida000.jpg" class="card-img-top" alt="Café">
                            <div class="card-body">
                                <h5 class="card-title">Limonada de fresa</h5>
                                <p class="card-text">Ácida y vibrante con fresas frescas.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $5.000</strong></p>
                                            <button class="btn btn-success" 
                                            onclick="agregarAlCarrito('Limonada de fresa', 'Ácida y vibrante con fresas frescas.', 5000)">
                                                Agregar al carrito
                                            </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/bebida0.jpg" class="card-img-top" alt="Jugo">
                            <div class="card-body">
                                <h5 class="card-title">Jugo Natural</h5>
                                <p class="card-text">Jugo fresco de frutas.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $10.000</strong></p>
                                        <button class="btn btn-success" 
                                        onclick="agregarAlCarrito('Jugo Natural', 'Jugo fresco de frutas.', 10000)">
                                            Agregar al carrito
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../../img/bebidas03.jpeg" class="card-img-top" alt="Té">
                            <div class="card-body">
                                <h5 class="card-title">Ámbar (Amber Ale)</h5>
                                <p class="card-text">Bebida con un toque afrutado.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted mb-0"><strong>Precio: $15.000</strong></p>
                                        <button class="btn btn-success" 
                                        onclick="agregarAlCarrito('Ámbar (Amber Ale)', 'Bebida con un toque afrutado.', 15000)">
                                            Agregar al carrito
                                        </button>
                                </div>
                            </div>
                         </div>
                       </div>
                    </div>
                 </div>  
             </div>
          </div>
       </div>

        </script>
       <script>
function agregarAlCarrito(nombre, descripcion, precio) {
    let formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('descripcion', descripcion);
    formData.append('precio', precio);

    fetch("../../../Controller/CarritoController.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "ok") {
           
            document.getElementById("cartButton").textContent = res.cantidad;

          
            mostrarModalCarrito(nombre);
        } else {
            alert("Error: " + res.message);
        }
    })
    .catch(err => console.error(err));
}



function mostrarModalCarrito(nombreProducto) {
    const modalHtml = `
    <div class="modal fade" id="modalCarrito" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background:#141b3e; color:white;">
                <div class="modal-header">
                    <h5 class="modal-title">Producto agregado</h5>
                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <strong>${nombreProducto}</strong> fue agregado al carrito.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>`;

    // Insertamos el modal en el body
    document.body.insertAdjacentHTML("beforeend", modalHtml);

    // Mostramos el modal
    var modal = new bootstrap.Modal(document.getElementById("modalCarrito"));
    modal.show();

    // Eliminamos el modal del DOM al cerrarlo para no duplicarlo
    document.getElementById("modalCarrito").addEventListener("hidden.bs.modal", function () {
        this.remove();
    });
}

    


    
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