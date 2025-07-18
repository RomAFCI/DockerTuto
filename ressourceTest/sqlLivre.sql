DROP TABLE IF EXISTS Personne;
CREATE TABLE Personne (
    idPersonne int AUTO_INCREMENT NOT NULL,
    nomPersonne VARCHAR(50),
    prenomPersonne VARCHAR(50),
    telephone INT,
    adresse VARCHAR(50),
    PRIMARY KEY (idPersonne)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS Livre;
CREATE TABLE Livre (
    idLivre int AUTO_INCREMENT NOT NULL,
    nbPage INT,
    nomLivre VARCHAR(50),
    PRIMARY KEY (idLivre)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS genre;
CREATE TABLE genre (
    idGenre int AUTO_INCREMENT NOT NULL,
    nomGenre VARCHAR,
    PRIMARY KEY (idGenre)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS Auteur;
CREATE TABLE Auteur (
    idAuteur int AUTO_INCREMENT NOT NULL,
    nomAuteur VARCHAR(50),
    PRIMARY KEY (idAuteur)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS emprunter;
CREATE TABLE emprunter (
    idPersonne int AUTO_INCREMENT NOT NULL,
    idLivre INT NOT NULL,
    PRIMARY KEY (idPersonne, idLivre)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS etre_de;
CREATE TABLE etre_de (
    idLivre int AUTO_INCREMENT NOT NULL,
    idGenre INT NOT NULL,
    PRIMARY KEY (idLivre, idGenre)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS ecrire;
CREATE TABLE ecrire (
    idLivre int AUTO_INCREMENT NOT NULL,
    idAuteur INT NOT NULL,
    PRIMARY KEY (idLivre, idAuteur)
) ENGINE = InnoDB;
ALTER TABLE emprunter
ADD CONSTRAINT FK_emprunter_idPersonne FOREIGN KEY (idPersonne) REFERENCES Personne (idPersonne);
ALTER TABLE emprunter
ADD CONSTRAINT FK_emprunter_idLivre FOREIGN KEY (idLivre) REFERENCES Livre (idLivre);
ALTER TABLE etre_de
ADD CONSTRAINT FK_etre_de_idLivre FOREIGN KEY (idLivre) REFERENCES Livre (idLivre);
ALTER TABLE etre_de
ADD CONSTRAINT FK_etre_de_idGenre FOREIGN KEY (idGenre) REFERENCES genre (idGenre);
ALTER TABLE ecrire
ADD CONSTRAINT FK_ecrire_idLivre FOREIGN KEY (idLivre) REFERENCES Livre (idLivre);
ALTER TABLE ecrire
ADD CONSTRAINT FK_ecrire_idAuteur FOREIGN KEY (idAuteur) REFERENCES Auteur (idAuteur);