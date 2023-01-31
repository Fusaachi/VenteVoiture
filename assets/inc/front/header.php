</head>
    <body>
        <header>
        <body>
        <header>
            <!-- barre de navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= DOSSIER_BASE ?>voitures/accueil">Vente Voiture</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= DOSSIER_BASE ?>voitures/accueil">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Panier</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Informations</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-2">
                        <?php
                        if(isset($_SESSION["isLog"]) == false || ($_SESSION["isLog"] == false)):
                        ?>
                            <a type="button" class="btn bg-dark text-light fw-bold shadow" href="<?php echo DOSSIER_BASE ?>membres/inscriptionMembre">Inscription</a>
                            <a type="button" class="btn bg-dark text-light fw-bold shadow" href="<?php echo DOSSIER_BASE ?>membres/seConnecter">Connexion</a>
                        <?php
                        elseif($_SESSION["isLog"] == true && $_SESSION["admin"] == true):
                        ?>
                            <span class="text-dark fw-bold">Bienvenu(e) <?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"] ?></span>
                            <a type="button" class="btn bg-dark text-light fw-bold shadow" href="<?= DOSSIER_BASE?>membres/seDeconnecter ">Deconnexion</a>
                            <a type="button" class="btn bg-dark text-light fw-bold shadow" href="<?= DOSSIER_BASE?>admin/accueilBackOffice ">Back-Office</a>
                        <?php
                        else:
                        ?>
                            <span class="text-dark fw-bold">Bienvenu(e) <?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"] ?></span>
                            <a type="button" class="btn bg-dark text-light fw-bold shadow" href="<?= DOSSIER_BASE?>membres/seDeconnecter">Deconnexion</a>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </nav>
        </header>