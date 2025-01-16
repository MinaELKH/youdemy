<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
ob_start();

use config\DataBaseManager;
use classes\Course;
use classes\Teacher;

// Dependency Injection and Error Handling
try {
    $dbManager = new DataBaseManager();
    
    // Get teacher ID from session or authentication
    $teacherId =$_SESSION['teacher_id'] ?? 20;
    
    if (!$teacherId) {
        throw new Exception("Unauthorized access");
    }

    $newTeacher = new Teacher($dbManager, $teacherId);
    $courses = $newTeacher->getMyCourses();
} catch (Exception $e) {
    // Log error and redirect or show error message
    error_log($e->getMessage());
    $courses = [];
}
?>

<section class="container mx-auto px-4 lg:px-32">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($courses as $course): ?>
                <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                    <div class="relative">
                        <img 
                            src="<?= htmlspecialchars($course->picture ?? '../../src/images/default-course.jpg') ?>" 
                            alt="<?= htmlspecialchars($course->title) ?>" 
                            class="w-full h-48 object-cover"
                        >
                        <div class="absolute top-2 right-2 bg-blue-500 text-white px-2 py-1 rounded-full text-xs">
                            En cours
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-3">
                            <div class="w-3/4">
                                <h3 class="font-bold text-base truncate mb-1">
                                    <?= htmlspecialchars($course->title) ?>
                                </h3>
                                <p class="text-sm text-gray-500">
                                    <?= htmlspecialchars($course->teacher_name) ?>
                                </p>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-sm text-gray-600">
                                    <?= number_format($course->rating ?? 0, 1) ?>
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center mt-3">
                            <div class="w-full bg-gray-200 rounded-full h-2 mr-3">
                                <div 
                                    class="bg-blue-600 h-2 rounded-full" 
                                    style="width: <?= number_format($course->progress ?? 0, 0) ?>%"
                                ></div>
                            </div>
                            <span class="text-sm text-gray-500">
                                <?= number_format($course->progress ?? 0, 0) ?>%
                            </span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <a 
                                href="/course/<?= $course->id ?>/continue" 
                                class="bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-lg text-sm transition-colors"
                            >
                                Continuer
                            </a>
                            <span class="text-sm text-gray-400">
                                <?= htmlspecialchars($course->duration ?? '0h 0m') ?>
                            </span>
                        </div>
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
