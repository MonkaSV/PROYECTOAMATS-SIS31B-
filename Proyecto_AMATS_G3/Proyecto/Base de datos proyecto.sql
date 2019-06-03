/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.37-MariaDB : Database - encuestasmaker
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`encuestasmaker` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `encuestasmaker`;

/*Table structure for table `carreras_itca` */

DROP TABLE IF EXISTS `carreras_itca`;

CREATE TABLE `carreras_itca` (
  `ID_carreras` int(5) unsigned zerofill NOT NULL,
  `nombre_carrera` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID_carreras`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `carreras_itca` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `ID_cliente` int(5) unsigned zerofill NOT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Clave` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

/*Table structure for table `encuesta` */

DROP TABLE IF EXISTS `encuesta`;

CREATE TABLE `encuesta` (
  `ID_encuesta` int(5) unsigned zerofill NOT NULL,
  `Nombre_encuesta` varchar(50) DEFAULT NULL,
  `Cantidad_preguntas` int(5) unsigned zerofill DEFAULT NULL,
  `Comentario` blob,
  `Tipo_encuesta` varchar(50) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  PRIMARY KEY (`ID_encuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `encuesta` */

/*Table structure for table `encuestas_por_cliente` */

DROP TABLE IF EXISTS `encuestas_por_cliente`;

CREATE TABLE `encuestas_por_cliente` (
  `ID_encuesta` int(5) unsigned zerofill DEFAULT NULL,
  `ID_cliente` int(5) unsigned zerofill DEFAULT NULL,
  KEY `ID_encuesta` (`ID_encuesta`),
  KEY `ID_cliente` (`ID_cliente`),
  CONSTRAINT `encuestas_por_cliente_ibfk_1` FOREIGN KEY (`ID_encuesta`) REFERENCES `encuesta` (`ID_encuesta`),
  CONSTRAINT `encuestas_por_cliente_ibfk_2` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `encuestas_por_cliente` */

/*Table structure for table `especialidad_bachillerato` */

DROP TABLE IF EXISTS `especialidad_bachillerato`;

CREATE TABLE `especialidad_bachillerato` (
  `ID_especialidad` int(5) unsigned zerofill NOT NULL,
  `nombre_especialidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_especialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `especialidad_bachillerato` */

/*Table structure for table `institutos` */

DROP TABLE IF EXISTS `institutos`;

CREATE TABLE `institutos` (
  `ID_instituto` int(5) unsigned zerofill NOT NULL,
  `Nombre_instituto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_instituto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `institutos` */

/*Table structure for table `medios` */

DROP TABLE IF EXISTS `medios`;

CREATE TABLE `medios` (
  `ID_medio` int(5) unsigned zerofill NOT NULL,
  `nombre_medio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_medio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medios` */

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `ID_pregunta` int(5) unsigned zerofill NOT NULL,
  `pregunta` blob,
  `ID_tipo` int(5) unsigned zerofill NOT NULL,
  `ID_carreras` int(5) unsigned zerofill DEFAULT NULL,
  `ID_especialidad` int(5) unsigned zerofill DEFAULT NULL,
  `ID_instituto` int(5) unsigned zerofill DEFAULT NULL,
  `ID_medio` int(5) unsigned zerofill DEFAULT NULL,
  `ID_universidad` int(5) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`ID_pregunta`),
  KEY `ID_tipo` (`ID_tipo`),
  KEY `ID_carreras` (`ID_carreras`),
  KEY `ID_especialidad` (`ID_especialidad`),
  KEY `ID_instituto` (`ID_instituto`),
  KEY `ID_medio` (`ID_medio`),
  KEY `ID_universidad` (`ID_universidad`),
  CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`ID_tipo`) REFERENCES `tipo_preguntas` (`ID_tipo`),
  CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`ID_carreras`) REFERENCES `carreras_itca` (`ID_carreras`),
  CONSTRAINT `preguntas_ibfk_3` FOREIGN KEY (`ID_especialidad`) REFERENCES `especialidad_bachillerato` (`ID_especialidad`),
  CONSTRAINT `preguntas_ibfk_4` FOREIGN KEY (`ID_instituto`) REFERENCES `institutos` (`ID_instituto`),
  CONSTRAINT `preguntas_ibfk_5` FOREIGN KEY (`ID_medio`) REFERENCES `medios` (`ID_medio`),
  CONSTRAINT `preguntas_ibfk_6` FOREIGN KEY (`ID_universidad`) REFERENCES `universidades` (`ID_universidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `preguntas` */

/*Table structure for table `preguntas_por_encuesta` */

DROP TABLE IF EXISTS `preguntas_por_encuesta`;

CREATE TABLE `preguntas_por_encuesta` (
  `ID_encuesta` int(5) unsigned zerofill DEFAULT NULL,
  `ID_pregunta` int(5) unsigned zerofill DEFAULT NULL,
  KEY `ID_encuesta` (`ID_encuesta`),
  KEY `ID_pregunta` (`ID_pregunta`),
  CONSTRAINT `preguntas_por_encuesta_ibfk_1` FOREIGN KEY (`ID_encuesta`) REFERENCES `encuesta` (`ID_encuesta`),
  CONSTRAINT `preguntas_por_encuesta_ibfk_2` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `preguntas_por_encuesta` */

/*Table structure for table `respuesta_por_cliente` */

DROP TABLE IF EXISTS `respuesta_por_cliente`;

CREATE TABLE `respuesta_por_cliente` (
  `ID_respuesta` int(5) unsigned zerofill DEFAULT NULL,
  `ID_cliente` int(5) unsigned zerofill DEFAULT NULL,
  KEY `ID_respuesta` (`ID_respuesta`),
  KEY `ID_cliente` (`ID_cliente`),
  CONSTRAINT `respuesta_por_cliente_ibfk_1` FOREIGN KEY (`ID_respuesta`) REFERENCES `respuestas` (`ID_respuesta`),
  CONSTRAINT `respuesta_por_cliente_ibfk_2` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `respuesta_por_cliente` */

/*Table structure for table `respuestas` */

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `ID_respuesta` int(5) unsigned zerofill NOT NULL,
  `respuesta` blob,
  `tipo_respuesta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_respuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `respuestas` */

/*Table structure for table `respuestas_por_preguntas` */

DROP TABLE IF EXISTS `respuestas_por_preguntas`;

CREATE TABLE `respuestas_por_preguntas` (
  `ID_pregunta` int(5) unsigned zerofill DEFAULT NULL,
  `ID_respuesta` int(5) unsigned zerofill DEFAULT NULL,
  KEY `ID_pregunta` (`ID_pregunta`),
  KEY `ID_respuesta` (`ID_respuesta`),
  CONSTRAINT `respuestas_por_preguntas_ibfk_1` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`),
  CONSTRAINT `respuestas_por_preguntas_ibfk_2` FOREIGN KEY (`ID_respuesta`) REFERENCES `respuestas` (`ID_respuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `respuestas_por_preguntas` */

/*Table structure for table `tipo_preguntas` */

DROP TABLE IF EXISTS `tipo_preguntas`;

CREATE TABLE `tipo_preguntas` (
  `ID_tipo` int(5) unsigned zerofill NOT NULL,
  `tipo_pregunta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_preguntas` */

/*Table structure for table `universidades` */

DROP TABLE IF EXISTS `universidades`;

CREATE TABLE `universidades` (
  `ID_universidad` int(5) unsigned zerofill NOT NULL,
  `nombre_universidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_universidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `universidades` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `ID_usuario` int(5) unsigned zerofill NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Clave` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

/*Table structure for table `usuarios_por_encuestas` */

DROP TABLE IF EXISTS `usuarios_por_encuestas`;

CREATE TABLE `usuarios_por_encuestas` (
  `ID_usuario` int(5) unsigned zerofill DEFAULT NULL,
  `ID_encuesta` int(5) unsigned zerofill DEFAULT NULL,
  KEY `ID_usuario` (`ID_usuario`),
  KEY `ID_encuesta` (`ID_encuesta`),
  CONSTRAINT `usuarios_por_encuestas_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  CONSTRAINT `usuarios_por_encuestas_ibfk_2` FOREIGN KEY (`ID_encuesta`) REFERENCES `encuesta` (`ID_encuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuarios_por_encuestas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
