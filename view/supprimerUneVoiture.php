<?php
include("./assets/inc/back/head.php");
?>
<title>Suppression de la voiture</title>
<?php
include("./assets/inc/back/header.php");
?>
<main>
    <div class="container-fluide">
        <div class="row mt-5">
            <hr>
            <h2 class="text-center">Suppression de la voiture <?= $voiture->marque  . " " . $voiture->modele ?></h2>
            <hr>
        </div>
            <div class="row mt-3 text-center">
                <h4>Attention !!&ensp;</h4>
                    <span>Vous êtes sur le point de supprimer la voiture : <?= $voiture->marque  . " " . $voiture->modele ?></span>
            </div>
            <br>
            <div class="col-12 ms-3 mt-3 d-flex justify-content-center">
                <div>
                    <img style="width:80%; height:auto;" class="img-fluid" src="<?= DOSSIER_BASE ?>assets/images/upload/<?= $voiture->image ?>" alt="<?= $voiture->modele ?>" alt="<?= $voiture->modele ?>">
                </div>
                <div class="col-7 ms-3 ">
                    <p>La marque : <?= $voiture->marque ?></p><br>
                    <p>La couleur : <?= $voiture->couleur ?></p><br>
                    <p>Le prix : <?= number_format($voiture->prix, 2, ',', '') ?>&ensp;€</p>
                </div>
            </div>
            <div class="row mt-3 text-center">
                <p>Sélectionnez le bouton ci-dessous :</p>
                <div class="row justify-content-center">
                    <div class="col-3">
                        <form action="" method="post">
                            <button type="submit" name="supprimerLaVoiture" class="btn bg-danger text-light fw-bold">Supprimer</button>
                            <a type="button" class="btn bg-success text-light fw-bold" href="<?= DOSSIER_BASE ?>admin/gestionDesVoitures">Retour liste voiture</a>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("./assets/inc/back/footer.php");
?>