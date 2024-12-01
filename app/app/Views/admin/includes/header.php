<?php
$currentPath = $_SERVER['REQUEST_URI']; // Get the current path
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perle d'Or - Gestion de Stock Bijouterie</title>
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
                <input type="text" placeholder="Rechercher..." class="px-4 py-2 rounded bg-gray-700 text-white focus:outline-none">
                <div class="relative">
                    <button class="text-white hover:text-yellow-400 transition duration-200 focus:outline-none text-3xl flex items-center" id="profileMenuButton">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Paramètres</a>
                        <a href="/" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex flex-col lg:flex-row min-h-screen">
        <!-- Side Navigation -->
        <aside id="sidebar" class="bg-gradient-to-b from-gray-900 to-gray-800 w-full lg:w-1/5 p-6 text-gray-300 shadow-lg lg:block hidden">
            <h2 class="text-lg font-semibold text-yellow-400 mb-6 tracking-wide">Application</h2>
            <ul class="text-lg">
                <li>
                    <a href="/admin" class="flex items-center space-x-3 p-3 rounded transition duration-200 <?php if ($currentPath == '/admin') echo 'bg-gray-700 text-yellow-400'; ?>">
                        <i class="fas fa-home"></i><span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="/categories" class="flex items-center space-x-3 p-3 rounded transition duration-200 <?php if ($currentPath == '/categories') echo 'bg-gray-700 text-yellow-400'; ?>">
                        <i class="fas fa-th-list"></i><span>Catégories</span>
                    </a>
                </li>
                <li>
                    <a href="/clients" class="flex items-center space-x-3 p-3 rounded transition duration-200 <?php if ($currentPath == '/clients') echo 'bg-gray-700 text-yellow-400'; ?>">
                        <i class="fas fa-users"></i><span>Clients</span>
                    </a>
                </li>
                <li>
                    <a href="/commandes" class="flex items-center space-x-3 p-3 rounded transition duration-200 <?php if ($currentPath == '/commandes') echo 'bg-gray-700 text-yellow-400'; ?>">
                        <i class="fas fa-box"></i><span>Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="/produits" class="flex items-center space-x-3 p-3 rounded transition duration-200 <?php if ($currentPath == '/produits') echo 'bg-gray-700 text-yellow-400'; ?>">
                        <i class="fas fa-gem"></i><span>Produits</span>
                    </a>
                </li>
                <li>
                    <a href="/fournisseurs" class="flex items-center space-x-3 p-3 rounded transition duration-200 <?php if ($currentPath == '/fournisseurs') echo 'bg-gray-700 text-yellow-400'; ?>">
                        <i class="fas fa-truck"></i><span>Fournisseurs</span>
                    </a>
                </li>
                <li>
                    <a href="/user" class="flex items-center space-x-3 p-3 rounded transition duration-200 <?php if ($currentPath == '/user') echo 'bg-gray-700 text-yellow-400'; ?>">
                        <i class="fas fa-users"></i><span>Utilisateur</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="bg-gray-50 flex-1 p-6 md:p-10">