<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion au Service</title>
    <style>
        .message { padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .erreur { background-color: #fdd; border: 1px solid #f99; color: #a00; }
        .success { background-color: #dfd; border: 1px solid #9f9; color: #0a0; }
    </style>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px;text-align: center;">
    <h2>TP : PHP - Connexion</h2>

    <?php
    // login.php
    if (isset($_GET['erreur'])) {
        $code_erreur = $_GET['erreur'];
        
        switch ($code_erreur) {
            case '1':
                echo '<p class="message erreur">Erreur 1 : Veuillez saisir un login et un mot de passe.</p>';
                break;
            case '2':
                echo '<p class="message erreur">Erreur 2 : Erreur de login/mot de passe.</p>';
                break;
            case '3':
                echo '<p class="message success">Erreur 3 : Vous avez été déconnecté du service.</p>';
                break;
            default:
                // Ne rien afficher pour les codes d'erreur non gérés
                break;
        }
    }
    ?>

    <form action="validation.php" method="POST">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login"><br><br>

        <label for="pass">Mot de passe :</label>
        <input type="password" id="pass" name="pass"><br><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>