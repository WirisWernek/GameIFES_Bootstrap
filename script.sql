-- -----------------------------------------------------
-- Schema softedu
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `softedu` DEFAULT CHARACTER SET utf8 ;
USE `softedu`;

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
  `usuario` INT NOT NULL COMMENT '',
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

-- -----------------------------------------------------
-- Table `softedu`.`tipoimagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`tipoimagem` ;

CREATE TABLE IF NOT EXISTS `softedu`.`tipoimagem` (
  `idtipoimagem` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `tipoimagem` VARCHAR(45) NOT NULL COMMENT '',
  `descricao` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idtipoimagem`)  COMMENT '')
ENGINE = InnoDB;


INSERT INTO tipoimagem(tipoimagem, descricao) VALUES
("PNG","Portable Network Graphics"),
("JPEG","Joint Photographic Experts Group"),
("GIF","Graphics Interchange Format"),
("SVG","Scalable Vector Graphics"),
("BPM","Bitmap"),
("PDF","Portable Document Format"),
("TIFF","Tagged Image File Format"),
("PSD","Adobe Photoshop Document"),
("EXIF","Exchangeable Image File Format"),
("EPS","Encapsulated PostScript");

-- -----------------------------------------------------
-- Table `softedu`.`imagenstabuleiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`imagenstabuleiro` ;

CREATE TABLE IF NOT EXISTS `softedu`.`imagenstabuleiro` (
  `idimagenstabuleiro` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `urlImagem` VARCHAR(45) NOT NULL COMMENT '',
  `tipoimagemid` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idimagenstabuleiro`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `urlImagem_UNIQUE` ON `softedu`.`imagenstabuleiro` (`urlImagem` ASC)  COMMENT '';

CREATE INDEX `imagenstabuleiro_tipoimagem_idx` ON `softedu`.`imagenstabuleiro` (`tipoimagemid` ASC)  COMMENT '';

-- -----------------------------------------------------
-- Table `softedu`.`tabuleiro_imagenstabuleiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `softedu`.`tabuleiro_imagenstabuleiro` ;

CREATE TABLE IF NOT EXISTS `softedu`.`tabuleiro_imagenstabuleiro` (
  `idtabuleiro_imagenstabuleiro` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `tabuleiroID` INT(11) NOT NULL COMMENT '',
  `imagenstabuleiroID` INT(11) NOT NULL COMMENT '',
  `posicaoTabuleiro` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`idtabuleiro_imagenstabuleiro`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `tabuleiro_imagenstabuleiro_tabuleiro_idx` ON `softedu`.`tabuleiro_imagenstabuleiro` (`tabuleiroID` ASC)  COMMENT '';

CREATE INDEX `tabuleiro_imagenstabuleiro_imgstabuleiro_idx` ON `softedu`.`tabuleiro_imagenstabuleiro` (`imagenstabuleiroID` ASC)  COMMENT '';

-- -----------------------------------------------------
-- PROCEDURES 
-- -----------------------------------------------------
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
        where atividade_aluno.usuarioid = id and `Status` != "Finalizado";
    end
$$

DELIMITER $$
CREATE PROCEDURE atividades_finalizadas(
in id int)
begin
		select atividade_aluno.idatividade_aluno as ID,
        atividade_aluno.descricaoatividade as Descricao,
		    atividade_aluno.`status` as `Status`,
        atividade_aluno.datainicio as Inicio,
        atividade_aluno.datafim as Fim,
        atividade_aluno.atividadeid as IdAtividade,
        tabuleiro.plantaTabuleiro as Tabuleiro
        from atividade_aluno inner join tabuleiro
        on atividade_aluno.tabuleiroid = tabuleiro.idtabuleiro
        where atividade_aluno.usuarioid = id and `Status` = "Finalizado";
    end
$$

DELIMITER $$
CREATE PROCEDURE imagensTabuleiro()
begin
		select imagenstabuleiro.idimagenstabuleiro as ID,
        imagenstabuleiro.urlImagem as URL,
		tipoimagem.tipoimagem as Tipo
        from imagenstabuleiro inner join tipoimagem
        on imagenstabuleiro.tipoimagemid = tipoimagem.idtipoimagem;
    end
$$

DELIMITER $$
CREATE PROCEDURE tabuleiro_imagem()
begin
		select tabuleiro_imagenstabuleiro.idtabuleiro_imagenstabuleiro as ID,
        tabuleiro_imagenstabuleiro.posicaoTabuleiro as Posicao,
		imagenstabuleiro.urlImagem as Imagem,
        tabuleiro.descricao as Tabuleiro
        from tabuleiro_imagenstabuleiro inner join tabuleiro
        on tabuleiro_imagenstabuleiro.tabuleiroID = tabuleiro.idtabuleiro
        inner join  imagenstabuleiro on tabuleiro_imagenstabuleiro.imagenstabuleiroID = imagenstabuleiro.idimagenstabuleiro;
    end
$$

-- Exemplos de Chamadas das Procedures
-- call atividade();
-- call atividades_em_andamento(3);
-- call atividades_finalizadas(3);
-- call imagensTabuleiro();
-- call tabuleiro_imagem();