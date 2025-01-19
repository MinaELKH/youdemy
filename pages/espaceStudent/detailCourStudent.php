<?php
ob_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/pages/sweetAlert.php';

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
session::start();
if (Session::isLoggedIn() && session::hasRole('student')) {
    // Récupérer les données de session
    $s_userId = Session::get('user')['id'];
    $userName = Session::get('user')['name'];
    $userEmail = Session::get('user')['email'];
    $userRole = Session::get('user')['role'];
    $userAvatar = Session::get('user')['avatar'];
    //  var_dump($userAvatar); 
} else {
    setSweetAlertMessage(
        'Authentification requise ⚠️',
        'Veuillez vous authentifier pour accéder cette page.',
        'warning',
        '../auth/login.php'
    );
}
$dbManager = new DataBaseManager();

$id_course = $_GET['id_course'] ?? null;

$id_content = $_GET['id_conten'] ?? null;


if (!$id_course || !is_numeric($id_course)) {
    die("ID de cours invalide ou manquant.");
}
// charger les donnees du cours
if (!$id_course || !is_numeric($id_course)) {
    die("ID de cours invalide ou manquant.");
}
// charger les donnees du cours
try {
    $newCourse = new Course($dbManager, $id_course);
    $course = $newCourse->getDetailCourse(); // je selection d apres viewcourse 
    //  print_r($course);
    if (!$course) {
        throw new Exception("Le cours avec l'ID $id_course n'existe pas.");
    }
    // Recuperer le contenu du cours en fonction de son type
    $newContent = null;

    if ($course->type == 'texte') {
        $newContent = new ContentText($dbManager);
        $result = ContentText::getAllByIdCourse($dbManager, $id_course);
    } else if ($course->type == 'video') {
        $newContent = new ContentVideo($dbManager);
    }

    // verif si le contenu est trouve on le recupere via l id_course
    if ($newContent) {
        $newContent->id_course = $id_course;
        $ObjetContent = $newContent->getByIdCourse();
        //    var_dump( $ObjetContent ) ;
        //  die();


    } else {
        throw new Exception("Le contenu associe au cours n'a pas ete trouve.");
    }
} catch (Exception $e) {
    // Gerer les erreurs
    error_log($e->getMessage());
    die("Erreur : Impossible de charger les donnees du cours.");
}


?>

<!-- commentaire -->

<?php
if (isset($_POST["addreview"])) {
    $newreview = new review($dbManager, 0, $_POST['textComment'], intval($course->id_course), intval($s_userId));
    $newreview->add();
}
if (isset($_POST["deletereview"])) {
    $newreview = new review($dbManager, intval($_POST['id_review']));
    $newreview->delete();
    // var_dump($newreview->delete());
}




?>



<!-- Main Content -->
<div class="container mx-auto px-4 py-8 text-xs">
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


            <!-- content  -->
            <section class="bg-white rounded-lg p-2 mb-2">
                <div class="flex space-x-2 mb-2  ">
                    <?php
                    echo nl2br($ObjetContent->display());
                    ?>
                </div>
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

                <div class="bg-white shadow-lg rounded-lg mt-8 p-8 relative z-10">
                    <h2 class="text-2xl font-bold text-indigo-900 mb-4">Leave a comment</h2>
                    <div class="mb-4">
                        <form method="post">
                            <input type=hidden name="id_article" value="<?= htmlspecialchars($course->id_course) ?>">
                            <textarea name="textComment" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write a comment..." rows="3"></textarea>
                            <div class="flex justify-between items-center mt-2">
                                <button name="addreview" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                                    Post comment
                                </button>
                                <div class="flex space-x-2 text-gray-500">
                                    <i class="fas fa-paperclip">
                                    </i>
                                    <i class="fas fa-map-marker-alt">
                                    </i>
                                </div>
                            </div>
                        </form>
                    </div>
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
                                    <img alt="Photo de profil du commentateur" class="w-10 h-10 rounded-full mr-3" height="40" src="<?php echo !empty($newreview->avatar) ? $objet_Cmt->avatar : 'https://storage.googleapis.com/a1aa/image/1ZK6eQz7uGxKOahfeQHlR1zQxhXhr8QxTxrVwEFg60TCDUGoA.jpg'; ?>" width="40" />
                                    <div class='w-full flex justify-between'>
                                        <div>
                                            <p class="font-semibold">
                                                <?= $objet_Cmt->name_full ?>
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <?= $objet_Cmt->created_at ?>
                                            </p>
                                        </div>
                                        <?php if ($s_userId == $objet_Cmt->id_user) : ?>

                                            <div class="ml-auto text-gray-500 cursor-pointer hover:text-red-500">
                                                <form method="post"> <input type="hidden" name="id_review" value="<?= $objet_Cmt->id_review ?>">
                                                    <button name="deletereview"> <i class="fas fa-times"></i></button>
                                                </form>
                                            </div>

                                        <?php endif; ?>
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
        <div class="col-span-1">
            <!-- Prix et Achat -->



            <!-- À propos de l'Instructeur -->
            <div class="bg-white rounded-lg shadow-sm p-6 mt-28">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">
                    À propos de l'Instructeur
                </h2>
                <div class="flex items-center mb-2">
                    <img
                        alt="Image de l'Instructeur"
                        class="h-12 w-12 rounded-full mr-4"
                        src="<?= $course->teacher_avatar ?: 'https://via.placeholder.com/50' ?>" />
                    <div>
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
                            // $newTeacher = new Teacher($dbManager, $course->id_teacher);
                            // echo $newTeacher->getCountCoursesByTeacher() . " Cours";
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- sommaire -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 mt-4">
                <div class="flex items-center mb-4 border-b pb-3">
                    <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <h2 class="text-xl font-semibold text-gray-800">Sommaire du Cours</h2>
                </div>

                <ul class="space-y-3">
                    <?php
                    $contents = $ObjetContent->getAllByIdCourse($dbManager, $id_course);
                    $index = 1;
                    foreach ($contents as $content) :
                    ?>
                        <li class="flex items-center">
                            <span class="mr-3 text-sm font-bold text-blue-600 bg-blue-50 rounded-full w-6 h-6 flex items-center justify-center">
                                <?= $index++ ?>
                            </span>
                            <a
                                href="detailCourStudent.php?id_course=<?= $id_course ?>&id_content=<?= $content->id_content ?>"
                                class="text-gray-700 hover:text-blue-700 hover:underline transition-colors duration-200 ease-in-out flex-grow">
                                <?= $content->title ?>
                            </a>
                            <svg class="w-5 h-5 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Course Overview -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 mt-4">

                <div class="leading-relaxed  whitespace-normal break-words"> <?= $course->description ?></div>
                </section>

            </div>

        </div>
    </div>

    <?php
    $content = ob_get_clean();
    include('layout.php');
    ?>