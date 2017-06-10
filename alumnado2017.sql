-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.16-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5130
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para alumnado
CREATE DATABASE IF NOT EXISTS `alumnado` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `alumnado`;

-- Volcando estructura para tabla alumnado.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `Apellido` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `numerodni` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.alumno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.carreras
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(80) NOT NULL,
  `DECRETO` varchar(30) NOT NULL,
  `idDIRECTOR` int(18) NOT NULL,
  `clave_carrera` varchar(3) NOT NULL,
  `pertenece` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_carreras_profesores` (`idDIRECTOR`),
  CONSTRAINT `FK_carreras_profesores` FOREIGN KEY (`idDIRECTOR`) REFERENCES `profesores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.carreras: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` (`id`, `NOMBRE`, `DECRETO`, `idDIRECTOR`, `clave_carrera`, `pertenece`) VALUES
	(3, 'Tecnicaruta Superior en Desarrollo de Sofware', 'asd', 1, 'asd', 'asd'),
	(4, 'Profesorado de Historia', 'asd', 1, 'asd', 'asd');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.carrera_alumno
CREATE TABLE IF NOT EXISTS `carrera_alumno` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `idalumno` int(18) NOT NULL,
  `idcarrera` int(18) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_carrera_alumno_alumno` (`idalumno`),
  KEY `FK_carrera_alumno_carreras` (`idcarrera`),
  CONSTRAINT `FK_carrera_alumno_alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`id`),
  CONSTRAINT `FK_carrera_alumno_carreras` FOREIGN KEY (`idcarrera`) REFERENCES `carreras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.carrera_alumno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `carrera_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrera_alumno` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.duracion
CREATE TABLE IF NOT EXISTS `duracion` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.duracion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `duracion` DISABLE KEYS */;
INSERT INTO `duracion` (`id`, `Descripcion`) VALUES
	(1, 'asd'),
	(2, 'dsa');
/*!40000 ALTER TABLE `duracion` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.fecha_rendir
CREATE TABLE IF NOT EXISTS `fecha_rendir` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `idmateria` int(18) NOT NULL,
  `Fecha_Rendir` varchar(50) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fecha_rendir_materia` (`idmateria`),
  CONSTRAINT `FK_fecha_rendir_materia` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.fecha_rendir: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fecha_rendir` DISABLE KEYS */;
/*!40000 ALTER TABLE `fecha_rendir` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.inscripcioncursado
CREATE TABLE IF NOT EXISTS `inscripcioncursado` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `idmateria` int(18) NOT NULL,
  `idalumno` int(18) NOT NULL,
  `fechainscripcion` varchar(50) NOT NULL,
  `año_lectivo` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `condicional` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_inscripcioncursado_materia` (`idmateria`),
  KEY `FK_inscripcioncursado_alumno` (`idalumno`),
  CONSTRAINT `FK_inscripcioncursado_alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`id`),
  CONSTRAINT `FK_inscripcioncursado_materia` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.inscripcioncursado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inscripcioncursado` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripcioncursado` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.inscripcionrendir
CREATE TABLE IF NOT EXISTS `inscripcionrendir` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `idalumno` int(18) NOT NULL,
  `idmateria` int(18) NOT NULL,
  `fechainsc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `turno` varchar(10) NOT NULL,
  `año_lectivo` int(10) NOT NULL,
  `condicion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__alumno` (`idalumno`),
  KEY `FK__materia` (`idmateria`),
  CONSTRAINT `FK__alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`id`),
  CONSTRAINT `FK__materia` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.inscripcionrendir: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inscripcionrendir` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripcionrendir` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.materia
CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(80) NOT NULL,
  `idCARRERA` int(18) NOT NULL,
  `AÑO` varchar(10) NOT NULL,
  `idPLANESTUDIO` int(18) NOT NULL,
  `idduracionmat` int(18) NOT NULL,
  `idPROFESOR` int(18) NOT NULL,
  `opcional` varchar(3) DEFAULT NULL,
  `Trabajo_Final` varchar(3) DEFAULT NULL,
  `Programa` text,
  PRIMARY KEY (`id`),
  KEY `FK_materias_carreras` (`idCARRERA`),
  KEY `FK_materias_duracion` (`idduracionmat`),
  KEY `FK_materias_planestudio` (`idPLANESTUDIO`),
  KEY `FK_materias_profesores` (`idPROFESOR`),
  CONSTRAINT `FK_materias_carreras` FOREIGN KEY (`idCARRERA`) REFERENCES `carreras` (`id`),
  CONSTRAINT `FK_materias_duracion` FOREIGN KEY (`idduracionmat`) REFERENCES `duracion` (`id`),
  CONSTRAINT `FK_materias_planestudio` FOREIGN KEY (`idPLANESTUDIO`) REFERENCES `planestudio` (`id`),
  CONSTRAINT `FK_materias_profesores` FOREIGN KEY (`idPROFESOR`) REFERENCES `profesores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.materia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id`, `NOMBRE`, `idCARRERA`, `AÑO`, `idPLANESTUDIO`, `idduracionmat`, `idPROFESOR`, `opcional`, `Trabajo_Final`, `Programa`) VALUES
	(3, 'Matematica I', 3, '1er Año', 1, 1, 1, NULL, NULL, 'asdasd'),
	(4, 'Laboratorio de Programacion I', 3, '2do Año', 1, 1, 1, NULL, NULL, 'asdasd'),
	(5, 'Matematina I', 4, '1er Año', 1, 1, 1, NULL, NULL, 'asdasd');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.materiasaprobada
CREATE TABLE IF NOT EXISTS `materiasaprobada` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `idmateria` int(18) NOT NULL,
  `idalumno` int(18) NOT NULL,
  `tipoAprobacion` varchar(15) NOT NULL,
  `Nacta` varchar(15) DEFAULT NULL,
  `fechaAprob` varchar(10) NOT NULL,
  `Nota` char(10) NOT NULL,
  `Nota_Letra` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_materiasaprobada_materia` (`idmateria`),
  KEY `FK_materiasaprobada_alumno` (`idalumno`),
  CONSTRAINT `FK_materiasaprobada_alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`id`),
  CONSTRAINT `FK_materiasaprobada_materia` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.materiasaprobada: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `materiasaprobada` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiasaprobada` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.materiasregulares
CREATE TABLE IF NOT EXISTS `materiasregulares` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `idmateria` int(18) NOT NULL,
  `idalumno` int(18) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `nota` char(10) NOT NULL,
  `vencimiento` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_materiasregulares_materia` (`idmateria`),
  KEY `FK_materiasregulares_alumno` (`idalumno`),
  CONSTRAINT `FK_materiasregulares_alumno` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`id`),
  CONSTRAINT `FK_materiasregulares_materia` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.materiasregulares: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `materiasregulares` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiasregulares` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.planestudio
CREATE TABLE IF NOT EXISTS `planestudio` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `Decreto` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.planestudio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `planestudio` DISABLE KEYS */;
INSERT INTO `planestudio` (`id`, `Decreto`) VALUES
	(1, 'asdasd');
/*!40000 ALTER TABLE `planestudio` ENABLE KEYS */;

-- Volcando estructura para tabla alumnado.profesores
CREATE TABLE IF NOT EXISTS `profesores` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(20) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alumnado.profesores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `profesores` DISABLE KEYS */;
INSERT INTO `profesores` (`id`, `apellido`, `nombres`, `DNI`) VALUES
	(1, 'esteban', 'kito', '12345678');
/*!40000 ALTER TABLE `profesores` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
