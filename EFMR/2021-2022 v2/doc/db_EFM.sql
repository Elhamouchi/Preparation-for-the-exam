CREATE DATABASE gestionproduit_v2;
USE gestionproduit_ve;

CREATE TABLE Categorie(
idCategorie INT AUTO_INCREMENT PRIMARY KEY ,
denomination VARCHAR(255),
DESCRIPTION TEXT
);

create table Produit(
	REFERENCE INT AUTO_INCREMENT PRIMARY KEY, 
	libelle text,
	prixUnitaire float, 
	dateAchat date, 
	photoProduit VARCHAR(255),
	idCategorie INT,
	FOREIGN KEY (idCategorie) REFERENCES categorie(idCategorie)
);


create table CompteProprietaire(
	loginProp VARCHAR(255) PRIMARY key, 
	motPasse VARCHAR(255),
	nom VARCHAR(25),
	prenom VARCHAR(25)
)

