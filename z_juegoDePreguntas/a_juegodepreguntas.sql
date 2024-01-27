-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 14:06:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `a_juegodepreguntas`
--
CREATE DATABASE IF NOT EXISTS `a_juegodepreguntas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `a_juegodepreguntas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jug` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `password` varchar(269) DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `comoUno` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jug`, `nombre`, `password`, `puntuacion`, `comoUno`) VALUES
(1, 'ana', 'ana', 333, ''),
(3, 'aaa', 'aaa', 32, ''),
(9, 'eva', 'eva', 310, ''),
(10, 'pepe', 'pepe', 65, ''),
(11, 'AAA', 'AAA', 33, ''),
(12, 'francisco', 'francisco', NULL, ''),
(13, 'admin', 'clavae', NULL, ''),
(14, 'ddddddddddddd', 'ddddddddddddddddd', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(150) DEFAULT NULL,
  `unoResp` varchar(150) DEFAULT NULL,
  `dosResp` varchar(150) DEFAULT NULL,
  `tresResp` varchar(150) DEFAULT NULL,
  `cuatroResp` varchar(150) DEFAULT NULL,
  `respVerdadera` varchar(150) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `comodin` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `unoResp`, `dosResp`, `tresResp`, `cuatroResp`, `respVerdadera`, `img`, `comodin`, `fecha`) VALUES
