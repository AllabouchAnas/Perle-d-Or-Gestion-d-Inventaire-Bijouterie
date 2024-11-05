<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <h1>Réinitialiser votre mot de passe</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <div>
            <p><?= esc(session()->getFlashdata('error')) ?></p>
        </div>
    <?php endif; ?>

    <form action="<?= base_url("reset_password/{$token}") ?>" method="post">
        <label for="password">Nouveau mot de passe:</label>
        <input type="password" name="password" required>

        <button type="submit">Réinitialiser le mot de passe</button>
    </form>

    <p>Retour à la connexion ? <a href="<?= base_url('login') ?>">Cliquez ici</a></p>
</body>
</html>
