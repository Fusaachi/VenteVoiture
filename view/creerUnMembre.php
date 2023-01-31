<?php
include("./assets/inc/front/head.php");
?>
        <title>inscription créer un membre</title>
<?php
include("./assets/inc/front/header.php");
?>
        <main>
            <div class="container mt-5">
                <?php
                include("./assets/inc/message.php");
                include("./assets/inc/errorMessage.php");
                ?>
                <h3>Créer un membre</h3>
                <!-- le formulaire d'inscription -->
                <div class="col-6">
                    <form class="form-group" action="" method="post">
                        <input class="form-control mt-3" type="text" name="prenom" placeholder="Votre prenom" required>
                        <input class="form-control mt-3" type="text" name="nom" placeholder="Votre nom" required>
                        <input class="form-control mt-3" type="email" name="email" placeholder="Votre email" required>
                        <input class="form-control mt-3" type="password" name="password" placeholder="Votre mot de passe" required>
                        <div class="col-2">
                            <button type="submit" name="soumettre" class="btn bg-primary text-light fw-bold mt-5">Enregister</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
<?php
include("./assets/inc/front/footer.php");
?>       