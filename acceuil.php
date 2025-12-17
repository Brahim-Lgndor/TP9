<?php
// accueil.php (Code Final - Étapes 2 et 3)
session_start();

// Étape 3 : Vérification de la variable de session CONNECT
if (!isset($_SESSION['CONNECT']) || $_SESSION['CONNECT'] !== 'OK') {
    // Si la session n'est pas valide, redirection vers la page de connexion
    header('Location: login.php');
    exit();
}

// La session est valide : on affiche le contenu
$login_utilisateur = $_SESSION['login'] ?? 'Utilisateur';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'Accueil Sécurisée</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;TEXT-ALIGN: center;">
    <h1>Hello <?php echo htmlspecialchars($login_utilisateur); ?></h1>
    
    <p>
        <a href="validation.php?afaire=deconnexion">Déconnexion</a>
    </p>

</body>
</html>