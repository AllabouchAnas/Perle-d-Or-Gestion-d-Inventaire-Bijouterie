<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>

    <!-- Afficher les erreurs de validation -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p style="color: red;"><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire d'inscription -->
    <form action="<?= base_url('register') ?>" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="<?= base_url('login') ?>">Connectez-vous ici</a></p>
</body>
</html>
