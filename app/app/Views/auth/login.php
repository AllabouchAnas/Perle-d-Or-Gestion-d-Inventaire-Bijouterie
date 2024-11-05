<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <div>
            <p><?= esc(session()->getFlashdata('error')) ?></p>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <p>Mot de passe oublié ? <a href="<?= base_url('request_reset') ?>">Réinitialisez-le ici</a></p>
</body>
</html>