(3, '¿Cómo se llama el telescopio que fotografió un Agujero Negro por primera vez?', 'Telescopio Horizonte de Sucesos', 'Telescopio espacial Hubble', 'Skywatcher Evostar', 'Omegon 90/1250 Mak OTA', 'Telescopio Horizonte de Sucesos', 'http://c.files.bbci.co.uk/540D/production/_106371512_small.jpg', 'ciencia', '2022-05-26'),
(6, '¿Con que comando se pone el teclado en español con Ubuntu?', 'setxbmap -layout es', 'setxkbmap layout spanis', 'ponte Ya', 'setxkbmap -layout es', 'setxkbmap -layout es', 'https://i.ytimg.com/vi/A6BBNmR1RwY/maxresdefault.jpg', 'informatica', '2022-05-26'),
(7, '¿Qué tipo de software es el que da una versión no avanzada del programa, y a cambio de un pago, da una licencia para utilizar el programa?', 'Software', 'Freeware', 'Skywatcher Evostar', 'Adware', 'Software', 'https://i.ytimg.com/vi/SPZiO0JrftY/maxresdefault.jpg', 'informatica', '2022-05-26'),
(8, '¿Qué tipo de software instala anuncios publicitarios  en el ordenador al instalar otros programas?', 'Software', 'Freeware', 'Skywatcher Evostar', 'Adware', 'Adware', 'https://es.malwarebytes.com/images/adware/adware_graphics_3.jpg', 'informatica', '2022-05-26'),
(9, '¿quién fundo la ciudad de Cádiz?', 'Fenicios', 'Tirios', 'Persas', 'Griegos', 'Tirios', 'https://media-cdn.tripadvisor.com/media/photo-s/1b/55/d3/ee/foto-aerea-de-cadiz-la.jpg', 'Historia', '2022-06-04'),
(10, 'En qué años se fundó la ciudad de Cádiz?', '991', '1778', '665', '1104 a.C.', '1104 a.C.', 'https://antiguedadesespalter.es/wp-content/uploads/2019/01/vender-antiguedades-madrid.jpg', 'Historia', '2022-06-04'),
(11, 'Año en que se celebró el primer mundial de fútbol?', '1965', '1920', '2001', '1930', '1930', 'https://digitalhub.fifa.com/m/17b3537d0d0c1a20/original/ldzcjjpipyrqjv84puwz-jpg.jpg', 'Deportes', '2022-06-04'),
(12, '¿En qué club italiano jugó Diego Maradona?', 'Nápoli', 'Bolonia', 'Fiorentina', 'Inter', 'Nápoli', 'https://lasoga.org/wp-content/uploads/2017/11/Napoli-1986-87-780x470.jpg', 'Deportes', '2022-06-04'),
(13, '¿Cuántos jugadores componen un equipo de rugby?', '17', '11', '15', '13', '15', 'https://www.marketingregistrado.com/img/noticias/nueva-zelanda-rugby.png', 'Deportes', '2022-06-04'),
(14, '¿Quién fue el número 1 de tenis en 2008?', 'Federer', 'Djokovic', 'Nadal', 'McEnroe', 'Nadal', 'https://i.pinimg.com/originals/c6/45/dc/c645dc860facc72fd66c4498a8c12153.jpg', 'Deportes', '2022-06-04'),
(15, '¿Cómo se llama la zona de hierba sobre la cual se ubica el hoyo en golf?', 'Zona cero', 'The End', 'sa cabo', 'Green', 'Green', 'https://www.golfibiza.com/wp-content/uploads/Nuevas-Reglas-del-golf-2019-en-el-green.jpg', 'Deportes', '2022-06-04'),
(16, 'Quién fue la primera mujer en ganar una medalla olímpica?', 'Gertrude Ederle', 'Charlotte Cooper', 'Lilí Álvarez', 'Alice Coachman', 'Charlotte Cooper', 'https://algarabia.com/wp-content/uploads/2021/01/oie_wOQWpWzLyddr.jpg', 'Deportes', '2022-06-04'),
(17, 'quién pinto: “La gran ola de Kanagawa”', 'Hokusai', 'Kuniyoshi', 'Kuroda Seiki', ' Hiroshi Yoshida', 'Hokusai', 'https://artelista.s3.amazonaws.com/obras/big/5/9/1/4074228515177727.jpg', 'Arte', '2022-06-04'),
(18, 'Qué ciudad está plasmada en “La noche estrellada” de Van Gogh?', 'Saint-Rémy-de-Provence', 'Saint-Lambert', 'Gargas', 'Joucas', 'Saint-Rémy-de-Provence', 'https://www.salirconarte.com/wp-content/uploads/2017/09/09-Van-Gogh-Noche-estrellada-sobre-el-R%C3%B3dano-1888.jpg', 'Arte', '2022-06-04'),
(19, 'Cuándo nació Goya?', '1806', '1746', '1706', '1606', '1746', 'https://okdiario.com/img/2021/02/30/goya.jpeg', 'Arte', '2022-06-04'),
(20, 'La piedad\" es una escultura de', 'Bernini', 'Donatello', 'Miguel Angel', 'Caravallo', 'Miguel Angel', 'https://historia-arte.com/_/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpbSI6WyJcL2FydHdvcmtcL2ltYWdlRmlsZVwvcGllZGFkLW1pZ3VlbC1hbmdlbC5qcGciLCJyZXNpemUsMjAwMCwyMDAwIl19.9MxInEIindX36K2iTKvirudIywZQb38RoQjSM-eRg7c.jpg', 'Arte', '2022-06-04'),
(21, 'Qué nombre recibe el estilo arquitectónico de las construcciones árabes en la península?', 'Arabesco', 'Nazarí', 'Mozárabe', 'Arabigo', 'Mozárabe', 'https://blog.playasenator.com/wp-content/uploads/2018/03/destacada2.jpg', 'Arte', '2022-06-04'),
(22, 'Qué nombre recibe el estilo arquitectónico de las construcciones árabes en la península?', 'Arabesco', 'Nazarí', 'Mozárabe', 'Arabigo', 'Mozárabe', 'https://blog.playasenator.com/wp-content/uploads/2018/03/destacada2.jpg', 'Arte', '2022-06-04'),
(23, '¿En que año descubrió Colón América?', '1482', '1496', '1502', '1492', '1492', 'https://www.lavanguardia.com/files/og_thumbnail/uploads/2018/10/08/5fa4488c34c51.jpeg', 'Historia', '2022-06-04'),
(24, '¿En que guerra participó Juana de Arco?', 'La guerra de los 100 años', 'Primera cruzada', 'Guerras napoleónicas', 'La guerra de los 30 años', 'La guerra de los 100 años', 'https://uvn-brightspot.s3.amazonaws.com/assets/vixes/btg/juana_de_arco_2.jpg', 'Historia', '2022-06-04'),
(25, '¿Cuál era la capital del Imperio Inca?', 'Quito', 'Cuzco', 'Lima', 'Machu Pichu', 'Cuzco', 'https://media-cdn.tripadvisor.com/media/attractions-splice-spp-720x480/09/cd/ef/16.jpg', 'Historia', '2022-06-04'),
(26, '¿Cuándo se produjo principalmente el Siglo de Oro?', 'Siglo XVII', 'Siglo XVI', 'Siglo XV', 'Siglo XIV', 'Siglo XVI', 'https://espanaenlahistoria.org/wp-content/uploads/2021/03/Siglo-de-oro-Collage-1024x576.jpg', 'Historia', '2022-06-04'),
(27, '¿Cómo se llamaba el padre de Alejandro Magno?', 'Leonidas', 'Filipo II de Macedonia', 'Flipo I de Grecia', 'Ptolomeo I', 'Filipo II de Macedonia', 'https://curiosfera-historia.com/wp-content/uploads/biografia-Alejandro-Magno.jpg', 'Historia', '2022-06-04'),
(28, '¿Quién fue el primer emperador romano?', 'Cesar Augusto', 'Julio Cesar', 'Neron', 'Caligula', 'Cesar Augusto', 'https://www.imperivm.org/wp-content/uploads/2021/02/Cesar-Augusto.jpg', 'Historia', '2022-06-04'),
(29, 'El proceso por el que una célula se divide para formar dos células hijas se llama:', 'Segregación', 'Melosis', 'Mitosis', 'Partición', 'Mitosis', 'https://conceptodefinicion.de/wp-content/uploads/2014/08/mitosis.jpg', 'ciencia', '2022-06-04'),
(30, 'La información genética en las células se localiza:', 'En la membrana', 'En el citoplasma', 'En el ADN', 'En le núcleo', 'En le núcleo', 'https://www.ecured.cu/images/8/85/CELULA_EUCARIOTA.jpg', 'ciencia', '2022-06-04'),
(31, 'teoría que considera que todos los organismos descendemos del mismo ancestro?', 'Darwinismo', 'Creacionismo', 'Gradualismo', 'Centrismo', 'Darwinismo', 'https://i2.wp.com/afanporsaber.com/wp-content/uploads/2014/03/evolucion-humana.jpg', 'ciencia', '2022-06-04'),
(32, '¿Cuál es la principal función de los globulos rojos?', 'Llevar oxigéno', 'Coagular la sangre', 'Combatir enfermedades', 'Cicatrizar', 'Llevar oxigéno', 'https://www.consalud.es/uploads/s1/12/13/09/3/globulos-rojos.jpeg', 'ciencia', '2022-06-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jug`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jug` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
