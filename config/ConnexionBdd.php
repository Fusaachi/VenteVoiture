<?php
namespace App\Config;
use PDO;

class ConnexionBdd
{
    // déclarations des attributs de connexion
    private string $host;
    private string $user;
    private string $password;
    private string $bddName;
    public object $connexion;

    // le constructeur (visibilité public)
    public function __construct()
    {
        // on détermine le jeu de variables de connexion à
        // utiliser d'après la constante globale IS_ONLINE

        // les informations de BDD en local
        if (!IS_ONLINE):
            $this->host = "localhost";
            $this->user = "root";
            // pour les MAC le password est "root"
            $this->password = "";
            $this->bddName = "ventevoiture";
        else:
            // ici vous placerez les informations données par
            // votre hébergeur(à remplir)
            $this->host = "";
            $this->user = "";
            $this->password = "";
            $this->bddName = "";
        endif;
        // connexion au serveur (en PDO qui est une classe
        // native PHP)
        // si la variable de connexion n'est pas définie
        if(!isset($this->connexion)):
            // essayer de se connecter à la bdd avec les 
            // paramètres de connexion en prenant en charge
            // les erreurs potentielles.
            try{
                $this->connexion = new PDO("mysql:host=$this->host;dbname=$this->bddName", $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                // cette requète(query en anglais) sera au format utf-8
                $this->connexion->query("SET NAMES 'utf8'");
                // si une erreur de connexion survient,
                // on attrappe cette erreur 
            }catch(\PDOException $exception){
                // récupérer le message d'erreur et le code
                // à travers la classe PDOException et ses
                // méthodes getMessage() et getCode()
                throw new \PDOException($exception->getMessage(), $exception->getCode());
            }
        endif;
    }
}
?>