CREATE DATABASE Adopte_GT;

USE Adopte_GT;

CREATE TABLE Utilisateur (
   ID_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
   Nom VARCHAR(200) NOT NULL,
   Prenom VARCHAR(200) NOT NULL,
   Pseudo VARCHAR(200) NOT NULL,
   Genre VARCHAR(200) NOT NULL,
   Email VARCHAR(200) NOT NULL,
   DateNaissance DATE NOT NULL,
   Telephone VARCHAR(200) NOT NULL,
   Photo BLOB,
   Centre_interet VARCHAR(200),
   Pays_visite VARCHAR(200),
   Bio VARCHAR(255)
);

CREATE TABLE Discussion (
   ID_discussion INT AUTO_INCREMENT PRIMARY KEY,
   Contenu_message VARCHAR(200),
   ID_destination INT NOT NULL,
   FOREIGN KEY(ID_destination) REFERENCES Utilisateur(ID_utilisateur)
);

CREATE TABLE Matchs (
   ID_match INT AUTO_INCREMENT PRIMARY KEY,
   ID_discussion INT NOT NULL,
   FOREIGN KEY(ID_discussion) REFERENCES Discussion(ID_discussion)
);

CREATE TABLE Matcher (
   ID_matcher INT AUTO_INCREMENT PRIMARY KEY,
   ID_utilisateur INT,
   ID_match INT,
   FOREIGN KEY(ID_utilisateur) REFERENCES Utilisateur(ID_utilisateur),
   FOREIGN KEY(ID_match) REFERENCES Matchs(ID_match)
);
