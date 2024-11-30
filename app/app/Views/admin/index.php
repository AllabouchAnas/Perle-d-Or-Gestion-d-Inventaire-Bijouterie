<?php include('includes/header.php'); ?>
<div class="mb-6">
    <h2 class="text-4xl font-bold text-gray-800 mb-4">Vue d'Ensemble du Tableau de Bord</h2>
    <p class="text-gray-600 text-lg">Aperçu et métriques clés pour gérer votre inventaire de bijoux.</p>
</div>

<!-- Dashboard Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800">Clients Inscrits</h3>
        </div>
        <p class="text-2xl font-bold text-gray-800 mt-4"><?= $clientsInscrits ?></p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800">Total Commandes</h3>
        </div>
        <p class="text-2xl font-bold text-gray-800 mt-4"><?= $totalCommandes ?></p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800">Produits Totaux</h3>
        </div>
        <p class="text-2xl font-bold text-gray-800 mt-4"><?= $produitsTotaux ?></p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-semibold text-gray-800">Valeur du Stock</h3>
        </div>
        <p class="text-2xl font-bold text-gray-800 mt-4">€<?= number_format($valeurStock, 2, ',', ' ') ?></p>
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
<script>
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
<?php include('includes/footer.php'); ?>