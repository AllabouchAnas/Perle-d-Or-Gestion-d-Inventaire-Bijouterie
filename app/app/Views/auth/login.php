<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <!-- Affichage des messages flash -->
    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Affichage des erreurs de validation -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire de connexion -->
    <form action="<?= base_url('login') ?>" method="POST">
        <?= csrf_field() ?> <!-- Protection CSRF -->

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore inscrit ? <a href="<?= base_url('register') ?>">Créer un compte</a></p>
</body>
</html>
