-- ============================================================
-- HPCI-SARL — Script d'initialisation de la base de données
-- Version : Production (2026)
-- ============================================================

CREATE DATABASE IF NOT EXISTS hpci_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hpci_db;

-- -----------------------------------------------
-- Table des administrateurs
-- -----------------------------------------------
CREATE TABLE IF NOT EXISTS admins (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(50)  NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------
-- Table des actualités
-- -----------------------------------------------
CREATE TABLE IF NOT EXISTS news (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    title        VARCHAR(255) NOT NULL,
    content      TEXT         NOT NULL,
    image_url    VARCHAR(255),
    category     VARCHAR(50),
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------
-- Table de la médiathèque
-- -----------------------------------------------
CREATE TABLE IF NOT EXISTS media (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    title      VARCHAR(255),
    file_url   VARCHAR(255) NOT NULL,
    type       ENUM('image', 'video') DEFAULT 'image',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------
-- Table des offres d'emploi
-- -----------------------------------------------
CREATE TABLE IF NOT EXISTS jobs (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    job_title   VARCHAR(255) NOT NULL,
    location    VARCHAR(100),
    description TEXT,
    deadline    DATE,
    is_active   TINYINT(1) DEFAULT 1,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- -----------------------------------------------
-- Table des paramètres (Maintenance, etc.)
-- -----------------------------------------------
CREATE TABLE IF NOT EXISTS settings (
    setting_key   VARCHAR(50) PRIMARY KEY,
    setting_value TEXT
);

-- -----------------------------------------------
-- Données initiales
-- -----------------------------------------------

-- Compte admin : identifiant = admin | mot de passe = Hpci@2026!
INSERT IGNORE INTO admins (username, password)
VALUES ('admin', '$2y$12$Wp1zIHJ6gUFZCIDJbkw1FOZCbVmQO/GMvErcXX9Wd0168fHXJD3XC');
-- Changer ce mot de passe dès la première connexion en production !

-- Paramètre maintenance : désactivé par défaut
INSERT IGNORE INTO settings (setting_key, setting_value) VALUES ('maintenance_mode', 'off');
INSERT IGNORE INTO settings (setting_key, setting_value) VALUES ('maintenance_message', 'Nous sommes actuellement en maintenance. Nous revenons très bientôt !');
