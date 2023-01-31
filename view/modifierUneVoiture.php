<?php
include("./assets/inc/back/head.php");
?>
        <title>Modifier Une Voiture</title>
<?php
include("./assets/inc/back/header.php");
?>
    <main>
        <div class="container">
            <?php
            include("./assets/inc/message.php")
            ?>
            <div class="row mt-5 ">
                <hr>
                    <h1 class="text-center">Modification de la Voiture <?= $voiture->marque ," ",$voiture->modele ?></h1>
                <hr>
                <br>
                <form action="" class="form-group" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg">
                    <input type="text" class="form-control" name="marque" value="<?= $voiture->marque ?>">
                    <input type="text" class="form-control" name="modele" value="<?= $voiture->modele ?>">
                    <input type="text" class="form-control" name="couleur" value="<?= $voiture->couleur ?>">
                    <input type="text" class="form-control" name="prix" value="<?= $voiture->prix ?>">
                    <select class="form-control mt-3"name="active">
                        <option value="<?= $voiture->active ?>" selected>
                        <?php 
                        if($voiture->active == 1){
                            echo"Activée en front";
                        }else{
                            echo"Désactivée en front";
                        }
                        ?>
                        </option>
                        <option value="1">Activée en front</option>
                        <option value="0">Désactivée en front</option>
                    </select>
                    <div class="row mt-3">
                        <button class="btn bg-primary text-light fw-bold" type="submit" name="soumettre">Valider</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
<?php
include("./assets/inc/back/footer.php");
?>      