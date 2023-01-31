<?php
namespace App\Controller;
use App\Model\Voitures;

class VoituresController
{
    // Attributs 
    private object $voitures;
    // le constructeur
    public function __construct()
    {
        //initialisation de l'object $voitures;
        $this->voitures = new Voitures;
    }
    // les méthodes
    //-------------------------partie front -------------------------

    public function listeDesVoituresActives()
    {
        // notre algorithme 
        $VoituresActives = $this->voitures->allCarsListWithActive1();

        // appeller la vue 
        require_once("./view/accueilVenteVoiture.php");
    }
}
?>
