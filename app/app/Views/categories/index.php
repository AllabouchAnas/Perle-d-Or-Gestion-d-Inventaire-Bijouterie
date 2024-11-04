<?php echo view('includes/header'); ?>

<div class="p-6">
    <!-- Title and Subheading Section -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800">Gestion des Catégories</h1>
            <p class="text-lg text-gray-600 mt-1">Visualisez, modifiez et organisez toutes les catégories de produits.</p>
        </div>
        <!-- Add Category Button -->
        <a href="javascript:void(0)" onclick="openAddModal()" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
            <i class="fas fa-plus"></i> Ajouter Catégorie
        </a>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Nom</th>
                    <th class="py-3 px-6 text-center text-sm font-semibold uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <?php foreach (array_reverse($categories) as $category): ?>
                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                        <td class="py-3 px-6"><?= htmlspecialchars($category['nom']) ?></td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-4">
                            <!-- Edit Button with Modal Trigger -->
                            <a href="javascript:void(0)" onclick="openEditModal(<?= $category['id'] ?>, '<?= htmlspecialchars($category['nom']) ?>')" class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Modifier">
                                <i class="fas fa-edit text-lg"></i>
                            </a>
                            <a href="/categories/delete/<?= $category['id'] ?>" class="text-red-500 hover:text-red-700 transition-colors duration-200" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                <i class="fas fa-trash text-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Modifier Catégorie</h1>
        <form id="editForm" action="" method="post">
            <input type="hidden" name="id" id="categoryId">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" id="categoryName" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Mettre à Jour</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Category Modal -->
<div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Ajouter une Nouvelle Catégorie</h1>
        <form action="/categories/store" method="post">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" id="nom" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('addModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<?php echo view('includes/footer'); ?>

<script>
    // Function to Open the Edit Modal and Populate with Data
    function openEditModal(id, name) {
        document.getElementById('editForm').action = `/categories/update/${id}`;
        document.getElementById('categoryId').value = id;
        document.getElementById('categoryName').value = name;
        document.getElementById('editModal').classList.remove('hidden');
    }

    // Function to Open the Add Modal
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    // Function to Close the Modal
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Close Modal When Clicking Outside the Modal Content
    window.onclick = function(event) {
        const editModal = document.getElementById('editModal');
        const addModal = document.getElementById('addModal');
        if (event.target === editModal) {
            closeModal('editModal');
        }
        if (event.target === addModal) {
            closeModal('addModal');
        }
    };
</script>