<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Admin</title>
    <link rel="stylesheet" href="./styles/styleFormInscription.css">
</head>
<body>
    <div class="container">
        <h1>Espace Administrateur</h1>
        <p class="subtitle">Inscription sécurisée</p>
        
        <div class="divider"></div>
        
        <form id="adminForm">
            <div class="form-group">
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
                <label for="password">CONFIRMER LE MOT DE PASSE</label>
                <input type="password" id="passwordConfirmation" name="passwordConfirmation" placeholder="Confirmer le mot de passe" required>
            </div>

            <div class="form-group">
                <label for="phone">NUMÉRO DE TÉLÉPHONE</label>
                <input type="tel" id="phone" name="phone" placeholder="+212 6XX XXX XXX">
            </div>

            <div class="form-group">
                <label for="department">DÉPARTEMENT</label>
                <input type="text" id="department" name="department" placeholder="Ex: Informatique, RH, Finance">
            </div>

            <div class="form-group">
                <label for="role">RÔLE ADMINISTRATEUR</label>
                <input type="text" id="role" name="role" placeholder="Ex: Super Admin, Modérateur">
            </div>

            <div class="form-group">
                <label for="address">ADRESSE</label>
                <input type="text" id="address" name="address" placeholder="Votre adresse complète">
            </div>

            <div class="form-group">
                <label for="city">VILLE</label>
                <input type="text" id="city" name="city" placeholder="Casablanca, Rabat, etc.">
            </div>

            <button type="submit" class="btn-submit">S'inscrire</button>
        </form>

        <div class="form-footer">
            Déjà inscrit? <a href="#">Connectez-vous ici</a>
        </div>
    </div>

    <script>
        document.getElementById('adminForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                fullname: document.getElementById('fullname').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                phone: document.getElementById('phone').value,
                department: document.getElementById('department').value,
                role: document.getElementById('role').value,
                address: document.getElementById('address').value,
                city: document.getElementById('city').value
            };
            
            console.log('Données du formulaire:', formData);
            alert('Compte créé avec succès!');
            
            // Réinitialiser le formulaire
            this.reset();
        });
    </script>
</body>
</html>