CREATE DATABASE centre_formation;

USE centre_formation;

CREATE TABLE Langage( 
	id INT PRIMARY KEY AUTO_INCREMENT,
	titre VARCHAR(255),
	DESCRIPTION VARCHAR(255)
)

CREATE TABLE Examen ( 
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(255),
	langage_id int,
	niveau VARCHAR(255),
	date_examen DATE,
	
	FOREIGN KEY (langage_id) REFERENCES langage(id)
)