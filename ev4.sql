-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2025 a las 16:49:26
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
-- Base de datos: `ev4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nom_cat`) VALUES
(1, 'RPG'),
(2, 'estrategia en tiempo real'),
(3, 'ARPG'),
(4, 'RTS'),
(5, 'MOBA '),
(6, 'FPS'),
(7, 'Juego de cartas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `vnt_det` int(11) NOT NULL,
  `jug_det` int(11) NOT NULL,
  `pre_det` int(11) NOT NULL,
  `cnt_det` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_jug` int(11) NOT NULL,
  `nom_jug` varchar(40) NOT NULL,
  `des_jug` varchar(150) NOT NULL,
  `pre_jug` int(11) NOT NULL,
  `dsc_jug` int(11) NOT NULL,
  `stk_jug` int(11) NOT NULL,
  `cat_jug` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_jug`, `nom_jug`, `des_jug`, `pre_jug`, `dsc_jug`, `stk_jug`, `cat_jug`) VALUES
(1, 'Diablo IV', 'ABANDONA TODA ESPERANZA:La lucha entre los Altos Cielos y los Infiernos Abrasadores amenaza con consumir Santuario.Mata demonios, domina facultades.', 65000, 10, 4, 1),
(2, 'StarCraft', 'VIVE EL JUEGO QUE REDEFINIÓ EL GÉNERO DE LA ESTRATEGIA EN TIEMPO REAL. TERRAN, ZERG O PROTOSS: LA CONQUISTA DE LA GALAXIA ESTÁ A TU ALCANCE.', 15000, 20, 3, 2),
(3, 'Diablo Inmortal', 'UN CAPÍTULO INÉDITO DE LA SAGA DIABLO:Tyrael se da por muerto y la humanidad afronta las consecuencias. Los fragmentos de la Piedra del Mundo, poder c', 5000, 25, 4, 3),
(4, 'Warcraft III Reforged', 'Lidera a los elfos de la noche, a los no-muertos, a los orcos y a los humanos, forja alianzas y enfréntate a sus ejércitos', 13900, 50, 3, 4),
(5, 'Heroes of the Storm', 'Campos de batalla\r\npotenciados\r\nAl contrario que otros MOBA, Heroes of the Storm dispone de una amplia selección de campos de batalla.', 7000, 5, 5, 5),
(6, 'Overwatch 2', 'HA COMENZADO UNA NUEVA ERA :Overwatch 2 es un juego de acción en equipo gratuito ambientado en un futuro optimista en el que todas las partidas.', 3500, 5, 7, 6),
(7, 'Hearthstone', 'Hearthstone es un emocionante juego de cartas coleccionables en línea donde los jugadores construyen estratégicos mazos con personajes y hechizos.', 12000, 5, 4, 7),
(8, 'Wow-Warcraft', 'Warcraft se desarrolla en un mundo de fantasía llamado Azeroth.', 4000, 5, 4, 4),
(9, 'Dark Souls III', 'Adéntrate en un universo lleno de enemigos y entornos descomunales, un mundo en ruinas en el que las llamas se están apagando.', 40499, 15, 5, 1),
(10, 'Age of Empires II The Age of Kings', 'Explora todas las campañas de un jugador originales incluidas tanto en The Age of Kings como en The Conquerors;elige entre 18 civilizaciones.', 9500, 10, 5, 2),
(11, 'Hades', 'Hades es un juego estilo rogue-like con mecánicas divinas que combina los mejores aspectos de los aclamados títulos de Supergiant.', 13000, 4, 2, 3),
(12, 'League of Legends', 'ELIGE A TU CAMPEÓN\r\nLanzarse en medio del combate, apoyar a tus aliados.Prefieras lo que prefieras, encontrarás tu sitio en la Grieta.\r\n\r\n', 5500, 4, 7, 5),
(13, 'Counter-Strike Global Offensive', 'Global Offensive (CS:GO) expande el juego de acción por equipos pionero de hace más de 20 años. Incluye nuevos mapas, personajes, armas .', 6000, 5, 5, 6),
(14, 'Magic The Gathering Arena', 'Agrega la Tierra Media a tu colección y únete a favoritos conocidos en una nueva y emocionante aventura de ida y vuelta con valor y coraje.', 5000, 15, 2, 7),
(20, 'final fantasy', 'hola juego rpg ', 20000, 11, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pas` int(11) NOT NULL,
  `nom_pas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pas`, `nom_pas`) VALUES
(1, 'Chile'),
(2, 'Argentina'),
(3, 'Brasil'),
(4, 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pre` int(11) NOT NULL,
  `val_pre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pre`, `val_pre`) VALUES
