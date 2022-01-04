SELECT * FROM softedu.perfilusuario;

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

insert into softedu.perfilusuario(descricao) value("Professor");

DROP TABLE IF EXISTS `softedu`.`categoriaatividade` ;

CREATE TABLE IF NOT EXISTS `softedu`.`categoriaatividade` (
  `idcategoriaAtividade` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`idcategoriaAtividade`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;





DROP TABLE IF EXISTS `softedu`.`nivelatividade` ;

CREATE TABLE IF NOT EXISTS `softedu`.`nivelatividade` (
  `idnivelAtividade` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `descricaoNivel` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idnivelAtividade`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



