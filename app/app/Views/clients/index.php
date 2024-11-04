<?php echo view('includes/header'); ?>

<div class="p-6">
    <!-- Title and Subheading Section -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800">Gestion des Clients</h1>
            <p class="text-lg text-gray-600 mt-1">Visualisez, modifiez et organisez toutes les informations de vos clients.</p>
        </div>
        <!-- Add Client Button -->
        <a href="javascript:void(0)" onclick="openAddClientModal()" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
            <i class="fas fa-plus"></i> Ajouter Client
        </a>
    </div>

    <!-- Clients List Section -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Nom</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Email</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Téléphone</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Adresse</th>
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

<!-- Edit Client Modal -->
<div id="editClientModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Modifier Client</h1>
        <form id="editClientForm" action="" method="post">
            <input type="hidden" name="id" id="clientId">
            <label for="clientName" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" id="clientName" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <label for="clientEmail" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
            <input type="email" name="email" id="clientEmail" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <label for="clientTelephone" class="block text-sm font-medium text-gray-700 mt-4">Téléphone</label>
            <input type="text" name="telephone" id="clientTelephone" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <label for="clientAdresse" class="block text-sm font-medium text-gray-700 mt-4">Adresse</label>
            <textarea name="adresse" id="clientAdresse" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('editClientModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Mettre à Jour</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Client Modal -->
<div id="addClientModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Ajouter un Nouveau Client</h1>
        <form action="/clients/store" method="post">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <label for="email" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <label for="telephone" class="block text-sm font-medium text-gray-700 mt-4">Téléphone</label>
            <input type="text" name="telephone" id="telephone" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <label for="adresse" class="block text-sm font-medium text-gray-700 mt-4">Adresse</label>
            <textarea name="adresse" id="adresse" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('addClientModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<?php echo view('includes/footer'); ?>

<script>
    // Function to Open the Edit Client Modal and Populate with Data
    function openEditClientModal(element) {
        const id = element.getAttribute('data-id');
        const name = element.getAttribute('data-name');
        const email = element.getAttribute('data-email');
        const telephone = element.getAttribute('data-telephone');
        const adresse = element.getAttribute('data-adresse');

        console.log("Edit Client Modal Data:", {
            id,
            name,
            email,
            telephone,
            adresse
        }); // Debugging line

        const modal = document.getElementById('editClientModal');
        if (modal) {
            document.getElementById('editClientForm').action = `/clients/update/${id}`;
            document.getElementById('clientId').value = id;
            document.getElementById('clientName').value = name;
            document.getElementById('clientEmail').value = email;
            document.getElementById('clientTelephone').value = telephone;
            document.getElementById('clientAdresse').value = adresse;
            modal.classList.remove('hidden');
        } else {
            console.error("Edit Client Modal not found");
        }
    }

    // Function to Open the Add Client Modal
    function openAddClientModal() {
        document.getElementById('addClientModal').classList.remove('hidden');
    }

    // Function to Close the Modal
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Close Modal When Clicking Outside the Modal Content
    window.onclick = function(event) {
        const editClientModal = document.getElementById('editClientModal');
        const addClientModal = document.getElementById('addClientModal');
        if (event.target === editClientModal) {
            closeModal('editClientModal');
        }
        if (event.target === addClientModal) {
            closeModal('addClientModal');
        }
    };
</script>