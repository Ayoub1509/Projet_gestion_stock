<?php

if (array_key_exists("erreur", $_GET)) {
    echo "Il y'a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "Cette email est deja utilisé";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: whitesmoke;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: floralwhite;
            background: linear-gradient(to left,royalblue,cornflowerblue);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);


        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: black;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 9px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: black;
        }
    </style>
</head>
<body>
<form action="../src/controleur/TraitementUtilisateur.php" method="post">
    <h1> Inscription Professeur/Chef</h1>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>

    <label for="mdp">Mot de passe :</label>
    <input type="password" id="mdp" name="mdp" required><br>
    <br>
    <br>
    <style>
        .image-ajustee {
            max-width: 20%;
            height: auto;
            margin-left: 330px;
        }
    </style>

    <img src="https://www.cerfal-apprentissage.fr/public/uploads/2021/07/50-Lycee-Robert-Schuman.jpg" alt="Lycée Robert Schuman" class="image-ajustee">
    <br>
    <br>


    <input type="submit" value="Inscription" name="Inscription">
</form>
</body>
</html>



