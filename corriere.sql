create database corriere;


CREATE TABLE corriere.personale (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Password criptata
    tema_colore VARCHAR(50),
    data_creazione DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabella per i clienti
CREATE TABLE corriere.clienti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    indirizzo VARCHAR(255) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    punti_fedelta INT DEFAULT 0, -- Punti fedeltà accumulati
    data_creazione DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabella per i plichi
CREATE TABLE corriere.plichi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codice INT UNIQUE NOT NULL,
    id_mittente INT NOT NULL, -- Riferimento al cliente mittente
    id_destinatario INT NOT NULL, -- Riferimento al cliente destinatario
    stato ENUM('consegnato', 'spedito', 'in_transito') DEFAULT 'in_transito',
    data_consegna DATETIME,
    data_spedizione DATETIME,
    data_ritiro DATETIME,
    FOREIGN KEY (id_mittente) REFERENCES clienti(id),
    FOREIGN KEY (id_destinatario) REFERENCES clienti(id)
);

-- Tabella per le spedizioni
CREATE TABLE corriere.spedizioni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pacco INT NOT NULL, -- Riferimento al pacco
    id_personale INT NOT NULL, -- Responsabile della spedizione
    data_inizio DATETIME NOT NULL,
    data_fine DATETIME,
    FOREIGN KEY (id_pacco) REFERENCES plichi(id),
    FOREIGN KEY (id_personale) REFERENCES personale(id)
);








