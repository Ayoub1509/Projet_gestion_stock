<?php


include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

if (array_key_exists("Inscription", $_POST)) {
    $user = new Utilisateur([
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "email" => $_POST['email'],
        "mdp" => $_POST['mdp'],
    ]);

    $user->inscription();
} elseif (array_key_exists("connexion", $_POST)) {
    $user = new Utilisateur([
        "email" => $_POST['email'],
        "mdp" => $_POST['mdp']
    ]);
    $user->connexion();
} elseif (array_key_exists("editer", $_POST)) {
    $user = new Utilisateur([
        "id_utilisateur" => $_POST['id_utilisateur'],
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "email" => $_POST['email'],
        "mdp" => $_POST['mdp'],
    ]);
    $user->editer();
} elseif (array_key_exists("supprimer", $_POST)) {
    $user = new Utilisateur([
        "idUtilisateur" => $_POST['id_utilisateur'],
    ]);
    $user->supprimer();
}
?>
