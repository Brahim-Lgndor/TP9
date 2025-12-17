<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Exercices</title>
</head>
<body>
    <h2>Ajouter un nouveau exercice</h2>
    <form action="ajouter.php" method="POST">
        Titre: <input type="text" name="titre" required>
        Auteur: <input type="text" name="auteur" required>
        Date: <input type="date" name="date_creation" required>
        <button type="submit">Ajouter</button>
    </form>

    <hr>
    
    <?php if(isset($_GET['msg'])) echo "<p><strong>" . htmlspecialchars($_GET['msg']) . "</strong></p>"; ?>

    <h2>Liste des exercices</h2>
    <table border="1">
        <tr>
            <th>ID</th><th>Titre</th><th>Auteur</th><th>Date</th><th>Actions</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM exercice");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['titre']}</td>
                <td>{$row['auteur']}</td>
                <td>{$row['date_creation']}</td>
                <td>
                    <a href='modifier.php?id={$row['id']}'>Modifier</a> | 
                    <a href='#' onclick='confirmerSuppression({$row['id']})'>Supprimer</a>
                </td>
            </tr>";
        }
        ?>
    </table>

    <script>
    function confirmerSuppression(id) {
        if (confirm("Voulez-vous vraiment supprimer cet exercice ?")) {
            window.location.href = "supprimer.php?id=" + id;
        }
    }
    </script>
</body>
</html>