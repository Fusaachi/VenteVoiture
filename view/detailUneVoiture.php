<?php
include("./assets/inc/back/head.php");
?>
        <title>Details De La Voiture</title>
<?php
include("./assets/inc/back/header.php");
?>
    <main>
        <div class="container">
            <div class="row mt-5 justify-content-center text-center">
                <hr>
                    <h1 class="text-center">Détail de la Voiture <?= $voiture->marque ," ",$voiture->modele ?></h1>
                <hr>
                <br>
                <img style = "width:30%;height:auto" class="float-center"src="<?=DOSSIER_BASE?>/assets/images/upload/<?=$voiture->image?>" alt="<?= $voiture->modele ?>">
                <p class="mt-5">Modele : <?= $voiture->modele ?></p>
                <p>Marque : <?= $voiture->marque ?></p>
                <p>Couleur : <?= $voiture->couleur ?></p>
                <p>Prix : <?= number_format($voiture->prix,2,",","") ?> €</p>
            </div>
        </div>
    </main>
<?php
include("./assets/inc/back/footer.php");
?>      