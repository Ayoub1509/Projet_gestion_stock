<?php
include '../src/bdd/Bdd.php';

$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE id_utilisateur=:id_utilisateur');
$req->execute(array(
    "id_utilisateur" => $_POST["id_utilisateur"]
));
$res = $req->fetch();

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition d'un profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h1>Edition d'un profil</h1>
<form action="../src/controleur/TraitementUtilisateur.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($res["nom"]) ?>"/>

    <label for="prenom">Prenom :</label>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($res["prenom"]) ?>"/>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($res["email"]) ?>"/>

    <label for="mdp">Mdp :</label>
    <input type="password" id="mdp" name="mdp" value=""/>

    <input type="hidden" name="id_utilisateur" value="<?= htmlspecialchars($res["id_utilisateur"]) ?>"/>

    <input type="submit" name="editer" value="Editer"/>
</form>
</body>
</html>

