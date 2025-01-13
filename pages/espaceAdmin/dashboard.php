<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <h1 class="text-3xl font-bold"> Dashboard</h1>
            </div>
            <nav>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-user-check"></i> Validation des comptes enseignants
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-users-cog"></i> Gestion des utilisateurs
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-book"></i> Gestion des contenus
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-tags"></i> Insertion en masse de tags
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-chart-pie"></i> Statistiques globales
                </a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white shadow py-4 px-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-semibold"> Bienvenue  Name  </h2>
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