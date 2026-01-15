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

        <form id="AvocatForm" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                <label for="fullname">NOM COMPLET</label>
                <input type="text" id="fullname" name="fullname" placeholder="Entrez votre nom complet" required>
            </div>

            <div class="form-group">
                <label for="email">ADRESSE EMAIL</label>
                <input type="email" id="email" name="email" placeholder="votre.email@exemple.com" required>
            </div>

            <div class="form-group">
                <label for="password">MOT DE PASSE</label>
                <input type="password" id="password" name="password" placeholder="Créez un mot de passe fort" required>
            </div>

            <div class="form-group">
                <label for="passwordConfirmation">CONFIRMER LE MOT DE PASSE</label>
                <input type="password" id="passwordConfirmation" name="passwordConfirmation" placeholder="Confirmer le mot de passe" required>
            </div>

            <div class="form-group">
                <label for="age">ÂGE</label>
                <input type="text" id="age" name="age" placeholder="Votre âge" required>
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
                <label for="specialite">SPÉCIALITÉ</label>
                <input type="text" id="specialite" name="specialite" placeholder="Ex: droit civil, droit pénal" required>
            </div>

            <div class="form-group">
                <label for="annes_experience">ANNÉES D'EXPÉRIENCE</label>
                <input type="text" id="annes_experience" name="annes_experience" placeholder="Nombre d'années" required>
            </div>

            <div class="form-group">
                <label>CONSULTATION EN LIGNE</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="consult_yes" name="consult_en_ligne" value="yes">
                        <label for="consult_yes">Oui</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="consult_no" name="consult_en_ligne" value="no">
                        <label for="consult_no">Non</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <select class="form-select" id="VilleSelect" name="VilleSelect" required>
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



            <button type="submit" class="btn-submit">Ajouter</button>
        </form>
    </div>
</body>

</html>