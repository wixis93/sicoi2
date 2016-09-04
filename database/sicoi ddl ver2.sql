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
-- Table `SICOI`.`Puesto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Puesto` (
  `idPuesto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPuesto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Empleado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Puesto_idPuesto` INT NOT NULL,
  PRIMARY KEY (`id`, `Puesto_idPuesto`),
  INDEX `fk_Empleado_Puesto1_idx` (`Puesto_idPuesto` ASC),
  CONSTRAINT `fk_Empleado_Puesto1`
    FOREIGN KEY (`Puesto_idPuesto`)
    REFERENCES `SICOI`.`Puesto` (`idPuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
-- Table `SICOI`.`Unidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Unidad` (
  `idUnidad` INT NOT NULL AUTO_INCREMENT,
  `Numero` INT NOT NULL,
  `Tipo_vehiculo_idTipo_vehiculo` INT NOT NULL,
  PRIMARY KEY (`idUnidad`, `Tipo_vehiculo_idTipo_vehiculo`),
  INDEX `fk_Unidad_Tipo_vehiculo1_idx` (`Tipo_vehiculo_idTipo_vehiculo` ASC),
  CONSTRAINT `fk_Unidad_Tipo_vehiculo1`
    FOREIGN KEY (`Tipo_vehiculo_idTipo_vehiculo`)
    REFERENCES `SICOI`.`Tipo_vehiculo` (`idTipo_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Zona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Zona` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Numero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Localidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Localidad` (
  `idLocalidad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idLocalidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SICOI`.`Patrullaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Patrullaje` (
  `Zona_id` INT NOT NULL,
  `Empleado_id` INT NOT NULL,
  `Empleado_Puesto_idPuesto` INT NOT NULL,
  `Unidad_idUnidad` INT NOT NULL,
  `Fecha` DATETIME NOT NULL,
  PRIMARY KEY (`Zona_id`, `Empleado_id`, `Empleado_Puesto_idPuesto`, `Unidad_idUnidad`),
  INDEX `fk_Patrullaje_Empleado1_idx` (`Empleado_id` ASC, `Empleado_Puesto_idPuesto` ASC),
  INDEX `fk_Patrullaje_Unidad1_idx` (`Unidad_idUnidad` ASC),
  CONSTRAINT `fk_Patrullaje_Zona1`
    FOREIGN KEY (`Zona_id`)
    REFERENCES `SICOI`.`Zona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Patrullaje_Empleado1`
    FOREIGN KEY (`Empleado_id` , `Empleado_Puesto_idPuesto`)
    REFERENCES `SICOI`.`Empleado` (`id` , `Puesto_idPuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Patrullaje_Unidad1`
    FOREIGN KEY (`Unidad_idUnidad`)
    REFERENCES `SICOI`.`Unidad` (`idUnidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
-- Table `SICOI`.`Vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Vehiculo` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Tipo_vehiculo_idTipo_vehiculo` INT NOT NULL,
  `Color_vehiculo_idColor_vehiculo` INT NOT NULL,
  `Nombre_vehiculo` INT NOT NULL,
  `Modelo_vehiculo_idModelo_vehiculo` INT NOT NULL,
  `Marca_vehiculo_idMarca_vehiculo` INT NOT NULL,
  `Serie` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`, `Tipo_vehiculo_idTipo_vehiculo`, `Color_vehiculo_idColor_vehiculo`, `Nombre_vehiculo`, `Modelo_vehiculo_idModelo_vehiculo`, `Marca_vehiculo_idMarca_vehiculo`),
  INDEX `fk_Vehiculo_Color_vehiculo1_idx` (`Color_vehiculo_idColor_vehiculo` ASC),
  INDEX `fk_Vehiculo_Modelo_vehiculo1_idx` (`Modelo_vehiculo_idModelo_vehiculo` ASC),
  INDEX `fk_marca_vehiculo_idx` (`Marca_vehiculo_idMarca_vehiculo` ASC),
  INDEX `fk_nombre_vehiculo_idx` (`Nombre_vehiculo` ASC),
  CONSTRAINT `fk_Vehiculo_Tipo_vehiculo1`
    FOREIGN KEY (`Tipo_vehiculo_idTipo_vehiculo`)
    REFERENCES `SICOI`.`Tipo_vehiculo` (`idTipo_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_Color_vehiculo1`
    FOREIGN KEY (`Color_vehiculo_idColor_vehiculo`)
    REFERENCES `SICOI`.`Color_vehiculo` (`idColor_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_Modelo_vehiculo1`
    FOREIGN KEY (`Modelo_vehiculo_idModelo_vehiculo`)
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
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Tipo_reporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Tipo_reporte` (
  `idTipo_reporte` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo_reporte`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Procedencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Procedencia` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Colonia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Colonia` (
  `idColonia` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Codigo_p` INT NOT NULL,
  `Localidad_idLocalidad` INT NOT NULL,
  PRIMARY KEY (`idColonia`),
  INDEX `fk_Colonia_Localidad1_idx` (`Localidad_idLocalidad` ASC),
  CONSTRAINT `fk_Colonia_Localidad1`
    FOREIGN KEY (`Localidad_idLocalidad`)
    REFERENCES `SICOI`.`Localidad` (`idLocalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Calle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Calle` (
  `idCalle` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCalle`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Calle_Colonia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Calle_Colonia` (
  `id` int not null AUTO_INCREMENT,
  `Calle_idCalle` INT NOT NULL,
  `Colonia_idColonia` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Calle_has_Colonia_Colonia1_idx` (`Colonia_idColonia` ASC),
  INDEX `fk_Calle_has_Colonia_Calle1_idx` (`Calle_idCalle` ASC),
  CONSTRAINT `fk_Calle_has_Colonia_Calle1`
    FOREIGN KEY (`Calle_idCalle`)
    REFERENCES `SICOI`.`Calle` (`idCalle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Calle_has_Colonia_Colonia1`
    FOREIGN KEY (`Colonia_idColonia`)
    REFERENCES `SICOI`.`Colonia` (`idColonia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Ap_paterno` VARCHAR(45) NOT NULL,
  `Ap_materno` VARCHAR(45) NULL,
  `Edad` INT NOT NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Domicilio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Domicilio` (
  `Persona_idPersona` INT NOT NULL,
  `Calle_idCalle` INT NOT NULL,
  `Num_interior` INT NOT NULL,
  `num_ext` VARCHAR(45) NULL,
  PRIMARY KEY (`Persona_idPersona`, `Calle_idCalle`),
  INDEX `fk_Domicilio_Calle1_idx` (`Calle_idCalle` ASC),
  CONSTRAINT `fk_Domicilio_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `SICOI`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Domicilio_Calle1`
    FOREIGN KEY (`Calle_idCalle`)
    REFERENCES `SICOI`.`Calle` (`idCalle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Lugar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Lugar` (
  `idLugar` INT NOT NULL AUTO_INCREMENT,
  `Calle_idCalle` INT NOT NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`idLugar`, `Calle_idCalle`),
  INDEX `fk_Lugar_Calle1_idx` (`Calle_idCalle` ASC),
  CONSTRAINT `fk_Lugar_Calle1`
    FOREIGN KEY (`Calle_idCalle`)
    REFERENCES `SICOI`.`Calle` (`idCalle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Emergencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Emergencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(150) NOT NULL,
  `tipo` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Reporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Reporte` (
  `idReporte` INT NOT NULL AUTO_INCREMENT,
  `Emergencia_idEmergencia` INT NOT NULL,
  `Procedencia_ID` INT NOT NULL,
  `Tipo_reporte_idTipo_reporte` INT NOT NULL,
  `Lugar_idLugar` INT NOT NULL,
  `Lugar_Calle_idCalle` INT NOT NULL,
  `Fecha` DATETIME NOT NULL,
  `Canalizacion` TINYINT(1) NOT NULL DEFAULT 0,
  `Observaciones` NVARCHAR(400) NULL,
  PRIMARY KEY (`idReporte`, `Emergencia_idEmergencia`, `Procedencia_ID`, `Tipo_reporte_idTipo_reporte`, `Lugar_idLugar`, `Lugar_Calle_idCalle`),
  INDEX `fk_Reporte_Emergencia1_idx` (`Emergencia_idEmergencia` ASC),
  INDEX `fk_Reporte_Procedencia1_idx` (`Procedencia_ID` ASC),
  INDEX `fk_Reporte_Tipo_reporte1_idx` (`Tipo_reporte_idTipo_reporte` ASC),
  INDEX `fk_Reporte_Lugar1_idx` (`Lugar_idLugar` ASC, `Lugar_Calle_idCalle` ASC),
  CONSTRAINT `fk_Reporte_Emergencia1`
    FOREIGN KEY (`Emergencia_idEmergencia`)
    REFERENCES `SICOI`.`Emergencia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reporte_Procedencia1`
    FOREIGN KEY (`Procedencia_ID`)
    REFERENCES `SICOI`.`Procedencia` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reporte_Tipo_reporte1`
    FOREIGN KEY (`Tipo_reporte_idTipo_reporte`)
    REFERENCES `SICOI`.`Tipo_reporte` (`idTipo_reporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reporte_Lugar1`
    FOREIGN KEY (`Lugar_idLugar` , `Lugar_Calle_idCalle`)
    REFERENCES `SICOI`.`Lugar` (`idLugar` , `Calle_idCalle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SICOI`.`Involucrado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Involucrado` (
  `Persona_idPersona` INT NOT NULL,
  `Reporte_idReporte` INT NOT NULL,
  PRIMARY KEY (`Persona_idPersona`, `Reporte_idReporte`),
  INDEX `fk_Involucrado_Reporte1_idx` (`Reporte_idReporte` ASC),
  CONSTRAINT `fk_Involucrado_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `SICOI`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Involucrado_Reporte1`
    FOREIGN KEY (`Reporte_idReporte`)
    REFERENCES `SICOI`.`Reporte` (`idReporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


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
    REFERENCES `SICOI`.`Reporte` (`idReporte`)
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
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idPropietario_vehiculo`, `Vehiculo_ID`, `Persona_idPersona`),
  INDEX `fk_Propietario_vehiculo_Vehiculo1_idx` (`Vehiculo_ID` ASC),
  INDEX `fk_Propietario_vehiculo_Persona1_idx` (`Persona_idPersona` ASC),
  CONSTRAINT `fk_Propietario_vehiculo_Vehiculo1`
    FOREIGN KEY (`Vehiculo_ID`)
    REFERENCES `SICOI`.`Vehiculo` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Propietario_vehiculo_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `SICOI`.`Persona` (`idPersona`)
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
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`ID_cond`, `Vehiculo_ID`, `Persona_idPersona`),
  INDEX `fk_Conductor_vehiculo_Persona1_idx` (`Persona_idPersona` ASC),
  CONSTRAINT `fk_Conductor_vehiculo_Vehiculo1`
    FOREIGN KEY (`Vehiculo_ID`)
    REFERENCES `SICOI`.`Vehiculo` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Conductor_vehiculo_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `SICOI`.`Persona` (`idPersona`)
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
-- Table `SICOI`.`Canalizacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Canalizacion` (
  `Reporte_idReporte` INT NOT NULL,
  `Institucion_idInstitucion` INT NOT NULL,
  PRIMARY KEY (`Reporte_idReporte`, `Institucion_idInstitucion`),
  INDEX `fk_Canalización_Institución1_idx` (`Institucion_idInstitucion` ASC),
  CONSTRAINT `fk_Canalización_Reporte1`
    FOREIGN KEY (`Reporte_idReporte`)
    REFERENCES `SICOI`.`Reporte` (`idReporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Canalización_Institución1`
    FOREIGN KEY (`Institucion_idInstitucion`)
    REFERENCES `SICOI`.`Institucion` (`idInstitucion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SICOI`.`Localidad_Zona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Localidad_Zona` (
  `Localidad_idLocalidad` INT NOT NULL AUTO_INCREMENT,
  `Zona_id` INT NOT NULL,
  PRIMARY KEY (`Localidad_idLocalidad`, `Zona_id`),
  INDEX `fk_Localidad_has_Zona_Zona1_idx` (`Zona_id` ASC),
  INDEX `fk_Localidad_has_Zona_Localidad1_idx` (`Localidad_idLocalidad` ASC),
  CONSTRAINT `fk_Localidad_has_Zona_Localidad1`
    FOREIGN KEY (`Localidad_idLocalidad`)
    REFERENCES `SICOI`.`Localidad` (`idLocalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Localidad_has_Zona_Zona1`
    FOREIGN KEY (`Zona_id`)
    REFERENCES `SICOI`.`Zona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SICOI`.`Privilegios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Privilegios` (
  `idPrivilegios` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_privilegio` varchar(45) NOT NULL,
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
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `sexo` int(11) NOT NULL COMMENT '1=masculino 2=femenino',
  `edad` int(11) NOT NULL,
  `Ocupacion` varchar(45) NOT NULL,
  `madre` varchar(120) DEFAULT NULL,
  `padre` varchar(120) DEFAULT NULL,
  `Colonia` varchar(120) NOT NULL,
  `Calle` varchar(120) NOT NULL,
  `num_ext` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPaciente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `SICOI`.`Sesiones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SICOI`.`Sesiones` (
   `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pas` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Fecha` timestamp NOT NULL,
  `Observaciones` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
