<?php
require 'db.php';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM exercice WHERE id = ?");
    if ($stmt->execute([$_GET['id']])) {
        header("Location: index.php?msg=Suppression réussie");
    } else {
        header("Location: index.php?msg=Erreur lors de la suppression");
    }
}
?>