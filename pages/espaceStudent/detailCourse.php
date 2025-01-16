
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
ob_start();
use config\DataBaseManager;
use classes\Course;
use classes\student ;
$dbManager = new DataBaseManager();

//** a voir  */

$newStudent = new student ($dbManager , 66) ; 
//** a voir  */



?>


<!DOCTYPE html>
<html lang="fr" x-data="{ mobileMenuOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>
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
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md">Mes Cours</a>
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md">Recommandés</a>
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
                            class="text-gray-600 hover:text-gray-800"
                        >
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
            x-transition:leave-end="opacity-0 scale-90"
        >
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="text-gray-600 hover:bg-gray-100 block px-3 py-2 rounded-md">Mes Cours</a>
                <a href="#" class="text-gray-600 hover:bg-gray-100 block px-3 py-2 rounded-md">Recommandés</a>
                <a href="#" class="text-gray-600 hover:bg-gray-100 block px-3 py-2 rounded-md">Favoris</a>
            </div>
        </div>
    </nav>

<!-- Contenu Principal -->

  

    <section class="lg:mx-32">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Cours en Cours</h2>
            <a href="#" class="text-sm text-blue-600 hover:underline">Voir tout</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php 
            $courses = $newStudent->getMyCourses();
            foreach ($courses as $course): ?>
                <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                    <div class="relative">
                        <img 
                            src="<?php echo htmlspecialchars($course->picture ?? '../../src/images/header.jpg'); ?>" 
                            alt="Course Image" 
                            class="w-full h-24 object-cover"
                        >
                        <div class="absolute top-2 right-2 bg-blue-500 text-white px-1.5 py-0.5 rounded-full text-[10px]">
                            En cours
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="flex justify-between items-start mb-2">
                            <div class="w-3/4">
                                <h3 class="font-semibold text-sm truncate mb-1">
                                    <?php echo htmlspecialchars($course->title); ?>
                                </h3>
                                <p class="text-xs text-gray-500">
                                    <?php echo htmlspecialchars($course->teacher_name); ?>
                                </p>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-yellow-400 mr-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-[10px] text-gray-600">4.5</span>
                            </div>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="w-full bg-gray-200 rounded-full h-1 mr-2">
                                <div class="bg-blue-600 h-1 rounded-full" style="width: 45%"></div>
                            </div>
                            <span class="text-[10px] text-gray-500">45%</span>
                        </div>
                        <div class="mt-2 flex justify-between items-center">
                            <button class="bg-blue-50 text-blue-600 hover:bg-blue-100 px-2 py-1 rounded-lg text-[10px] transition-colors">
                                Continuer
                            </button>
                            <span class="text-[10px] text-gray-400">
                                <?php echo htmlspecialchars($course->duration ?? '6h 30m'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


<?php
$content = ob_get_clean();
include('layout.php');
?>