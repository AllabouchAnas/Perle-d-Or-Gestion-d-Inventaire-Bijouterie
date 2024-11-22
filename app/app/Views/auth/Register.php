<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Inscription</h1>

                <!-- Affichage des erreurs de validation -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Formulaire d'inscription -->
                <form action="<?= base_url('register') ?>" method="POST">
                    <?= csrf_field() ?> <!-- Protection CSRF -->

                    <!-- Champ Nom complet -->
                    <div class="mb-3">
                        <label for="complete_name" class="form-label">Nom complet</label>
                        <input type="text" name="complete_name" value="<?= old('complete_name') ?>" class="form-control" required>
                    </div>

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

                    <!-- Champ Confirmation du mot de passe -->
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirm" class="form-control" required>
                    </div>

                    <!-- Bouton d'inscription -->
                    <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                </form>

                <p class="mt-3 text-center">Déjà inscrit ? <a href="<?= base_url('login') ?>">Connectez-vous ici</a></p>
            </div>
        </div>
    </div>

    <!-- Inclure le script Bootstrap JS (optionnel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
