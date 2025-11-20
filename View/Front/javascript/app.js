function agregarAlCarrito(nombre, descripcion, precio, idProducto) {
    
    carrito.push({ nombre, descripcion, precio });
    total += precio;
    actualizarCarrito();

    fetch("carrito.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id_producto=" + idProducto
    })
    .then(res => res.text())
    .then(data => {
        if(data === "OK") {
            console.log("Producto guardado en la base de datos");
        } 
        else if (data === "NO_LOGIN") {
            alert("Debes iniciar sesión para añadir al carrito");
        } 
        else {
            console.log("Error al guardar:", data);
        }
    });
}
