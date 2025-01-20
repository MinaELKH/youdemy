<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/pages/sweetAlert.php';
ob_start();

use classes\Course;
use classes\CourseTags;
use classes\Review;
use classes\ContentText;
use classes\ContentVideo;
use classes\Teacher;
use classes\Categorie;
use Classes\Enrollment;
use config\DataBaseManager;
use config\Session;
// affichage 
session::start();
if (Session::isLoggedIn()) {
    // Récupérer les données de session
    $s_userId = Session::get('user')['id'];
    $userName = Session::get('user')['name'];
    $userEmail = Session::get('user')['email'];
    $userRole = Session::get('user')['role'];
    $userAvatar = Session::get('user')['avatar'];
}


?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        youdemy
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="font-sans antialiased">
    <nav class="w-full bg-white shadow-md fixed w-full z-10 top-0">
        <div class="container  px-4  flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img alt="youdemy" class="h-12" src="../src/images/logo.png" />

                <div class="flex items-center">
                    <h2 class="text-2xl text-indigo-500 font-bold ">
                        You<span class="text-yellow-500">Demy</span>
                    </h2>
                </div>
                <a class="text-gray-700" href="home.php">
                    Accueil
                </a>
                <a class="text-gray-700" href="#">
                <select
                        id="id_categorie"
                        name="id_categorie"
                        class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">catégorie</option>
                        <?php 
                        $categories = Categorie::getAll($dbManager);
                        foreach ($categories as $categorie): ?>
                            <option value="<?= $categorie->id_categorie ?>">
                                <?= htmlspecialchars($categorie->name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </a>

            </div>
            <div class="flex items-center  text-center justify-between space-x-8">

                <div class="mt-2">
                    <form action="http://localhost/youdemy/pages/searchResult.php" method="post">
                        <div class="relative">
                            <input
                                type="text"
                                name="search"
                                class="border rounded-full py-2 px-4 pl-10"
                                placeholder="Search...">
                            <input type="submit" name="btnsearch" style="display: none;">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                        </div>
                    </form>
                </div>
                <!-- la partie qui se change selon user  -->

                <div class="flex items-center space-x-4 relative">
                    <?php if (!Session::isLoggedIn()) : ?>
                        <nav class="flex items-center space-x-4">
                            <a class="text-gray-700 hover:text-gray-900" href="#">
                                Enseigner in Youdemy
                            </a>
                            <a class="text-gray-700 hover:text-gray-900" href="#">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <a class="text-gray-700 hover:text-gray-900" href="auth/login.php">
                                Log In
                            </a>
                            <a class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition" href="auth/register.php">
                                Sign Up
                            </a>
                        </nav>
                    <?php endif; ?>

                    <?php if (Session::isLoggedIn()) : ?>
                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <div class="relative">
                                <button class="text-gray-700 hover:text-gray-900">
                                    <i class="fas fa-bell text-lg"></i>
                                    <span class="bg-red-500 text-white rounded-full px-2 py-1 text-xs absolute -top-2 -right-2">3</span>
                                </button>
                            </div>

                            <!-- Profile Dropdown -->
                            <div x-data="{ open: false }" class="relative">
                                <button
                                    @click="open = !open"
                                    class="flex items-center focus:outline-none">
                                    <img
                                        src="<?= isset($userAvatar) ? $userAvatar : 'uploads/avatar_1.jpg' ?>"
                                        alt="Profil"
                                        class="w-10 h-10 rounded-full mr-3">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-700"><?= $userName ?></span>
                                        <span class="text-xs text-gray-500">
                                            <?= Session::hasRole('student') ? 'Apprenant' : 'Enseignant' ?>
                                        </span>
                                    </div>
                                </button>

                                <!-- Dropdown Menu -->
                                <div
                                    x-show="open"
                                    @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90"
                                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-20 border">
                                    <a href="<?= Session::hasRole('student') ? 'espaceStudent/mesCourses.php' : 'espaceTeacher/dashboard.php' ?>"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                        <i class="fas fa-chart-line mr-2"></i> Tableau de Bord
                                    </a>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                        <i class="fas fa-user mr-2"></i> Profil
                                    </a>
                                    <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                        <i class="fas fa-cog mr-2"></i> Paramètres
                                    </a>
                                    <div class="border-t my-1"></div>
                                    <a href="auth/logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Include Alpine.js for interactivity -->
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>




                <!-- fin de la partie qui se change selon user  -->
            </div>
        </div>
    </nav>