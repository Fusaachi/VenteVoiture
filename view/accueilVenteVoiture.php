<?php
include("./assets/inc/front/head.php");
?>
        <title>Accueil venteVoiture liste des voitures à vendre</title>
<?php
include("./assets/inc/front/header.php");
?>
        <main>
                <div class="container mt-3">
                        <?php
                        include("./assets/inc/message.php");
                        include("./assets/inc/errorMessage.php");
                        ?>
                        <div class="row mt-3 text-center">
                                <?php
                                foreach($VoituresActives as $voitureActive):
                                ?>
                                <div class="col-12 col-lg-3 mt-3">
                                <div class="card" style="width: 18rem;">
                                        <img src="../assets/images/upload/<?=$voitureActive->image?>"  style="width:100%;height:100%;"  class="img-fluid card-img-top" alt="<?= $voitureActive->modele ?>">
                                        <div class="card-body">
                                                <h5 class="card-title"><?= $voitureActive->modele ?></h5>
                                                
                                        <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><?= $voitureActive->marque?></li>
                                                <li class="list-group-item"><?= $voitureActive->couleur ?></li>
                                                <li class="list-group-item"><?= $voitureActive->prix ?></li>
                                        </ul>
                                        <div class="card-body">
                                                <a type="button" href="#" class="card-link">Ajouter au panier</a>
                                        </div>
                                </div>
                        </div>      
                </div>
                <?php endforeach ?>
        </main>
<?php
include("./assets/inc/front/footer.php");
?>      