<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionnel : Si vous avez votre propre fichier CSS -->
   
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Connexion</h1>

                <!-- Affichage des messages flash -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Formulaire de connexion -->
                <form action="<?= base_url('login') ?>" method="POST">
                    <?= csrf_field() ?> <!-- Protection CSRF -->

                    <!-- Champ Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="<?= old('email') ?>" class="form-control" required>
                    </div>

                    <!-- Champ Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>

                <p class="mt-3 text-center">Pas encore inscrit ? <a href="<?= base_url('register') ?>">Créer un compte</a></p>
            </div>
        </div>
    </div>

    <!-- Inclure le script Bootstrap JS (optionnel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
