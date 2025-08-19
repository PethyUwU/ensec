-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2025 at 02:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensec`
--

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `carrera` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `carrera`) VALUES
(1, 'Sistemas informaticos '),
(2, 'administracion de empresas '),
(3, 'comercio internacional'),
(4, 'contaduria general'),
(5, 'secretariado ejecutivo ');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `curso` varchar(50) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id_curso`, `curso`, `id_carrera`) VALUES
(1, 'primero', 1),
(2, 'segundo', 1),
(3, 'tercero', 1),
(4, 'segundo', 5),
(5, 'segundo', 5);

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `id_usuario`) VALUES
(1, 18),
(2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `gestiones`
--

CREATE TABLE `gestiones` (
  `id_gestion` int(11) NOT NULL,
  `gestion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gestiones`
--

INSERT INTO `gestiones` (`id_gestion`, `gestion`) VALUES
(1, '2000'),
(2, '2001'),
(3, '2002'),
(4, '2003'),
(5, '2004'),
(6, '2005'),
(7, '2006'),
(8, '2007'),
(9, '2008'),
(10, '2009'),
(11, '2010'),
(12, '2011'),
(13, '2012'),
(14, '2013'),
(15, '2014'),
(16, '2015'),
(17, '2016'),
(18, '2017'),
(19, '2018'),
(20, '2019'),
(21, '2020'),
(22, '2021'),
(23, '2022'),
(24, '2023'),
(25, '2024'),
(26, '2025');

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_gestion` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_turno` int(11) DEFAULT NULL,
  `fecha_inscripcion` datetime DEFAULT NULL,
  `id_responsable` varchar(11) NOT NULL,
  `id_paralelo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscripcion`
--

INSERT INTO `inscripcion` (`id_inscripcion`, `id_usuario`, `id_gestion`, `id_curso`, `id_carrera`, `id_turno`, `fecha_inscripcion`, `id_responsable`, `id_paralelo`) VALUES
(1, 21, 26, 3, 1, 1, '2025-06-27 01:10:50', '', NULL),
(2, 21, 26, 3, 1, 1, '2025-06-27 01:10:50', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `licencias`
--

CREATE TABLE `licencias` (
  `id_licencia` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `motivo` varchar(10) NOT NULL,
  `justificativo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `licencias`
--

INSERT INTO `licencias` (`id_licencia`, `id_estudiante`, `id_carrera`, `id_curso`, `fecha_inicio`, `fecha_fin`, `motivo`, `justificativo`) VALUES
(13, 6, 14, 30, '2025-06-10', '2025-06-15', 'Viaje', 'vistas/archivos/licencias/685173a4c082b_ELISEO.pdf'),
(22, 4, 14, 28, '2025-05-31', '2025-04-28', 'Médica', 'vistas/archivos/licencias/685d6bc195ec0_ELISEO.pdf'),
(24, 1, 1, 1, '2025-06-04', '2025-06-05', 'Médica', 'vistas/archivos/licencias/685e174a3b5f0_certificado medico.pdf'),
(25, 1, 1, 1, '2025-06-18', '0000-00-00', 'Médica', 'vistas/archivos/licencias/685ea9ec9933d_certificado medico.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `paralelos`
--

CREATE TABLE `paralelos` (
  `id_paralelo` int(11) NOT NULL,
  `paralelo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paralelos`
--

INSERT INTO `paralelos` (`id_paralelo`, `paralelo`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`id_turno`, `turno`, `hora_inicio`, `hora_fin`) VALUES
(1, 'Mañana', '07:45:00', '12:30:00'),
(2, 'Noche', '06:45:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(30) DEFAULT NULL,
  `apellidoP` varchar(30) DEFAULT NULL,
  `usuario` text DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `perfil` text DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `gmail` text DEFAULT NULL,
  `profesion` text DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoM`, `apellidoP`, `usuario`, `celular`, `foto`, `password`, `perfil`, `ultimo_login`, `gmail`, `profesion`, `estado`) VALUES
(1, 'Administrador', 'Loza', 'Pérez', 'admin', '70011223', 'vistas/img/usuarios/admin/191.jpg', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', '2025-05-21 19:23:06', 'admin@sistema.com', 'Ingeniería de Sistemas', 1),
(18, 'Juan Fernando Urrego', 'Pérez', 'Urrego', 'juan', '71234567', 'vistas/img/usuarios/juan/790.jpg', '$2a$07$asxx54ahjppf45sd87a5auwRi.z6UsW7kVIpm0CUEuCpmsvT2sG6O', 'Vendedor', '2017-12-21 12:07:24', 'juan@gmail.com', 'Administración', 1),
(19, 'Julio Gómez', 'Ramírez', 'Gómez', 'julio', '73456789', 'vistas/img/usuarios/julio/545.jpg', '$2a$07$asxx54ahjppf45sd87a5auQhldmFjGsrgUipGlmQgDAcqevQZSAAC', 'Especial', '2017-12-21 12:07:39', 'julio@gmail.com', 'Contaduría', 0),
(20, 'Ana Gonzalez', 'Mendoza', 'Gonzalez', 'ana', '76543210', 'vistas/img/usuarios/ana/268.jpg', '$2a$07$asxx54ahjppf45sd87a5auLd2AxYsA/2BbmGKNk2kMChC3oj7V0Ca', 'Vendedor', '2017-12-23 15:28:37', 'ana@gmail.com', 'Sistemas', 1),
(21, 'Eliane', 'Correa', 'Guarachi', 'eliane', '123123', '', 'eliane', 'Estudiante', '2025-06-26 09:30:00', 'eliane@gmail.com', 'Informática', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indexes for table `gestiones`
--
ALTER TABLE `gestiones`
  ADD PRIMARY KEY (`id_gestion`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_gestion` (`id_gestion`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_turno` (`id_turno`),
  ADD KEY `id_paralelo` (`id_paralelo`);

--
-- Indexes for table `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id_licencia`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `paralelos`
--
ALTER TABLE `paralelos`
  ADD PRIMARY KEY (`id_paralelo`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gestiones`
--
ALTER TABLE `gestiones`
  MODIFY `id_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `paralelos`
--
ALTER TABLE `paralelos`
  MODIFY `id_paralelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`);

--
-- Constraints for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`id_gestion`) REFERENCES `gestiones` (`id_gestion`),
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `inscripcion_ibfk_4` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`),
  ADD CONSTRAINT `inscripcion_ibfk_5` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`),
  ADD CONSTRAINT `inscripcion_ibfk_6` FOREIGN KEY (`id_paralelo`) REFERENCES `paralelos` (`id_paralelo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
