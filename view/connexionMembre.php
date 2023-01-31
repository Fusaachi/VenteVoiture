<?php
include("./assets/inc/front/head.php");
?>
        <title>Connexion d'un membre</title>
<?php
include("./assets/inc/front/header.php");
?>
        <main>
            <div class="container mt-5">
                <?php
                include("./assets/inc/message.php");
                include("./assets/inc/errorMessage.php");
                ?>
                <h3>Se connecter</h3>
                <!-- le formulaire de connexion -->
                <div class="col-6">
                    <form class="form-group" action="" method="post">
                        <input class="form-control mt-3" type="email" name="email" placeholder="Votre email" required>
                        <input class="form-control mt-3" type="password" name="password" placeholder="Votre mot de passe" required>
                        <div class="col-2">
                            <button type="submit" name="soumettre" class="btn bg-primary text-light fw-bold mt-5">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
<?php
include("./assets/inc/front/footer.php");
?>       