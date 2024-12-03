<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

    <!-- Intégration de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto">
        <div class="flex justify-center items-center min-h-screen">
            <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
                <h1 class="text-3xl font-bold text-center mb-6">Inscription</h1>

                <!-- Affichage des erreurs de validation -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Formulaire d'inscription -->
                <form action="<?= base_url('register') ?>" method="POST">
                    <?= csrf_field() ?> <!-- Protection CSRF -->

                    <!-- Champ Nom complet -->
                    <div class="mb-4">
                        <label for="complete_name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <input type="text" name="complete_name" value="<?= old('complete_name') ?>" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Champ Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="<?= old('email') ?>" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Champ Mot de passe -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input type="password" name="password" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Champ Confirmation du mot de passe -->
                    <div class="mb-4">
                        <label for="password_confirm" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirm" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Bouton d'inscription -->
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        S'inscrire
                    </button>
                </form>

                <p class="mt-4 text-center text-sm text-gray-600">Déjà inscrit ? <a href="<?= base_url('login') ?>" class="text-blue-500 hover:underline">Connectez-vous ici</a></p>
            </div>
        </div>
    </div>
</body>

</html>
