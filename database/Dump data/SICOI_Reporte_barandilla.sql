-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: SICOI
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `Reporte_barandilla`
--

DROP TABLE IF EXISTS `Reporte_barandilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reporte_barandilla` (
  `idReporte_barandilla` int(11) NOT NULL AUTO_INCREMENT,
  `id_asegurado` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `motivo_arresto` varchar(255) NOT NULL,
  `observaciones` varchar(500) NOT NULL,
  `pertenencias` varchar(400) DEFAULT NULL,
  `unidad` varchar(45) NOT NULL,
  `lugar` varchar(250) NOT NULL,
  `destino` varchar(45) NOT NULL,
  `aseguramiento` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idReporte_barandilla`),
  KEY `fk_Reporte_barandilla_1_idx` (`id_asegurado`),
  CONSTRAINT `fk_Reporte_barandilla_1` FOREIGN KEY (`id_asegurado`) REFERENCES `Asegurado` (`idAsegurado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reporte_barandilla`
--

LOCK TABLES `Reporte_barandilla` WRITE;
/*!40000 ALTER TABLE `Reporte_barandilla` DISABLE KEYS */;
INSERT INTO `Reporte_barandilla` VALUES (1,2,'2016-06-08','0000-00-00','drogandose en vias publicas','a las chicas de verdad les gusta el pollo frito','una pipa y 500 pesos','p-34','la trinidad','Ministerio Público','cocaina'),(2,3,'2016-06-08','0000-00-00','perrenado en zona publicaa','estaba bailando el tiki tiki a media calle con una anciana inbalida de 85 años de edad.','navaja y cerveza','p-12','Barrio Alto','Separos Preventivos','navaja');
/*!40000 ALTER TABLE `Reporte_barandilla` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-04  1:50:07
