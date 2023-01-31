<?php
namespace App\Controller;

use App\Model\Membres;

class MembresController
{
    // attribut
    private object $membres;

    // constructeur
    public function __construct()
    {
        $this->membres = new Membres;   
    }

    public function creerUnMembre(): void
    {
        // algorythme
        if(isset($_POST["soumettre"])):
            $this->membres->createOneMember($_POST);
        endif;
        //appelle vue
        require_once("./view/creerUnMembre.php");
    }
    public function connexionMembre () : void
    {
        // algorythme 
        if (isset($_POST["soumettre"])):
            $this->membres->logIn($_POST);
        endif;
        // appelle de la vue
        require_once("./view/connexionMembre.php");
    }

    public function deconnexionMembre () :void
    {
        // algo
        $this->membres->logOut($_POST);


    }
}
?>
