<?php echo view('admin/includes/header'); ?>

<div class="p-6">
    <!-- Title and Subheading Section -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-800">Gestion des Commandes</h1>
            <p class="text-lg text-gray-600 mt-1">Visualisez, modifiez et organisez toutes les commandes.</p>
        </div>
        <!-- Add Order Button -->
        <a href="javascript:void(0)" onclick="openAddOrderModal()" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-200">
            <i class="fas fa-plus"></i> Ajouter Commande
        </a>
    </div>

    <!-- Orders List Section -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
                <tr>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">ID</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Date</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Status</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Total</th>
                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wide">Client</th>
                    <th class="py-3 px-6 text-center text-sm font-semibold uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <?php foreach (array_reverse($commandes) as $commande): ?>
                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                        <td class="py-3 px-6"><?= htmlspecialchars($commande['id']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($commande['date_commande']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($commande['statut']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($commande['prix_total']) ?> Dh</td>
                        <td class="py-3 px-6"><?= htmlspecialchars($commande['client_nom']) ?></td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-4">
                            <a href="javascript:void(0)"
                                onclick="viewOrderDetails(<?= $commande['id'] ?>)"
                                class="text-yellow-500 hover:text-yellow-700 transition-colors duration-200" title="Voir">
                                <i class="fas fa-eye text-lg"></i>
                            </a>
                            <a href="javascript:void(0)"
                                data-id="<?= $commande['id'] ?>"
                                data-date="<?= htmlspecialchars($commande['date_commande']) ?>"
                                data-status="<?= htmlspecialchars($commande['statut']) ?>"
                                data-price="<?= htmlspecialchars($commande['prix_total']) ?>"
                                data-client-id="<?= htmlspecialchars($commande['client_id']) ?>"
                                onclick="openEditOrderModal(this)"
                                class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Modifier">
                                <i class="fas fa-edit text-lg"></i>
                            </a>
                            <a href="/commandes/bon_de_commande/<?= $commande['id'] ?>" class="text-yellow-500 hover:text-yellow-700 transition-colors duration-200" title="Bon de Commande">
                                <i class="fas fa-print text-lg"></i>
                            </a>
                            <a href="/commandes/delete/<?= $commande['id'] ?>" class="text-red-500 hover:text-red-700 transition-colors duration-200" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">
                                <i class="fas fa-trash text-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Order Modal -->
<div id="editOrderModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Modifier Commande</h1>
        <form id="editOrderForm" action="" method="post">
            <input type="hidden" name="id" id="orderId">

            <label for="orderDate" class="block text-sm font-medium text-gray-700">Date de Commande:</label>
            <input type="date" name="date_commande" id="orderDate" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>

            <label for="orderStatus" class="block text-sm font-medium text-gray-700 mt-4">Statut:</label>
            <select name="statut" id="orderStatus" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Canceled">Canceled</option>
            </select>

            <label for="orderPrice" class="block text-sm font-medium text-gray-700 mt-4">Prix Total:</label>
            <input type="number" step="0.01" name="prix_total" id="orderPrice" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>

            <label for="clientId" class="block text-sm font-medium text-gray-700 mt-4">Client:</label>
            <select name="client_id" id="clientId" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                <?php foreach ($clients as $client): ?>
                    <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['nom']) ?></option>
                <?php endforeach; ?>
            </select>

            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('editOrderModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Mettre à Jour</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Order Modal -->
<div id="addOrderModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Ajouter une Nouvelle Commande</h1>
        <form action="/commandes/store" method="post">
            <label for="newOrderDate" class="block text-sm font-medium text-gray-700">Date de Commande:</label>
            <input type="date" name="date_commande" id="newOrderDate" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>

            <label for="newOrderStatus" class="block text-sm font-medium text-gray-700 mt-4">Statut:</label>
            <select name="statut" id="newOrderStatus" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                <option value="" disabled selected aria-placeholder="Sélectionnez un statut">Sélectionnez un statut</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Canceled">Canceled</option>
            </select>

            <label for="newOrderPrice" class="block text-sm font-medium text-gray-700 mt-4">Prix Total:</label>
            <input type="number" step="0.01" name="prix_total" id="newOrderPrice" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>

            <label for="newClientId" class="block text-sm font-medium text-gray-700 mt-4">Client:</label>
            <select name="client_id" id="newClientId" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                <?php foreach ($clients as $client): ?>
                    <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['nom']) ?></option>
                <?php endforeach; ?>
            </select>

            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('addOrderModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<!-- View Order Details Modal -->
<div id="viewOrderDetailsModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-4">Détails de la Commande</h1>
        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left text-sm font-semibold uppercase">Produit</th>
                    <th class="py-2 px-4 text-left text-sm font-semibold uppercase">Quantité</th>
                    <th class="py-2 px-4 text-left text-sm font-semibold uppercase">Prix Unitaire</th>
                    <th class="py-2 px-4 text-left text-sm font-semibold uppercase">Total</th>
                </tr>
            </thead>
            <tbody id="orderDetailsTable" class="text-gray-700 divide-y divide-gray-200">
                <!-- Order details will be dynamically added here -->
            </tbody>
        </table>
        <div class="flex justify-end mt-4">
            <button onclick="closeModal('viewOrderDetailsModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Fermer</button>
        </div>
    </div>
</div>


<?php echo view('admin/includes/footer'); ?>

<script>
    // Function to open the edit order modal and populate it with data
    function openEditOrderModal(element) {
        const id = element.getAttribute('data-id');
        const date = element.getAttribute('data-date');
        const status = element.getAttribute('data-status');
        const price = element.getAttribute('data-price');
        const clientId = element.getAttribute('data-client-id');

        const modal = document.getElementById('editOrderModal');
        if (modal) {
            document.getElementById('editOrderForm').action = `/commandes/update/${id}`;
            document.getElementById('orderId').value = id;
            document.getElementById('orderDate').value = date;
            document.getElementById('orderPrice').value = price;
            document.getElementById('clientId').value = clientId;

            // Set the selected status or placeholder if status is empty
            const orderStatus = document.getElementById('orderStatus');
            orderStatus.value = status || ""; // If status is empty, set it to the placeholder

            modal.classList.remove('hidden');
        } else {
            console.error("Edit Order Modal not found");
        }
    }

    function viewOrderDetails(orderId) {
        fetch(`/commandes/getOrderDetails/${orderId}`)
            .then(response => response.json())
            .then(details => {
                console.log("Order Details:", details); // Debug output
                const orderDetailsTable = document.getElementById('orderDetailsTable');
                orderDetailsTable.innerHTML = ''; // Clear previous details

                if (details.error) {
                    orderDetailsTable.innerHTML = `<tr><td colspan="4" class="text-center py-4">${details.error}</td></tr>`;
                    return;
                }

                details.forEach(detail => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td class="py-2 px-4">${detail.produit_nom }</td>
                    <td class="py-2 px-4">${detail.quantite}</td>
                    <td class="py-2 px-4">${parseFloat(detail.prix_unitaire).toFixed(2)} €</td>
                    <td class="py-2 px-4">${(detail.quantite * detail.prix_unitaire).toFixed(2)} €</td>
                `;
                    orderDetailsTable.appendChild(row);
                });

                // Show the modal
                document.getElementById('viewOrderDetailsModal').classList.remove('hidden');
            })
            .catch(error => console.error('Error fetching order details:', error));
    }

    // Close modal when clicking outside of it  
    window.onclick = function(event) {
        const viewModal = document.getElementById('viewOrderDetailsModal');
        if (event.target === viewModal) {
            closeModal('viewOrderDetailsModal');
        }
    };

    // Function to open the Add Order Modal
    function openAddOrderModal() {
        document.getElementById('addOrderModal').classList.remove('hidden');
    }

    // Function to close any modal
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Function to print the order information
    function printOrder(orderId) {
        console.log("Printing Order:", orderId);
        window.print();
    }

    // Close modal when clicking outside of it  
    window.onclick = function(event) {
        const editModal = document.getElementById('editOrderModal');
        const addModal = document.getElementById('addOrderModal');
        if (event.target === editModal) {
            closeModal('editOrderModal');
        }
        if (event.target === addModal) {
            closeModal('addOrderModal');
        }
    };
</script>