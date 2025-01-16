<?php
require_once("../sweetAlert.php");
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';

use classes\Role;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Language (Français) -->
    <script src="//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"></script>
    <!-- script data table -->
    <script src="../../src/js/dataTable.js"></script>
    <script src="../../src/js/main.js"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="../../src/css/style.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->


        <nav class="bg-gradient-to-b from-blue-600 to-indigo-700 shadow-2xl rounded-2xl p-4 space-y-2">
            <!-- Dashboard -->
            <a href="dashboard.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-tachometer-alt text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
                <span class="absolute -right-2 -top-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    3
                </span>
            </a>

            <!-- Valider Enseignant -->
            <a href="approvedTeacher.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-user-check text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
                <span class="absolute -right-2 -top-2 bg-green-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    5
                </span>
            </a>

            <!-- Gérer Enseignant -->
            <a href="gereTeacher.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-chalkboard-teacher text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
            </a>

            <!-- Gérer Étudiants -->
            <a href="gereStudent.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-users-cog text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
                <span class="absolute -right-2 -top-2 bg-yellow-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    12
                </span>
            </a>

            <!-- cour -->
            <a href="courses.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-laptop-code text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
                <span class="absolute -right-2 -top-2 bg-blue-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    10
                </span>
            </a>
            <!-- Catégories -->
            <a href="categorie.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-layer-group text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
            </a>

            <!-- Tags -->
            <a href="tags.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-tags text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
            </a>

            <!-- Statistiques -->
            <a href="static.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-white/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-chart-pie text-white text-xl relative z-10 transform group-hover:rotate-12"></i>
            </a>

            <!-- Séparateur -->
            <div class="border-t border-white/20 my-2"></div>

            <!-- Déconnexion -->
            <a href="logout.php" class="group relative flex items-center justify-center py-3 px-4 rounded-lg transition duration-300 hover:bg-red-500/20 hover:scale-105">
                <div class="absolute inset-0 bg-white/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <i class="fas fa-sign-out-alt text-white text-xl relative z-10 transform group-hover:rotate-12 group-hover:text-red-500"></i>
            </a>
        </nav>

        <style>
            /* Animations supplémentaires */
            @keyframes pulse {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }

                100% {
                    transform: scale(1);
                }
            }

            .group:hover i {
                animation: pulse 0.5s ease-in-out;
            }
        </style>


        <!-- Main Content -->

        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white shadow py-4 px-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-semibold"> Bienvenue Name </h2>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="text-gray-600">
                        <i class="fas fa-user-circle"></i>
                    </button>
                </div>
            </header>
            <!-- Main Section -->
            <main class="flex-1 bg-gray-100 p-6">
                <?php
                echo isset($content) ? $content : '<p>Bienvenue sur Votre Dashorad .</p>';
                ?>



                <!-- Gestion des utilisateurs -->
                <section class="mb-6">
                    <h3 class="text-xl font-semibold mb-4">Gestion des utilisateurs</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600">Activation, suspension ou suppression des utilisateurs...</p>
                        <!-- Add your content here -->
                    </div>
                </section>
                <!-- Gestion des contenus -->
                <section class="mb-6">
                    <h3 class="text-xl font-semibold mb-4">Gestion des contenus</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600">Gestion des cours, catégories et tags...</p>
                        <!-- Add your content here -->
                    </div>
                </section>
                <!-- Insertion en masse de tags -->
                <section class="mb-6">
                    <h3 class="text-xl font-semibold mb-4">Insertion en masse de tags</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600">Insertion en masse de tags pour gagner en efficacité...</p>
                        <!-- Add your content here -->
                    </div>
                </section>
                <!-- Statistiques globales -->
                <section class="mb-6">
                    <h3 class="text-xl font-semibold mb-4">Statistiques globales</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Total Courses -->
                            <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold">Total Courses</h3>
                                        <p class="text-gray-600">1,234</p>
                                    </div>
                                    <div class="bg-blue-500 text-white p-3 rounded-full">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Courses by Category -->
                            <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold">Courses by Category</h3>
                                        <p class="text-gray-600">Details...</p>
                                    </div>
                                    <div class="bg-green-500 text-white p-3 rounded-full">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Course with Most Students -->
                            <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold">Course with Most Students</h3>
                                        <p class="text-gray-600">Course Name</p>
                                    </div>
                                    <div class="bg-yellow-500 text-white p-3 rounded-full">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Top 3 Teachers -->
                            <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold">Top 3 Teachers</h3>
                                        <p class="text-gray-600">Teacher Names</p>
                                    </div>
                                    <div class="bg-red-500 text-white p-3 rounded-full">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script>
        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Revenue',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>