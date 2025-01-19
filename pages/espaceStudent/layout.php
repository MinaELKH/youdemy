<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
?>


<!DOCTYPE html>
<html lang="fr" x-data="{ mobileMenuOpen: false }">

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Youdemy</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

</head> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo et Menu Mobile -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-blue-600">Youdemy</h1>
                    </div>

                    <!-- Menu Desktop -->
                    <div class="hidden md:block ml-10">
                        <div class="flex items-baseline space-x-4">
                            <a href="mesCourses.php" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md">Mes Cours</a>
                            <a href="detailCourStudent.php/?id_course=33" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md">Recommandés</a>
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md">Favoris</a>
                        </div>
                    </div>
                </div>

                <!-- Recherche et Profil -->
                <div class="flex items-center space-x-4">
                    <div class="w-64">
                        <input type="text"
                            placeholder="Rechercher un cours..."
                            class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full ring-2 ring-blue-500" />

                    <!-- Bouton Menu Mobile -->
                    <div class="md:hidden">
                        <button
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="text-gray-600 hover:text-gray-800">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    x-show="!mobileMenuOpen"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    x-show="mobileMenuOpen"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div
            x-show="mobileMenuOpen"
            class="md:hidden absolute w-full bg-white shadow-lg"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="mesCourses.php" class="text-gray-600 hover:bg-gray-100 block px-3 py-2 rounded-md">Mes Cours</a>

                <a href="detailCourStudent.php/?id_course=33" class="text-gray-600 hover:bg-gray-100 block px-3 py-2 rounded-md">Recommandés</a>
                <a href="#" class="text-gray-600 hover:bg-gray-100 block px-3 py-2 rounded-md">Favoris</a>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="pt-24 px-4 sm:px-8 lg:px-12 max-w-6xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Mes Apprentissages</h1>
            <p class="text-gray-600 text-sm">Continuez votre progression et développez vos compétences</p>
        </div>

        <?php
        echo isset($content) ? $content : '<p>Bienvenue sur Votre Dashorad .</p>';
        ?>

    </main>



    </div>
</body>

</html>