<?php
namespace App\Model;

use App\Config\ConnexionBdd;
use PDO;

class Voitures
{
    // déclaration des attributs correspondants aux champs de 
    // la table voitures 
    private int $id_voitures;
    private string $image;
    private string $modele;
    private string $marque;
    private string $couleur;
    private float $prix;
    private bool $active;
    // objet pour instancier la connexion
    private object $cBdd;
    // Attribut static pour définir le chemin de l'image de la voiture
    private static string $destination = "assets/images/upload/";
    // Constructeur (public)
    public function __construct()
    {
        // initialisation de la connexion 
        $this->cBdd = new ConnexionBdd;
    }

    // Les méthodes
    //------------------------------ Patie Front -------------------------------------------------
    // Créer une méthode qui permet de lire les voitures dont active est 1 (true) pour pouvoir les afficher en front
    // allCarsListWithActive1() ?
    public function allCarsListWithActive1(): mixed 
    {
        // 1- Ecriture de la requête en SQL
        $sql = "SELECT * 
                FROM voitures
                WHERE active = 1";
        // 2- Préparation de la requête avec l'objet $cBdd
        $query = $this->cBdd->connexion->prepare($sql);
        // 3- Execution de la requête 
        $query->execute();
        // 4- Formattage des données de retour en un tableau d'objet
        $carsList = $query->fetchAll(PDO::FETCH_OBJ);
        // 5- retourner la variable du tableau d'objet
        return $carsList;
    }
   // ----------------------Back Office----------------------
   public function viewAllCars(): mixed
   {
        $sql = " SELECT *
            FROM voitures
            ";
        $query = $this->cBdd->connexion->prepare($sql);
        $query->execute();
        $allCars = $query->fetchAll(PDO::FETCH_OBJ);
        return $allCars;


   }
   
   public function readOneCar($id_voitures) : mixed
   {
        $this->id_voitures = $id_voitures;
        $sql = "SELECT *
                FROM voitures
                WHERE id_voitures = $this->id_voitures
        ";
        $query = $this->cBdd->connexion->prepare($sql);
        $query->execute();
        $readCar = $query->fetch(PDO::FETCH_OBJ);
        return $readCar;
   }
   public function updateOneCar($id_voitures, $post , $files) : void
   {
        // on récupère l'ancienne voiture à travers la variable $theCar
        $theCar = $this->readOneCar($id_voitures);
        // gestion de l'image
        if(isset($files["image"]["tmp_name"])&& $files["image"]["tmp_name"] == true)
        {
            // on renomme l'image qui doit être unique dans la bdd
            // 1- On récupère l'extension du fichier image à l'aide de pathinfo()
            $extFichier = pathinfo($files["image"]["name"], PATHINFO_EXTENSION);
            // 2- On crée un nom unique pour l'image
            $this->image = "voiture_" . uniqid() . "." . $extFichier;
            // 3- On déplace l'image pour la mettre dans le dossier
            move_uploaded_file($files["image"]["tmp_name"], self::$destination.$this->image);
        // Supprimer l'ancienne image
            unlink(self::$destination . $theCar->image);
        }else{
            //On garde l'ancienne image
            $this->image = $theCar->image;
        }
        // On récupère les données du formulaire 
        $this->modele = addslashes(trim(ucfirst($post["modele"])));
        $this->marque = addslashes(trim(ucfirst($post["marque"])));
        $this->couleur = addslashes(trim(ucfirst($post["couleur"])));
        $this->prix = $post["prix"];
        $this->active = $post["active"];
        $sql = "UPDATE  voitures
                SET image = '$this->image',
                modele = '$this->modele',
                marque= '$this->marque',
                couleur = '$this->couleur',
                prix = '$this->prix',
                active = '$this->active' 
                WHERE id_voitures = $this->id_voitures";

        $query = $this->cBdd->connexion->prepare($sql);
        $query->execute();
        $_SESSION['message'] = "Cette voiture a été modifiée.";
        
   }

    public function createOneCar($post , $files):void
    {
        if(isset($files["image"]["tmp_name"] ) && $files["image"]["tmp_name"] == true)
        {
            // on renomme l'image qui doit être unique dans la bdd
            // 1- On récupère l'extension du fichier image à l'aide de pathinfo()
            $extFichier = pathinfo($files["image"]["name"], PATHINFO_EXTENSION);
            // 2- On crée un nom unique pour l'image
            $this->image = "voiture_" . uniqid() . "." . $extFichier;
            // 3- On déplace l'image pour la mettre dans le dossier
            move_uploaded_file($files["image"]["tmp_name"], self::$destination . $this->image);
        }
        $this->modele = addslashes(trim(ucfirst($post["modele"])));
        $this->marque = addslashes(trim($post["marque"]));
        $this->couleur = addslashes(trim($post["couleur"]));
        $this->prix = $post["prix"];
        $this->active = $post["active"];
       
        
        $sql = "INSERT INTO voitures
        (
                image,  
                modele,  
                marque,
                couleur,
                prix, 
                active  
        )     
        VALUES 
        (   
            '$this->image',
            '$this->modele',
            '$this->marque',
            '$this->couleur',
            '$this->prix',
            '$this->active'
            ) ";

        $query = $this->cBdd->connexion->prepare($sql);
        $query->execute();
        $_SESSION['message'] = "La voiture a été créée.";
        // redirection vers la page d'accueil
        header("Location:" . DOSSIER_BASE . "admin/gestionDesVoitures");
        exit;

    }

    public function deleteOneCar($id_voitures):void
    {
        $theCar = $this->readOneCar($id_voitures);
        unlink(self::$destination . $theCar->image);
        $this->id_voitures = $id_voitures;
        $sql = "DELETE FROM voitures 
                WHERE id_voitures = $this->id_voitures";

        $query = $this->cBdd->connexion->prepare($sql);
        $query->execute();
        $_SESSION['message'] = "La voiture a bien été supprimée.";
        header("Location:" . DOSSIER_BASE . "admin/gestionDesVoitures");
        exit;
    }
}
?>