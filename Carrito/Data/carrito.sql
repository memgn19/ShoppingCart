-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2024 a las 20:21:20
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
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(9) NOT NULL,
  `password` varchar(50) CHARACTER SET geostd8 COLLATE geostd8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`customerId`, `name`, `email`, `phone`, `password`) VALUES
(1, 'memgn', 'mar@gmail.com', '123456676', '1234'),
(2, 'memgn', 'marlen4192@gmail.com', '12345689', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `totalPrice` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `idOrderItems` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `price` float(10,2) NOT NULL,
  `foto` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`idProduct`, `name`, `price`, `foto`, `description`) VALUES
(4, 'Yellow Candle', 18.00, 'imgs/1725537094-vela amarilla.jpg', 'Yellow candle with a soothing vanilla scent, perfect for creating a cozy and relaxing atmosphere. Burns for up to 14 hours, adding warmth and comfort to any space.'),
(5, 'Yellow Kit', 54.00, 'imgs/1725537152-kit.jpg', 'This delightful kit includes a set of yellow vanilla-scented candles, each with a 14-hour burn time, perfect for creating a cozy ambiance. Also included is a beautiful yellow bowl and a pair of elegant vases, adding a touch of style and warmth to any space.'),
(6, 'Decorative Vases', 60.00, 'imgs/1725537259-kit jarrones.jpg', 'Set of six decorative vases in various shapes and styles, perfect for adding elegance and charm to any space. Ideal for fresh flowers, dried arrangements, or as standalone decor pieces.'),
(7, 'Pink and Green Set', 230.00, 'imgs/1725537751-platos.jpg', 'Bring a touch of spring to your table with this beautiful collection of pink and green plates. Featuring soft, pastel hues and elegant designs, these plates are perfect for adding a fresh, vibrant feel to any meal. Ideal for spring gatherings, brunches, or everyday use, they effortlessly blend style and functionality, making every dining experience delightful'),
(8, 'Fall Candles', 35.00, 'imgs/1725537840-tres velas.jpg', 'Set of three pumpkin-scented candles, perfect for fall. Each candle offers a warm, inviting aroma and rich autumnal color, creating a cozy atmosphere for the season'),
(9, 'Scented candle', 5.00, 'imgs/1725537886-vela sola.jpg', 'This lavender-scented candle is perfect for adding a touch of elegance to your room\'s decor. Its calming fragrance creates a soothing atmosphere, making it ideal for relaxation and ambiance. The stylish design complements any interior, making it both a beautiful and functional addition to your home.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `customerId` (`customerId`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`idOrderItems`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `idOrderItems` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`);

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`idOrder`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
