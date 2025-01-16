
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
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Youdemy</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js"></script>
</head>
<body class="bg-gray-50">
  <!-- Navigation -->
  <nav class="bg-white shadow px-6 py-4 fixed w-full top-0 z-10">
    <div class="flex items-center justify-between">
      <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 hover:bg-gray-100 rounded-lg">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
        <h1 class="text-2xl font-bold text-blue-600">Youdemy</h1>
      </div>
      
      <div class="w-96">
        <input type="text" 
               placeholder="Rechercher un cours..." 
               class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-blue-500" />
      </div>
      
      <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full ring-2 ring-blue-500" />
    </div>
  </nav>

  <div class="pt-20 flex">
    <!-- Sidebar -->
    <aside class="fixed left-0 top-20 h-full bg-white shadow w-64"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'">
      <nav class="p-4">
        <ul class="space-y-2">
          <template x-for="item in ['Mes Cours', 'Recommandés', 'Favoris']">
            <li>
              <a href="#" class="flex items-center gap-3 p-2 text-gray-700 hover:bg-blue-50 rounded-lg">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span x-text="item"></span>
              </a>
            </li>
          </template>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->

    <main class="flex-1 px-4 sm:px-8 lg:px-12 max-w-6xl mx-auto">
    <section  class="lg:mx-32"  >
        <h2 class="text-xl font-bold mb-6">Mes Cours en Cours</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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
</main>



  </div>
</body>
</html>