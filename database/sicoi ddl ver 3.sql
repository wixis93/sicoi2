-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema SICOI
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SICOI
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SICOI` DEFAULT CHARACTER SET utf8 ;
USE `SICOI` ;

-- -----------------------------------------------------
-- Table `SICOI`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Empleado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Puesto_idPuesto` INT NOT NULL,
  PRIMARY KEY (`id`, `Puesto_idPuesto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Tipo_vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Tipo_vehiculo` (
  `idTipo_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `Tipo_carro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_vehiculo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Color_vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Color_vehiculo` (
  `idColor_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idColor_vehiculo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Modelo_vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Modelo_vehiculo` (
  `idModelo_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `Año` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idModelo_vehiculo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SICOI`.`Marca_vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Marca_vehiculo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Codigo` VARCHAR(55) NOT NULL,
  `nombre_marca` VARCHAR(55) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Nombre_vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Nombre_vehiculo` (
  `idNombre_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `Id_marca` INT NOT NULL,
  `Codigo` VARCHAR(125) NULL,
  `Nombre` VARCHAR(125) NOT NULL,
  PRIMARY KEY (`idNombre_vehiculo`),
  INDEX `id_marca_idx` (`Id_marca` ASC),
  CONSTRAINT `id_marca`
    FOREIGN KEY (`Id_marca`)
    REFERENCES `SICOI`.`Marca_vehiculo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`lugar_procedencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`lugar_procedencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Vehiculo` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Placa` VARCHAR(10) NOT NULL,
  `Tipo_vehiculo` INT NOT NULL,
  `Color_vehiculo` INT NOT NULL,
  `Nombre_vehiculo` INT NOT NULL,
  `Modelo_vehiculo` INT NOT NULL,
  `Marca_vehiculo_idMarca_vehiculo` INT NOT NULL,
  `Serie` VARCHAR(45) NOT NULL,
  `Ubicación` INT NULL COMMENT '1=gruas Raf\n2=gruas mezquite\n3=complejo ssp',
  `Adeudo` DECIMAL NULL COMMENT '1=asegurado \n2=liberado',
  `procedencia` INT NOT NULL,
  `estatus` INT NULL DEFAULT 1,
  PRIMARY KEY (`ID`, `Placa`),
  INDEX `fk_Vehiculo_Color_vehiculo1_idx` (`Color_vehiculo` ASC),
  INDEX `fk_Vehiculo_Modelo_vehiculo1_idx` (`Modelo_vehiculo` ASC),
  INDEX `fk_marca_vehiculo_idx` (`Marca_vehiculo_idMarca_vehiculo` ASC),
  INDEX `fk_nombre_vehiculo_idx` (`Nombre_vehiculo` ASC),
  INDEX `fk_Vehiculo_procedencia_idx` (`procedencia` ASC),
  CONSTRAINT `fk_Vehiculo_Tipo_vehiculo1`
    FOREIGN KEY (`Tipo_vehiculo`)
    REFERENCES `SICOI`.`Tipo_vehiculo` (`idTipo_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_Color_vehiculo1`
    FOREIGN KEY (`Color_vehiculo`)
    REFERENCES `SICOI`.`Color_vehiculo` (`idColor_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_Modelo_vehiculo1`
    FOREIGN KEY (`Modelo_vehiculo`)
    REFERENCES `SICOI`.`Modelo_vehiculo` (`idModelo_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_marca_vehiculo`
    FOREIGN KEY (`Marca_vehiculo_idMarca_vehiculo`)
    REFERENCES `SICOI`.`Marca_vehiculo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_nombre_vehiculo`
    FOREIGN KEY (`Nombre_vehiculo`)
    REFERENCES `SICOI`.`Nombre_vehiculo` (`idNombre_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_procedencia`
    FOREIGN KEY (`procedencia`)
    REFERENCES `SICOI`.`lugar_procedencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `SICOI`.`Emergencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Emergencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(120) NOT NULL,
  `tipo` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Reporte_sp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Reporte_sp` (
  `idReporte` INT NOT NULL AUTO_INCREMENT,
  `Emergencia_idEmergencia` INT NOT NULL,
  `Procedencia` INT NOT NULL COMMENT '1= 066\n2=local',
  `Lugar` NVARCHAR(200) NOT NULL,
  `Fecha` DATETIME NOT NULL,
  `victima` NVARCHAR(300) NOT NULL,
  `Consignados` NVARCHAR(300) NOT NULL,
  `Canalizacion` TINYINT(1) NOT NULL DEFAULT 0,
  `Observaciones` NVARCHAR(400) NULL,
  PRIMARY KEY (`idReporte`, `Emergencia_idEmergencia`, `Procedencia`, `Lugar`),
  INDEX `fk_Reporte_Emergencia1_idx` (`Emergencia_idEmergencia` ASC),
  CONSTRAINT `fk_Reporte_Emergencia1`
    FOREIGN KEY (`Emergencia_idEmergencia`)
    REFERENCES `SICOI`.`Emergencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `SICOI`.`Empleado_Reporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Empleado_Reporte` (
  `Empleado_id` INT NOT NULL AUTO_INCREMENT,
  `Reporte_idReporte` INT NOT NULL,
  PRIMARY KEY (`Empleado_id`, `Reporte_idReporte`),
  INDEX `fk_Empleado_has_Reporte_Reporte1_idx` (`Reporte_idReporte` ASC),
  INDEX `fk_Empleado_has_Reporte_Empleado1_idx` (`Empleado_id` ASC),
  CONSTRAINT `fk_Empleado_has_Reporte_Empleado1`
    FOREIGN KEY (`Empleado_id`)
    REFERENCES `SICOI`.`Empleado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empleado_has_Reporte_Reporte1`
    FOREIGN KEY (`Reporte_idReporte`)
    REFERENCES `SICOI`.`Reporte_sp` (`idReporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Propietario_vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Propietario_vehiculo` (
  `idPropietario_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `Vehiculo_ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Domicilio` VARCHAR(45) NULL,
  PRIMARY KEY (`idPropietario_vehiculo`, `Vehiculo_ID`),
  INDEX `fk_Propietario_vehiculo_Vehiculo1_idx` (`Vehiculo_ID` ASC),
  CONSTRAINT `fk_Propietario_vehiculo_Vehiculo1`
    FOREIGN KEY (`Vehiculo_ID`)
    REFERENCES `SICOI`.`Vehiculo` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Conductor_vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Conductor_vehiculo` (
  `ID_cond` INT NOT NULL AUTO_INCREMENT,
  `Vehiculo_ID` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Domicilio` VARCHAR(45) NULL,
  PRIMARY KEY (`ID_cond`, `Vehiculo_ID`),
  CONSTRAINT `fk_Conductor_vehiculo_Vehiculo1`
    FOREIGN KEY (`Vehiculo_ID`)
    REFERENCES `SICOI`.`Vehiculo` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Institucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Institucion` (
  `idInstitucion` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Domicilio` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `nombreContacto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idInstitucion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SICOI`.`Privilegios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Privilegios` (
  `idPrivilegios` INT NOT NULL AUTO_INCREMENT,
  `Tipo_privilegio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPrivilegios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Usuario` (
`idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `password` varchar(80) NOT NULL,
  `idprivilegio` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idprivilegio`),
  KEY `fk_Usuario_Privilegios1_idx` (`idprivilegio`),
  CONSTRAINT `fk_Usuario_Privilegios1` FOREIGN KEY (`idprivilegio`) REFERENCES `Privilegios` (`idPrivilegios`)
   ON DELETE NO ACTION ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `SICOI`.`Paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Paciente` (
  `idPaciente` INT NOT NULL,
  `Nombre` VARCHAR(120) NOT NULL,
  `sexo` INT NOT NULL COMMENT '1=masculino 2=femenino',
  `edad` INT NOT NULL,
  `Ocupacion` VARCHAR(45) NOT NULL,
  `madre` VARCHAR(120) NULL,
  `padre` VARCHAR(120) NULL,
  PRIMARY KEY (`idPaciente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Sesiones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Sesiones` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Asunto` VARCHAR(150) NOT NULL,
  `Fecha` TIMESTAMP NOT NULL,
  `Id_paciente` INT NOT NULL,
  `Observaciones` VARCHAR(450) NULL,
  `Canalizado` INT NULL COMMENT '1=si  2=no',
  PRIMARY KEY (`Id`),
  INDEX `fk_Sesiones_1_idx` (`Id_paciente` ASC),
  CONSTRAINT `fk_Sesiones_1`
    FOREIGN KEY (`Id_paciente`)
    REFERENCES `SICOI`.`Paciente` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`reporte_vialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`reporte_vialidad` (
  `idreporte_vialidad` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `Observaciones` NVARCHAR(500) NULL,
  PRIMARY KEY (`idreporte_vialidad`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`vehiculo_involucrado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`vehiculo_involucrado` (
  `id` INT NOT NULL,
  `id_reporte` INT NOT NULL,
  `Id_vehiculo` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vehiculo_involucrado_1_idx` (`Id_vehiculo` ASC),
  INDEX `fk_vehiculo_involucrado_2_idx` (`id_reporte` ASC),
  CONSTRAINT `fk_vehiculo_involucrado_1`
    FOREIGN KEY (`Id_vehiculo`)
    REFERENCES `SICOI`.`Vehiculo` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculo_involucrado_2`
    FOREIGN KEY (`id_reporte`)
    REFERENCES `SICOI`.`reporte_vialidad` (`idreporte_vialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SICOI`.`Asegurado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Asegurado` (
  `idAsegurado` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Ap_paterno` VARCHAR(45) NOT NULL,
  `Ap_materno` VARCHAR(45) NULL,
  `Fechanacimiento` VARCHAR(10) NOT NULL,
  `Alias` VARCHAR(45) NOT NULL,
  `domicilio` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idAsegurado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Reporte_barandilla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Reporte_barandilla` (
  `idReporte_barandilla` INT NOT NULL AUTO_INCREMENT,
  `id_asegurado` INT NOT NULL,
  `fecha_ingreso` DATE NOT NULL,
  `fecha_salida`  DATE NULL,
  `motivo_arresto` VARCHAR(255) NOT NULL,
  `observaciones` NVARCHAR(500) NULL,
  `pertenencias` NVARCHAR(400) null,
  `unidad` VARCHAR(45) NOT NULL,
  `lugar` VARCHAR(250) NOT NULL,
  `destino` VARCHAR(45) VARCHAR NOT NULL,  
  `aseguramiento` VARCHAR(250) NULL,
  PRIMARY KEY (`idReporte_barandilla`),
  INDEX `fk_Reporte_barandilla_1_idx` (`id_asegurado` ASC),
  CONSTRAINT `fk_Reporte_barandilla_1`
    FOREIGN KEY (`id_asegurado`)
    REFERENCES `SICOI`.`Asegurado` (`idAsegurado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
