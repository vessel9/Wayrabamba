-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2021 a las 23:15:14
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `introduccion` text NOT NULL,
  `ruta` text NOT NULL,
  `contenido` text NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `introduccion`, `ruta`, `contenido`, `orden`) VALUES
(14, 'Fauna de las faldas del Cotopaxi ', 'La Provincia de Cotopaxi (AFI: [kotoËˆpaksi]) es una de las 24 provincias que conforman la RepÃºblica del Ecuador, situada al centro del paÃ­s,externos de la cordillera occidental en el oeste. Su capital ...', 'views/images/articulos/articulo365.jpg', 'La Provincia de Cotopaxi (AFI: [kotoËˆpaksi]) es una de las 24 provincias que conforman la RepÃºblica del Ecuador, situada al centro del paÃ­s, en la regiÃ³n interandina o Sierra, principalmente sobre la hoya de Patate en el este y en los flancos externos de la cordillera occidental en el oeste. Su capital administrativa es la ciudad de Latacunga, la cual ademÃ¡s es su urbe mÃ¡s grande y poblada. Ocupa un territorio de unos 6.085 kmÂ², siendo la dÃ©cima quinta provincia del paÃ­s por extensiÃ³n. Limita al norte con Pichincha, al sur con Tungurahua y BolÃ­var, por el occidente con Los RÃ­os y al oriente con Napo.\r\n\r\nEn el territorio cotopaxense habitan 488.716 personas, segÃºn la proyecciÃ³n demogrÃ¡fica del INEC para 2020, siendo la dÃ©cima segunda provincia mÃ¡s poblada del paÃ­s. La Provincia de Cotopaxi estÃ¡ constituida por 7 cantones, de las cuales se derivan sus respectivas parroquias urbanas y rurales. SegÃºn el Ãºltimo ordenamiento territorial, la provincia de Cotopaxi pertenecerÃ¡ a una regiÃ³n comprendida tambiÃ©n por las provincias de Chimborazo, Tungurahua y Pastaza, aunque no estÃ© oficialmente conformada, denominada RegiÃ³n Centro.', 3),
(16, 'Hora perfecta para fotografias', ' Luego el 11 de noviembre de 1811 es elevado a la categorÃ­a de Villa. DespuÃ©s de la fundaciÃ³n, empezÃ³ el reparto de marquesados: Maenza, Miraflores y Villa Orellana....', 'views/images/articulos/articulo974.jpg', 'Esta fiesta se lleva a cabo a finales de septiembre, los dÃ­as 23 y 24, dÃ­a del equinoccio de otoÃ±o, y que la Iglesia CatÃ³lica conmemora a la Virgen de la Merced; ademÃ¡s se celebra por las fiestas de independencia de la ciudad, el 11 de noviembre. Es un sincretismo religioso que goza de mucho colorido, alegrÃ­a y desorden pÃºblico, pues los miles de turistas nacionales y extranjeros que llegan a esta gran fiesta no sÃ³lo deleitan sus sentidos con la mÃºsica, los disfraces y el baile de las comparsas que conforman este festejo, sino del licor que es repartido a cuantos lo pidan. Pese a este detalle, la fiesta se vive como la representatividad del puro folclor nacional.\r\n\r\nLatacunga, ciudad incrustada en medio de los Andes ecuatorianos, en AmÃ©rica del Sur, guarda en su seno una manifestaciÃ³n socio cultural y folclÃ³rica Ãºnica, la Comparsa de la Mama Negra, tambiÃ©n llamada la SantÃ­sima Tragedia o la Fiesta de la CapitanÃ­a.\r\n\r\nSu origen se pierde en la historia, en una mezcla de manifestaciones populares mestizas: paganas y religiosas, aborÃ­genes, africanas y espaÃ±olas; las mismas que con sus personajes, ritos, atuendos, mÃºsica y baile dan vida y perdura en el tiempo tan singular expresiÃ³n de los sentimientos del pueblo, rememorados cada aÃ±o desde el S. XVII. En el S. XXI es una celebraciÃ³n en la que se rinde homenaje a la Virgen de la Merced a quien conceden segÃºn cuenta la tradiciÃ³n, la gratitud y reconocimiento por la protecciÃ³n en uno de los procesos eruptivos del VolcÃ¡n activo mÃ¡s alto del planeta, el Cotopaxi.\r\n\r\nEl 31 de octubre de 2005 el Instituto Nacional de Patrimonio Cultural acuerda \"Declarar como bien perteneciente al Patrimonio Cultural Inmaterial del Estado, a la fiesta de la Mama Negra o fiesta de la CapitanÃ­a\".', 2),
(17, 'VolcÃ¡n deja ver su Cielo', 'Es uno de los mÃ¡s importantes centros administrativos, econÃ³micos, financieros y comerciales del centro del Ecuador. Lo principal de la provincia son el comercio, la ganaderÃ­a, la industria y la agricultura....', 'views/images/articulos/articulo463.jpg', 'Es uno de los mÃ¡s importantes centros administrativos, econÃ³micos, financieros y comerciales del centro del Ecuador. El desarrollo de la industria en la provincia, en general se basÃ³ en las destrezas manuales de su habitantes. Las actividades principales de la provincia son el comercio, la ganaderÃ­a, la industria y la agricultura.\r\n\r\nTuvo distintos perÃ­odos migratorios provenientes de la serranÃ­a como los panzaleos. MÃ¡s adelante fue conquistada por los incas al mando de Huayna CÃ¡pac. La colonizaciÃ³n espaÃ±ola se dio con la fundaciÃ³n espaÃ±ola del ', 1),
(18, 'Lado noreste actividades', 'Los realistas se encontraban en el techo, desde allÃ­ podÃ­an fusilar a los patriotas, pero Juan JosÃ© Linares dio muerte al comandante, logrando la rendiciÃ³n de los espaÃ±oles. Entre algunos de los patriotas de ese dÃ­a estÃ¡n: Antonio Tapia, Francisco Salazar, ....', 'views/images/articulos/articulo964.jpg', 'En diciembre de 1808, los marqueses se reunieron en Tilipulo y Salache para preparar el grito de independencia del 10 de agosto de 1809. Luis Fernando Vivero, fue escogido el 9 de octubre de 1820 para secretario de la Junta de Gobierno de Guayaquil. El 11 de noviembre de 1811, la Junta Superior de Quito elevÃ³ a Latacunga a la categorÃ­a de Villa. DespuÃ©s de haber apoyado a la Independencia de Guayaquil; los patriotas de Latacunga, se organizaron durante los primeros dÃ­as de noviembre; es asÃ­ como atacan el cuartel realista Fernando SÃ¡enz de Viteri y Felipe Barba; mientras que Lizardo Ruiz y Calixto GonzÃ¡lez del Pino con jÃ³venes latacungueÃ±os, toman la fÃ¡brica de pÃ³lvora y luego llegan al convento de Santo Domingo, donde estaba el comandante Miguel Morales con una parte del BatallÃ³n Los Andes.\r\n\r\nLos realistas se encontraban en el techo, desde allÃ­ podÃ­an fusilar a los patriotas, pero Juan JosÃ© Linares dio muerte al comandante, logrando la rendiciÃ³n de los espaÃ±oles. Entre algunos de los patriotas de ese dÃ­a estÃ¡n: Antonio Tapia, Francisco Salazar, JosÃ© MarÃ­a Alvear, Josefa Calixto, MarÃ­a Rosa Vela de PÃ¡ez. Miguel Baca, Francisco Flor, Vicente Viteri Lomas, Luis PÃ©rez de Anda y Mariano JÃ¡come de 16 aÃ±os de edad, quienes proclamaron la Independencia de Latacunga, que se consolidÃ³ con la batalla de Pichincha. El 29 de noviembre de 1822 el Libertador SimÃ³n BolÃ­var llegÃ³ a Latacunga.', 4),
(19, 'ErupciÃ³n del volcÃ¡n', ' Cada uno de los cantones son administrados a travÃ©s de una municipalidad y un consejo cantonal, los cuales son elegidos por la poblaciÃ³n de sus respectivos cantones. La responsabilidad de estos cantones es realizar el mantenimiento...', 'views/images/articulos/articulo467.jpg', 'Cotopaxi estÃ¡ dividido en siete cantones, que a su vez estÃ¡n conformados por parroquias urbanas y rurales. Cada uno de los cantones son administrados a travÃ©s de una municipalidad y un consejo cantonal, los cuales son elegidos por la poblaciÃ³n de sus respectivos cantones. La responsabilidad de estos cantones es realizar el mantenimiento de carreteras, administrar los presupuestos del gobierno del estado para programas de asistencia social y econÃ³mica, y administrar, infraestructuras tales como parques y sistemas de saneamiento bÃ¡sico.\r\n\r\nCantÃ³n	Pob. (2010)	Ãrea (kmÂ²)	Cabecera Cantonal\r\nBandera de la ManÃ¡.png	La ManÃ¡	42.216	663	La ManÃ¡\r\nBandera de Latacunga	Latacunga	170.489	1.377	Latacunga\r\nBandera de Pangua.png	Pangua	21.965	721	El CorazÃ³n\r\nBandera del CantÃ³n PujilÃ­.png	PujilÃ­	69.055	1.308	PujilÃ­\r\nBandera de Salcedo.png	Salcedo	58.216	484	Salcedo\r\nBandera de SaquisilÃ­.png	SaquisilÃ­	25.320	208	SaquisilÃ­\r\nBandera de Sigchos.png	Sigchos	21.944	1.313	Sigchos\r\n', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Comida'),
(2, 'Hospedaje'),
(3, 'Tour'),
(4, 'Vestimenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `ruta`, `orden`) VALUES
(17, '../../views/images/galeria/galeria511.jpg', 5),
(19, '../../views/images/galeria/galeria192.jpg', 3),
(20, '../../views/images/galeria/galeria841.jpg', 1),
(21, '../../views/images/galeria/galeria314.jpg', 2),
(22, '../../views/images/galeria/galeria682.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `mensaje`, `fecha`, `revision`) VALUES
(10, 'Natalia', 'naty@hotmail.com', 'Lorem ipsum 2 dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2016-12-13 15:59:57', 1),
(11, 'Miguel', 'miguel@hotmail.com', 'Lorem ipsum 1 dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2017-01-13 14:07:02', 1),
(12, 'Ana', 'ana@hotmail.com', 'Lorem ipsum 1 dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2017-01-13 14:15:19', 1),
(13, 'Maria', 'maria@hotmail.com', 'Lorem ipsum 1 dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2017-01-13 14:27:51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `idNegocio` int(11) NOT NULL,
  `nombreNegocio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `imagenNegocio` text CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`idNegocio`, `nombreNegocio`, `imagenNegocio`, `telefono`, `direccion`, `ubicacion`) VALUES
(1, 'Heladeria Tradicional SanFelip', '', '0921321123', 'OE4 SAN CAR 123 Y TEJO TREBOL ', 'EQWFEQWFEEEFQW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoservicio`
--

CREATE TABLE `productoservicio` (
  `idproductoServicio` int(11) NOT NULL,
  `nombreProductoServicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `imagenRuta` text CHARACTER SET latin1 NOT NULL,
  `idTipoProductoServicio` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idNegocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productoservicio`
--

INSERT INTO `productoservicio` (`idproductoServicio`, `nombreProductoServicio`, `descripcion`, `imagenRuta`, `idTipoProductoServicio`, `idCategoria`, `idNegocio`) VALUES
(1, 'helado salcedo', 'heklado de 3 capas con sabor a mora vainilla y taxo.', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `ruta`, `titulo`, `descripcion`, `orden`) VALUES
(60, '../../views/images/slide/slide913.jpg', 'Cotopaxi con cielo despejado', 'Ven y disfruta del un fin de semana en las faldas del volcÃ¡n', 0),
(63, '../../views/images/slide/slide859.jpg', 'Faldas del volcÃ¡n cerca hospedaje  ', 'hospÃ©date en nuestras cabaÃ±as y disfruta de nuestro paquete con comida ropa y actividades incluidas', 0),
(64, '../../views/images/slide/slide915.jpg', 'Mirador para increÃ­bles fotografÃ­as', 'Te ayudamos para conservar hermosos momentos en nuestro mirardor. ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `revision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `nombre`, `email`, `revision`) VALUES
(1, 'Juan Urrego', 'juanustudio@hotmail.com', 1),
(3, 'Natalia', 'naty@hotmail.com', 1),
(4, 'Miguel', 'miguel@hotmail.com', 1),
(5, 'Ana', 'ana@hotmail.com', 1),
(6, 'Maria', 'maria@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproductoservicio`
--

CREATE TABLE `tipoproductoservicio` (
  `idTipoProductoServicio` int(11) NOT NULL,
  `nombreTipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipoproductoservicio`
--

INSERT INTO `tipoproductoservicio` (`idTipoProductoServicio`, `nombreTipo`) VALUES
(1, 'Producto'),
(2, 'Servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `photo` text NOT NULL,
  `rol` int(11) NOT NULL,
  `intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `photo`, `rol`, `intentos`) VALUES
(3, 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'admin@hotmail.com', 'views/images/perfiles/perfil847.jpg', 0, 0),
(6, 'pepe', '$2a$07$asxx54ahjppf45sd87a5auxq/SS293XhTEeizKWMnfhnpfay0AALe', 'pepe@hotmail.com', 'views/images/perfiles/perfil894.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `ruta`, `orden`) VALUES
(20, '../../views/videos/video171.mp4', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`idNegocio`);

--
-- Indices de la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  ADD PRIMARY KEY (`idproductoServicio`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idTipoProductoServicio` (`idTipoProductoServicio`),
  ADD KEY `idNegocio` (`idNegocio`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoproductoservicio`
--
ALTER TABLE `tipoproductoservicio`
  ADD PRIMARY KEY (`idTipoProductoServicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `idNegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  MODIFY `idproductoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipoproductoservicio`
--
ALTER TABLE `tipoproductoservicio`
  MODIFY `idTipoProductoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productoservicio`
--
ALTER TABLE `productoservicio`
  ADD CONSTRAINT `fk_productoservicio_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productoservicio_negocio` FOREIGN KEY (`idNegocio`) REFERENCES `negocio` (`idNegocio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productoservicio_tipoproductoservicio` FOREIGN KEY (`idTipoProductoServicio`) REFERENCES `tipoproductoservicio` (`idTipoProductoServicio`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
