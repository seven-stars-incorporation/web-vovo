/* MER:*/

/*DROP DATABASE bddicadavovo2;*/

CREATE DATABASE bddicadavovo2;

USE bddicadavovo2;

CREATE TABLE tbUsuario
(
    `idUsuario`    INTEGER PRIMARY KEY AUTO_INCREMENT,
    `nomeUsuario`  VARCHAR(80),
    `usuario`      VARCHAR(50),
    `senhaUsuario` VARCHAR(50),
    `emailUsuario` VARCHAR(80),
    `isAdm`        BOOLEAN
);

CREATE TABLE tbFavoritos
(
    idFavoritos INTEGER PRIMARY KEY AUTO_INCREMENT,
    idReceita   INTEGER,
    idUsuario   INTEGER
);

CREATE TABLE tbReceita
(
    idReceita      INTEGER PRIMARY KEY AUTO_INCREMENT,
    nomeReceita    VARCHAR(100),
    modoPreparo    TEXT,
    tempoReceita   INTEGER,
    porcoesReceita INTEGER,
    caminhoImg     TEXT
);

CREATE TABLE tbReceitaIngrediente
(
    idReceitaIngrediente INTEGER PRIMARY KEY AUTO_INCREMENT,
    idReceita            INTEGER,
    unidadeIngrediente   VARCHAR(50),
    idIngrediente        INTEGER
);

CREATE TABLE tbIngrediente
(
    idIngrediente    INTEGER PRIMARY KEY AUTO_INCREMENT,
    nomeIngrediente  TEXT,
    valorIngrediente FLOAT
);

CREATE TABLE tbCategoria
(
    idCategoria  INTEGER PRIMARY KEY AUTO_INCREMENT,
    idReceita    INTEGER,
    desCategoria VARCHAR(100)
);

CREATE TABLE tbSubcategoria
(
    idSubcategoria   INTEGER PRIMARY KEY AUTO_INCREMENT,
    idReceita        INTEGER,
    descSubcategoria VARCHAR(80)
);

CREATE TABLE tbPreferencias
(
    idPreferencias INTEGER PRIMARY KEY AUTO_INCREMENT,
    idCategoria    INTEGER,
    idSubCategoria INTEGER,
    idUsuario      INTEGER
);


ALTER TABLE tbFavoritos
    ADD CONSTRAINT FK_tbFavoritos_tbReceita
        FOREIGN KEY (idReceita)
            REFERENCES tbReceita (idReceita);

ALTER TABLE tbFavoritos
    ADD CONSTRAINT FK_tbFavoritos_tbUsuario
        FOREIGN KEY (idUsuario)
            REFERENCES tbUsuario (idUsuario);

ALTER TABLE tbReceitaIngrediente
    ADD CONSTRAINT FK_tbReceitaIngrediente_tbReceita
        FOREIGN KEY (idReceita)
            REFERENCES tbReceita (idReceita);

ALTER TABLE tbReceitaIngrediente
    ADD CONSTRAINT FK_tbReceitaIngrediente_tbIngrediente
        FOREIGN KEY (idIngrediente)
            REFERENCES tbIngrediente (idIngrediente);

ALTER TABLE tbCategoria
    ADD CONSTRAINT FK_tbCategoria_tbReceita
        FOREIGN KEY (idReceita)
            REFERENCES tbReceita (idReceita);

ALTER TABLE tbSubcategoria
    ADD CONSTRAINT FK_tbSubcategoria_tbReceita
        FOREIGN KEY (idReceita)
            REFERENCES tbReceita (idReceita);

ALTER TABLE tbPreferencias
    ADD CONSTRAINT FK_tbPreferencias_tbCategoria
        FOREIGN KEY (idCategoria)
            REFERENCES tbCategoria (idCategoria);

ALTER TABLE tbPreferencias
    ADD CONSTRAINT FK_tbPreferencias_tbSubCategoria
        FOREIGN KEY (idSubCategoria)
            REFERENCES tbSubcategoria (idSubCategoria);

ALTER TABLE tbPreferencias
    ADD CONSTRAINT FK_tbPreferencias_tbUsuario
        FOREIGN KEY (idUsuario)
            REFERENCES tbUsuario (idUsuario);

ALTER TABLE `tbingrediente`
    ADD UNIQUE (`nomeIngrediente`);

DELIMITER $$
CREATE PROCEDURE `cadastrar_receitaIngrediente`(IN `idReceitaIN` INT, IN `unidadeIngredienteIN` VARCHAR(50), IN `nomeIngredienteIN` VARCHAR(100), IN `valorIngredienteIN` FLOAT)
BEGIN
    DECLARE idIngredienteVAR INT(11);

    INSERT INTO tbingrediente(`nomeIngrediente`, `valorIngrediente`)
    VALUES (nomeIngredienteIN, valorIngredienteIN)
    ON DUPLICATE KEY UPDATE
                         nomeIngrediente = VALUES(nomeIngrediente),
                         valorIngrediente = VALUES(valorIngrediente),
                         idIngrediente = LAST_INSERT_ID(idIngrediente);

    SET idIngredienteVAR = (SELECT LAST_INSERT_ID());

    INSERT INTO `tbreceitaingrediente`(`idReceita`, `unidadeIngrediente`, `idIngrediente`) VALUES(idReceitaIN, unidadeIngredienteIN, idIngredienteVAR);
END$$
DELIMITER ;