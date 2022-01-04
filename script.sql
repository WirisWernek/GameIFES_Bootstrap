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