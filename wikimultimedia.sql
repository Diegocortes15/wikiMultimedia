-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2021 at 11:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikimultimedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `autor_articulo` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_articulo` date NOT NULL,
  `titulo_articulo` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `resumen_articulo` text COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo_articulo` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `contenido_articulo` text COLLATE utf8_unicode_ci NOT NULL,
  `multimedia_articulo` text COLLATE utf8_unicode_ci NOT NULL,
  `categoria_articulo` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `referencias_articulo` text COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `autor_articulo`, `fecha_articulo`, `titulo_articulo`, `resumen_articulo`, `subtitulo_articulo`, `contenido_articulo`, `multimedia_articulo`, `categoria_articulo`, `referencias_articulo`, `usuario_id`) VALUES
(1, 'admin_wikimultimedia', '2020-04-09', '¿Qué es Modelado 3D?', 'Es el proceso de desarrollo de una representación matemática de cualquier objeto tridimensional (inanimado o vivo) a través de un software especializado. Al producto se le llama modelo 3D.', 'Modelos', 'Los modelos 3D representan un objeto tridimensional usando una colección de puntos en el espacio dentro de un espacio 3D, conectados por varias entidades geométricas tales como triángulos, líneas, superficies curvas, etc. Siendo una colección de datos (puntos y otro tipo de información), los modelos 3D pueden ser hechos a mano, a través de algoritmos o bien escaneados.\r\n\r\nLos modelos 3D son ampliamente usados en gráficos 3D. De hecho, su uso pre-data se extiende al uso de gráficos 3D en ordenadores. Algunos videojuegos usan imágenes pre-renderizadas de modelos 3D como sprites antes de que los ordenadores pudieran renderizarlas en tiempo real.\r\n\r\nHoy en día, los modelos 3D son usados en una amplia variedad de campos. La industria médica usa modelos detallados de órganos; esto puede ser creado con múltiples partes de imágenes 2-D de un MRI o escáner CT. La industria del cine lo usa como personajes y objetos para la animación o la realidad motion pictures. La industria de los videojuegos video game industry los utiliza como recurso para videojuegos. El sector científico los utiliza como modelos altamente detallados de componentes químicos.2​ La industria de la arquitectura los utiliza para demostrar las propuestas de edificios y panoramas a través de Software Architectural Models. La comunidad ingeniera lo utiliza para diseños de nuevos artefactos, vehículos y estructuras así como portador de otros usos. En décadas recientes la comunidad de las ciencias de la tierra ha empezado a construir modelos geológicos 3D como una práctica estándar. Los modelos 3D también pueden ser la base para los aparatos físicos que son construidos con impresoras 3D o CNC machines.', 'archivos_articulos/1/MALEFACE.jpg', 'modelado3d', 'https://es.wikipedia.org/wiki/Modelado_3D', 1),
(2, 'admin_wikimultimedia', '2020-04-09', 'Procesamiento digital de imágenes', 'El procesamiento de imágenes digitales es el conjunto de técnicas que se aplican a las imágenes digitales con el objetivo de mejorar la calidad o facilitar la búsqueda de información.', 'Proceso de filtrado', 'Es el conjunto de técnicas englobadas dentro del preprocesamiento de imágenes cuyo objetivo fundamental es obtener, a partir de una imagen origen, otra final cuyo resultado sea más adecuado para una aplicación específica mejorando ciertas características de la misma que posibilite efectuar operaciones del procesado sobre ella.\r\n\r\nLos principales objetivos que se persiguen con la aplicación de filtros son:\r\n\r\nSuavizar la imagen: reducir la cantidad de variaciones de intensidad entre píxeles vecinos.\r\n\r\nEliminar ruido: eliminar aquellos píxeles cuyo nivel de intensidad es muy diferente al de sus vecinos y cuyo origen puede estar tanto en el proceso de adquisición de la imagen como en el de transmisión.\r\n\r\nRealzar bordes: destacar los bordes que se localizan en una imagen.\r\n\r\nDetectar bordes: detectar los píxeles donde se produce un cambio brusco en la función intensidad.\r\n\r\nPor tanto, se consideran los filtros como operaciones que se aplican a los píxeles de una imagen digital para optimizarla, enfatizar cierta información o conseguir un efecto especial en ella.\r\n\r\nEl proceso de filtrado puede llevarse a cabo sobre los dominios de frecuencia y/o espacio.\r\n\r\nFiltrado en el dominio de la frecuencia\r\n\r\nLos filtros de frecuencia procesan una imagen trabajando sobre el dominio de la frecuencia en la Transformada de Fourier de la imagen. Para ello, ésta se modifica siguiendo el Teorema de la Convolución correspondiente:\r\n\r\nse aplica la Transformada de Fourier,\r\nse multiplica posteriormente por la función del filtro que ha sido escogido,\r\npara concluir re-transformándola al dominio espacial empleando la Transformada Inversa de Fourier.\r\nTeorema de la Convolución (frecuencia): {displaystyle G(u,v)=F(u,v)*H(u,v)}{displaystyle G(u,v)=F(u,v)*H(u,v)}\r\n\r\nF(u,v): transformada de Fourier de la imagen original.\r\n\r\nH(u,v): filtro atenuador de frecuencias.\r\n\r\nComo la multiplicación en el espacio de Fourier es idéntica a la convolución en el dominio espacial, todos los filtros podrían, en teoría, ser implementados como un filtro espacial.', 'archivos_articulos/1/Filtrado_ejemplos.jpg', 'procesamiento_imagenes', 'https://es.wikipedia.org/wiki/Procesamiento_digital_de_im%C3%A1genes', 1),
(3, 'admin_wikimultimedia', '2020-04-09', 'Animación 2D: todo lo que debe saber al respecto', 'Es uno de los principales tipos de animación. Es ampliamente utilizada para crear películas animadas, dibujos animados, videos de marketing, anuncios, materiales educativos, videojuegos y mucho más.', '¿Qué es la Animación 2D?', 'La animación bidimensional o 2D se caracteriza por tener sus objetos y personajes creados en el espacio bidimensional. Significa que sólo tienen ancho y alto.\r\n\r\nSe considera un estilo de animación tradicional, conocido desde el siglo XIX. Inicialmente, se creó al juntar los fotogramas en los que un dibujo fue seguido por otro que difería ligeramente de él. Cada segundo incluye 24 fotogramas.\r\n\r\nTodos recordamos las animaciones clásicas de Disney, ¿verdad? Blancanieves y los siete enanitos, Bambi, La Sirenita, etc. Son algunas de las animaciones 2D más populares.\r\n\r\nCon el desarrollo de tecnologías informáticas, este proceso también se digitalizó a través de varios programas de animación con la opción de dibujar los personajes y fondos directamente en la computadora y animarlos.\r\n\r\nAhora, aprendamos más sobre cómo se crea la animación 2D. El proceso consta de 3 fases principales: preproducción, producción y postproducción. Veamos qué incluye cada uno de ellos.\r\n\r\nPreproducción\r\n\r\nEl proceso de preproducción es la primera etapa de creación de animaciones. Durante esta etapa, el equipo de animación desarrolla la historia y escribe el guión de la animación, diseña los personajes, crea un guión gráfico, elige las paletas de colores, prepara los fondos y graba el voice-over. Esta es una etapa de preparación para el proceso principal, por lo que debe realizarse correctamente.\r\n\r\nUn guión bien escrito debe implicar todas las acciones visuales y la historia. El guión gráfico se basa en el guión, por lo que representa visualmente la secuencia de acciones y eventos al mostrar cómo están organizados.\r\n\r\nEl siguiente paso es crear los personajes, delinear los fondos y preparar otros elementos visuales de la animación. Comienza a partir de bocetos simples y se convierte en diseños e imágenes detallados. Luego, es hora de decidir las paletas de colores de la animación, incluidos los colores de varios objetos e iluminación.\r\n\r\nOtra parte importante de cualquier animación son los fondos donde las diferentes acciones cobran vida y los personajes realizan sus actividades.\r\n\r\nDurante el proceso de preproducción, se bosquejan los principales diseños de fondo, basados en el guión gráfico. Los bocetos preparados se pintarán durante el proceso de producción.\r\n\r\nProducción\r\n\r\nLa producción es el proceso de crear la animación reuniendo todos los materiales creados y produciendo las escenas. Esto incluye pintar los fondos, crear escenas individuales y actividades de los personajes, hacer la animación aproximada, limpiar la animación (trazado), tweening (intermediación), colorear y pintar los dibujos con la ayuda de un software de computadora, composición y exportación.\r\n\r\nPara unir todo, los animadores crean una hoja de exposición que incluye todas las instrucciones de cómo hacer cada escena. La hoja de exposición se divide en 5 partes:\r\n\r\nAcciones y tiempo\r\nDiálogos y música\r\nCapas de animación\r\nFondos\r\nPerspectiva de vista\r\n\r\nUna vez que se cree la animación aproximada, debe limpiarse y pulirse. Este proceso también se llama trazado y se puede hacer de dos maneras: en una nueva capa o directamente sobre la misma capa con diferentes colores.\r\n\r\nEl tweening se utiliza para hacer una animación suave agregando dibujos adicionales entre dos fotogramas. Por ejemplo, si desea crear una escena de pelota que rebota, debe dibujar fotogramas de transición entre la primera escena donde la pelota está en la parte superior y el segundo fotograma donde la pelota está en el suelo.\r\n\r\nUna vez que los fotogramas están completamente listos, se escanean en una computadora, si no se dibujan digitalmente. Entonces, es hora de combinar todos los elementos visuales basados en la hoja de exposición. Durante el proceso de composición, los especialistas agregan los fondos, fotogramas, sonidos y cualquier otro efecto que se requiera.\r\n\r\nEsto se logra principalmente a través de diferentes programas de animación. Cuando finaliza el proceso de composición, las escenas animadas se representan como videos o películas.\r\n\r\nPostproducción\r\n\r\nLa postproducción es el proceso de edición final de la animación 2D. Durante esta fase, la animación se mejora con efectos de sonido o grabaciones adicionales que aumentan el impacto emocional de la animación. Una vez que la versión final está lista, se procesa y exporta a diferentes formatos.\r\n\r\nEstos eran los principios básicos de la animación 2D y su proceso de creación que todo principiante debería conocer. Para convertirse en un animador avanzado, debe aprender más sobre las técnicas y las mejores prácticas para hacer animaciones.', 'archivos_articulos/1/t8zetau.gif', 'animacion', 'https://www.renderforest.com/es/blog/2d-animation\r\nhttps://revistabonaria.com/2016/10/19/una-breve-historia-de-la-animacion-2d/', 1),
(9, 'u1201954', '2020-04-10', 'JavaScript', 'Es un lenguaje ligero e interpretado, orientado a objetos con funciones de primera clase, más conocido como el lenguaje de script para páginas web, pero también usado en muchos entornos sin navegador, tales como node.js, Apache CouchDB y Adobe Acrobat. Es un lenguaje script multi-paradigma, basado en prototipos, dinámico, soporta estilos de programación funcional, orientada a objetos e imperativa. Leer más sobre JavaScript.', 'Para completos novatos', 'Adéntrate en nuestro tema de Aprendizaje de JavaScript si quieres aprender JavaScript pero no tienes experiencia previa en este lenguaje o en programación. Los siguientes son los módulos disponibles:\r\n\r\nPrimeros pasos en JavaScript\r\n\r\nResponde algunas preguntas fundamentales como \"¿qué es JavaScript?\", \"¿cómo luce?\" y \"¿qué puedo hacer?\", junto con las discusiones de las características principales del lenguaje como variables, cadenas, números, y arrays\r\nBloques de construcción de JavaScript\r\n\r\nContinúa nuestra cobertura de las características principales de JavaScript, poniendo nuestra atención a tipos de bloques de código comúnmente encontrados como declaraciones condicionales, bucles, funciones y eventos.\r\nPresentando a los Objetos en JavaScript\r\n\r\nSi quieres profundizar tu conocimiento y escribir código más eficiente, es importante ententer la naturaleza orientada a objetos de este lenguaje. Por eso, te brindamos este módulo para ayudarte.', 'archivos_articulos/2/JavaScript.png', 'lenguajes_de_programacion', 'https://developer.mozilla.org/es/docs/Web/JavaScript', 2),
(17, 'admin_wikimultimedia', '2020-04-14', '¿Qué es C++?', 'C++ es un lenguaje de programación diseñado en 1979 por Bjarne Stroustrup. La intención de su creación fue extender al lenguaje de programación C mecanismos que permiten la manipulación de objetos. En ese sentido, desde el punto de vista de los lenguajes orientados a objetos, el C++ es un lenguaje híbrido.', 'Características de C++', '-Su sintaxis es heredada del lenguaje C.\r\n-Programa orientado a objetos (POO).\r\n-Permite la agrupación de instrucciones.\r\n-Lenguaje muy didáctico, con este lenguaje puedes aprender muchos otros lenguajes con gran facilidad.\r\n-Es portátil y tiene un gran número de compiladores en diferentes plataformas y sistemas operativos.\r\n-Permite la separación de un programa en módulos que admiten compilación independiente.\r\n-Es un lenguaje de alto nivel.', 'archivos_articulos/1/c-plus-plus-logo.png', 'lenguajes_de_programacion', 'https://es.wikipedia.org/wiki/C%2B%2B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id_usuario` int(11) NOT NULL,
  `correo_usuario` varchar(60) NOT NULL,
  `contrasenia_usuario` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registros`
--

INSERT INTO `registros` (`id_usuario`, `correo_usuario`, `contrasenia_usuario`) VALUES
(1, 'admin_wikimultimedia@gmail.com', '$2y$07$/sEBQ1YPuBi4glkhRJVAHOnWIkqJZ3hGHg7wOdb9wKN6F78vAZVpO'),
(2, 'u1201954@unimilitar.edu.co', '$2y$07$EdZcZSHh3ZvDuhbfz3L/5usptYC1RIKSlEje04mwjdQpJycgkDMtK'),
(3, 'noexisto@gmail.com', '$2y$07$FGzxkyR1rKz6R31ChO57MOGvekzHbJ60PxG/d0H8cZUIfiSRUIfw2'),
(5, 'Jonathansteven.gc@gmail.com', '$2y$07$SNN2UlgyaA/WvUquOzLmH.9Amwx8PUpjJlE15gxhcP3HBKUaELNU2'),
(7, 'johan.buitrago04@gmail.com', '$2y$07$/qw9fAj9QRTbe6QC2dfTMe1xXg1ofjHQn3po8aHz9c8lrmCpIHfpy'),
(8, 'u1201610@unimilitar.edu.co', '$2y$07$gNwG51sgoMMc0l/sF.3s7.QHU7d.AGOM3lekvLRFJ/I7rurpYCbsq'),
(9, 'nicolasdpf@hotmail.com', '$2y$07$hzC79DjltV4cMT3bKEDi.eYUkMttHWOExnyaSunf9y/kjsR/wyirK'),
(10, 'u1201966@unimilitar.edu.co', '$2y$07$JhQ718mS7qbMlbRZZpA1M.3LF5J515z628arbvbEZorPYJfyCn74e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `registros` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
