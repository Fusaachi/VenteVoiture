</head>
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
                                <a class="nav-link active" aria-current="page" href="<?= DOSSIER_BASE ?>admin/accueilBackOffice">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= DOSSIER_BASE ?>admin/gestionDesVoitures">Gestion Voitures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gestion Membres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gestion Paniers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-3">
                        <span class="text-dark fw-bold">Bienvenu(e) <?php echo $_SESSION["prenom"] . " " . $_SESSION["nom"] ?></span>
                    </div>
                </div>
            </nav>
        </header>