<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <!-- Intégration de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900">
    <div class="container mx-auto">
        <div class="flex justify-center items-center min-h-screen">
            <!-- Section gauche avec formulaire -->
            <div class="w-full bg-black text-yellow-400 shadow-md rounded-l-lg p-8 max-w-md">
                <h1 class="text-3xl font-bold text-center mb-6">Connexion</h1>

                <!-- Affichage des messages flash -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <!-- Formulaire de connexion -->
                <form action="<?= base_url('login') ?>" method="POST">
                    <?= csrf_field() ?> <!-- Protection CSRF -->

                    <!-- Champ Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" value="<?= old('email') ?>" class="w-full mt-1 p-2 border border-yellow-400 bg-black rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Champ Mot de passe -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium">Mot de passe</label>
                        <input type="password" name="password" class="w-full mt-1 p-2 border border-yellow-400 bg-black rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded">
                        Se connecter
                    </button>
                </form>

                <p class="mt-4 text-center text-sm">Pas encore inscrit ? <a href="<?= base_url('register') ?>" class="text-yellow-400 hover:underline">Créer un compte</a></p>
            </div>
        </div>
    </div>
</body>

</html>
