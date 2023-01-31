<?php
include("./assets/inc/back/head.php");
?>
        <title>Créer Une Voiture</title>
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
                    <h1 class="text-center">Créer une nouvelle voiture </h1>
                <hr>
                <br>
                <form action="" class="form-group" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg">
                    <label for="marque">Marque de la voiture : </label>
                    <input type="text" class="form-control" name="marque" required>
                    <label for="modele">Modele de la voiture : </label>
                    <input type="text" class="form-control" name="modele" required >
                    <label for="couleur">Couleur de la voiture : </label>
                    <input type="text" class="form-control" name="couleur" required>
                    <label for="prix">Prix de la voiture : </label>
                    <input type="text" class="form-control" name="prix" required >
                    <label for="active">Visibilité : </label>
                    <select class="form-control"name="active">
                        <option value="1">Activée en front</option>
                        <option value="0">Désactivée en front</option>
                    </select>
                    <div class=" mt-3">
                        <button class="btn bg-primary text-light fw-bold" type="submit" name="soumettre">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
<?php
include("./assets/inc/back/footer.php");
?>      