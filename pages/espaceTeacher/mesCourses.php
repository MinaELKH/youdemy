<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
ob_start();

use config\DataBaseManager;
use classes\Course;
use classes\Teacher;

// affichage 
try {
    $dbManager = new DataBaseManager();
    $teacherId = $_SESSION['teacher_id'] ?? 20;
    if (!$teacherId) {
        throw new Exception(" access interdit ");
    }
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
     <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
    <?php foreach ($courses as $course): ?>
        <div class="bg-white rounded-md shadow-sm overflow-hidden relative group">
            <!-- Lien vers les détails du cours qui couvre toute la carte -->
            <a href="detailCourse.php?idCourse=<?= htmlspecialchars($course->id_course); ?>" class="block">
                <img src="<?php echo '../'.$course->picture ?: 'https://via.placeholder.com/300x200.png?text=Image+Non+Disponible'; ?>" 
                    alt="<?php echo htmlspecialchars($course->title); ?>" 
                    class="w-full h-32 object-cover">

                <div class="p-3">
                    <div class="text-xs text-green-600 truncate"><?php echo $course->category_name; ?></div>
                    <h3 class="text-sm font-medium truncate"><?php echo $course->title; ?></h3>
                    <div class="flex justify-between text-xs text-gray-500 mt-1">
                        <span><i class="fas fa-users mr-1"></i><?php echo $course->student_count; ?></span>
                        <span><i class="fas fa-comments mr-1"></i><?php echo $course->review_count; ?></span>
                        <span>1h30</span>
                    </div>
                </div>
            </a>

            <!-- Conteneur des icônes d'action -->
            <div class="absolute top-2 right-2 flex space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
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