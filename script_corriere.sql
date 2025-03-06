create database corriere;


CREATE TABLE corriere.utenti (
    id INT  PRIMARY key AUTO_INCREMENT,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    punti_fedelta INT DEFAULT 0
);


CREATE TABLE corriere.sedi (
    id INT PRIMARY key AUTO_INCREMENT,
    nome VARCHAR(100),
    città VARCHAR(100)
);

CREATE TABLE corriere.spedizioni (
    id INT  PRIMARY key AUTO_INCREMENT,
    codice_plico VARCHAR(20) UNIQUE,
    id_mittente INT,
    id_destinatario INT,
    id_sede_partenza INT,
    id_sede_arrivo INT,
    data_consegna DATETIME,
    data_spedizione DATETIME NULL,
    data_ritiro DATETIME NULL,
    FOREIGN KEY (id_mittente) REFERENCES utenti(id),
    FOREIGN KEY (id_destinatario) REFERENCES utenti(id),
    FOREIGN KEY (id_sede_partenza) REFERENCES sedi(id),
    FOREIGN KEY (id_sede_arrivo) REFERENCES sedi(id)
);