<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Avocat Huissier</title>
    <link rel="stylesheet" href='../styles/styleFormAvocatHuissier.css'>
</head>

<body>
    <div class="container">
        <h1>Espace Avocat & Huissier</h1>
        <p class="subtitle">Ajouter</p>

        <div class="divider"></div>

        <form id="AvocatForm" action="/avocat/store" method="POST">
            <div class="form-group">
                <label for="fullname">NOM COMPLET</label>
                <input type="text" id="fullname" name="full_name" placeholder="Entrez votre nom complet" required>
            </div>

            <div class="form-group">
                <label for="email">ADRESSE EMAIL</label>
                <input type="email" id="email" name="email" placeholder="votre.email@exemple.com" required>
            </div>

            <div class="form-group">
                <label for="password">MOT DE PASSE</label>
                <input type="password" id="password" name="password_hash" placeholder="Créez un mot de passe fort" required>
            </div>

            <div class="form-group">
                <label for="passwordConfirmation">CONFIRMER LE MOT DE PASSE</label>
                <input type="password" id="passwordConfirmation" name="passwordConfirmation" placeholder="Confirmer le mot de passe" required>
            </div>

            <div class="form-group">
                <label for="age">ÂGE</label>
                <input type="number" id="age" name="age" placeholder="Votre âge" required>
            </div>

            <div class="form-group">
                <label>SEXE</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="male" name="sexe" value="male">
                        <label for="male">Homme</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="female" name="sexe" value="female">
                        <label for="female">Femme</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="annes_experience">ANNÉES D'EXPÉRIENCE</label>
                <input type="number" id="annes_experience" name="annes_experience" placeholder="Nombre d'années" required>
            </div>

            <div class="form-group">
                <label for="ville">VILLE</label>
                <select class="form-select" id="VilleSelect" name="ville_id" required>
                    <option value=""> Choisir une ville </option>

                    <?php
                    require_once "../app/Models/Ville.php";

                    $Villes = new Ville();
                    $villes = $Villes->getAllVilles();
                    foreach ($villes as $ville): ?>
                        <option value="<?= $ville['id'] ?>">
                            <?= htmlspecialchars($ville['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>TYPE</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="Avocat" name="type" value="Avocat">
                        <label for="Avocat">Avocat</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="Huissier" name="type" value="Huissier">
                        <label for="Huissier">Huissier</label>
                    </div>
                </div>
            </div>
<div class="type">
      
    </div>
            <button type="submit" class="btn-submit">Ajouter</button>
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>