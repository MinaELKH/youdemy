<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/youdemy/pages/sweetAlert.php';

ob_start();

use classes\Course;
use classes\CourseTags;
use classes\Review;
use config\DataBaseManager;
use classes\ContentText;
use classes\ContentVideo;
use Classes\Enrollment;
use classes\Teacher;
use config\Session;

session::start();
if (Session::isLoggedIn()) {
    // Récupérer les données de session
    $s_userId = Session::get('user')['id'];
    $s_userName = Session::get('user')['name'];
    $s_userEmail = Session::get('user')['email'];
    $s_userRole = Session::get('user')['role'];
    $s_userAvatar = Session::get('user')['avatar'];
  //  var_dump($userAvatar); 
} 

$dbManager = new DataBaseManager();
$id_course = $_GET['id_course'] ?? null;
if (!$id_course || !is_numeric($id_course)) {
    die("ID de cours invalide ou manquant.");
}
// charger les donnees du cours
try {
    $newCourse = new Course($dbManager, $id_course);
    $course = $newCourse->getDetailCourse(); // je selection d apres viewcourse 
    // echo"<pre>" ;
    // var_dump($course);
    // echo"<pre>" ;
    if (!$course) {
        throw new Exception("Le cours avec l'ID $id_course n'existe pas.");
    }
} catch (Exception $e) {
    // Gerer les erreurs
    error_log($e->getMessage());
    die("Erreur : Impossible de charger les donnees du cours.");
}


