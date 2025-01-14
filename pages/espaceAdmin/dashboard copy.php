<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
use config\DataBaseManager;
use classes\User;
$dbManager = new DatabaseManager();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-900 text-white w-64 space-y-6 py-7 px-2">
            <div class="text-center">
                <h1 class="text-3xl font-bold">Dashboard</h1>
            </div>
            <nav>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-users"></i> Users
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-chart-line"></i> Analytics
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-cogs"></i> Settings
                </a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white shadow py-4 px-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-semibold">Dashboard</h2>
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
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold">Total Users</h3>
                                <p class="text-gray-600">1,234</p>
                            </div>
                            <div class="bg-blue-500 text-white p-3 rounded-full">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold">New Orders</h3>
                                <p class="text-gray-600">567</p>
                            </div>
                            <div class="bg-green-500 text-white p-3 rounded-full">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold">Revenue</h3>
                                <p class="text-gray-600">$12,345</p>
                            </div>
                            <div class="bg-yellow-500 text-white p-3 rounded-full">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Charts Section -->
                <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Line Chart -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Sales Overview</h3>
                        <canvas id="lineChart"></canvas>
                    </div>
                    <!-- Bar Chart -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Revenue Breakdown</h3>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                <!-- Recent Activities Section -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold mb-4">Recent Activities</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <ul>
                            <li class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="text-gray-600">User John Doe registered</p>
                                </div>
                                <div class="text-gray-500 text-sm">2 hours ago</div>
                            </li>
                            <li class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="text-gray-600">Order #1234 completed</p>
                                </div>
                                <div class="text-gray-500 text-sm">4 hours ago</div>
                            </li>
                            <li class="flex items-center justify-between py-2 border-b">
                                <div>
                                    <p class="text-gray-600">New comment on post</p>
                                </div>
                                <div class="text-gray-500 text-sm">6 hours ago</div>
                            </li>
                        </ul>
                    </div>
                </div>
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
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                    <!-- Total Sales Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-500 text-white rounded-full p-2">
                                <i class="fas fa-chart-bar">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Sales
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            87,472
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-green-500 text-sm">
                                Increased By 2.0%
                                <i class="fas fa-arrow-up">
                                </i>
                            </span>
                        </div>
                    </div>
                    <!-- Total Revenue Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-pink-500 text-white rounded-full p-2">
                                <i class="fas fa-briefcase">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Revenue
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            $9,432
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-red-500 text-sm">
                                Decreased By 1.0%
                                <i class="fas fa-arrow-down">
                                </i>
                            </span>
                        </div>
                    </div>
                    <!-- Total Customers Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-pink-500 text-white rounded-full p-2">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Customers
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            3,132
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-green-500 text-sm">
                                Increased By 1.5%
                                <i class="fas fa-arrow-up">
                                </i>
                            </span>
                        </div>
                    </div>
                    <!-- Total Profit Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-orange-500 text-white rounded-full p-2">
                                <i class="fas fa-dollar-sign">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Profit
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            $5,325
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-green-500 text-sm">
                                Increased By 1.3%
                                <i class="fas fa-arrow-up">
                                </i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Validation des comptes enseignants -->
                <section class="mb-6">
                    <h3 class="text-xl font-semibold mb-4">Validation des comptes enseignants</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600">Liste des enseignants en attente de validation...</p>
                        <!-- Add your content here -->
                    </div>
                </section>
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

        



<!-- d autre dashboard -->

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
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                    <!-- Total Sales Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-500 text-white rounded-full p-2">
                                <i class="fas fa-chart-bar">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Sales
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            87,472
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-green-500 text-sm">
                                Increased By 2.0%
                                <i class="fas fa-arrow-up">
                                </i>
                            </span>
                        </div>
                    </div>
                    <!-- Total Revenue Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-pink-500 text-white rounded-full p-2">
                                <i class="fas fa-briefcase">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Revenue
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            $9,432
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-red-500 text-sm">
                                Decreased By 1.0%
                                <i class="fas fa-arrow-down">
                                </i>
                            </span>
                        </div>
                    </div>
                    <!-- Total Customers Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-pink-500 text-white rounded-full p-2">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Customers
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            3,132
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-green-500 text-sm">
                                Increased By 1.5%
                                <i class="fas fa-arrow-up">
                                </i>
                            </span>
                        </div>
                    </div>
                    <!-- Total Profit Card -->
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                        <div class="flex items-center mb-4">
                            <div class="bg-orange-500 text-white rounded-full p-2">
                                <i class="fas fa-dollar-sign">
                                </i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-gray-600">
                                    Total Profit
                                </h2>
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-gray-800 mb-2">
                            $5,325
                        </div>
                        <div class="flex items-center">
                            <img alt="Bar chart icon" class="mr-2" src="https://placehold.co/50x20" />
                            <span class="text-green-500 text-sm">
                                Increased By 1.3%
                                <i class="fas fa-arrow-up">
                                </i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Validation des comptes enseignants -->
                <section class="mb-6">
                    <h3 class="text-xl font-semibold mb-4">Validation des comptes enseignants</h3>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <p class="text-gray-600">Liste des enseignants en attente de validation...</p>
                        <!-- Add your content here -->
                    </div>
                </section>
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