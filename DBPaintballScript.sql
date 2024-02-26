-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: paintballdb
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `canchas`
--

DROP TABLE IF EXISTS `canchas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `canchas` (
  `IdCancha` int NOT NULL AUTO_INCREMENT,
  `descripcionCancha` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCancha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canchas`
--

LOCK TABLES `canchas` WRITE;
/*!40000 ALTER TABLE `canchas` DISABLE KEYS */;
/*!40000 ALTER TABLE `canchas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cantones`
--

DROP TABLE IF EXISTS `cantones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cantones` (
  `IdCanton` int NOT NULL AUTO_INCREMENT,
  `Provincia` int NOT NULL,
  `DescripcionCanton` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCanton`),
  KEY `FK_ProvinciaCanton` (`Provincia`),
  CONSTRAINT `FK_ProvinciaCanton` FOREIGN KEY (`Provincia`) REFERENCES `provincias` (`IdProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cantones`
--

LOCK TABLES `cantones` WRITE;
/*!40000 ALTER TABLE `cantones` DISABLE KEYS */;
INSERT INTO `cantones` VALUES (1,1,'Barva');
/*!40000 ALTER TABLE `cantones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `IdCategoria` int NOT NULL AUTO_INCREMENT,
  `descripcionCategoria` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dias`
--

DROP TABLE IF EXISTS `dias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dias` (
  `IdDia` int NOT NULL AUTO_INCREMENT,
  `descripcionDia` varchar(25) NOT NULL,
  PRIMARY KEY (`IdDia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias`
--

LOCK TABLES `dias` WRITE;
/*!40000 ALTER TABLE `dias` DISABLE KEYS */;
/*!40000 ALTER TABLE `dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones` (
  `IdDireccion` int NOT NULL AUTO_INCREMENT,
  `Distrito` int NOT NULL,
  `DescripcionDireccion` varchar(50) NOT NULL,
  PRIMARY KEY (`IdDireccion`),
  KEY `FK_DistritoDireccion` (`Distrito`),
  CONSTRAINT `FK_DistritoDireccion` FOREIGN KEY (`Distrito`) REFERENCES `distritos` (`IdDistrito`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (1,1,'Condominio Residencia del Cafel, Casa N.70');
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distritos`
--

DROP TABLE IF EXISTS `distritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distritos` (
  `IdDistrito` int NOT NULL AUTO_INCREMENT,
  `Canton` int NOT NULL,
  `DescripcionDistrito` varchar(50) NOT NULL,
  PRIMARY KEY (`IdDistrito`),
  KEY `FK_CantonDistrito` (`Canton`),
  CONSTRAINT `FK_CantonDistrito` FOREIGN KEY (`Canton`) REFERENCES `cantones` (`IdCanton`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distritos`
--

LOCK TABLES `distritos` WRITE;
/*!40000 ALTER TABLE `distritos` DISABLE KEYS */;
INSERT INTO `distritos` VALUES (1,1,'San Roque');
/*!40000 ALTER TABLE `distritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos` (
  `IdEquipo` int NOT NULL AUTO_INCREMENT,
  `Categoria` int NOT NULL,
  `Proveedor` int NOT NULL,
  `DescripcionEquipo` varchar(50) NOT NULL,
  `CantidadActual` int NOT NULL,
  PRIMARY KEY (`IdEquipo`),
  KEY `FK_CategoriaEquipo` (`Categoria`),
  KEY `FK_ProveedorEquipo` (`Proveedor`),
  CONSTRAINT `FK_CategoriaEquipo` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`IdCategoria`),
  CONSTRAINT `FK_ProveedorEquipo` FOREIGN KEY (`Proveedor`) REFERENCES `proveedores` (`IdProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipospaquetes`
--

DROP TABLE IF EXISTS `equipospaquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipospaquetes` (
  `IdEquipoPaquete` int NOT NULL AUTO_INCREMENT,
  `Equipo` int NOT NULL,
  `PaqueteEquipo` int NOT NULL,
  PRIMARY KEY (`IdEquipoPaquete`),
  KEY `FK_EquipoEP` (`Equipo`),
  KEY `FK_PaqueteEP` (`PaqueteEquipo`),
  CONSTRAINT `FK_EquipoEP` FOREIGN KEY (`Equipo`) REFERENCES `equipos` (`IdEquipo`),
  CONSTRAINT `FK_PaqueteEP` FOREIGN KEY (`PaqueteEquipo`) REFERENCES `paquetes` (`IdPaquete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipospaquetes`
--

LOCK TABLES `equipospaquetes` WRITE;
/*!40000 ALTER TABLE `equipospaquetes` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipospaquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `IdEstado` int NOT NULL AUTO_INCREMENT,
  `DescripcionEstado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturas` (
  `IdFactura` int NOT NULL AUTO_INCREMENT,
  `NumeroFactura` varchar(50) NOT NULL,
  `FechaEmision` date NOT NULL,
  `HoraEmision` datetime NOT NULL,
  PRIMARY KEY (`IdFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturaspaquetes`
--

DROP TABLE IF EXISTS `facturaspaquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturaspaquetes` (
  `IdFacturasPaquetes` int NOT NULL AUTO_INCREMENT,
  `Factura` int NOT NULL,
  `PaqueteFactura` int NOT NULL,
  PRIMARY KEY (`IdFacturasPaquetes`),
  KEY `FK_FacturaFP` (`Factura`),
  KEY `FK_PaqueteFP` (`PaqueteFactura`),
  CONSTRAINT `FK_FacturaFP` FOREIGN KEY (`Factura`) REFERENCES `facturas` (`IdFactura`),
  CONSTRAINT `FK_PaqueteFP` FOREIGN KEY (`PaqueteFactura`) REFERENCES `paquetes` (`IdPaquete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturaspaquetes`
--

LOCK TABLES `facturaspaquetes` WRITE;
/*!40000 ALTER TABLE `facturaspaquetes` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturaspaquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paquetes` (
  `IdPaquete` int NOT NULL AUTO_INCREMENT,
  `Estado` int NOT NULL,
  `DescripcionPaquete` varchar(50) NOT NULL,
  `Precio` float NOT NULL,
  `MinimoPersonas` int NOT NULL,
  PRIMARY KEY (`IdPaquete`),
  KEY `FK_EstadoPaquete` (`Estado`),
  CONSTRAINT `FK_EstadoPaquete` FOREIGN KEY (`Estado`) REFERENCES `estados` (`IdEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetesreservaciones`
--

DROP TABLE IF EXISTS `paquetesreservaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paquetesreservaciones` (
  `IdPaquetesReservaciones` int NOT NULL AUTO_INCREMENT,
  `Reservacion` int NOT NULL,
  `PaqueteReservacion` int NOT NULL,
  `Cedula` varchar(25) NOT NULL,
  PRIMARY KEY (`IdPaquetesReservaciones`),
  KEY `PK_ReservacionPR` (`Reservacion`),
  KEY `PK_PaquetePR` (`PaqueteReservacion`),
  CONSTRAINT `PK_PaquetePR` FOREIGN KEY (`PaqueteReservacion`) REFERENCES `paquetes` (`IdPaquete`),
  CONSTRAINT `PK_ReservacionPR` FOREIGN KEY (`Reservacion`) REFERENCES `reservaciones` (`IdReservacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetesreservaciones`
--

LOCK TABLES `paquetesreservaciones` WRITE;
/*!40000 ALTER TABLE `paquetesreservaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquetesreservaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `IdProveedor` int NOT NULL AUTO_INCREMENT,
  `DireccionProveedor` int NOT NULL,
  `NombreProveedor` varchar(50) NOT NULL,
  `TelefonoProveedor` varchar(50) NOT NULL,
  `CorreoProveedor` varchar(100) NOT NULL,
  PRIMARY KEY (`IdProveedor`),
  KEY `FK_DireccionProveedor` (`DireccionProveedor`),
  CONSTRAINT `FK_DireccionProveedor` FOREIGN KEY (`DireccionProveedor`) REFERENCES `direcciones` (`IdDireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provincias` (
  `IdProvincia` int NOT NULL AUTO_INCREMENT,
  `DescripcionProvincia` varchar(50) NOT NULL,
  PRIMARY KEY (`IdProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Heredia');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservaciones`
--

DROP TABLE IF EXISTS `reservaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservaciones` (
  `IdReservacion` int NOT NULL AUTO_INCREMENT,
  `Usuario` int NOT NULL,
  `Cancha` int NOT NULL,
  `DiaReservacion` int NOT NULL,
  `CodigoQR` text NOT NULL,
  `FechaReservacion` date NOT NULL,
  `HoraReservacion` datetime NOT NULL,
  `TamanoGrupo` int NOT NULL,
  PRIMARY KEY (`IdReservacion`),
  KEY `FK_UsuarioReservacion` (`Usuario`),
  KEY `FK_CanchaReservacion` (`Cancha`),
  KEY `FK_DiaReservacion` (`DiaReservacion`),
  CONSTRAINT `FK_CanchaReservacion` FOREIGN KEY (`Cancha`) REFERENCES `canchas` (`IdCancha`),
  CONSTRAINT `FK_DiaReservacion` FOREIGN KEY (`DiaReservacion`) REFERENCES `dias` (`IdDia`),
  CONSTRAINT `FK_UsuarioReservacion` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservaciones`
--

LOCK TABLES `reservaciones` WRITE;
/*!40000 ALTER TABLE `reservaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexos`
--

DROP TABLE IF EXISTS `sexos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sexos` (
  `IdSexo` int NOT NULL AUTO_INCREMENT,
  `DescripcionSexo` varchar(25) NOT NULL,
  PRIMARY KEY (`IdSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexos`
--

LOCK TABLES `sexos` WRITE;
/*!40000 ALTER TABLE `sexos` DISABLE KEYS */;
INSERT INTO `sexos` VALUES (1,'M'),(2,'F');
/*!40000 ALTER TABLE `sexos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuarios`
--

DROP TABLE IF EXISTS `tipousuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipousuarios` (
  `IdTipoUsuario` int NOT NULL AUTO_INCREMENT,
  `DescripcionTipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuarios`
--

LOCK TABLES `tipousuarios` WRITE;
/*!40000 ALTER TABLE `tipousuarios` DISABLE KEYS */;
INSERT INTO `tipousuarios` VALUES (1,'Administrador');
/*!40000 ALTER TABLE `tipousuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `IdUsuario` int NOT NULL AUTO_INCREMENT,
  `DireccionUsuario` int NOT NULL,
  `Sexo` int NOT NULL,
  `TipoUsuario` int NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `PrimerApellido` varchar(50) NOT NULL,
  `SegundoApellido` varchar(50) NOT NULL,
  `TelefonoUsuario` varchar(50) NOT NULL,
  `CorreoUsuario` varchar(100) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `ClaveUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `FK_DireccionUsuario` (`DireccionUsuario`),
  KEY `FK_SexoUsuario` (`Sexo`),
  KEY `FK_TipoUsuario` (`TipoUsuario`),
  CONSTRAINT `FK_DireccionUsuario` FOREIGN KEY (`DireccionUsuario`) REFERENCES `direcciones` (`IdDireccion`),
  CONSTRAINT `FK_SexoUsuario` FOREIGN KEY (`Sexo`) REFERENCES `sexos` (`IdSexo`),
  CONSTRAINT `FK_TipoUsuario` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuarios` (`IdTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,1,1,'Jose','Gonzalez','Salazar','90908080','jo@imail.com','2002-02-01','AmbienteG4');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-26  8:52:11
