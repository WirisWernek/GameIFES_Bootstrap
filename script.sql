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

-- -----------------------------------------------------
-- Table `softedu`.`tabuleiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`tabuleiro` ;

CREATE TABLE IF NOT EXISTS `softedu`.`tabuleiro` (
  `idtabuleiro` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `plantaTabuleiro` VARCHAR(1000) NULL DEFAULT NULL COMMENT '',
  `descricao` VARCHAR(50) NOT NULL COMMENT '',
  `dataCriacao` DATE NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idtabuleiro`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `softedu`.`atividade_aluno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`atividade_aluno` ;

CREATE TABLE IF NOT EXISTS `softedu`.`atividade_aluno` (
  `idatividade_aluno` INT AUTO_INCREMENT NOT NULL COMMENT '',
  `descricaoatividade` VARCHAR(100) NULL COMMENT '',
  `tabuleiroid` INT NOT NULL COMMENT '',
  `usuarioid` INT NOT NULL COMMENT '',
  `status` VARCHAR(45) NULL COMMENT '',
  `datainicio` DATETIME NULL COMMENT '',
  `datafim` DATETIME NULL COMMENT '',
  `atividadeid` INT NULL COMMENT '',
  PRIMARY KEY (`idatividade_aluno`)  COMMENT '')
ENGINE = InnoDB;

CREATE INDEX `atividade_aluno_tabuleiro_idx` ON `softedu`.`atividade_aluno` (`tabuleiroid` ASC)  COMMENT '';

CREATE INDEX `atividade_aluno_usuario_idx` ON `softedu`.`atividade_aluno` (`usuarioid` ASC)  COMMENT '';

CREATE INDEX `atividade_aluno_atividade_idx` ON `softedu`.`atividade_aluno` (`atividadeid` ASC)  COMMENT '';

use softedu;
DELIMITER $$
CREATE PROCEDURE atividade()
begin
		select atividade.idatividade as IdAtividade,
        atividade.descricacao as Descricao,
		nivel.descricaoNivel as Nivel,
		categoria.descricao as Categoria
        from atividade inner join nivelatividade nivel
        on atividade.nivelatividadeid = nivel.idnivelAtividade
        inner join categoriaatividade categoria on atividade.categoriaatividadeid = categoria.idcategoriaAtividade;
    end
$$
call atividade();


DELIMITER $$
CREATE PROCEDURE atividades_em_andamento(
in id int)
begin
		select atividade_aluno.idatividade_aluno as ID,
        atividade_aluno.descricaoatividade as Descricao,
		atividade_aluno.`status` as `Status`,
        atividade_aluno.datainicio as Inicio,
        atividade_aluno.atividadeid as IdAtividade,
        tabuleiro.plantaTabuleiro as Tabuleiro
        from atividade_aluno inner join tabuleiro
        on atividade_aluno.tabuleiroid = tabuleiro.idtabuleiro
        where usuarioid = id and `Status` != "Finalizado";
    end
$$

call atividades_em_andamento(3);

DELIMITER $$
CREATE PROCEDURE atividades_finalizadas(
in id int)
begin
		select atividade_aluno.idatividade_aluno as ID,
        atividade_aluno.descricaoatividade as Descricao,
		atividade_aluno.`status` as `Status`,
        atividade_aluno.datainicio as Inicio,
        atividade_aluno.atividadeid as IdAtividade,
        tabuleiro.plantaTabuleiro as Tabuleiro
        from atividade_aluno inner join tabuleiro
        on atividade_aluno.tabuleiroid = tabuleiro.idtabuleiro
        where usuarioid = id and `Status` = "Finalizado";
    end
$$

call atividades_finalizadas(3);