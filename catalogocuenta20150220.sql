CREATE DATABASE  IF NOT EXISTS `catalogocuenta` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `catalogocuenta`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: catalogocuenta
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catalogocuentas`
--

DROP TABLE IF EXISTS `catalogocuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogocuentas` (
  `idcuentacontable` int(11) NOT NULL AUTO_INCREMENT,
  `cuentacontable` varchar(45) NOT NULL,
  `idgruposcuentas` int(11) NOT NULL,
  `idtipocuenta` int(11) NOT NULL,
  PRIMARY KEY (`idcuentacontable`),
  KEY `fk_cuentacontable_Titulos1_idx` (`idgruposcuentas`),
  KEY `fk_catalogocuentas_tipocuenta1_idx` (`idtipocuenta`),
  CONSTRAINT `fk_catalogocuentas_tipocuenta1` FOREIGN KEY (`idtipocuenta`) REFERENCES `tipocuenta` (`idtipocuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuentacontable_Titulos1` FOREIGN KEY (`idgruposcuentas`) REFERENCES `gruposcuentas` (`idgruposcuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogocuentas`
--

LOCK TABLES `catalogocuentas` WRITE;
/*!40000 ALTER TABLE `catalogocuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogocuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `categorias_cuentas_view`
--

DROP TABLE IF EXISTS `categorias_cuentas_view`;
/*!50001 DROP VIEW IF EXISTS `categorias_cuentas_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `categorias_cuentas_view` (
  `idcategorias` tinyint NOT NULL,
  `categoria` tinyint NOT NULL,
  `nombre` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `categoriascuentas`
--

DROP TABLE IF EXISTS `categoriascuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriascuentas` (
  `idcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `idestructurabase` int(11) NOT NULL,
  PRIMARY KEY (`idcategorias`),
  KEY `fk_categorias_estructurabase1_idx` (`idestructurabase`),
  CONSTRAINT `fk_categorias_estructurabase1` FOREIGN KEY (`idestructurabase`) REFERENCES `estructurabase` (`idestructurabase`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriascuentas`
--

LOCK TABLES `categoriascuentas` WRITE;
/*!40000 ALTER TABLE `categoriascuentas` DISABLE KEYS */;
INSERT INTO `categoriascuentas` VALUES (1,'Activo Circulante',1);
/*!40000 ALTER TABLE `categoriascuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estructurabase`
--

DROP TABLE IF EXISTS `estructurabase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estructurabase` (
  `idestructurabase` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idestructurabase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estructurabase`
--

LOCK TABLES `estructurabase` WRITE;
/*!40000 ALTER TABLE `estructurabase` DISABLE KEYS */;
INSERT INTO `estructurabase` VALUES (1,'Activos'),(2,'Pasivos'),(3,'Capital'),(4,'Ingresos'),(5,'Egresos');
/*!40000 ALTER TABLE `estructurabase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gruposcuentas`
--

DROP TABLE IF EXISTS `gruposcuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gruposcuentas` (
  `idgruposcuentas` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(45) NOT NULL,
  `nivel` int(11) NOT NULL,
  `idTitulossuperior` int(11) NOT NULL,
  `idcategorias` int(11) NOT NULL,
  PRIMARY KEY (`idgruposcuentas`),
  KEY `fk_Titulos_Titulos1_idx` (`idTitulossuperior`),
  KEY `fk_Titulos_categorias1_idx` (`idcategorias`),
  CONSTRAINT `fk_Titulos_Titulos1` FOREIGN KEY (`idTitulossuperior`) REFERENCES `gruposcuentas` (`idgruposcuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Titulos_categorias1` FOREIGN KEY (`idcategorias`) REFERENCES `categoriascuentas` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gruposcuentas`
--

LOCK TABLES `gruposcuentas` WRITE;
/*!40000 ALTER TABLE `gruposcuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `gruposcuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocuenta`
--

DROP TABLE IF EXISTS `tipocuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocuenta` (
  `idtipocuenta` int(11) NOT NULL AUTO_INCREMENT,
  `tipocuenta` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipocuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocuenta`
--

LOCK TABLES `tipocuenta` WRITE;
/*!40000 ALTER TABLE `tipocuenta` DISABLE KEYS */;
INSERT INTO `tipocuenta` VALUES (1,'Deudora'),(2,'Acreedora');
/*!40000 ALTER TABLE `tipocuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `categorias_cuentas_view`
--

/*!50001 DROP TABLE IF EXISTS `categorias_cuentas_view`*/;
/*!50001 DROP VIEW IF EXISTS `categorias_cuentas_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `categorias_cuentas_view` AS select `cc`.`idcategorias` AS `idcategorias`,`cc`.`categoria` AS `categoria`,`eb`.`nombre` AS `nombre` from (`categoriascuentas` `cc` left join `estructurabase` `eb` on((`cc`.`idestructurabase` = `eb`.`idestructurabase`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-20 17:11:16
