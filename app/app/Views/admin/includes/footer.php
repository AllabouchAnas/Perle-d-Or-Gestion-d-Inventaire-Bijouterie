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
</script>
</body>

</html>