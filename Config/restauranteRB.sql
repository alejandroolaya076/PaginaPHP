
    use RestauranteRB;

    CREATE TABLE Establecimiento (
        Id_Establecimiento INT(6) AUTO_INCREMENT PRIMARY KEY,
        Nombre_sede VARCHAR(30),
        Ciudad VARCHAR(20),
        Tipo_de_mesa VARCHAR(15),
        Responsable INT(10),
        Mesero VARCHAR(50)
    );

    CREATE TABLE Orden(
        Id_orden INT(6) AUTO_INCREMENT PRIMARY KEY,
        Fecha_orden date,
        Hora_orden TIME(6),
        Codigo_orden INT(10),
        Id_usuario INT(6),
        Id_pagos INT(6)
    );

    CREATE TABLE Pagos(
        Id_pagos INT(6)PRIMARY KEY AUTO_INCREMENT,
        Tipo_pago VARCHAR(15),
        Cantidad_pago INT(10)
    );

    CREATE TABLE Usuario(
        Id_usuario INT(6)AUTO_INCREMENT PRIMARY KEY,
        Nombre VARCHAR(30),
        Apellido VARCHAR(30),
        Documento INT(10),
        Telefono VARCHAR(15),
        Correo_electronico VARCHAR(50),
        Contrasena VARCHAR(255),
        Tipo_usuario VARCHAR(15)
    );

    CREATE TABLE Producto(
        Id_producto INT(6) AUTO_INCREMENT PRIMARY KEY,
        Nombre_producto VARCHAR(10),
        Precio_producto INT(10),
        Tipo_producto VARCHAR(10),
        Descripcion VARCHAR (80),
        Imagen VARCHAR (255)
    );

ALTER TABLE Producto
ADD COLUMN Imagen VARCHAR(255);
    CREATE TABLE Contactos(
        Id_contacto INT(6)AUTO_INCREMENT PRIMARY KEY,
        Id_usuario INT(6),
        Mensaje VARCHAR(255)
    )

    /*------------------tablas intermedias-------------------*/

    CREATE TABLE Orden_Establecimiento(
        Id_orden INT(6),
        Id_establecimiento INT(6),
        PRIMARY KEY (Id_orden, Id_establecimiento),
        FOREIGN KEY (Id_orden) REFERENCES Orden(Id_orden),
        Foreign Key (Id_establecimiento) REFERENCES Establecimiento(Id_establecimiento)
    );

    CREATE TABLE Orden_Producto(
        Id_orden INT(6),
        Id_producto INT(6),
        Foreign Key (Id_orden) REFERENCES Orden(Id_orden),
        Foreign Key (Id_producto) REFERENCES producto(Id_producto)
    );
     /*RELACIONES */
      /*------------------ USUARIO - ORDEN -------------------*/
    ALTER TABLE Orden ADD CONSTRAINT FK_ID1 FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario);

        /*------------------ PAGOS - ORDEN -------------------*/
    ALTER TABLE Orden ADD CONSTRAINT FK_ID2 FOREIGN KEY (Id_pagos) REFERENCES Pagos (Id_pagos);

  /*------------------ USUARIO - CONTACTOS -------------------*/
    ALTER TABLE contactos ADD CONSTRAINT FK_ID3 FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario);


    SELECT User, Host FROM mysql.user;

    /*Consulta para agregar productos (de las tarjetas) */
INSERT INTO Producto (Nombre_producto, Precio_producto, Tipo_producto, Descripcion, Imagen)
VALUES
-- 🥟 EMPANADAS
('Colombianas', 2000, 'Empanada', 'La empanada colombiana es una deliciosa y crujiente masa frita rellena de una mezcla sabrosa y jugosa.', 'View/Assets/img/1-e.png'),
('Argentinas', 9000, 'Empanada', 'La empanada argentina es un plato tradicional que destaca por su exquisita combinación de sabores y su versatilidad.', 'View/Assets/img/2-e.png'),
('Mixtas', 6000, 'Empanada', 'Una deliciosa combinación de sabores que mezcla dos de los rellenos más tradicionales de la cocina colombiana.', 'View/Assets/img/Producto/3-e.png'),
('Chilenas', 2999, 'Empanada', 'La empanada chilena es una masa rellena, tradicionalmente de pino, una mezcla de carne de res picada, cebolla, huevo duro, aceitunas y pasas.', 'View/Assets/img/4-e.png'),
('Ecuatorianas', 12000, 'Empanada', 'La empanada ecuatoriana es una masa rellena que puede prepararse con diversos ingredientes, como carne, pollo, queso o mariscos.', 'View/Assets/img/5-e.png'),
('Guatemaltecas', 1000, 'Empanada', 'La empanada guatemalteca es una delicia tradicional que puede ser tanto dulce como salada.', 'View/Assets/img/6-e.png'),

('Naranja', 200, 'Bebida', 'La bebida de naranja es una refrescante preparación hecha a base de jugo de naranja, que puede ser natural o procesado.', 'View/Assets/img/1.png'),
('Manzana Verde', 300, 'Bebida', 'La bebida de manzana verde es una refrescante y ligeramente ácida preparación hecha a base de jugo de manzana verde.', 'View/Assets/img/2.png'),
('Frutos Rojos', 150, 'Bebida', 'La bebida de frutos rojos es una mezcla vibrante hecha a base de frutas como fresas, frambuesas, moras y arándanos.', 'View/Assets/img/3.png'),
('Coco', 999, 'Bebida', 'La bebida de coco es una refrescante y cremosa preparación hecha a base de agua o leche de coco.', 'View/Assets/img/4.png'),
('Fresa', 320, 'Bebida', 'La bebida de fresa es una refrescante y dulce preparación elaborada con fresas frescas o procesadas.', 'View/Assets/img/5.png'),
('Maracuyá', 190, 'Bebida', 'La bebida de maracuyá es una preparación elaborada con el jugo de esta fruta tropical, con sabor ácido y dulce.', 'View/Assets/img/6.png'),

('Chocolate', 2500, 'Postre', 'Un delicioso postre de chocolate, con una textura suave y cremosa, ideal para los amantes del cacao.', 'View/Assets/img/1-p.png'),
('Tres Leches', 3000, 'Postre', 'El pastel de tres leches es un postre clásico y delicioso, famoso por su esponjosa textura y su increíble dulzura.', 'View/Assets/img/2-p.png'),
('Mora', 2590, 'Postre', 'La mora es una fruta pequeña y jugosa, de color oscuro y sabor agridulce, que pertenece a la familia de las Rosáceas.', 'View/Assets/img/3-p.png'),
('Kiwi', 999, 'Postre', 'El kiwi es una fruta exótica de pulpa verde vibrante y sabor dulce con un toque ácido.', 'View/Assets/img/4-p.png'),
('Mango', 3620, 'Postre', 'El mango es una fruta tropical jugosa y aromática, con una pulpa suave y dulce.', 'View/Assets/img/5-p.png'),
('Helado', 1990, 'Postre', 'El helado de chocolate es un postre clásico y cremoso, ideal para los amantes del cacao.', 'View/Assets/img/6-p.png');

SET FOREIGN_KEY_CHECKS = 0;
SET FOREIGN_KEY_CHECKS = 1;

/* drop table Producto; */