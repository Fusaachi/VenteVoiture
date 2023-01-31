<?php
namespace App\Config;

session_start();

class Router
{
    // Methodes
    // Récupération de l'URI (Uniform Resource Identifier)

    private static function getURI(): array
    {
        // Recupération de l'URI
        $path_info = $_SERVER["REQUEST_URI"] ?? "/";
        // Transformation de la chaine de caractère en un tableau par rapport aux /
        $path_info = explode('/', $path_info);
        // Supression des clés 0 et 1 et réindexation du tableau
        $path_info = array_splice($path_info, 2);
        return $path_info;
    }
    // Phase de procédure et déclaration des routes
    private static function processURI(): array
    {
        // Récupération avec la variable $controllerPart de la clé [0] du tableau $path_info
        $controllerPart = self::getURI()[0];
        // Récupération de la partie méthode
        $methodPart = self::getURI()[1];
        // Récupération de la partie arguments
        $numPart = count(self::getURI());
        $argsPart = [];
        for ($i = 2; $i < $numPart; $i++)
        {
            $argsPart[] = self::getURI()[$i] ?? "";
        }
        // ------------- Création des noms de routes ----------------
        switch($controllerPart)
        {
            case "admin":
                self::securiteUrlAdmin($_GET);
                $controller = "\App\Controller\\" . ucfirst($controllerPart) . "Controller";
                break;
            case "voitures":
                $controller = "\App\Controller\\" . ucfirst($controllerPart) . "Controller";
                break;
            case "membres":
                $controller = "\App\Controller\\" . ucfirst($controllerPart) . "Controller";
                break;
            default:
                header("Location:" . DOSSIER_BASE . "voitures/accueil");
                exit;
        }
        switch($methodPart)
        {
            case "accueil":
                $method = "listeDesVoituresActives";
                break;
            case "accueilBackOffice":
                $method = "securiteAccueilBackOffice";
                break;
            case "gestionDesVoitures":
                $method = "listeDesVoitures";
            break;
            case "detailVoiture":
                $method = "detailUneVoiture";
            break;
            case "modifierVoiture":
                $method = "modifierUneVoiture";
            break;
            case "creerVoiture":
                $method = "creerUneVoiture";
                break;
            case "supprimerVoiture":
                $method = "supprimerUneVoiture";
                break;
            case "inscriptionMembre":
                $method = "creerUnMembre";
                break;
            case "seConnecter":
                $method = "connexionMembre";
                break;
            case "seDeconnecter":
                $method = "deconnexionMembre";
                break;
            default:
                header("Location:" . DOSSIER_BASE . "voitures/accueil");
                exit;
        }
        // Arguments
       if(isset($argsPart[0]) && $argsPart[0] != NULL)
       {
            $args = [intval($argsPart[0])];
       }else{
            $args = ["0" => null];
       }
        
        
        // On retourne un tableau avec les clés controller, method et args 
        return [
            "controller" => $controller,
            "method" => $method,
            "args" => $args
        ];
        
    }
    // Les différents éléments que l'on vient pointer
    public static function contentToRender() : void 
    {
        $uri = self::processURI();

        if(class_exists($uri["controller"]))
        {
            $controller = $uri["controller"];
            $method = $uri["method"];
            $args = $uri["args"];
            $args ? (new $controller())->{$method} (...$args) : (new $controller())->{$method}();
        }
    }
    // Exécution
    public function run() : void 
    {
        // Instanciation de la classe et de la méthode contentToRender sur une même ligne
        (new Router())->contentToRender();
    }
    
    private static function securiteUrlAdmin($get): void
    {
        $stringGet = htmlspecialchars($get['path1']);
        $admin = "admin";
        // on recherche la présence de admin dans la chaine $stringGet
        $getAdmin = strpos($stringGet, $admin);
        // si admin est présent dans le résultat de la recherche
        if($getAdmin !== false):
            if(((isset($_SESSION["admin"]) && ($_SESSION["admin"] == false))) || (!isset($_SESSION["admin"]))):
                // message
                $_SESSION["errorMessage"] = "Désolé, vous n'avez pas les droits administrateur !!";
                header("Location:" . DOSSIER_BASE . "voitures/accueil");
                exit;
            endif;
        endif;
    }
}

?>