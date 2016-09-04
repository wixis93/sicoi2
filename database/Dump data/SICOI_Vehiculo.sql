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
-- Table structure for table `Vehiculo`
--

DROP TABLE IF EXISTS `Vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vehiculo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Placa` varchar(10) NOT NULL,
  `Tipo_vehiculo` int(11) NOT NULL,
  `Color_vehiculo` int(11) NOT NULL,
  `Nombre_vehiculo` int(11) NOT NULL,
  `Modelo_vehiculo` int(11) NOT NULL,
  `Marca_vehiculo_idMarca_vehiculo` int(11) NOT NULL,
  `Serie` varchar(45) NOT NULL,
  `Ubicación` int(11) DEFAULT NULL COMMENT '1=gruas Raf\n2=gruas mezquite\n3=complejo ssp',
  `Adeudo` decimal(10,0) DEFAULT NULL COMMENT '1=asegurado \n2=liberado',
  `procedencia` int(11) NOT NULL,
  `estatus` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`,`Placa`),
  KEY `fk_Vehiculo_Color_vehiculo1_idx` (`Color_vehiculo`),
  KEY `fk_Vehiculo_Modelo_vehiculo1_idx` (`Modelo_vehiculo`),
  KEY `fk_marca_vehiculo_idx` (`Marca_vehiculo_idMarca_vehiculo`),
  KEY `fk_nombre_vehiculo_idx` (`Nombre_vehiculo`),
  KEY `fk_Vehiculo_procedencia_idx` (`procedencia`),
  KEY `fk_Vehiculo_Tipo_vehiculo1` (`Tipo_vehiculo`),
  CONSTRAINT `fk_Vehiculo_Color_vehiculo1` FOREIGN KEY (`Color_vehiculo`) REFERENCES `Color_vehiculo` (`idColor_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_Modelo_vehiculo1` FOREIGN KEY (`Modelo_vehiculo`) REFERENCES `Modelo_vehiculo` (`idModelo_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_Tipo_vehiculo1` FOREIGN KEY (`Tipo_vehiculo`) REFERENCES `Tipo_vehiculo` (`idTipo_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_procedencia` FOREIGN KEY (`procedencia`) REFERENCES `lugar_procedencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_marca_vehiculo` FOREIGN KEY (`Marca_vehiculo_idMarca_vehiculo`) REFERENCES `Marca_vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nombre_vehiculo` FOREIGN KEY (`Nombre_vehiculo`) REFERENCES `Nombre_vehiculo` (`idNombre_vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vehiculo`
--

LOCK TABLES `Vehiculo` WRITE;
/*!40000 ALTER TABLE `Vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-04  1:50:09
