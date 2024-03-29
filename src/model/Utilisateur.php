<?php


class Utilisateur{
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $classe;


    public function __construct(array $donnee)
    {

        $this->hydrate($donnee);
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    public function inscription()
    {

        try {
            $bdd = new Bdd();

            $req = $bdd->getBdd()->prepare('INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `mdp`) VALUES (:nom, :prenom, :email, :mdp)');

            $req->execute(array(
                'nom' => $this->getNom(),
                'prenom' => $this->getPrenom(),
                'email' => $this->getEmail(),
                'mdp' => $this->getMdp(),
            ));

            header("Location: ../../vue/Inscription.php");
        } catch (PDOException $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }


    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE email=:email and mdp=:mdp');
        $req->execute(array(
            "email" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),

        ));

        $res = $req->fetch();
        if (is_array($res)){
            $this->setEmail($res["email"]);
            $this->setMdp($res["mdp"]);
            session_start();

            $_SESSION["utilisateur"] = $this;
            header("Location: accueil.php");
        }else{
            header("Location: connexion.php");
        }
    }
    public function supprimer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM Utilisateur WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" =>$this->getIdUtilisateur(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php?success");
        }else{
            header("Location: ../../vue/connexion.php?erreur");
        }
    }
}
?>
