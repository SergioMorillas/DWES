-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: concesionario
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alquiler`
--
use concesionarioMVC;
DROP TABLE IF EXISTS `alquiler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alquiler` (
  `alquiler_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `matricula` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lugar_recogida` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_recogida` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`alquiler_id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `matricula` (`matricula`),
  CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE CASCADE,
  CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alquiler`
--

/*!40000 ALTER TABLE `alquiler` DISABLE KEYS */;
/*!40000 ALTER TABLE `alquiler` ENABLE KEYS */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `documento_identidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  UNIQUE KEY `documento_identidad` (`documento_identidad`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

--
-- Table structure for table `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `idiomas` (
  `espanol` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ingles` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `catalan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `euskera` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`espanol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idiomas`
--

/*!40000 ALTER TABLE `idiomas` DISABLE KEYS */;
INSERT INTO `idiomas` VALUES ('alta','high','alta','altu'),('ayuda','help','ajuda','laguntza'),('baja','low','baixa','behera'),('consulta','query','consulta','kontsulta'),('idioma','language','idioma','hizkuntza'),('listado','list','llistat','zerrenda'),('modificación','modification','modificació','aldaketa'),('moneda','currency','moneda','moneta');
/*!40000 ALTER TABLE `idiomas` ENABLE KEYS */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb4_general_ci,
  `apellidos` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `grupo` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Juan','Pérez Gómez','1990-01-01','juan.perez','$2y$10$veRLOFP8imuZIUEP1u.dcO7Q3er/Gpd0MA3quUbcmbAN0PH0xG7ZK','grupo1'),(3,'Carlos','García Fernández','1978-09-23','carlos.garcia','$2y$10$eaM17q1QHBrUjP./T/8qyeZY7aezkxfFDKgRa6CO05NL9kc5o21eu','grupo3'),(5,'Sergio','Morillas Carmona','1988-03-30','luis.hernandez','$2y$10$0hXjJGxjf8.63mP94DM16u9X0KUZgSa1cfKcLE6WfixdG4L82I4uO','grupo2'),(6,'Carmen','Gómez Fernández','1992-07-07','carmen.gomez','$2y$10$PJ9HXqK57B4VMeIWQTmks.p9WHVgmQCe0Bdhanv5hfBygp4gAk0aG','grupo3'),(7,'Jorge','Díaz Rojas','1975-11-19','jorge.diaz','$2y$10$mCNlc/JCJKupciOpPQ1yL.4iVOd53nI.lXIkbouDMOOI4aGEMmUaG','grupo1'),(8,'Laura','Rojas Martínez','1991-08-22','l.fernandez','$2y$10$u.JM/dvL6CttRtFBwl9unOqdL1/.C/AvTGLhGhBtre1.ebnENbLCu','grupo2'),(9,'Pablo','Jiménez Fernández','1983-02-14','pablo.jimenez','$2y$10$9tJAUJqgUOmMsy8oVMEwuebfhazhR.ubKMP.EuWSguGeCdf8hTP6G','grupo3'),(10,'Isabel','Ruiz Ramirez','1999-10-05','isabel.ruiz','$2y$10$677cw01J5BV6fNGmkP5opeJ59buKINs28OsLQkA0Yi5rlS6pPEGqa','grupo1'),(19,'maria','lopez gomez','1985-05-15','maria.lopez','$2y$10$I6UvaXHcB5BQ/Bh0W7c1Huscr1Q22X/ubPizS5I1CUWyKSBvm3KI.','Administrador'),(60,'sergio','morillas','1978-09-23','s.morillas','$2y$10$iKded5.A6YmiS8Qhcyr6ZerUf9cBQIRLPYG3e.0b9bFQ6Wre0m9U.','Administrador'),(61,'sergio','manolo','1111-01-01','s.morillas.s','$2y$10$fpZryBooo7.xhkSqQSk/6uNJm.GPl8gg10FML0m1Q2bCb4XI3ixzO','CM');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculo` (
  `matricula` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modelo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anio` int DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;

--
-- Dumping routines for database 'concesionario'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-04 17:03:09
