-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 23:55:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restauranterb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `Id_contacto` int(6) NOT NULL,
  `Id_usuario` int(6) DEFAULT NULL,
  `Mensaje` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `Id_Establecimiento` int(6) NOT NULL,
  `Nombre_sede` varchar(30) DEFAULT NULL,
  `Ciudad` varchar(20) DEFAULT NULL,
  `Tipo_de_mesa` varchar(15) DEFAULT NULL,
  `Responsable` int(10) DEFAULT NULL,
  `Mesero` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Id_orden` int(6) NOT NULL,
  `Fecha_orden` date DEFAULT NULL,
  `Hora_orden` time(6) DEFAULT NULL,
  `Codigo_orden` int(10) DEFAULT NULL,
  `Id_usuario` int(6) DEFAULT NULL,
  `Id_pagos` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_establecimiento`
--

CREATE TABLE `orden_establecimiento` (
  `Id_orden` int(6) NOT NULL,
  `Id_establecimiento` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_producto`
--

CREATE TABLE `orden_producto` (
  `Id_orden` int(6) DEFAULT NULL,
  `Id_producto` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `Id_pagos` int(6) NOT NULL,
  `Tipo_pago` varchar(15) DEFAULT NULL,
  `Cantidad_pago` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_producto` int(6) NOT NULL,
  `Nombre_producto` varchar(50) DEFAULT NULL,
  `Precio_producto` int(10) DEFAULT NULL,
  `Tipo_producto` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




INSERT INTO `producto` (`Id_producto`, `Nombre_producto`, `Precio_producto`, `Tipo_producto`, `Descripcion`, `Imagen`) VALUES
(1, 'Clasica', 12000, 'Hambur', 'Carne de res, queso cheddar y mayonesa especial.', '../img/hamburguesa3.jpeg'),
(2, 'Mexicana', 30000, 'Hambur', 'Carne con guacamole y jalapeños.', '../img/hamburguesa4.jpeg'),
(3, 'Mexican2', 25000, 'Hambur', 'Carne jugosa con guacamole y jalapeños.', '../img/hamburguesa12.jpeg'),
(4, 'Picante', 10000, 'Plato', 'Salchicha, mostaza y ketchup sobre pan suave.', '../img/perroc1.png'),
(5, 'Quesoso', 15000, 'Plato', 'Nachos triturados con salsa cheddar y extra queso.', '../img/perros7c.avif'),
(6, 'Monstruo', 25000, 'Plato', 'BBQ ahumada, cebolla crujiente y costilla.', '../img/perro3c.jpg'),
(7, 'Miel', 10000, 'Postre', 'Pastel rico en miel con cobertura cremosa.', '../img/postres.jpg'),
(8, 'Vainilla', 12000, 'Postre', 'Helado artesanal con toque de vainilla helada.', '../img/postres2.jpg'),
(9, 'Frutas', 20000, 'Postre', 'Frutas frescas con miel y fresas rojas.', '../img/postre3.jpg'),
(10, 'Limonada', 5000, 'Bebida', 'Ácida y vibrante con fresas frescas.', '../img/bebida000.jpg'),
(11, 'Natural', 10000, 'Bebida', 'Jugo fresco de frutas.', '../img/bebida0.jpg'),
(12, 'Ambar', 15000, 'Bebida', 'Bebida con un toque afrutado.', '../img/bebidas03.jpeg');


CREATE TABLE `usuario` (
  `Id_usuario` int(6) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellido` varchar(30) DEFAULT NULL,
  `Documento` int(10) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Correo_electronico` varchar(50) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Tipo_usuario` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`Id_contacto`),
  ADD KEY `FK_ID3` (`Id_usuario`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`Id_Establecimiento`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`Id_orden`),
  ADD KEY `FK_ID1` (`Id_usuario`),
  ADD KEY `FK_ID2` (`Id_pagos`);

--
-- Indices de la tabla `orden_establecimiento`
--
ALTER TABLE `orden_establecimiento`
  ADD PRIMARY KEY (`Id_orden`,`Id_establecimiento`),
  ADD KEY `Id_establecimiento` (`Id_establecimiento`);

--
-- Indices de la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD KEY `Id_orden` (`Id_orden`),
  ADD KEY `Id_producto` (`Id_producto`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`Id_pagos`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `Id_contacto` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  MODIFY `Id_Establecimiento` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `Id_orden` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `Id_pagos` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_producto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(6) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `FK_ID3` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `FK_ID1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`),
  ADD CONSTRAINT `FK_ID2` FOREIGN KEY (`Id_pagos`) REFERENCES `pagos` (`Id_pagos`);

--
-- Filtros para la tabla `orden_establecimiento`
--
ALTER TABLE `orden_establecimiento`
  ADD CONSTRAINT `orden_establecimiento_ibfk_1` FOREIGN KEY (`Id_orden`) REFERENCES `orden` (`Id_orden`),
  ADD CONSTRAINT `orden_establecimiento_ibfk_2` FOREIGN KEY (`Id_establecimiento`) REFERENCES `establecimiento` (`Id_Establecimiento`);

--
-- Filtros para la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD CONSTRAINT `orden_producto_ibfk_1` FOREIGN KEY (`Id_orden`) REFERENCES `orden` (`Id_orden`),
  ADD CONSTRAINT `orden_producto_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`Id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
