<?php
// ============================================================
// HPCI-SARL — Configuration de Production
// Inclure ce fichier dans db.php pour surcharger les valeurs
// ============================================================

// --- Environnement ---
define('APP_ENV', 'production'); // 'development' | 'production'
define('APP_NAME', 'HPCI-SARL');
define('APP_URL', 'https://hpci-sarl.net'); // URL de production

// --- Affichage des erreurs PHP ---
if (APP_ENV === 'production') {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
    // Les erreurs sont loguées, jamais affichées
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/logs/php_errors.log');
} else {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// --- Fuseau horaire ---
date_default_timezone_set('Africa/Brazzaville');

// --- Session sécurisée ---
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
// ini_set('session.cookie_secure', 1); // Décommenter si HTTPS activé
