<?php echo view('admin/includes/header'); ?>

<div class="p-6">
    <!-- Title and Subheading Section -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800">Gestion des Fournisseurs</h1>
            <p class="text-lg text-gray-600 mt-1">Visualisez, modifiez et gérez tous les fournisseurs disponibles.</p>
        </div>
        <!-- Add Supplier Button -->
        <a href="javascript:void(0)" onclick="openAddSupplierModal()" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
            <i class="fas fa-plus"></i> Ajouter Fournisseur
        </a>
    </div>

    <!-- Suppliers List Section -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">ID</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Nom</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Email</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Téléphone</th>
                    <th class="py-3 px-6 text-center text-sm font-semibold uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <?php foreach ($fournisseurs as $fournisseur): ?>
                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                        <td class="py-3 px-6"><?= htmlspecialchars($fournisseur['id']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($fournisseur['nom']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($fournisseur['email']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($fournisseur['telephone']) ?></td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-4">
                            <a href="javascript:void(0)"
                                data-id="<?= $fournisseur['id'] ?>"
                                data-nom="<?= htmlspecialchars($fournisseur['nom']) ?>"
                                data-email="<?= htmlspecialchars($fournisseur['email']) ?>"
                                data-telephone="<?= htmlspecialchars($fournisseur['telephone']) ?>"
                                onclick="openEditSupplierModal(this)"
                                class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Modifier">
                                <i class="fas fa-edit text-lg"></i>
                            </a>
                            <a href="/fournisseurs/delete/<?= $fournisseur['id'] ?>" class="text-red-500 hover:text-red-700 transition-colors duration-200" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')">
                                <i class="fas fa-trash text-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Supplier Modal -->
<div id="addSupplierModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-4">Ajouter Nouveau Fournisseur</h1>
        <form id="addSupplierForm" action="/fournisseurs/store" method="post">

            <!-- Row for Name and Email -->
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="addSupplierName" class="block text-sm font-medium text-gray-700">Nom:</label>
                    <input type="text" name="nom" id="addSupplierName" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div class="w-1/2">
                    <label for="addSupplierEmail" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" id="addSupplierEmail" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            </div>

            <!-- Row for Telephone -->
            <div class="mt-4">
                <label for="addSupplierTelephone" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                <input type="text" name="telephone" id="addSupplierTelephone" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('addSupplierModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Supplier Modal -->
<div id="editSupplierModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-4">Modifier Fournisseur</h1>
        <form id="editSupplierForm" action="" method="post">
            <input type="hidden" name="id" id="editSupplierId">

            <!-- Row for Name and Email -->
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="editSupplierName" class="block text-sm font-medium text-gray-700">Nom:</label>
                    <input type="text" name="nom" id="editSupplierName" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div class="w-1/2">
                    <label for="editSupplierEmail" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" id="editSupplierEmail" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            </div>

            <!-- Row for Telephone -->
            <div class="mt-4">
                <label for="editSupplierTelephone" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                <input type="text" name="telephone" id="editSupplierTelephone" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('editSupplierModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Mettre à Jour</button>
            </div>
        </form>
    </div>
</div>

<?php echo view('admin/includes/footer'); ?>

<script>
    function openAddSupplierModal() {
        document.getElementById('addSupplierModal').classList.remove('hidden');
    }

    function openEditSupplierModal(element) {
        const id = element.getAttribute('data-id');
        const nom = element.getAttribute('data-nom');
        const email = element.getAttribute('data-email');
        const telephone = element.getAttribute('data-telephone');

        document.getElementById('editSupplierForm').action = `/fournisseurs/update/${id}`;
        document.getElementById('editSupplierId').value = id;
        document.getElementById('editSupplierName').value = nom;
        document.getElementById('editSupplierEmail').value = email;
        document.getElementById('editSupplierTelephone').value = telephone;

        document.getElementById('editSupplierModal').classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>