CREATE DATABASES Adopte_GT

CREATE TABLE Utilisateur(
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
   Bio VARCHAR(200)
);

CREATE TABLE Discussion(
   ID_discussion VARCHAR(200),
   Contenu_message VARCHAR(200),
   ID_destination VARCHAR(200) NOT NULL,
   PRIMARY KEY(ID_discussion)
  );

CREATE TABLE Matchs(
   ID_match VARCHAR(200),
   ID_discussion VARCHAR(200) NOT NULL,
   PRIMARY KEY(ID_match),
   UNIQUE(ID_discussion),
   FOREIGN KEY(ID_discussion) REFERENCES Discussion(ID_discussion)
);

CREATE TABLE Matcher(
   ID_utilisateur VARCHAR(200),
   ID_match VARCHAR(200),
   PRIMARY KEY(ID_utilisateur, ID_match),
   FOREIGN KEY(ID_utilisateur) REFERENCES Utilisateur(ID_utilisateur),
   FOREIGN KEY(ID_match) REFERENCES Matchs(ID_match)
);
