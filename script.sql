-- -----------------------------------------------------
-- Table `softedu`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`usuario` ;

CREATE TABLE IF NOT EXISTS `softedu`.`usuario` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `nomeCompletoUsuario` VARCHAR(50) NOT NULL COMMENT '',
  `senha` VARCHAR(256) NOT NULL COMMENT '',
  `login` VARCHAR(45) NOT NULL COMMENT '',
  `dataCadastro` DATE NOT NULL COMMENT '',
  `perfilUsuarioID` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`idusuario`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `login_UNIQUE` ON `softedu`.`usuario` (`login` ASC)  COMMENT '';

CREATE INDEX `idPerfilUsuario_idx` ON `softedu`.`usuario` (`perfilUsuarioID` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `softedu`.`categoriaatividade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`categoriaatividade` ;

CREATE TABLE IF NOT EXISTS `softedu`.`categoriaatividade` (
  `idcategoriaAtividade` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`idcategoriaAtividade`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `softedu`.`nivelatividade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`nivelatividade` ;

CREATE TABLE IF NOT EXISTS `softedu`.`nivelatividade` (
  `idnivelAtividade` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `descricaoNivel` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idnivelAtividade`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `softedu`.`atividade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`atividade` ;

CREATE TABLE IF NOT EXISTS `softedu`.`atividade` (
  `idatividade` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricacao` VARCHAR(100) NOT NULL COMMENT '',
  `categoriaatividadeid` INT NOT NULL COMMENT '',
  `nivelatividadeid` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idatividade`)  COMMENT '')
ENGINE = InnoDB;

CREATE INDEX `atividade_categoriaatividadeid_idx` ON `softedu`.`atividade` (`categoriaatividadeid` ASC)  COMMENT '';

CREATE INDEX `atividade_nivelatividade_idx` ON `softedu`.`atividade` (`nivelatividadeid` ASC)  COMMENT '';

-- -----------------------------------------------------
-- Table `softedu`.`perfilusuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`perfilusuario` ;

CREATE TABLE IF NOT EXISTS `softedu`.`perfilusuario` (
  `idPerfilUsuario` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idPerfilUsuario`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


INSERT INTO perfilusuario(descricao) VALUES("Adiministrador"),("Professor"),("Aluno");
