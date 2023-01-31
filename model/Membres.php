<?php

namespace App\Model;
use App\Config\ConnexionBdd;
use PDO;

class Membres
{
    private int $id_membre;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private int $role;

    // l'objet de connexion
    private object $cBdd;

    // le constructeur 
    public function __construct()
    {
        //initialisation de la connexion
        $this->cBdd = new ConnexionBdd;
    }


    // les méthodes
    // ------------------ front ---------------------
    public function createOneMember($post): void
    {
        // à définir, ressemble au php procedurale, c'est comme
        // une inscription
        // 1- préparer les données reçues à travers $post qui correspond à $_POST
        // vérifier si l'email n'existe pas en bdd, si il n'existe pas, on crée le compte.
        $this->email = addslashes(trim($post["email"]));
        $minusculeEmail = strtolower($this->email);
        // voir si l'email existe
        $sql = "SELECT COUNT(*)
                FROM membres
                WHERE email = '$minusculeEmail'
        ";
        $query = $this->cBdd->connexion->prepare($sql);
        $query->execute();
        $resultat = $query->fetchColumn();
        // analyse de $resultat qui sera un entier
        if ($resultat == 0):
            // on peut inscrire la personne
            // préparation des données
            $this->prenom = addslashes(trim(ucfirst($post["prenom"])));
            $this->nom = addslashes(trim(ucfirst($post["nom"])));
            // déclaration de l'encodage du password
            $options = ['cost' => 12];
            $this->password = password_hash(trim($post["password"]), PASSWORD_DEFAULT, $options);
            // on décide que 2 sera le role user et 1 le role admin qui aura accès au
            // back-office
            $this->role = 2;
            // écriture SQL
            $sql = "INSERT INTO membres
                    (
                        prenom,
                        nom,
                        email,
                        password,
                        role
                    )
                    VALUES
                    (
                        '$this->prenom',
                        '$this->nom',
                        '$this->email',
                        '$this->password',
                        $this->role
                    )
            ";
            $query = $this->cBdd->connexion->prepare($sql);
            $query->execute();
            // message flash
            $_SESSION["message"] = "Félicitation !! vous avez crée votre compte";
            // redirection vers la page d'accueil
            header("Location:" . DOSSIER_BASE . "voitures/accueil");
            exit;
        else:
            // on renvoie un message flash d'erreur
            $_SESSION["errorMessage"] = "Cet utilisateur existe déjà, veuillez choisir un autre email.";
            // redirection vers le formulaire d'inscription
            header("location:" . DOSSIER_BASE . "membres/inscriptionMembre");
            exit;
        endif;
    }

    public function logIn($post): void
    {
        // vérifier l'email
        // vérifier le password
        // vérifier si la personne est un administrateur
        $this->email = addslashes(trim($post["email"]));
        $minusculeEmail = strtolower($this->email);
        $sql = "SELECT COUNT(*)
                FROM membres
                WHERE email = '$minusculeEmail'
        ";
        $query = $this->cBdd->connexion->prepare($sql);
        $query->execute();
        $resultat = $query->fetchColumn();
        var_dump($resultat);
        // vérif email
        if ($resultat == 1):
            $sql = "SELECT *
                    FROM membres
                    WHERE email = '$minusculeEmail'
            ";
            $query = $this->cBdd->connexion->prepare($sql);
            $query ->execute();
            $membre = $query->fetch(PDO::FETCH_ASSOC);
            // vérification du mot de passe
            if (password_verify(trim($post["password"]), $membre["password"])):
                // vérification du role
                if ($membre["role"] == 1):
                    // la personne est administrateur, on rempli $_SESSION
                    $_SESSION["admin"] = true;
                    $_SESSION["prenom"] = $membre["prenom"];
                    $_SESSION["nom"] = $membre["nom"];
                    $_SESSION["id_membres"] = $membre["id_membres"];
                    $_SESSION["isLog"] = true;
                    $_SESSION["message"] = "Vous êtes connecté(e) !!";
                    header("Location:" . DOSSIER_BASE . "voitures/accueil");
                    exit;
                else:
                    // la personne est user
                    $_SESSION["admin"] = false;
                    $_SESSION["prenom"] = $membre["prenom"];
                    $_SESSION["nom"] = $membre["nom"];
                    $_SESSION["id_membres"] = $membre["id_membres"];
                    $_SESSION["isLog"] = true;
                    $_SESSION["message"] = "Vous êtes connecté(e) ";
                    header("Location:" . DOSSIER_BASE . "voitures/accueil");
                    exit;
                endif;
            else:
                $_SESSION["errorMessage"] = "Erreur de mot de passe ";
                header("Location:" . DOSSIER_BASE . "membres/seConnecter");
                exit;
            endif;
        else:
            $_SESSION["errorMessage"] = "Erreur d'email";
            header("Location:" . DOSSIER_BASE . "membres/seConnecter");
            exit;
        endif;
    }

    public function logOut($post): void 
    {
        // destruction de la session en cours 
        session_destroy();
        // on redémarre une session vide
        session_start();
        // message
        $_SESSION["message"] = "Vous êtes déconnecté(e)";
        $_SESSION["isLog"] = false;

        // redirection 
        header("Location:" . DOSSIER_BASE . "voitures/accueil");
        exit;
    }
    
    

}
?>