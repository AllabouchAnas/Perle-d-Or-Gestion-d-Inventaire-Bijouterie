<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <h1>Demande de réinitialisation du mot de passe</h1>

    <?php if(session()->getFlashdata('error')): ?>
        <div>
            <p><?= esc(session()->getFlashdata('error')) ?></p>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('request_reset') ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Demander la réinitialisation</button>
    </form>

    <p>Retour à la connexion ? <a href="<?= base_url('login') ?>">Cliquez ici</a></p>
</body>
</html>
