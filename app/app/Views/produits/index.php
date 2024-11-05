<?php echo view('includes/header'); ?>

<div class="p-6">
    <!-- Title and Subheading Section -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800">Gestion des Produits</h1>
            <p class="text-lg text-gray-600 mt-1">Visualisez, modifiez et gérez tous les produits disponibles.</p>
        </div>
        <!-- Add Product Button -->
        <a href="javascript:void(0)" onclick="openAddProductModal()" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
            <i class="fas fa-plus"></i> Ajouter Produit
        </a>
    </div>

    <!-- Products List Section -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">ID</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Nom</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Description</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Prix</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Quantité en Stock</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Matériau</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Pierre Précieuse</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Catégorie</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Fournisseur</th>
                    <th class="py-3 px-6 text-center text-sm font-semibold uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <?php foreach ($produits as $produit): ?>
                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['id']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['nom']) ?></td>
                        <td class="py-3 px-6" title="<?= htmlspecialchars($produit['description']) ?>">
                            <?= htmlspecialchars(strtok($produit['description'], ' ')) ?>...
                        </td>
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['prix']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['quantite_en_stock']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['materiau']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['pierre_precieuse']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['categorie_nom']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($produit['fournisseur_nom']) ?></td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-4">
                            <!-- Edit Button with Data Attributes for Modal -->
                            <a href="javascript:void(0)"
                                data-id="<?= $produit['id'] ?>"
                                data-nom="<?= htmlspecialchars($produit['nom']) ?>"
                                data-description="<?= htmlspecialchars($produit['description']) ?>"
                                data-prix="<?= htmlspecialchars($produit['prix']) ?>"
                                data-quantite="<?= htmlspecialchars($produit['quantite_en_stock']) ?>"
                                data-materiau="<?= htmlspecialchars($produit['materiau']) ?>"
                                data-pierre="<?= htmlspecialchars($produit['pierre_precieuse']) ?>"
                                data-categorie="<?= htmlspecialchars($produit['categorie_id']) ?>"
                                data-fournisseur="<?= htmlspecialchars($produit['fournisseur_id']) ?>"
                                onclick="openEditProductModal(this)"
                                class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Modifier">
                                <i class="fas fa-edit text-lg"></i>
                            </a>
                            <a href="/produits/delete/<?= $produit['id'] ?>" class="text-red-500 hover:text-red-700 transition-colors duration-200" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                <i class="fas fa-trash text-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="editProductModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-4">Modifier Produit</h1>
        <form id="editProductForm" action="" method="post">
            <input type="hidden" name="id" id="productId">

            <!-- Row for Name and Price -->
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="productName" class="block text-sm font-medium text-gray-700">Nom:</label>
                    <input type="text" name="nom" id="productName" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div class="w-1/2">
                    <label for="productPrice" class="block text-sm font-medium text-gray-700">Prix:</label>
                    <input type="number" step="0.01" name="prix" id="productPrice" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            </div>

            <!-- Row for Description -->
            <div class="mt-4">
                <label for="productDescription" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="productDescription" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required></textarea>
            </div>

            <!-- Row for Quantity and Material -->
            <div class="flex space-x-4 mt-4">
                <div class="w-1/2">
                    <label for="productQuantity" class="block text-sm font-medium text-gray-700">Quantité en Stock:</label>
                    <input type="number" name="quantite_en_stock" id="productQuantity" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div class="w-1/2">
                    <label for="productMaterial" class="block text-sm font-medium text-gray-700">Matériau:</label>
                    <input type="text" name="materiau" id="productMaterial" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            </div>

            <!-- Row for Stone and Category -->
            <div class="flex space-x-4 mt-4">
                <div class="w-1/2">
                    <label for="productStone" class="block text-sm font-medium text-gray-700">Pierre Précieuse:</label>
                    <input type="text" name="pierre_precieuse" id="productStone" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>
                <div class="w-1/2">
                    <label for="productCategory" class="block text-sm font-medium text-gray-700">Catégorie:</label>
                    <select name="categorie_id" id="productCategory" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        <?php foreach ($categories as $categorie): ?>
                            <option value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Row for Supplier -->
            <div class="mt-4">
                <label for="productSupplier" class="block text-sm font-medium text-gray-700">Fournisseur:</label>
                <select name="fournisseur_id" id="productSupplier" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    <?php foreach ($fournisseurs as $fournisseur): ?>
                        <option value="<?= $fournisseur['id'] ?>"><?= htmlspecialchars($fournisseur['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('editProductModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Mettre à Jour</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-4">Ajouter Nouveau Produit</h1>
        <form id="addProductForm" action="/produits/store" method="post">

            <!-- Row for Name and Price -->
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="addProductName" class="block text-sm font-medium text-gray-700">Nom:</label>
                    <input type="text" name="nom" id="addProductName" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div class="w-1/2">
                    <label for="addProductPrice" class="block text-sm font-medium text-gray-700">Prix:</label>
                    <input type="number" step="0.01" name="prix" id="addProductPrice" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            </div>

            <!-- Row for Description -->
            <div class="mt-4">
                <label for="addProductDescription" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="addProductDescription" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required></textarea>
            </div>

            <!-- Row for Quantity and Material -->
            <div class="flex space-x-4 mt-4">
                <div class="w-1/2">
                    <label for="addProductQuantity" class="block text-sm font-medium text-gray-700">Quantité en Stock:</label>
                    <input type="number" name="quantite_en_stock" id="addProductQuantity" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div class="w-1/2">
                    <label for="addProductMaterial" class="block text-sm font-medium text-gray-700">Matériau:</label>
                    <input type="text" name="materiau" id="addProductMaterial" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            </div>

            <!-- Row for Stone and Category -->
            <div class="flex space-x-4 mt-4">
                <div class="w-1/2">
                    <label for="addProductStone" class="block text-sm font-medium text-gray-700">Pierre Précieuse:</label>
                    <input type="text" name="pierre_precieuse" id="addProductStone" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>
                <div class="w-1/2">
                    <label for="addProductCategory" class="block text-sm font-medium text-gray-700">Catégorie:</label>
                    <select name="categorie_id" id="addProductCategory" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                        <option value="" disabled selected aria-placeholder="Sélectionnez une catégorie">Sélectionnez une catégorie</option>
                        <?php foreach ($categories as $categorie): ?>
                            <option value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Row for Supplier -->
            <div class="mt-4">
                <label for="addProductSupplier" class="block text-sm font-medium text-gray-700">Fournisseur:</label>
                <select name="fournisseur_id" id="addProductSupplier" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    <option value="" disabled selected aria-placeholder="Sélectionnez un fournisseur">Sélectionnez un fournisseur</option>
                    <?php foreach ($fournisseurs as $fournisseur): ?>
                        <option value="<?= $fournisseur['id'] ?>"><?= htmlspecialchars($fournisseur['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('addProductModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Ajouter</button>
            </div>
        </form>
    </div>
</div>



<?php echo view('includes/footer'); ?>

<script>
    function openEditProductModal(element) {
        const id = element.getAttribute('data-id');
        const nom = element.getAttribute('data-nom');
        const description = element.getAttribute('data-description');
        const prix = element.getAttribute('data-prix');
        const quantite = element.getAttribute('data-quantite');
        const materiau = element.getAttribute('data-materiau');
        const pierre = element.getAttribute('data-pierre');
        const categorie = element.getAttribute('data-categorie');
        const fournisseur = element.getAttribute('data-fournisseur');

        const modal = document.getElementById('editProductModal');
        if (modal) {
            document.getElementById('editProductForm').action = `/produits/update/${id}`;
            document.getElementById('productId').value = id;
            document.getElementById('productName').value = nom;
            document.getElementById('productDescription').value = description;
            document.getElementById('productPrice').value = prix;
            document.getElementById('productQuantity').value = quantite;
            document.getElementById('productMaterial').value = materiau;
            document.getElementById('productStone').value = pierre;

            // Set selected options in dropdowns
            document.getElementById('productCategory').value = categorie;
            document.getElementById('productSupplier').value = fournisseur;

            modal.classList.remove('hidden');
        } else {
            console.error("Edit Product Modal not found");
        }
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function openAddProductModal() {
        document.getElementById('addProductModal').classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>