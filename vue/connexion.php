<?php

if (array_key_exists("erreur", $_GET)) {
    echo "il y'a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "cette email est deja utilisé";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<form action="../src/controleur/TraitementUtilisateur.php" method="post">


    email :
    <input type="email" name="email"/><br>

    mdp :

    <input type="password" name="mdp"/><br>

    <input type="submit" name="inscription"/><br>



</form>

</body>
</html>