(1, 'nombre de tu mascota '),
(2, 'Ciudad de nacimiento ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `nom_usu` varchar(40) NOT NULL,
  `apl_usu` varchar(40) NOT NULL,
  `dia_usu` int(11) NOT NULL,
  `mes_usu` varchar(10) NOT NULL,
  `aio_usu` int(11) NOT NULL,
  `cor_usu` varchar(40) NOT NULL,
  `con_usu` varchar(40) NOT NULL,
  `pas_usu` int(11) NOT NULL,
  `pre_usu` int(11) NOT NULL,
  `res_usu` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nom_usu`, `apl_usu`, `dia_usu`, `mes_usu`, `aio_usu`, `cor_usu`, `con_usu`, `pas_usu`, `pre_usu`, `res_usu`) VALUES
(1, 'esteban', 'paredes', 9, 'mayo', 2004, 'esteban1@gmail.com', '1234', 4, 1, 'fiona'),
(2, 'juan', 'paredes', 9, 'octubre', 2001, 'juan1@gmail.com', 'juan123', 1, 2, 'chiloe'),
(3, 'pablo', 'valdivia', 5, 'septiembre', 2000, 'pablo1@gmail.com', 'pablo1234', 2, 1, 'limon'),
(4, 'miguel', 'Pereira', 1, 'julio', 2002, 'miguel@gmail.com', '12345', 3, 2, 'sao pablo'),
(5, 'Cristina', 'Rodriguez', 25, 'abril', 2001, 'cristian123@gmail.com', 'cristian123', 1, 2, 'valparaiso'),
(6, 'Rafael', 'Rodriguez', 23, 'noviembre', 2005, 'rafa123@gmail.com', 'rafa1234', 4, 2, 'ciudad de mexico'),
(7, 'Benjamin', 'Villalobos', 3, 'noviembre', 2003, 'benjaminbv01@gmail.com', 'alfredo103', 1, 1, 'lucho pepe'),
(8, 'javier', 'rivera', 31, 'mayo', 2003, '02@gmail.com', '1234', 4, 1, 'fifi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `num_ven` int(11) NOT NULL,
  `fch_ven` datetime NOT NULL,
  `tot_ven` int(11) NOT NULL,
  `usu_ven` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`num_ven`, `fch_ven`, `tot_ven`, `usu_ven`) VALUES
(2, '2023-06-30 10:31:48', 3750, 3),
(4, '2023-06-30 10:37:04', 62250, 3),
(5, '2023-06-30 11:09:17', 3750, 2),
(6, '2023-06-30 11:34:55', 3750, 6),
(7, '2023-06-30 15:26:53', 105404, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`vnt_det`,`jug_det`),
  ADD KEY `jug_det` (`jug_det`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_jug`),
  ADD UNIQUE KEY `nom_jug` (`nom_jug`),
  ADD KEY `cat_jug` (`cat_jug`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pas`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `cor_usu` (`cor_usu`),
  ADD KEY `pas_usu` (`pas_usu`),
  ADD KEY `pre_usu` (`pre_usu`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`num_ven`),
  ADD KEY `usu_ven` (`usu_ven`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_jug` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `num_ven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`vnt_det`) REFERENCES `venta` (`num_ven`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`jug_det`) REFERENCES `juego` (`id_jug`);

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`cat_jug`) REFERENCES `categoria` (`id_cat`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`pas_usu`) REFERENCES `pais` (`id_pas`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`pre_usu`) REFERENCES `pregunta` (`id_pre`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`usu_ven`) REFERENCES `usuario` (`id_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
