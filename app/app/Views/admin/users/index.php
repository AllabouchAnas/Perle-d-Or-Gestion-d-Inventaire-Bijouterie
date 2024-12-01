<?php echo view('admin/includes/header'); ?>
<div class="p-6">
    <!-- Title and Subheading Section -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800">Gestion des utilisateur</h1>
            <p class="text-lg text-gray-600 mt-1">Visualisez, modifiez et organisez toutes les informations de vos utilisaeur .</p>
        </div>
        </div>
        <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Nom</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Email</th>
                    <th class="py-3 px-6 text-center text-sm font-semibold uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <?php foreach (array_reverse($clients) as $client): ?>
                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                        <td class="py-3 px-6"><?= htmlspecialchars($client['nom']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($client['email']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($client['telephone']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($client['adresse']) ?></td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-4">
                            <!-- Edit Button with Data Attributes for Modal -->
                            <a href="javascript:void(0)"
                                data-id="<?= $client['id'] ?>"
                                data-name="<?= htmlspecialchars($client['nom']) ?>"
                                data-email="<?= htmlspecialchars($client['email']) ?>"
                                data-telephone="<?= htmlspecialchars($client['telephone']) ?>"
                                data-adresse="<?= htmlspecialchars($client['adresse']) ?>"
                                onclick="openEditClientModal(this)"
                                class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Modifier">
                                <i class="fas fa-edit text-lg"></i>
                            </a>
                            <a href="/clients/delete/<?= $client['id'] ?>" class="text-red-500 hover:text-red-700 transition-colors duration-200" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                <i class="fas fa-trash text-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>