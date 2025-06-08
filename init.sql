# ... added section ...
-- Création de la base de données utilisateurs si elle n'existe pas
CREATE DATABASE IF NOT EXISTS utilisateurs;

-- Utilisation de la base de données utilisateurs
USE utilisateurs;

-- Table pour les administrateurs
CREATE TABLE IF NOT EXISTS administrateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL, -- Stockez des mots de passe hachés
    email VARCHAR(100) UNIQUE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les utilisateurs standards
CREATE TABLE IF NOT EXISTS standards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL, -- Stockez des mots de passe hachés
    email VARCHAR(100) UNIQUE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

-- Création de la base de données catalogue si elle n'existe pas
CREATE DATABASE IF NOT EXISTS catalogue;

-- Utilisation de la base de données catalogue
USE catalogue;

-- Table pour les éditeurs
CREATE TABLE IF NOT EXISTS editeurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE,
    pays VARCHAR(50),
    site_web VARCHAR(255)
);

-- Table pour les jeux
CREATE TABLE IF NOT EXISTS jeux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    editeur_id INT,
    annee_sortie YEAR,
    genre VARCHAR(100),
    FOREIGN KEY (editeur_id) REFERENCES editeurs(id) ON DELETE SET NULL
);
# ... end added section ...