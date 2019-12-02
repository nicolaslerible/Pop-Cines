-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 14:27:22
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--
CREATE DATABASE IF NOT EXISTS `cine` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `CodAdm` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`CodAdm`, `Nombre`, `Pass`) VALUES
(1, 'nico', '1234'),
(2, 'antonio', 'mevaaaprobar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cine`
--

DROP TABLE IF EXISTS `cine`;
CREATE TABLE `cine` (
  `CodCin` int(11) NOT NULL,
  `CodAdm` int(11) NOT NULL,
  `NomCin` varchar(100) NOT NULL,
  `LocCin` varchar(255) NOT NULL,
  `DirCin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cine`
--

INSERT INTO `cine` (`CodCin`, `CodAdm`, `NomCin`, `LocCin`, `DirCin`) VALUES
(1, 1, 'Plaza Menor', 'Málaga', 'C/ Ni Idea nº96'),
(2, 2, 'MiraCosta', 'Fuengirola', 'AV. Los Laureles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emision`
--

DROP TABLE IF EXISTS `emision`;
CREATE TABLE `emision` (
  `CodEmi` int(11) NOT NULL,
  `CodSal` int(11) NOT NULL,
  `CodPel` int(11) NOT NULL,
  `CodCin` int(11) NOT NULL,
  `FecEmi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `CodGen` int(11) NOT NULL,
  `NomGen` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`CodGen`, `NomGen`) VALUES
(1, 'Fantasía'),
(2, 'Acción'),
(5, 'Animación'),
(6, 'Terror'),
(7, 'Animación'),
(8, 'Terror'),
(9, 'Drama'),
(10, 'Aventura'),
(11, 'Ciencia ficción'),
(12, 'Suspense'),
(13, 'Crimen'),
(14, 'Comedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE `pelicula` (
  `CodPel` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `argumento` text NOT NULL,
  `poster` varchar(255) NOT NULL,
  `duracion` int(11) NOT NULL DEFAULT '90',
  `genero` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`CodPel`, `titulo`, `argumento`, `poster`, `duracion`, `genero`) VALUES
(41, 'star wars', 'Secuela de \"Maléfica\" que cuenta la vida de Maléfica y Aurora, así como las alianzas que formarán para sobrevivir a las amenazas del mágico mundo en el que habitan.', '/eZOkXqHXWCKytd78TggAtJ0M3gU.jpg', 124, 'Fantasía'),
(45, 'Filtro bba', 'Secuela del film de culto \"El resplandor\" (1980) dirigido por Stanley Kubrick y también basado en una famosa novela de Stephen King. La historia transcurre algunos años después de los acontecimientos de \"The Shining\", y sigue a Danny Torrance (Ewan McGregor), traumatizado y con problemas de ira y alcoholismo que hacen eco de los problemas de su padre Jack, que cuando sus habilidades psíquicas resurgen, se contacta con una niña de nombre Abra Stone, a quien debe rescatar de un grupo de viajeros que se alimentan de los niños que poseen el don de \"el resplandor\".', '/2gucnaxqpzEDycFmPwwqjiwvemA.jpg', 182, 'Terror'),
(46, 'The King', 'Inglaterra, siglo XV. Hal, un caprichoso príncipe que vive entre la población lejos de la corte, se ve obligado por las circunstancias a aceptar el trono a regañadientes y convertirse en Enrique V.', '/8u0QBGUbZcBW59VEAdmeFl9g98N.jpg', 170, 'Drama'),
(47, 'Aladdin: Life-Action', 'Aladdin es un adorable pero desafortunado ladronzuelo enamorado de la hija del Sultán, la princesa Jasmine. Para intentar conquistarla, acepta el desafío de Jafar, que consiste en entrar a una cueva en mitad del desierto para dar con una lámpara mágica que le concederá todos sus deseos. Allí es donde Aladdín conocerá al Genio, dando inicio a una aventura como nunca antes había imaginado.', '/rSfOAjBSqdvGndNHv0H961YkZIr.jpg', 158, 'Aventura'),
(48, 'Spider-Man: Lejos de Casa', 'Peter Parker decide irse junto a Michelle Jones, Ned y el resto de sus amigos a pasar unas vacaciones a Europa después de los eventos ocurridos en Vengadores: EndGame. Sin embargo, el plan de Parker por dejar de lado sus superpoderes durante unas semanas se ven truncados cuándo es reclutado por Nick Fury para unirse a Mysterio (un humano que proviene de la Tierra 833, una dimensión del Multiverso, que tuvo su primera aparición en Doctor Strange) para luchar contra los Elementales (cuatro entes inmortales que vienen de la misma dimensión y que dominan los cuatro elementos de la Naturaleza, el fuego, el agua, el aire y la tierra) . En ese momento, Parker vuelve a ponerse el traje de Spider-Man para cumplir con  su labor.', '/iKVR1ba3W1wCm9bVCcpnNvxQUWX.jpg', 165, 'Acción'),
(49, 'X-Men: Fénix oscura', 'Los X-Men se enfrentan a su enemigo más poderoso: uno de sus miembros, Jean Grey. Durante una misión de rescate en el espacio, Jean casi muere al ser alcanzada por una misteriosa fuerza cósmica. Cuando regresa a casa, esa radiación la ha hecho más poderosa, pero mucho más inestable. Mientras lucha con la entidad que habita en su interior, Jean desata sus poderes de formas que no puede controlar ni comprender. Jean cae en una espiral fuera de control haciendo daño a aquellos que más ama y empieza a destruir los lazos que mantienen unidos a los X-Men.', '/rdByKDkfyVuVSrkllzxKYXiZmTd.jpg', 146, 'Ciencia ficción'),
(50, 'Vengadores: Infinity War', 'El todopoderoso Thanos ha despertado con la promesa de arrasar con todo a su paso, portando el Guantelete del Infinito, que le confiere un poder incalculable. Los únicos capaces de pararle los pies son los Vengadores y el resto de superhéroes de la galaxia, que deberán estar dispuestos a sacrificarlo todo por un bien mayor. Capitán América e Ironman deberán limar sus diferencias, Black Panther apoyará con sus tropas desde Wakanda, Thor y los Guardianes de la Galaxia e incluso Spider-Man se unirán antes de que los planes de devastación y ruina pongan fin al universo. ¿Serán capaces de frenar el avance del titán del caos?', '/ksBQ4oHQDdJwND8H90ay8CbMihU.jpg', 186, 'Aventura'),
(51, 'A 47 metros 2: el terror emerge', 'Esta secuela de \"A 47 Metros\" traslada la mortífera acción de los tiburones desde México a Brasil, y seguirá a un grupo de chicas en busca de aventuras en la costa de Recife. Con la esperanza de salir del rutinario sendero turístico, las chicas escuchan algo acerca de unas ruinas submarinas ocultas, pero descubren que bajo las olas turquesas su Atlantis secreta no está completamente deshabitada.', '/tWZ9tgEEpeku0hBjjHLBPHd0jXT.jpg', 120, 'Suspense'),
(52, 'El camino: una película de Breaking Bad', 'Tiempo después de los eventos sucedidos tras el último episodio de la serie Breaking Bad, el fugitivo Jesse Pinkman huye de sus perseguidores, de la ley y de su pasado.', '/hoWADuvXs3Ua4AXBAiZYnppTupO.jpg', 153, 'Crimen'),
(53, 'Chicos buenos', 'Después de ser invitados a su primera \"fiesta del beso\", tres buenos amigos destrozan por casualidad un dron que tenían prohibido tocar. Para reemplazarlo, se ausentan de clase y toman una serie de decisiones erróneas, involucrándose en un caso relacionado con droga, policía y, sobre todo, con muchas lágrimas.', '/8zqptFnq7GhpVEXzfOnNxWbN0U2.jpg', 125, 'Comedia'),
(54, 'Géminis', 'Un asesino a sueldo, demasiado mayor, decide retirarse. Pero esto no le va a resultar tan fácil, pues tendrá que enfrentarse a un clon suyo, mucho más joven.', '/gJpbw3pVCAKksp1LgsTGW7c8SFV.jpg', 147, 'Drama'),
(55, 'It Capítulo 2', '27 años después, los ex-miembros del Club de los Perdedores, que crecieron y se mudaron lejos de Derry, vuelven a unirse tras una devastadora llamada telefónica.', '/9oERKIVyTWpHNum3STVsAGD4ojz.jpg', 199, 'Terror'),
(56, 'Zombieland: Mata y remata', 'En esta secuela y empleando el característico sentido del humor del que hizo gala \"Zombieland\", el grupo de protagonistas tendrá que viajar desde la Casa Blanca hasta el corazón de los Estados Unidos, sobreviviendo a nuevas clases de muertos vivientes que han evolucionado desde lo sucedido hace algunos años, así como a algunos supervivientes humanos rezagados. Pero, por encima de todo, tendrán que tratar de soportar los inconvenientes de convivir entre ellos.', '/fIkRmyo1UPlwM9zEVfs5QqevmuI.jpg', 129, 'Terror'),
(57, 'Érase una vez en... Hollywood', '“Érase una vez en… Hollywood” de Quentin Tarantino, nos lleva a Los Angeles de 1969, donde todo está cambiando, y donde la estrella de la televisión Rick Dalton (Leonardo DiCaprio), y Cliff Booth (Brad Pitt), su doble de muchos años, se abren camino en una industria que ya prácticamente no reconocen. La novena película del célebre escritor y director cuenta con amplio reparto y múltiples tramas argumentales que rinden un tributo a los momentos finales de la época dorada de Hollywood.', '/vKSyaptSA7zZ9H8mSfaDnvyQl9k.jpg', 195, 'Drama'),
(58, 'Joker', 'Arthur Fleck es un hombre ignorado por la sociedad, cuya motivación en la vida es hacer reír. Pero una serie de trágicos acontecimientos le llevarán a ver el mundo de otra forma. Película basada en Joker, el popular personaje de DC Comics y archivillano de Batman, pero que en este film toma un cariz más realista y oscuro.', '/v0eQLbzT6sWelfApuYsEkYpzufl.jpg', 152, 'Crimen'),
(59, 'El irlandés', 'Pennsylvania, 1956. Frank Sheeran, un veterano de guerra de origen irlandés que trabaja como camionero, conoce accidentalmente al mafioso Russell Bufalino. Una vez convertido en su hombre de confianza, Bufalino envía a Frank a Chicago con el encargo de ayudar a Jimmy Hoffa, un poderoso líder sindical relacionado con el crimen organizado, con quien Frank mantendrá una estrecha amistad durante casi veinte años.', '/sNilmIAwBbH0DmBOWBS6gWvNDex.jpg', 239, 'Crimen'),
(60, 'Estafadoras de Wall Street', 'Inspirado por el artículo viral de la revista New York Magazine, Hustlers sigue a un grupo de ex empleadas de un club de striptease que se unen para vengarse de sus clientes de Wall Street.', '/zd7qy3xee9mgB0LbH4yUQt5BAE4.jpg', 137, 'Comedia'),
(61, 'Terminator: destino oscuro', 'Sarah Connor une todas sus fuerzas con una mujer cyborg para proteger a una joven de un extremadamente poderoso y nuevo Terminator.', '/k7PuHoj2oE7nEHExwliF2FSXFnr.jpg', 150, 'Acción'),
(62, 'It Capítulo 2', '27 años después, los ex-miembros del Club de los Perdedores, que crecieron y se mudaron lejos de Derry, vuelven a unirse tras una devastadora llamada telefónica.', '/9oERKIVyTWpHNum3STVsAGD4ojz.jpg', 199, 'Terror'),
(63, 'Ellipse', '', '/4I0CQfnMy6sRR7QhgqsXR16TmIs.jpg', 106, 'Ciencia ficción'),
(64, 'Spider-Man: Lejos de Casa', 'Peter Parker decide irse junto a Michelle Jones, Ned y el resto de sus amigos a pasar unas vacaciones a Europa después de los eventos ocurridos en Vengadores: EndGame. Sin embargo, el plan de Parker por dejar de lado sus superpoderes durante unas semanas se ven truncados cuándo es reclutado por Nick Fury para unirse a Mysterio (un humano que proviene de la Tierra 833, una dimensión del Multiverso, que tuvo su primera aparición en Doctor Strange) para luchar contra los Elementales (cuatro entes inmortales que vienen de la misma dimensión y que dominan los cuatro elementos de la Naturaleza, el fuego, el agua, el aire y la tierra) . En ese momento, Parker vuelve a ponerse el traje de Spider-Man para cumplir con  su labor.', '/iKVR1ba3W1wCm9bVCcpnNvxQUWX.jpg', 165, 'Acción'),
(65, 'Objetivo: Washington D.C.', 'Tras las amenazas a la Casa Blanca y Londres, esta vez el objetivo a batir es el agente del Servicio Secreto de Estados Unidos Banning (Gerard Butler), quien se ha ganado muchos enemigos al haber frustrado los diferentes planes terroristas hasta ahora.', '/zC8HSq4xWsPgPDjgmlFix4VMtaD.jpg', 144, 'Acción'),
(66, 'Puñales por la espalda', 'Cuando el renombrado novelista de misterio Harlan Thrombey (Christopher Plummer) es encontrado muerto en su mansión justo después de su 85 cumpleaños, el inquisitivo y cortés detective Benoit Blanc (Daniel Craig) es misteriosamente reclutado para investigar. Se moverá entre una red de pistas falsas y mentiras interesadas para tratar de descubrir la verdad tras la prematura muerte del escritor.', '/wdjjISkTL7euUD8mogXTqipgFpz.jpg', 160, 'Misterio'),
(67, 'Rambo: Last Blood', 'Cuatro décadas después, el veterano de Vietnam y paciente con TEPT (Trastorno de estrés postraumático) regresa a su rancho familiar de Arizona. John Rambo (Sylvester Stallone), uno de los mayores héroes de acción de todos los tiempos, deberá enfrentarse a su pasado y desenterrar sus despiadadas habilidades de combate para vengarse en una misión final, emprendiendo así un viaje mortal, justiciero y sin retorno.', '/kG3pY61LWGAzcaSne12CGEeRvtg.jpg', 119, 'Acción'),
(68, 'Noche de bodas', 'Durante la noche de su boda, una mujer (Weaving) recibe la invitación por parte de la rica y excéntrica familia de su marido para participar en una tradición ancestral que se convierte en un juego letal de supervivencia.', '/47BlTRVQ43NyzgMWPLOkKYYnHez.jpg', 125, 'Terror'),
(69, 'Red Shoes & the 7 Dwarfs', 'Los príncipes convertidos en enanos buscan los zapatos rojos de una dama para romper el hechizo, aunque no será fácil. Una parodia con un giro inesperado.', '/MBiKqTsouYqAACLYNDadsjhhC0.jpg', 30, 'Animación'),
(70, 'Guardianes de la galaxia Vol. 2', 'Continúan las aventuras del equipo en su travesía por los confines del cosmos. Los Guardianes deberán luchar para mantener unida a su nueva familia mientras intentan resolver el misterio de los verdaderos orígenes de Peter Quill. Viejos rivales se convertirán en nuevos aliados, y queridos personajes de los cómics clásicos acudirán en ayuda de nuestros héroes a medida que el Universo Cinematográfico de Marvel continúa expandiéndose.', '/kdg6Y06jfq9FV7qknWNcKLYtBJn.jpg', 167, 'Acción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE `sala` (
  `CodSal` int(11) NOT NULL,
  `CodCin` int(11) NOT NULL,
  `Tipo` varchar(16) NOT NULL,
  `Libre` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`CodSal`, `CodCin`, `Tipo`, `Libre`) VALUES
(1, 1, '3D', 1),
(2, 1, '4k', 1),
(3, 1, '3D', 1),
(4, 1, '3D', 1),
(5, 1, '3D', 1),
(6, 2, '3D', 1),
(7, 2, '2D', 1),
(8, 2, '4K', 1),
(9, 2, 'HD', 1),
(10, 2, '3D', 1),
(11, 2, '2D', 1),
(12, 2, '4K', 1),
(13, 2, 'HD', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`CodAdm`);

--
-- Indices de la tabla `cine`
--
ALTER TABLE `cine`
  ADD PRIMARY KEY (`CodCin`),
  ADD KEY `CodAdm` (`CodAdm`);

--
-- Indices de la tabla `emision`
--
ALTER TABLE `emision`
  ADD PRIMARY KEY (`CodEmi`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`CodGen`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`CodPel`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`CodSal`,`CodCin`),
  ADD KEY `CodCin` (`CodCin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `CodAdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cine`
--
ALTER TABLE `cine`
  MODIFY `CodCin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `emision`
--
ALTER TABLE `emision`
  MODIFY `CodEmi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `CodGen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `CodPel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `CodSal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cine`
--
ALTER TABLE `cine`
  ADD CONSTRAINT `cine_ibfk_1` FOREIGN KEY (`CodAdm`) REFERENCES `administrador` (`CodAdm`);

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`CodCin`) REFERENCES `cine` (`CodCin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
