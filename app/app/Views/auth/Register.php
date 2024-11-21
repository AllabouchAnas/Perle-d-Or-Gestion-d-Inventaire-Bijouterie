<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>

    <!-- Affichage des erreurs de validation -->
    <?php if(session()->getFlashdata('errors')): ?>
        <div>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <p style="color: red;"><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire d'inscription -->
    <form action="<?= base_url('register') ?>" method="POST">
        <?= csrf_field() ?> <!-- Protection CSRF -->

        <label for="complete_name">Nom complet:</label>
        <input type="text" name="complete_name" value="<?= old('complete_name') ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= old('email') ?>" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <label for="password_confirm">Confirmer le mot de passe:</label>
        <input type="password" name="password_confirm" required>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="<?= base_url('login') ?>">Connectez-vous ici</a></p>
</body>
</html>
