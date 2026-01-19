<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Avocats</title>
    <link rel="stylesheet" href='../styles/styleAffichage.css'>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Liste des Avocats & Huissiers</h1>
            <p class="subtitle">Gestion des professionnels</p>

            <div class="divider"></div>

            <form method="GET" action="">
                <div class="search-filter-section">
                    <div class="search-box">
                        <input
                            type="text"
                            id="recherche"
                            name="search"
                            placeholder="Rechercher par nom ou email..."
                            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                    </div>
                    <div class="filter-box">
                        <select name="ville_filter" id="select">
                            <option value="toutes">Toutes les villes</option>
                            <?php
                            require_once "../app/Models/Ville.php";
                            $ville = new Ville();
                            $villes = $ville->getAllVilles();
                            foreach ($villes as $ville):
                                $selected = (isset($_GET['ville_filter']) && $_GET['ville_filter'] == $ville['id']) ? 'selected' : '';
                            ?>
                                <option value="<?= $ville['id'] ?>" <?= $selected ?>>
                                    <?= htmlspecialchars($ville['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <a href="avocat/store"><button class="btn-filter">Ajouter Avocat</button></a>


        <!-- Cards Grid -->
        <div class="cards-grid" id="container">
            <?php
            require_once "../app/Models/Avocat.php";
            $avocat = new Avocat();
            $avocats = $avocat->getAllAvocats();
            if (count($avocats) >= 1) {
                foreach ($avocats as $avocat):
            ?>
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <div class="card-title"><?= htmlspecialchars($avocat['full_name']) ?></div>
                                <div class="card-email"><?= htmlspecialchars($avocat['email']) ?></div>
                            </div>
                        </div>

                        <div class="specialite-box">
                            <?= htmlspecialchars($avocat['specialite']) ?>
                        </div>

                        <div class="card-info">
                            <div class="info-row">
                                <span class="info-label">Âge</span>
                                <span class="info-value"><?= $avocat['age'] ?> ans</span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Sexe</span>
                                <span class="badge badge-<?= $avocat['sexe'] ?>">
                                    <?= $avocat['sexe'] == 'male' ? 'Homme' : 'Femme' ?>
                                </span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Expérience</span>
                                <span class="info-value"><?= $avocat['annes_experience'] ?> ans</span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Consultation en ligne</span>
                                <span class="badge badge-<?= $avocat['consult_en_ligne'] ?>">
                                    <?= $avocat['consult_en_ligne'] == 'yes' ? 'Oui' : 'Non' ?>
                                </span>
                            </div>

                            <div class="info-row">
                                <span class="info-label">Ville</span>
                                <span class="info-value"><?= htmlspecialchars($avocat['ville']) ?></span>
                            </div>
                        </div>

                        <div class="card-actions">
                            <a href="avocat/edit?id=<?= $avocat['id'] ?>" class="btn-action btn-edit">Modifier</a>
                            <form method="POST" action="delete.php" style="flex: 1;">
                                <input type="hidden" name="id" value="<?= $avocat['id'] ?>">
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avocat?')">Supprimer</button>
                            </form>
                        </div>
                    </div>
                <?php
                endforeach;
            } else {
                ?>
                <div class="no-results">
                    <p>Aucun avocat trouvé</p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>