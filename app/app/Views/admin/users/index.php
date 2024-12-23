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
                <?php foreach (array_reverse($users) as $user): ?>
                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                        <td class="py-3 px-6"><?= htmlspecialchars($user['complete_name']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($user['email']) ?></td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-4">
                            <!-- Edit Button with Data Attributes for Modal -->
                            <a href="javascript:void(0)"
                                data-id="<?= $user['id'] ?>"
                                data-name="<?= htmlspecialchars($user['complete_name']) ?>"
                                data-email="<?= htmlspecialchars($user['email']) ?>"
                                onclick="openEditUserModal(this)"
                                class="text-blue-500 hover:text-blue-700 transition-colors duration-200" title="Modifier">
                                <i class="fas fa-edit text-lg"></i>
                            </a>
                            <a href="/user/delete/<?= $user['id'] ?>" class="text-red-500 hover:text-red-700 transition-colors duration-200" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                <i class="fas fa-trash text-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div id="editUserModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4">Modifier utilisateur</h1>
        <form id="editUserForm" action="" method="post">
            <input type="hidden" name="id" id="userId">
            <label for="userName" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="complete_name" id="userName" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
            <label for="userEmail" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
            <input type="email" name="email" id="userEmail" class="w-full p-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>

            <div class="flex justify-end mt-4 space-x-3">
                <button type="button" onclick="closeModal('editUserModal')" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Mettre à Jour</button>
            </div>
        </form>
    </div>
</div>
<?php echo view('admin/includes/footer'); ?>



<script>
    function openEditUserModal(element) {
        const id = element.getAttribute('data-id');
        const complete_name = element.getAttribute('data-name');
        const email = element.getAttribute('data-email');
      

        console.log("Edit user Modal Data:", {
            id,
            complete_name,
            email,
         
        }); 

        const modal = document.getElementById('editUserModal');
        if (modal) {
            document.getElementById('editUserForm').action = `/user/update/${id}`;
            document.getElementById('userId').value = id;
            document.getElementById('userName').value = complete_name;
            document.getElementById('userEmail').value = email;
            modal.classList.remove('hidden');
        } else {
            console.error("Edit Client Modal not found");
        }
    }
    window.onclick = function(event) {
        const editUserModal = document.getElementById('editUserModal');
  
        if (event.target === editUserModal) {
            closeModal('editUserModal');
        }
     
    };
</script>