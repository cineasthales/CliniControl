-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema clinicontrol
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clinicontrol
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clinicontrol` DEFAULT CHARACTER SET utf8 ;
USE `clinicontrol` ;

-- -----------------------------------------------------
-- Table `clinicontrol`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`cargo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  `profissionalSaude` TINYINT(1) NOT NULL,
  `tipoRegistro` VARCHAR(50) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`tipoProcedimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`tipoProcedimento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinicontrol`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`endereco` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(20) NOT NULL,
  `logradouro` VARCHAR(100) NOT NULL,
  `numero` INT(11) NOT NULL,
  `complemento` VARCHAR(100) NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinicontrol`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `nomeUsuario` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `nivel` INT(1) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `sobrenome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `dataNasc` DATE NOT NULL,
  `ativo` TINYINT(1) NOT NULL,
  `idEndereco` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_endereco1_idx` (`idEndereco` ASC),
  CONSTRAINT `fk_usuario_endereco1`
    FOREIGN KEY (`idEndereco`)
    REFERENCES `clinicontrol`.`endereco` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinicontrol`.`procedimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`procedimento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `hora` VARCHAR(5) NOT NULL,
  `descricao` LONGTEXT NULL,
  `receita` LONGTEXT NULL,
  `valor` DOUBLE NOT NULL,
  `realizado` TINYINT(1) NOT NULL,
  `idTipoProcedimento` INT(11) NOT NULL,
  `idPaciente` INT(11) NOT NULL,
  `idProfissional` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_encontro_tipoEncontro1_idx` (`idTipoProcedimento` ASC),
  INDEX `fk_procedimento_usuario1_idx` (`idPaciente` ASC),
  INDEX `fk_procedimento_usuario2_idx` (`idProfissional` ASC),
  CONSTRAINT `fk_encontro_tipoEncontro1`
    FOREIGN KEY (`idTipoProcedimento`)
    REFERENCES `clinicontrol`.`tipoProcedimento` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_procedimento_usuario1`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `clinicontrol`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_procedimento_usuario2`
    FOREIGN KEY (`idProfissional`)
    REFERENCES `clinicontrol`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`empresa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `razaoSocial` VARCHAR(100) NOT NULL,
  `nomeFantasia` VARCHAR(50) NOT NULL,
  `cnpj` VARCHAR(30) NOT NULL,
  `ativo` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`local` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  `ativo` TINYINT(1) NOT NULL,
  `idEmpresa` INT(11) NOT NULL,
  `idEndereco` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_Empresa` (`idEmpresa` ASC),
  INDEX `fk_local_endereco1_idx` (`idEndereco` ASC),
  CONSTRAINT `consultorio_ibfk_1`
    FOREIGN KEY (`idEmpresa`)
    REFERENCES `clinicontrol`.`empresa` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_local_endereco1`
    FOREIGN KEY (`idEndereco`)
    REFERENCES `clinicontrol`.`endereco` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`empregado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`empregado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `salario` DOUBLE NOT NULL,
  `registro` VARCHAR(50) NULL,
  `idCargo` INT(11) NOT NULL,
  `idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_Cargo` (`idCargo` ASC),
  INDEX `fk_funcionario_login1_idx` (`idUsuario` ASC),
  CONSTRAINT `funcionario_ibfk_2`
    FOREIGN KEY (`idCargo`)
    REFERENCES `clinicontrol`.`cargo` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_funcionario_login1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `clinicontrol`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`convenio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`convenio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cnpj` VARCHAR(30) NOT NULL,
  `ativo` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`adicional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`adicional` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  `valor` DOUBLE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinicontrol`.`usuario_convenio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`usuario_convenio` (
  `idUsuario` INT(11) NOT NULL,
  `idConvenio` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`, `idConvenio`),
  INDEX `fk_usuario_has_convenio_convenio1_idx` (`idConvenio` ASC),
  INDEX `fk_usuario_has_convenio_usuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_usuario_has_convenio_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `clinicontrol`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_has_convenio_convenio1`
    FOREIGN KEY (`idConvenio`)
    REFERENCES `clinicontrol`.`convenio` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinicontrol`.`especialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`especialidade` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinicontrol`.`empregado_especialidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`empregado_especialidade` (
  `idEmpregado` INT(11) NOT NULL,
  `idEspecialidade` INT(11) NOT NULL,
  PRIMARY KEY (`idEmpregado`, `idEspecialidade`),
  INDEX `fk_empregado_has_especialidade_especialidade1_idx` (`idEspecialidade` ASC),
  INDEX `fk_empregado_has_especialidade_empregado1_idx` (`idEmpregado` ASC),
  CONSTRAINT `fk_empregado_has_especialidade_empregado1`
    FOREIGN KEY (`idEmpregado`)
    REFERENCES `clinicontrol`.`empregado` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_empregado_has_especialidade_especialidade1`
    FOREIGN KEY (`idEspecialidade`)
    REFERENCES `clinicontrol`.`especialidade` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`telefone` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `clinicontrol`.`recuperar_senha`
-- -----------------------------------------------------
CREATE TABLE `recuperar_senha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codEmail` varchar(255) NOT NULL,
  `dataVal` datetime NOT NULL,
  `validade` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Table `clinicontrol`.`empregado_local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`empregado_local` (
  `idLocal` INT(11) NOT NULL,
  `idEmpregado` INT(11) NOT NULL,
  PRIMARY KEY (`idLocal`, `idEmpregado`),
  INDEX `fk_local_has_empregado_empregado1_idx` (`idEmpregado` ASC),
  INDEX `fk_local_has_empregado_local1_idx` (`idLocal` ASC),
  CONSTRAINT `fk_local_has_empregado_local1`
    FOREIGN KEY (`idLocal`)
    REFERENCES `clinicontrol`.`local` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_local_has_empregado_empregado1`
    FOREIGN KEY (`idEmpregado`)
    REFERENCES `clinicontrol`.`empregado` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`usuario_telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`usuario_telefone` (
  `idUsuario` INT(11) NOT NULL,
  `idTelefone` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`, `idTelefone`),
  INDEX `fk_usuario_has_telefone_copy1_telefone_copy11_idx` (`idTelefone` ASC),
  INDEX `fk_usuario_has_telefone_copy1_usuario1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_usuario_has_telefone_copy1_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `clinicontrol`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_has_telefone_copy1_telefone_copy11`
    FOREIGN KEY (`idTelefone`)
    REFERENCES `clinicontrol`.`telefone` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clinicontrol`.`empregado_adicional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`empregado_adicional` (
  `idEmpregado` INT(11) NOT NULL,
  `idAdicional` INT(11) NOT NULL,
  PRIMARY KEY (`idEmpregado`, `idAdicional`),
  INDEX `fk_empregado_has_adicional_adicional1_idx` (`idAdicional` ASC),
  INDEX `fk_empregado_has_adicional_empregado1_idx` (`idEmpregado` ASC),
  CONSTRAINT `fk_empregado_has_adicional_empregado1`
    FOREIGN KEY (`idEmpregado`)
    REFERENCES `clinicontrol`.`empregado` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_empregado_has_adicional_adicional1`
    FOREIGN KEY (`idAdicional`)
    REFERENCES `clinicontrol`.`adicional` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`administrador` (
  `idEmpregado` INT(11) NOT NULL,
  `idEmpresa` INT(11) NOT NULL,
  PRIMARY KEY (`idEmpregado`, `idEmpresa`),
  INDEX `fk_empregado_has_empresa_empresa1_idx` (`idEmpresa` ASC),
  INDEX `fk_empregado_has_empresa_empregado1_idx` (`idEmpregado` ASC),
  CONSTRAINT `fk_empregado_has_empresa_empregado1`
    FOREIGN KEY (`idEmpregado`)
    REFERENCES `clinicontrol`.`empregado` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_empregado_has_empresa_empresa1`
    FOREIGN KEY (`idEmpresa`)
    REFERENCES `clinicontrol`.`empresa` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `clinicontrol`.`telefoneLocal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinicontrol`.`telefoneLocal` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(11) NOT NULL,
  `idLocal` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_telefoneLocal_local1_idx` (`idLocal` ASC),
  CONSTRAINT `fk_telefoneLocal_local1`
    FOREIGN KEY (`idLocal`)
    REFERENCES `clinicontrol`.`local` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
