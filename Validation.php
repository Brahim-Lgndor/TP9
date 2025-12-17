<?php
// validation.php (Code Final)
session_start();
require 'config.php';

// ----------------------------------------------------
// A. GESTION DE LA DÉCONNEXION (Étape 3)
// ----------------------------------------------------
if (isset($_GET['afaire']) && $_GET['afaire'] === 'deconnexion') {
    // 1. Destruction de la session
    session_destroy();
    // 2. Redirection vers login.php avec le code d'erreur 3
    header('Location: login.php?erreur=3'); 
    exit();
}

// ----------------------------------------------------
// B. GESTION DE LA CONNEXION (Étapes 1 et 2)
// ----------------------------------------------------
$login = $_POST['login'] ?? '';
$pass = $_POST['pass'] ?? '';

// Erreur 1 : Champs vides
if (empty($login) || empty($pass)) {
    header('Location: login.php?erreur=1');
    exit();
}

// Erreur 2 : Identifiants incorrects
if ($login !== USERLOGIN || $pass !== USERPASS) {
    header('Location: login.php?erreur=2');
    exit();
}

// Succès : Connexion réussie (Étape 2)

// 1. Création de la variable de session de connexion
$_SESSION['CONNECT'] = 'OK';
// 2. Stockage du login
$_SESSION['login'] = $login; 
// 3. Stockage du mot de passe (moins sécurisé, mais demandé)
$_SESSION['pass'] = $pass; 

// Redirection vers accueil.php
header('Location: acceuil.php');
exit();
?>