CREATE DATABASE gestionComptes;
USE gestionComptes;

CREATE TABLE compte(
	login VARCHAR(255) PRIMARY KEY,
	mot_passe VARCHAR(255),
	etat BOOL
)