//acheter 

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["acheter"])) {
    try {
        if (Session::isLoggedIn() && Session ::hasRole('student')){
        $enroll = new enrollment($dbManager, $course->id_course , $s_userId  );
        $result = $enroll->add();

        if ($result) {
            setSweetAlertMessage(
                'Inscription réussie 🎉',
                'Félicitations ! Vous êtes maintenant inscrit au cours . Préparez-vous à apprendre et à explorer de nouvelles compétences passionnantes ! 🚀',
                'success',
                'espaceStudent/detailCourStudent.php/?id_course='.$id_course
            );
        } else {
            setSweetAlertMessage('Erreur', 'Aucun inscription n\'a eu lieu. Veuillez contacter l\'administrateur.', 'error', '');
        }
    }
    else{
        setSweetAlertMessage(
            'Authentification requise ⚠️',
            'Veuillez vous authentifier pour accéder aux cours.',
            'warning',
            'auth/login.php'
        );
    }
    } catch (Exception $e) {
        setSweetAlertMessage('Erreur', $e->getMessage(), 'error', '');
    }
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
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
                        src="<?= isset($s_userAvatar) ? $s_userAvatar : 'uploads/avatar_1.jpg' ?>"
                        alt="Profil"
                        class="w-10 h-10 rounded-full mr-3"
                    >
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-700"><?= $s_userName ?></span>
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

    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center gap-2 text-sm flex-wrap">
            <a href="dashboard.php" class="text-indigo-600">Accueil</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="mesCoures.php" class="text-indigo-600">Courses</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-600"><?= $course->title ?></span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8 text-xs mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <!-- Course Info -->
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-3xl sm:text-2xl font-bold mb-6"><?= $course->title ?></h1>

                <!-- Course Meta -->
                <div class="flex items-center gap-2 mb-6">
                    <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm"><?= $course->category_name ?></span>
                    <div class="flex items-center gap-1">
                        <span class="font-bold">5.0</span>
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                </div>

          
                

                <!-- Course Video -->
                <div class="bg-gray-200 aspect-video rounded-lg mb-2">
                    <img src="<?php echo $course->picture ?: 'https://via.placeholder.com/300x200.png?text=Image+Non+Disponible'; ?>" alt="Course preview" class="w-full h-full object-cover rounded-lg">
                </div>
      <!-- Course Details -->
      <div class="grid grid-cols-2  lg:grid-cols-4 items-center gap-2 mb-2 text-xs text-gray-600">
                    <div>
                        <div class="font-medium mb-1">Dernière mise à jour</div>
                        <div><?= $course->updated_at ?></div>
                    </div>

                    <div>
                        <div class="font-medium mb-1">Apprenant</div>
                        <div><?= $course->student_count ?></div>
                    </div>

                    <!-- Social Actions -->
                    <div class="flex gap-2 mb-2">
                        <button class="flex items-center gap-2 px-6 py-2 border rounded-lg hover:bg-gray-50">
                            <i class="far fa-heart"></i>
                            <span>Wishlist</span>
                        </button>
                        <button class="flex items-center gap-2 px-6 py-2 border rounded-lg hover:bg-gray-50">
                            <i class="fas fa-share-alt"></i>
                            <span>Share</span>
                        </button>
                    </div>
                </div>

                <!-- Tags -->
                <div class="flex space-x-2 mb-2  ">
                    <?php
                    $newtag = new CourseTags($dbManager, $course->id_course);
                    $result = $newtag->getTagsBycourse();

                    // Couleur 
                    $colors = ['bg-blue-200', 'bg-green-200', 'bg-red-200', 'bg-yellow-200', 'bg-purple-200', 'bg-pink-200', 'bg-indigo-200', 'bg-teal-200', 'bg-orange-200', 'bg-gray-300'];

                    foreach ($result as $index => $Objet_tag) {
                        // Sélectionner une couleur en fonction de l'index du tag
                        $colorClass = $colors[$index % count($colors)];
                        echo '<span class="' . $colorClass . ' text-gray-700 px-3 py-1 rounded-full">' . $Objet_tag->name_tag . '</span>';
                    }
                    ?>
                </div>

                <!-- Course Overview -->
                <section class="bg-white rounded-lg p-2 mb-2">
                <h4 class="underline text-lg font-bold text-gray-800">Ce que vous apprendrez</h4>
                    <div class="leading-relaxed  whitespace-normal break-words"  > <?= $course->description ?></div>
                </section>
                <!-- Reviews Section -->
                <section class="bg-white rounded-lg p-2 mb-2">
                

                
                    <h2 class="text-2xl font-bold mb-2">Avis</h2>
                    <p class="text-gray-600 mb-2">Nos Apprenants parlent de ce cours</p>
                    <div class="flex gap-12 mb-2 justify-between  mx-8">
                 
                   
                    <span class="mr-10 flex items-center">
                    <?= htmlspecialchars($course->student_count); ?>
                        <i class="fas fa-user mr-1"></i>
                        <p>Apprenants</p>
                    </span>
                    <span class="mr-2 flex items-center">
                    <?= htmlspecialchars($course->review_count); ?>
                        <i class="fas fa-comment mr-1"></i>
                      

                    </span>
                    </div>

                    <!-- Individual Reviews -->
                    <div class="space-y-6 mb-6">
                        <!-- reviewaires des users -->
                        <?php
                        $newreview = new review($dbManager);
                        $newreview->id_course = $course->id_course;
                        $result = $newreview->getReviewByCourse();
                        foreach ($result as $objet_Cmt):
                        ?>
                            <div class="bg-gray-200 p-2 m-8 rounded-lg shadow-sm">
                                <div class="flex items-center mb-2">
                                   
                                <img
                                        img src="<?= !empty($objet_Cmt->avatar) ? 'http://localhost/youdemy/pages/'.$objet_Cmt->avatar : 'http://localhost/youdemy/pages/uploads/avatar_1.jpg' ?>"
                                        alt="Profil"
                                        class="w-10 h-10 rounded-full mr-3"
                                        height="40"
                                        width="40" />
                                        
                                        <div>
                                        <p class="font-semibold">
                                            <?= $objet_Cmt->name_full ?>
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            <?= $objet_Cmt->created_at ?>
                                        </p>
                                    </div>
                                </div>
                                <p class="text-gray-700 mb-2">
                                    <?= $objet_Cmt->comment ?>
                                </p>
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-heart mr-1">
                                    </i>
                                    <span class="mr-4">
                                        11 Likes
                                    </span>
                                    <i class="fas fa-reply mr-1">
                                    </i>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- More Reviews Button -->
                        <div class="text-center">
                            <button class="text-indigo-600 font-medium hover:underline">More reviews</button>
                        </div>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="col-span-1  mt-24">
                <!-- Prix et Achat -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <form action="" method="post">
                    <input name='id_course' type="hidden"  value="<?= $course->id_course ?>">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-2xl font-bold"><?= $course->prix ?>€</div>
                        <div class="text-sm line-through text-gray-400"><?= $course->prix  - 20  ?>€</div>
                    </div>
                    <div class="w-full flex justify-between ">
                    <button class="w-2/3 bg-indigo-200 text-white py-3 rounded-lg mb-3">
                        Ajouter au panier
                    </button>
                    <i class="h-8 w-8 mr-4 text-lg text-center item-center fas fa-heart text-white  bg-yellow-500 p-1 rounded-full"></i>
                    </div>
                  
                    <button name="acheter" class="w-full border border-indigo-600 text-indigo-600 py-3 rounded-lg mb-6 hover:bg-indigo-600 hover:text-white">
                        Acheter 
                    </button>
                    </form>
                </div>


                <!-- À propos de l'Instructeur -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">
                        À propos de l'Instructeur
                    </h2>
                    <div class="flex items-center mb-2">
                     
                        <div>

                     
                                        <img src="<?= !empty($course->teacher_avatar) ? 'http://localhost/youdemy/pages/'.$course->teacher_avatar : 'http://localhost/youdemy/pages/uploads/avatar_1.jpg' ?>"
                                        alt="Profil"
                                        class="w-10 h-10 rounded-full mr-3"
                                        height="40"
                                        width="40" />

                            <h3 class="text-gray-800 font-semibold">
                                Dr. <?= $course->teacher_name ?>
                            </h3>
                            <p class="text-gray-600 text-sm">
                                Fondateur Naruto Edu
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center text-yellow-500">
                        <span class="text-sm font-semibold mr-1">5.0</span>
                        <div>
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>

                        <div class="flex items-center gap-2 text-sm text-gray-800">
                            <i class="fas fa-book-open"></i>
                            <span class="text-gray-600 text-sm ml-2 ">
                                <?php
                                $newTeacher = new Teacher($dbManager, $course->id_teacher);
                                echo $newTeacher->getCountCoursesByTeacher() . " Cours";
                                ?>
                            </span>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>