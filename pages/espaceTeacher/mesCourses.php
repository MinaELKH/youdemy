<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
ob_start();

use classes\Course;
use classes\CourseTags;
use classes\Review;
use config\DataBaseManager;
use classes\ContentText;
use classes\ContentVideo;
use classes\Teacher;
use config\session;
session::start();
if (Session::isLoggedIn() && session::hasRole('teacher')) {
    // Récupérer les données de session
    $s_userId = Session::get('user')['id'];
    $s_userName = Session::get('user')['name'];
    $s_userEmail = Session::get('user')['email'];
    $s_userRole = Session::get('user')['role'];
    $s_userAvatar = Session::get('user')['avatar'];
   
} else {
    setSweetAlertMessage(
        'Authentification requise ⚠️',
        'Veuillez vous authentifier en tant qu enseignant pour  accéder a cette page.',
        'warning',
        '../auth/login.php'
    );
}
// affichage 
try {
    $dbManager = new DataBaseManager();
    $teacherId =  $s_userId ;
    $newTeacher = new Teacher($dbManager, $teacherId);
    $courses = $newTeacher->getMyCourses();
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

<section class="container mx-auto px-4 lg:px-24">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Mes Cours en Cours</h2>
        <a href="/courses" class="text-sm text-blue-600 hover:underline">Voir tous les cours</a>
    </div>

    <?php if (empty($courses)): ?>
        <div class="text-center py-10 bg-gray-100 rounded-lg">
            <p class="text-gray-500">Vous n'avez pas encore de cours en cours.</p>
            <a href="/create-course" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Créer un nouveau cours
            </a>
        </div>
    <?php else: ?>
     <!-- Grille des cours -->


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
    <?php foreach ($courses as $course): ?>
     
        <div class="bg-white rounded-md shadow-sm overflow-hidden relative group">
        <a href="detailCourse.php?id_course=<?=htmlspecialchars($course->id_course); ?>" class="block">
            <div class="relative">
                <!-- Image du cours -->
                <img 
                    alt="<?= htmlspecialchars($course->title); ?>" 
                    class="w-full h-32 object-cover" 
                    src="<?php echo '../' . $course->picture ?: 'https://via.placeholder.com/300x200.png?text=Image+Non+Disponible'; ?>" 
                />
                <!-- Icône de favoris -->
                <i class="fas fa-heart text-white absolute top-2 right-2 bg-yellow-500 p-1 rounded-full"></i>
            </div>
            <div class="p-3">
                <div class="flex items-center mb-2">
                    <!-- Avatar de l'auteur -->
                    <img 
                        alt="Profile picture of <?= htmlspecialchars($course->teacher_name); ?>" 
                        class="w-6 h-6 rounded-full mr-2" 
                        src="<?php echo '../' . ($course->avatar ?: 'https://via.placeholder.com/100.png?text=Avatar'); ?>" 
                    />
                    <span class="font-semibold">
                        <?= htmlspecialchars($course->teacher_name); ?>
                    </span>
                </div>
                <!-- Titre du cours -->
                <h2 class="text-sm font-semibold">
                    <?= htmlspecialchars($course->title); ?>
                </h2>
                <!-- Informations supplémentaires -->
                <div class="flex  justify-between items-center text-xs text-gray-600 mt-2">
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
                    <span>
                        <!-- <?= htmlspecialchars($course->rating); ?> -->
                    </span>
                </div>
                <!-- Tags -->
                <div class="flex space-x-2 mt-2">
                    <?php
                    $newtag = new CourseTags($dbManager, $course->id_course);
                    $result = $newtag->getTagsBycourse();

                    // Couleur 
                    $colors = ['bg-blue-100', 'bg-green-100', 'bg-red-100', 'bg-yellow-100', 'bg-purple-100', 'bg-pink-100', 'bg-indigo-100', 'bg-teal-100', 'bg-orange-100', 'bg-gray-100'];

                    foreach ($result as $index => $Objet_tag) {
                        // Sélectionner une couleur en fonction de l'index du tag
                        $colorClass = $colors[$index % count($colors)];
                        echo '<span class="' . $colorClass . '  text-xs text-gray-700 px-1 py-1 rounded-full">' . $Objet_tag->name_tag . '</span>';
                    }
                    ?>
                </div>


                <!-- Prix et bouton -->
               
            </div>
            </a>

            <div class="absolute top-2 right-2 flex space-x-1 opacity-100 group-hover:opacity-50 transition-opacity">
                <!-- Icône d'archivage -->
                <form action="" method="post" class="inline-block">
                    <input type="hidden" name="id_course" value="<?= htmlspecialchars($course->id_course); ?>">
                    <button name="archive" class="bg-gray-200/50 rounded-full p-1 hover:bg-gray-300/70">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </button>
                </form>

                <!-- Icône de modification -->
                <a href="updateCourse.php?idCourse=<?= htmlspecialchars($course->id_course); ?>" 
                   class="bg-gray-200/50 rounded-full p-1 hover:bg-gray-300/70">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
            </div>
        </div>
              
    <?php endforeach; ?>
</div>


    <?php endif; ?>




  
</section>

<?php
$content = ob_get_clean();
include('layout.php');
?>