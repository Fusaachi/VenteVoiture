<?php
include("./assets/inc/back/head.php");
?>
<title>Liste Des Voitures</title>
<?php
include("./assets/inc/back/header.php");
?>
<main>
    <div class="container">
        <?php
            include("./assets/inc/message.php")
        ?>
        <div class="row mt-5">
            <hr>
            <h1 class="text-center">Liste des Voitures</h1>
            <hr>

            <table class="table table-light align-middle mt-3 text-center">
                <thead class="thead-light">
                    <tr>
                        <th> image </th>
                        <th> active</th>
                        <th> modele </th>
                        <th> marque </th>
                        <th> prix </th>
                        <th> action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($voitures as $voiture) :
                    ?>
                        <tr>
                            <td style="width:20%;height:20%;">
                                <img style="width:100%;height:100%;" class="img-fluid" src="../assets/images/upload/<?= $voiture->image ?>" alt="<?= $voiture->modele ?>">
                            </td>

                            </td>
                            <td><?php
                                if ($voiture->active == 1) {
                                    echo "Visible";
                                } else {
                                    echo "Non Visible ";
                                }
                                ?></td>
                            <td><?= $voiture->modele ?></td>
                            <td><?= $voiture->marque ?></td>
                            <td><?= $voiture->prix ?> €</td>
                            <td>
                                <a type="button" class="btn bg-success text-light fw-bold" href="<?= DOSSIER_BASE ?>admin/detailVoiture/<?= $voiture->id_voitures ?>">Détail</a>
                                <a type="button" class="btn bg-success text-light fw-bold" href="<?= DOSSIER_BASE ?>admin/modifierVoiture/<?= $voiture->id_voitures ?>">Modifier</a>
                                <a type="button" class="btn bg-success text-light fw-bold" href="<?= DOSSIER_BASE ?>admin/supprimerVoiture/<?= $voiture->id_voitures ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a type="button" class="btn bg-secondary text-light fw-bold float-right" href="<?= DOSSIER_BASE ?>admin/creerVoiture">Ajouter une voiture</a>
        </div>
    </div>
</main>
<?php
include("./assets/inc/back/footer.php");
?>