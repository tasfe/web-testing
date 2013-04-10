SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `adatok` ;
CREATE SCHEMA IF NOT EXISTS `adatok` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `adatok` ;

-- -----------------------------------------------------
-- Table `adatok`.`adatok`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adatok`.`adatok` ;

CREATE  TABLE IF NOT EXISTS `adatok`.`adatok` (
  `idadatok` INT NOT NULL ,
  `emailcím` VARCHAR(45) NULL ,
  `jelszó` VARCHAR(45) NULL ,
  `családnév` VARCHAR(20) NULL ,
  `keresztnév` VARCHAR(20) NULL ,
  `nem` CHAR NULL ,
  `szuletési_dátum` DATE NULL ,
  `település` VARCHAR(45) NULL ,
  `megye` VARCHAR(45) NULL ,
  `utca` VARCHAR(45) NULL ,
  `házszam` INT NULL ,
  `telefonszám` VARCHAR(14) NULL ,
  `végzettség` VARCHAR(45) NULL ,
  PRIMARY KEY (`idadatok`) )
ENGINE = InnoDB;

USE `adatok` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
