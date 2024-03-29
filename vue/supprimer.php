<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un profil</title>
</head>
<body>
<form action="../src/controleur/TraitementUtilisateur.php" method="post">
    <?php if(isset($_POST["id_utilisateur"])): ?>
        Vous allez supprimer le compte d'id <?= $_POST["id_utilisateur"] ?>. Voulez-vous le faire ?<br>
        <input type="hidden" name="id_utilisateur" value="<?= $_POST["id_utilisateur"] ?>"/><br>
        <input type="submit" name="supprimer" value="Confirmer"/><br>
        <a href="accueil.php">Retour</a>
    <?php else: ?>
        <p>Aucun ID utilisateur spécifié.</p>
    <?php endif; ?>
</form>
</body>
</html>
