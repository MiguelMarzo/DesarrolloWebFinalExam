-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema jobeet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema jobeet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jobeet` DEFAULT CHARACTER SET latin1 ;
USE `jobeet` ;

-- -----------------------------------------------------
-- Table `jobeet`.`job`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jobeet`.`job` (
  `idJob` INT(11) NOT NULL AUTO_INCREMENT,
  `position` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `company` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `logo` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `description` VARCHAR(255) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `salary` DECIMAL(10,0) NULL DEFAULT NULL,
  PRIMARY KEY (`idJob`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
