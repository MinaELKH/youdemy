<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Moderne</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Chart.js pour les graphiques -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- CSS Quill -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

    <!-- JS Quill -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar Moderne -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://via.placeholder.com/40" alt="Logo">
                    </a>

                    <!-- Menu Principal -->
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Accueil
                        </a>
                        <a href="#" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Tableau de bord
                        </a>
                        <a href="mesCourses.php" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Mes Cours
                        </a>
                        <a href="addCourse.php" class="text-gray-700 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Ajouter un nouveau cour </a>
                    </div>
                </div>

                <!-- Éléments de Droite -->
                <div class="flex items-center">
                    <!-- Recherche -->
                    <div class="mr-4">
                        <div class="relative">
                            <input
                                type="text"
                                placeholder="Rechercher..."
                                class="bg-gray-100 text-gray-700 border-none rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            <span class="absolute right-3 top-3 text-gray-500">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <div class="mr-4">
                        <button class="text-gray-700 hover:text-gray-900 relative">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="bg-red-500 text-white rounded-full px-2 py-1 text-xs absolute -top-2 -right-2">3</span>
                        </button>
                    </div>

                    <!-- Profil -->
                    <div class="flex items-center">
                        <img
                            src="https://via.placeholder.com/40"
                            alt="Profil"
                            class="w-10 h-10 rounded-full mr-3">
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-gray-700">John Doe</span>
                            <span class="text-xs text-gray-500">Administrateur</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>






    <main class="flex-1 bg-gray-100 p-6">
        <?php
        echo isset($content) ? $content : '<p>Bienvenue sur Votre Dashorad .</p>';
        ?>

        <script>
            // Graphique de Revenus
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Revenus',
                        data: [12000, 19000, 15000, 22000, 18000, 25000],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                }
            });

            // Graphique des Utilisateurs
            const usersCtx = document.getElementById('usersChart').getContext('2d');
            new Chart(usersCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Nouveaux Utilisateurs',
                        data: [500, 750, 600, 900, 800, 1000],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)'
                    }]
                }
            });
        </script>
</body>

</html>