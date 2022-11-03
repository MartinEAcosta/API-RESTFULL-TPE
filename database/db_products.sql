-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-10-2022 a las 02:16:09
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_products`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categories`
--

CREATE TABLE `Categories` (
  `id_category` int(11) NOT NULL,
  `c_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Categories`
--

INSERT INTO `Categories` (`id_category`, `c_name`) VALUES
(1, 'Perifericos'),
(2, 'Monitores'),
(3, 'Componentes de PC'),
(9, 'Notebok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Products`
--

CREATE TABLE `Products` (
  `id` int(11) NOT NULL,
  `p_name` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `p_description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Products`
--

INSERT INTO `Products` (`id`, `p_name`, `price`, `p_description`, `stock`, `img`, `id_category`) VALUES
(2, 'MOUSE LOGITECH G G502 LIGHTSPEED', 14100, 'Características:Altura: 132 mmAnchura: 75 mmProfundidad: 40 mmPeso: 114 g, sólo mousePesas adicionales opcionales: hasta 16 g.DPI: 100-16000Inalambrico.', 16, 'image/LogitechG502.png', 1),
(3, 'MOUSE HYPERX PULSEFIRE DART RGB', 13000, 'Caracteristicas:\r\nInalambrico\r\nDPI: 100- 16000\r\nSensor Optico\r\nRango de frecuencia 2.4Ghz', 6, 'image/HYPERXPULSEFIRE.jpg', 1),
(4, 'MONITOR GIGABYTE G24F FHD 1MS IPS \r\n', 70000, 'Caracteristicas:\r\n165hz\r\n24 Pulgadas\r\nPlano\r\nPuerto USB 3.0\r\nEnchufe de audifonos\r\n', 3, 'image/GIGABYTEG24.png', 2),
(5, 'MONITOR VIEWSONIC VG2455 SUPERCLEAR', 93599, 'Caracteristicas:\r\n24 Pulgadas\r\n1920x1080\r\n75hz\r\nAltavoces', 2, 'image/VIEWSONIC24.png', 2),
(6, 'DISCO SOLIDO SSD 480GB WESTERN DIGITAL WD SATA III GREEN\r\n', 7999, 'CARACTERISTICAS:\r\nCapacidad 480 GB\r\nInterfaz SATA a 6 Gb/s\r\nFormato 2,5\" / 7 mm', 13, 'image/SSDGREEN480.jpg', 3),
(7, 'MEMORIA RAM KINGSTON FURY BEAST DDR4 8GB 2666MHZ RGB\n', 8599, 'Caracteristicas:\r\nTipo: DDR4\r\nCapacidad: 8 GB\r\nMódulos: 1\r\nVelocidad de memoria del reloj: 2666 MHz\r\nLatencia CAS: 16\r\nIntel Extreme Memory Profile (XMP):Sí\r\nDisipador:Diseño de disipador de calor de perfil bajo\r\nIluminacion RGB', 4, 'image/HYPERXRAM8GB.jpg', 3),
(11, 'MOTHERBOARD GIGABYTE Z690 AORUS ELITE AX DDR4 S1700 12VA GEN\r\n', 79999, 'Caracteristicas:\r\nSoporte para DDR4\r\n4 x zócalos DDR DIMM que admiten hasta 128 GB \r\nArquitectura de memoria de doble canal\r\nCompatibilidad con módulos de memoria DIMM 1Rx8 / 2Rx8 sin búfer ECC\r\nSoporte para módulos de memoria DIMM\r\nSoporte para módulos de memoria Extreme Memory Profile \r\n', 5, 'image/GIGABYTEMOTHER690.png', 3),
(12, 'MICROPROCESADOR CPU AMD RYZEN 5 4600G 4.2GHZ ZEN3\r\n', 33599, 'Caracteristicas:\r\nNumero de núcleos de CPU 6\r\nNumero de hilos 12\r\nMáx. Reloj Boost Hasta 4,2 GHz\r\nReloj base 3,7 GHz\r\nCaché L3 8MB\r\nZócalo de CPU AM4\r\nTipo de memoria del sistema DDR4\r\nCanales de memoria 2\r\nMáx. Memoria 128 GB\r\nGráficos integrados Sí', 4, 'image/4600GRYZEN.jpg', 3),
(13, 'PLACA DE VIDEO GIGABYTE NVIDIA GEFORCE GTX 1050 TI 4G\r\n', 67399, 'Características:\r\nDesarrollado por GeForce® GTX 1050 Ti \r\nIntegrado con 4 GB de memoria GDDR5 de 128 bits \r\nWINDFORCE 2X con ventilador de hoja \r\nSoporte de diseño de hasta 8K a 60Hz\r\nCore Clock\r\nBoost: 1455MHz / Base: 1341MHz en OC Mode \r\nBoost: 1430MHz / Base: 1316MHz en Gaming\r\n', 8, 'image/1050GIGABYTE.jpg', 3),
(14, 'MONITOR 22 LED SAMSUNG T350 FHD IPS 5MS HDMI VGA 75HZ\r\n', 49999, 'Caracteristicas:\r\nTamaño de pantalla (pulgadas) 22\r\nPlano\r\nResolución 1.920 x 1.080\r\nRelación de aspecto 16: 9\r\nBrillo (típico) 250 cd / ㎡\r\nBrillo (min) 200 cd / ㎡\r\nRelación de contraste estático  1000: 1 (típico)\r\nRelación de contraste estático 1000: 1 (típico)\r\nRelación de contraste dinámico Mega\r\nÁngulo de visión (horizontal / vertical) 178 ° / 178 °\r\nTiempo de respuesta 5 (GTG）\r\nTamaño de pantalla activa (H x V) 476.064 × 267.786 milímetro\r\nSoporte de color Máximo 16,7 millones\r\nGama de colores (NTSC 1976) 72%\r\nTipo de panel IPS\r\nCuadros por segundo 75 Hz máx.', 9, 'image/MONITORSAMNSUNG22.png', 2),
(43, 'a', 2, 'dsakldklas', 3, NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`) VALUES
(1, 'admin@tudai.com', '$2a$12$AhgA1N70cH99rMtysR.8JuE7rXPUGmBAU07oQYEzK2XABo9gWJWfC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `Categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
