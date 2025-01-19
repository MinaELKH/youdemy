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
use config\DataBaseManager;
use config\Session;
// affichage 
session::start() ;
if (Session::isLoggedIn()) {
    // Récupérer les données de session
    $userName = Session::get('user')['name'];
    $userEmail = Session::get('user')['email'];
    $userRole = Session::get('user')['role'];
    $userAvatar = Session::get('user')['avatar'];
    var_dump($userAvatar); 
} 


try {
    $dbManager = new DataBaseManager();
    $StudentId = $_SESSION['student_id'] ?? 20;
    if (!$StudentId) {
        // throw new Exception(" access interdit ");

    }
    //$newTeacher = new Teacher($dbManager, $teacherId);
    $courses = Course::getall($dbManager);
    // Récupérer les catégories pour le select
    $categorieObj = new Categorie($dbManager);
    $categories = Categorie::getAll($dbManager);
} catch (Exception $e) {
    // Log error and redirect or show error message
    error_log($e->getMessage());
    $courses = [];
}
// Archivage d'un cours
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["archive"])) {
    try {
        $course = new Course($dbManager, $_POST['id_course']);
        $result = $course->archive();

        if ($result) {
            setSweetAlertMessage('Succès', 'Le cours a été archivé avec succès.', 'success', '');
        } else {
            setSweetAlertMessage('Erreur', 'Aucun archivage n\'a eu lieu. Veuillez contacter l\'administrateur.', 'error', '');
        }
    } catch (Exception $e) {
        setSweetAlertMessage('Erreur', $e->getMessage(), 'error', '');
    }
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
    <!-- Navbar -->


   <?php  var_dump(session::get('user')); ?>
    <nav class="bg-white shadow-md fixed w-full z-10 top-0">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img alt="EduMall Logo" class="h-10" src="https://placehold.co/40x40" />
                <span class="text-xl font-bold">
                    YOUDEMY
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a class="text-gray-700" href="#">
                    Categorie
                </a>
                <div class="relative">
                    <input class="border rounded-full py-2 px-4 pl-10" placeholder="Search..." type="text" />
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                    </i>
                </div>
                <a class="text-gray-700" href="#">
                    Demo
                </a>

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
                    class="flex items-center focus:outline-none"
                >
                    <img
                        src="<?= isset($userAvatar) ? $userAvatar : 'uploads/avatar_1.jpg' ?>"
                        alt="Profil"
                        class="w-10 h-10 rounded-full mr-3"
                    >
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
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-20 border"
                >
                    <a href="<?= Session::hasRole('student') ? '/student/dashboard' : '/teacher/dashboard' ?>" 
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
                    <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
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
    <!-- Hero Section -->
    <!-- <section class="bg-gray-50 py-16 mt-16">
    <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center"> -->


    <section class="relative bg-gray-50 py-16 mt-16">
        <img alt="Background image of a classroom with students" class="absolute inset-0 w-full h-full object-cover opacity-40" height="1080" src="https://storage.googleapis.com/a1aa/image/9L9M8eHQ-5Jsse9_75V3swpnHmhbCF115LpjcxpeoVc.jpg" width="1920" />
        <div class="relative container mx-auto px-4 flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2">
                <h2 class="text-blue-600 text-sm font-semibold">
                    START TO SUCCESS
                </h2>
                <h1 class="text-3xl font-bold mt-2">
                    Access To
                    <span class="text-blue-500">
                        5500+
                    </span>
                    Courses from
                    <span class="text-blue-500">
                        480
                    </span>
                    Instructors &amp; Institutions
                </h1>
                <p class="text-gray-600 mt-2 text-sm">
                    Take your learning organisation to the next level.
                </p>
                <div class="relative mt-4">
                    <input class="w-full border rounded-full py-2 px-3 pl-9 text-sm" placeholder="What do you want to learn?" type="text" />
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
            </div>
            <div class="lg:w-1/2 mt-6 lg:mt-0 flex flex-col space-y-3">
                <div class="flex space-x-3">
                    <img alt="Two people discussing" class="w-1/2 rounded-lg h-24 object-cover" src="uploads/1.jpg" />
                    <img alt="Woman working on laptop" class="w-1/2 rounded-lg h-24 object-cover" src="uploads/2.jpg" />
                </div>
                <div class="flex space-x-3">
                    <img alt="Woman studying" class="w-1/2 rounded-lg h-24 object-cover" src="uploads/3.jpg" />
                    <div class="bg-white shadow-md rounded-lg p-3 flex items-center">
                        <i class="fas fa-bell text-yellow-500 text-lg"></i>
                        <div class="ml-3">
                            <p class="text-gray-700 text-xs">
                                Tomorrow is our
                                <span class="font-bold">
                                    "When I Grow Up" Spirit Day!
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <!-- Features Section -->
    <section class="bg-indigo-800 py-2">


        <div class="container mx-auto px-4 flex flex-wrap justify-around text-white">
            <div class="flex flex-col items-center space-y-2">
                <i class="fas fa-brain text-xl">
                </i>
                <p class="text-center">
                    Learn The Essential Skills
                </p>
            </div>
            <div class="flex flex-col items-center space-y-2">
                <i class="fas fa-certificate text-xl">
                </i>
                <p class="text-center">
                    Earn Certificates And Degrees
                </p>
            </div>
            <div class="flex flex-col items-center space-y-2">
                <i class="fas fa-briefcase text-xl">
                </i>
                <p class="text-center">
                    Get Ready for The Next Career
                </p>
            </div>
            <div class="flex flex-col items-center space-y-2">
                <i class="fas fa-star text-xl">
                </i>
                <p class="text-center">
                    Master at Different Areas
                </p>
            </div>
        </div>
    </section>

    >
    <!-- Categories Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">
                Top
                <span class="text-yellow-500">
                    Categories
                </span>
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                <?php $counter = 0;
                foreach ($categories as $categorie):
                    if ($counter > 11) break;
                    $counter++;
                ?>
                    <div class="bg-gray-100 p-1 rounded-lg text-center">

                        <p>
                            <?= htmlspecialchars($categorie->name) ?>
                        </p>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section>

        <div class="container mx-auto">
            <a class="text-blue-600 text-sm" href="#">
                Quel sera votre prochain sujet d'apprentissage ?
            </a>
            <h1 class="text-2xl font-bold mt-2">
                Découvrez les cours dispensés par des experts confirmés.
            </h1>
            <p>
                Explorez des cours conçus et enseignés par des experts de renom.
            </p>



            <?php if (empty($courses)): ?>
                <div class="text-center py-10 bg-gray-100 rounded-lg">
                    <p class="text-gray-500">Vous n'avez pas encore de cours en cours.</p>
                    <a href="/create-course" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Créer un nouveau cours
                    </a>
                </div>
            <?php else: ?>
                <!-- Grille des cours -->


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                    <?php foreach ($courses as $course): ?>

                        <div class="bg-white rounded-md shadow-sm overflow-hidden relative group">
                            <a href="detailCourse.php?id_course=<?= htmlspecialchars($course->id_course); ?>" class="block">
                                <div class="relative">
                                    <!-- Image du cours -->
                                    <img
                                        alt="<?= htmlspecialchars($course->title); ?>"
                                        class="w-full h-32 object-cover"
                                        src="<?php echo  $course->picture ?: 'https://storage.googleapis.com/a1aa/image/noC8xPRPcuBWd_C1xQmYNlvvgBKWFaAuuJPWmdQmvPM.jpg'; ?>" />
                                    <!-- Icône de favoris -->
                                    <i class="fas fa-heart text-white absolute top-2 right-2 bg-yellow-500 p-1 rounded-full"></i>
                                </div>
                                <div class="p-3">
                                    <div class="flex items-center mb-2">
                                        <!-- Avatar de l'auteur -->
                                        <img
                                            alt="Profile picture of <?= htmlspecialchars($course->teacher_name); ?>"
                                            class="w-6 h-6 rounded-full mr-2"
                                            src="<?php echo '../' . ($course->avatar ?: 'https://via.placeholder.com/100.png?text=Avatar'); ?>" />
                                        <span class="text-xs font-semibold">
                                            <?= htmlspecialchars($course->teacher_name); ?>
                                        </span>
                                    </div>
                                    <!-- Titre du cours -->
                                    <h2 class="text-sm font-semibold">
                                        <?= htmlspecialchars($course->title); ?>
                                    </h2>
                                    <!-- Informations supplémentaires -->
                                    <div class="flex  gap-2 items-center text-xs text-gray-600 mt-2">
                                        <span class="mr-2">
                                            <?= htmlspecialchars($course->category_name); ?>
                                        </span>
                                        <span class="mr-2 flex items-center">
                                            <i class="fas fa-user mr-1"></i>
                                            <?= htmlspecialchars($course->student_count); ?>
                                        </span>
                                        <span class="mr-2 flex items-center">
                                            <i class="fas fa-comment mr-1"></i>
                                            <?= htmlspecialchars($course->review_count); ?>
                                        </span>
                                        <i class="fas fa-star text-yellow-500 mr-2"></i>
                                        <span> 5
                                            <!-- <?= htmlspecialchars($course->rating); ?> -->
                                        </span>
                                    </div>
                                    <!-- Tags -->
                                    <div class="flex space-x-2 mt-2 mx-2">
                                        <?php
                                        $newtag = new CourseTags($dbManager, $course->id_course);
                                        $result = $newtag->getTagsBycourse();
                                        foreach ($result as $index => $Objet_tag) {
                                            echo '    <span class="text-xs bg-gray-200 text-gray-700 rounded-full px-2 py-1 mr-1">
                       ' . $Objet_tag->name_tag . '
                    </span>';
                                        }
                                        ?>
                                    </div>


                                    <!-- Prix et bouton -->



                                    <div class="flex items-center justify-between mt-3">
                                        <span class="text-lg font-bold">
                                            $13.00
                                        </span>
                                        <button class="  text-xs text-blue-600 flex items-center">
                                            <i class="fas fa-shopping-cart mr-1">
                                            </i>
                                            Ajouter au panier
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>


            <?php endif; ?>







        </div>
    </section>
</body>

</html>