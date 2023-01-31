<?php
// on décide d'un espace de travail virtuel pour cette classe 
// Autoloader
namespace App\Config;
require_once("config.php");

class Autoloader 
{
    // voici une classe qui n'a pas de constructeur car nous allons
    // créer 2 méthodes statics
    public static function register(): void
    {
        spl_autoload_register([__CLASS__, "autoload"]);
    }

    private static function autoload($namespace): void
    {
        // on récupère le namespace demandé à travers $namespace
        // sous forme App\Model\Voiture par exemple
        // on explose la chaine de caractère App\Model\Voiture par
        // rapport à \
        $namespaceExplode = explode("\\", $namespace);
        // cela va donc nous créer un tableau avec les éléments
        // $namespaceExplode[0] = App 
        // $namespaceExplode[1] = Model
        // $namespaceExplode[2] = Voiture
        // si App est présent à la clé 0, on l'enlève en réindéxant
        // le tableau
        if ($namespaceExplode[0] == "App"):
            array_splice($namespaceExplode, 0, 1);
        endif;
        // on récupère la dernière valeur du tableau car elle doit
        // rester en majuscule
        $lastElement = array_pop($namespaceExplode);
        // on déclare un tableau vide
        $tab = [];
        // on créer une boucle pour mettre en minuscule les valeurs du
        // tableau $namespaceExplode pour les mettre dans le tableau
        // vide $tab
        for ($i = 0; $i<count($namespaceExplode); $i++):
            array_push($tab, lcfirst($namespaceExplode[$i]));
        endfor;
        // on recompose la chaine de caractère en concaténant la valeur 
        //gardée $lastElement
        $cheminPhysiqueDeLaClasse = implode("\\", $tab) . "\\$lastElement";
        // $cheminPhysiqueDeLaClasse = "model\Voiture"
        // on inclu $_SERVER["DOCUMENT_ROOT"] = chemin du dossier htdocs ou www
        include($_SERVER["DOCUMENT_ROOT"] . DOSSIER_BASE . "$cheminPhysiqueDeLaClasse.php");    
    }
}
?>
