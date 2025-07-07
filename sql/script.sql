CREATE DATABASE tp_flight CHARACTER SET utf8mb4;

USE tp_flight;

CREATE TABLE etablissement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    montant_disponible DECIMAL(15,2) NOT NULL DEFAULT 0,
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE type_pret (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL,
    id_etablissement INT NOT NULL,
    FOREIGN KEY (id_etablissement) REFERENCES etablissement(id),
    taux_interet DECIMAL(5,2) NOT NULL
);

CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100),
    email VARCHAR(150),
    telephone VARCHAR(20),
    date_enregistrement DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pret_client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_type_pret INT NOT NULL,
    montant DECIMAL(15,2) NOT NULL,
    duree_mois INT NOT NULL,
    taux_interet DECIMAL(5,2) NOT NULL,
    statut ENUM('en_attente', 'approuve', 'rejete') DEFAULT 'en_attente',
    date_demande DATETIME DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_client) REFERENCES client(id),
    FOREIGN KEY (id_type_pret) REFERENCES type_pret(id)
);


DELIMITER //

CREATE PROCEDURE AjoutFond(
    IN p_id INT,
    IN p_amount DECIMAL(15,2)
)
BEGIN
    UPDATE etablissement
    SET montant_disponible = montant_disponible + p_amount
    WHERE id = p_id;
END //

DELIMITER ;