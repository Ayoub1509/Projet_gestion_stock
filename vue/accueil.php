<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `user` ');
$req->execute(array());
$res = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
<a href="../src/controleur/TraitementDeco.php">Deconnexion</a>
<table>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Mdp</th>
    </tr>
    <?php
        foreach ($res as $user){
            ?>
        <tr>
            <td><?=$user["id_utilisateur"] ?></td>
            <td><?=$user["nom"] ?></td>
            <td><?=$user["prenom"]?></td>
            <td><?=$user["email"]?></td>
            <td><?=$user["mdp"]?></td>
            <td><a href="edition.php?id_utilisateur=<?=$user["id_utilisateur"]?>">Editer</a>
                / <a href="supprimer.php?id_utilisateur=<?=$user["id_utilisateur"]?>">Supprimer</a></td>
        </tr>

            <?php
        }
    ?>
</table>
</body>
</html>

?>
