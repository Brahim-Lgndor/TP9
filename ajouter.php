<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO exercice (titre, auteur, date_creation) VALUES (?, ?, ?)");
    if ($stmt->execute([$_POST['titre'], $_POST['auteur'], $_POST['date_creation']])) {
        header("Location: index.php?msg=Ajout réussi");
    } else {
        header("Location: index.php?msg=Erreur d'ajout");
    }
}
?>