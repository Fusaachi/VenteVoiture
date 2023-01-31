* Architecture router + design pattern (patron de conception)
Modèle Vue Contrôleur (Model View Controller).

Design pattern MVC est composé des designs pattern de base issue du GoF(Gang of four)-> groupe de 4
-observer
-composite
-strategy
https://refactoring.guru/design-patterns/behavioral-patterns

-1- La classe Router.php va jouer le rôle d'aiguillage vers un contrôleur et une méthode voir schéma dans mesImages.
Le router correspondra au routage des différentes pages du site avec des des url propres, explicites et surtout sécurisées.
Dans les shéma schéma c'est lui qui est appelé en premier.

-2- Le contrôleur (dossier controller):
Correspondra à la logique de fonctionnement du site web.
Il joue le rôle de chef d'orchestre entre les modèles et les vues.

-3- Le Modèle (dossier model) :
Correspondra aux tables (entitées) de notre BDD avec des méthodes comme le CRUD (Create Read Update Delete)

-4- La vue (dossier view) :
Correspondra à l'interface d'utilisation du site web (le front)

** Création de l'arborescence (voir arborescence)
** création du fichier .htaccess (redéfinition des règles de réecriture de l'url) (voir fichier)
** création du fichier config.php qui va permettre de déclarer nos constantes globales (voir fichier)
** création de notre classe Autoloader.php (chargement des classes automatiquement) pour éviter les require_once des classes.
** création de la classe ConnexionBdd.php en prenant en charge les éventuelles erreurs de connexion à la bdd
** création de la bdd avec les tables et les liaisons
** création de la classe Voiture.php dans le dossier model avec une méthode d'affichage
** création de la classe VoituresController.php qui va mettre en lien la méthode de la classe Voitures et le fichier vue
** création de la classe Router.php la méthode processURI() permet de renseigner les routes.
** créer 2 fichiers errorMessage.php et message.php dans le dossier inc pour les messages flash


* exercice : créer la classe Membres, la classe MembresController, une route membres/creerUnMembre.
Dans la classe MembresController, nous aurons une méthode creerUnMembre() associé à une vue creerUnMembre.php 
Dans la classe Membre, nous auront une méthode createOneMember() pour créer un membre en bdd
créer un bouton créer un membre dans la vue accueilVenteVoiture.php qui nous oriente vers la bonne route pour créer un membre

*exercice : créer une voiture dans le back office
-> une route : admin/creerVoiture -> methode dans adminController : creerUneVoiture() associée à la view creerUneVoiture.php -> créer une méthode createOnecar() dans voiture avec les requêtes 