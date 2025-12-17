<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM exercice WHERE id = ?");
$stmt->execute([$id]);
$ex = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE exercice SET titre=?, auteur=?, date_creation=? WHERE id=?");
    if ($stmt->execute([$_POST['titre'], $_POST['auteur'], $_POST['date_creation'], $id])) {
        header("Location: index.php?msg=Modification réussie");
    } else {
        header("Location: index.php?msg=Échec de la modification");
    }
    exit();
}
?>

<form method="POST">
    Titre: <input type="text" name="titre" value="<?= $ex['titre'] ?>" required><br>
    Auteur: <input type="text" name="auteur" value="<?= $ex['auteur'] ?>" required><br>
    Date: <input type="date" name="date_creation" value="<?= $ex['date_creation'] ?>" required><br>
    <button type="submit">Enregistrer les modifications</button>
</form>