<?php

namespace App\Controller;
use App\Model\Voitures;

class AdminController 
{
    // Les attributs
    private object $voitures;

    // constructeur 

    public function __construct()
    {
        //initialiser les attributs
        $this->voitures = new Voitures;
        
    }

    public function securiteAccueilBackOffice() : void 
    {
        // on vérifie la clé "admin" qui doit être à true dans $_SESSION
        if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true )
        {
                // on appelle la view de la page d'accueil du back office
            require_once("./view/pageAccueilBackOffice.php");
        }else {
            $_SESSION["errorMessage"] = "Vous n'avez pas les droits.";
            header("Location:" . DOSSIER_BASE . "voitures/accueil");
            exit;
        }
    }
    //------------------gestion du back-office----------------
    // liste des voitures

    public function listeDesVoitures() : void 
    {
        //algo
        $voitures = $this->voitures->viewAllCars();
        // Appelle la view
        require_once("./view/listeDesVoitures.php");
    }

    public function detailUneVoiture($id_voitures) : void
    {
        $voiture = $this->voitures->readOneCar($id_voitures);
        // the view
        require_once("./view/detailUneVoiture.php");
    }
    public function modifierUneVoiture($id_voitures):void
    {
        // algo

        // on récupère la voiture
        $voiture = $this->voitures->readOneCar($id_voitures);

        //on récupère le formulaire 
        if(isset($_POST["soumettre"]))
        {
            $this->voitures->updateOneCar($id_voitures, $_POST,$_FILES);
        }
        // the view
        require_once("./view/modifierUneVoiture.php");
    }

    public function creerUneVoiture():void
    {
        if(isset($_POST["soumettre"])):
            $this->voitures->createOneCar($_POST, $_FILES);
        endif;
        require_once("./view/creerUneVoiture.php");
    }

    public function supprimerUneVoiture($id_voitures):void
    {
        $voiture = $this->voitures->readOneCar($id_voitures);
        if (isset($_POST["supprimerLaVoiture"])): 
            $this->voitures->deleteOneCar($id_voitures);
        endif;
        require_once("./view/supprimerUneVoiture.php");
    }
}

?>