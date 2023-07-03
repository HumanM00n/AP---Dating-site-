CREATE DATABASES Adopte_GT
CREATE TABLE Destination(
   ID_destination VARCHAR(50),
   Pays VARCHAR(50) NOT NULL,
   Ville VARCHAR(50) NOT NULL,
   Date_voyage DATE NOT NULL,
   PRIMARY KEY(ID_destination)
);

CREATE TABLE Utilisateur(
   ID_utilisateur VARCHAR(50),
   Nom VARCHAR(20) NOT NULL,
   Prenom VARCHAR(20) NOT NULL,
   Pseudo VARCHAR(20) NOT NULL,
   Genre VARCHAR(20) NOT NULL,
   Email INT NOT NULL,
   Téléphone VARCHAR(10) NOT NULL,
   Photo BLOB,
   Centre_interet VARCHAR(100),
   Pays_visite VARCHAR(50),
   Pays_a_visiter VARCHAR(50) NOT NULL,
   ID_destination VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_utilisateur),
   FOREIGN KEY(ID_destination) REFERENCES Destination(ID_destination)
);

CREATE TABLE Discussion(
   ID_discussion VARCHAR(50),
   Contenu_message VARCHAR(50),
   ID_destination VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_discussion),
   UNIQUE(ID_destination),
   FOREIGN KEY(ID_destination) REFERENCES Destination(ID_destination)
);

CREATE TABLE Matchs(
   ID_match VARCHAR(50),
   ID_discussion VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_match),
   UNIQUE(ID_discussion),
   FOREIGN KEY(ID_discussion) REFERENCES Discussion(ID_discussion)
);

CREATE TABLE Matcher(
   ID_utilisateur VARCHAR(50),
   ID_match VARCHAR(50),
   PRIMARY KEY(ID_utilisateur, ID_match),
   FOREIGN KEY(ID_utilisateur) REFERENCES Utilisateur(ID_utilisateur),
   FOREIGN KEY(ID_match) REFERENCES Matchs(ID_match)
);
