<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock Bijouterie</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-50 font-sans leading-relaxed tracking-wide">

    <!-- Top Navigation -->
    <nav class="bg-gradient-to-r from-gray-800 to-gray-900 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <button id="sidebarToggle" class="lg:hidden text-yellow-400 focus:outline-none text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
                <i class="fas fa-gem text-yellow-400 text-2xl"></i>
                <h1 class="text-2xl font-bold tracking-wide">Perle d'Or</h1>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <input type="text" placeholder="Rechercher..." class="px-4 py-2 rounded bg-gray-700 text-white focus:outline-none">

                <!-- Profile Icon with Dropdown -->
                <div class="relative">
                    <button class="text-white hover:text-yellow-400 transition duration-200 focus:outline-none text-3xl flex items-center" id="profileMenuButton">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Paramètres</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-col lg:flex-row min-h-screen">
        <!-- Side Navigation (Hidden on mobile by default, toggles with sidebarToggle button) -->
        <aside id="sidebar" class="bg-gradient-to-b from-gray-900 to-gray-800 w-full lg:w-1/5 p-6 text-gray-300 shadow-lg lg:block hidden">
            <h2 class="text-lg font-semibold text-yellow-400 mb-6 tracking-wide">Application</h2>
            <ul class="text-lg">
                <li><a href="/" class="flex items-center space-x-3 hover:bg-gray-700 p-3 rounded transition duration-200"><i class="fas fa-home"></i><span>Accueil</span></a></li>
                <li><a href="/categories" class="flex items-center space-x-3 hover:bg-gray-700 p-3 rounded transition duration-200"><i class="fas fa-th-list"></i><span>Catégories</span></a></li>
                <li><a href="/clients" class="flex items-center space-x-3 hover:bg-gray-700 p-3 rounded transition duration-200"><i class="fas fa-users"></i><span>Clients</span></a></li>
                <li><a href="/commandes" class="flex items-center space-x-3 hover:bg-gray-700 p-3 rounded transition duration-200"><i class="fas fa-box"></i><span>Commandes</span></a></li>
                <li><a href="/produits" class="flex items-center space-x-3 hover:bg-gray-700 p-3 rounded transition duration-200"><i class="fas fa-gem"></i><span>Produits</span></a></li>
                <li><a href="/detailcommandes" class="flex items-center space-x-3 hover:bg-gray-700 p-3 rounded transition duration-200"><i class="fas fa-file-alt"></i><span>Détails Commandes</span></a></li>
                <li><a href="/fournisseurs" class="flex items-center space-x-3 hover:bg-gray-700 p-3 rounded transition duration-200"><i class="fas fa-truck"></i><span>Fournisseurs</span></a></li>
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="bg-gray-50 flex-1 p-6 md:p-10">
            <div class="mb-6">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Vue d'Ensemble du Tableau de Bord</h2>
                <p class="text-gray-600 text-lg">Aperçu et métriques clés pour gérer votre inventaire de bijoux.</p>
            </div>

            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800">Ventes d'Articles</h3>
                        <span class="bg-green-100 text-green-700 text-sm font-medium px-2 py-1 rounded">33%↑</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800 mt-4">4,710</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800">Nouvelles Commandes</h3>
                        <span class="bg-red-100 text-red-700 text-sm font-medium px-2 py-1 rounded">2%↓</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800 mt-4">3,721</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800">Produits Totaux</h3>
                        <span class="bg-green-100 text-green-700 text-sm font-medium px-2 py-1 rounded">12%↑</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800 mt-4">2,149</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800">Valeur du Stock</h3>
                        <span class="bg-green-100 text-green-700 text-sm font-medium px-2 py-1 rounded">15%↑</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800 mt-4">€152,040</p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Bar Chart -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-24">Rapport de Ventes</h3>
                    <canvas id="salesChart" class="w-full h-56"></canvas>
                </div>

                <!-- Donut Chart -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Répartition de l'Inventaire</h3>
                    <canvas id="inventoryChart" class="w-full h-56"></canvas>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-yellow-400 text-center py-4 shadow-lg">
        <p>&copy; <?= date("Y"); ?> Perle d'Or Gestion de Stock. Créé avec élégance.</p>
    </footer>

    <!-- FontAwesome and Chart.js Scripts -->
    <script>
        // Sidebar Toggle for Mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        });

        // Toggle Profile Dropdown Menu
        document.getElementById('profileMenuButton').addEventListener('click', function() {
            const menu = document.getElementById('profileMenu');
            menu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('profileMenu');
            const button = document.getElementById('profileMenuButton');
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Bar Chart Configuration
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'],
                datasets: [{
                    label: 'Ventes en DH',
                    data: [12000, 15000, 8000, 18000, 14000, 21000, 16000],
                    backgroundColor: 'rgba(234, 179, 8, 0.8)',
                    borderColor: 'rgba(234, 179, 8, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#4B5563'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#4B5563'
                        }
                    }
                }
            }
        });

        // Donut Chart Configuration
        const ctx2 = document.getElementById('inventoryChart').getContext('2d');
        const inventoryChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Or', 'Argent', 'Diamants', 'Autres'],
                datasets: [{
                    label: 'Répartition de l\'Inventaire',
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        'rgba(234, 179, 8, 0.8)',
                        'rgba(192, 192, 192, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(234, 179, 8, 1)',
                        'rgba(192, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#4B5563'
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>