-- CREACIO USUARI PHP

CREATE USER IF NOT EXISTS 'Grup4'@'%' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON institut_montsia.* TO 'Grup4'@'%';
FLUSH PRIVILEGES;

-- CREACIO BD (SI NO EXISTEIX)

CREATE DATABASE IF NOT EXISTS institut_montsia CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE institut_montsia;

-- CREACIÓ DE TAULES

-- Taula Ubicacions
CREATE TABLE Ubicacions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(6) NOT NULL
);

-- Taula TipusMaterial
CREATE TABLE TipusMaterial (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipus VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    origen VARCHAR(50) NOT NULL
);

-- Taula Alumnes
CREATE TABLE Alumnes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    cognom1 VARCHAR(50) NOT NULL,
    cognom2 VARCHAR(50),
    correu VARCHAR(50) NOT NULL,
    grupClasse VARCHAR(10) NOT NULL
);

-- Taula Usuaris
CREATE TABLE Usuaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    cognom1 VARCHAR(50) NOT NULL,
    cognom2 VARCHAR(50),
    correu VARCHAR(100) NOT NULL UNIQUE,
    contrasenya_hash VARCHAR(255) NOT NULL,
    rol ENUM('PROFESSOR', 'ALUMNE') NOT NULL DEFAULT 'ALUMNE',
    idAlumne INT,
    actiu TINYINT(1) NOT NULL DEFAULT 1,
    creatEl DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Taula Estats
CREATE TABLE Estats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    estat VARCHAR(50) NOT NULL
);

-- Taula Material
CREATE TABLE Material (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idTipus INT NOT NULL,
    idInventari VARCHAR(10) NOT NULL,
    etiquetaDepInf VARCHAR(50),
    numSerie VARCHAR(50),
    macEthernet VARCHAR(50),
    macWifi VARCHAR(50),
    SACE VARCHAR(50),
    dataAdquisicio DATE,
    idUbicacio INT NOT NULL
);

-- Taula Assignacions
CREATE TABLE Assignacions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idMaterial INT NOT NULL,
    idAlumne INT NOT NULL,
    dataInici DATE NOT NULL,
    dataFinal DATE
);

-- Taula Incidencies
CREATE TABLE Incidencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    informacio VARCHAR(5000) NOT NULL,
    dataOberta DATE NOT NULL,
    dataTancada DATE,
    idAlumne INT NOT NULL,
    idDispositiu INT NOT NULL,
    idEstat INT NOT NULL
);

-- RELACIONS

-- Relacions de Material
ALTER TABLE Material ADD FOREIGN KEY (idTipus) REFERENCES TipusMaterial(id);
ALTER TABLE Material ADD FOREIGN KEY (idUbicacio) REFERENCES Ubicacions(id);

-- Relacions d'Assignacions
ALTER TABLE Assignacions ADD FOREIGN KEY (idMaterial) REFERENCES Material(id);
ALTER TABLE Assignacions ADD FOREIGN KEY (idAlumne) REFERENCES Alumnes(id);

-- Relacions d'Incidencies
ALTER TABLE Incidencies ADD FOREIGN KEY (idAlumne) REFERENCES Alumnes(id);
ALTER TABLE Incidencies ADD FOREIGN KEY (idDispositiu) REFERENCES Material(id);
ALTER TABLE Incidencies ADD FOREIGN KEY (idEstat) REFERENCES Estats(id);

-- Relacions d'Usuaris
ALTER TABLE Usuaris ADD UNIQUE KEY unique_usuari_alumne (idAlumne);
ALTER TABLE Usuaris ADD FOREIGN KEY (idAlumne) REFERENCES Alumnes(id);

