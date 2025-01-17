<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
require_once("../uploadimage.php");
ob_start();

use classes\Course;
use classes\CourseTags;
use classes\Review;
use config\DataBaseManager;
use classes\ContentText;
use classes\ContentVideo;
use classes\Teacher;

$dbManager = new DataBaseManager();
$id_course = $_GET['id_course'] ?? null;
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
    } else if ($course->type == 'video') {
        $newContent = new ContentVideo($dbManager);
    }

    // verif si le contenu est trouve on le recupere via l id_course
    if ($newContent) {
        $newContent->id_course = $id_course;
        $ObjetContent = $newContent->getByIdCourse();
    } else {
        throw new Exception("Le contenu associe au cours n'a pas ete trouve.");
    }
} catch (Exception $e) {
    // Gerer les erreurs
    error_log($e->getMessage());
    die("Erreur : Impossible de charger les donnees du cours.");
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming with Python - HandsOn Introduction</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-4 flex items-center justify-between flex-wrap">
            <div class="flex items-center gap-8">
                <img src="logo.png" alt="NarutoEdu" class="h-8">
                <button class="flex items-center gap-2 text-gray-600">
                    <i class="fas fa-th"></i>
                    Catégorie
                </button>
                <div class="relative hidden sm:block">
                    <input type="search" placeholder="Rechercher un cours ici"
                        class="w-64 pl-10 pr-4 py-2 bg-gray-100 rounded-full">
                    <i class="fas fa-search absolute left-4 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <a href="#" class="text-indigo-600">Cours</a>
                <a href="#" class="text-gray-600">Blog</a>
                <a href="#" class="text-gray-600"><i class="fas fa-shopping-cart"></i></a>
                <a href="#" class="bg-indigo-600 text-white px-6 py-2 rounded-full">Essayer gratuitement</a>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center gap-2 text-sm flex-wrap">
            <a href="dashboard.php" class="text-indigo-600">Home</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="mesCoures.php" class="text-indigo-600">Mes Courses</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-600"><?= $course->title ?></span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Course Info -->
            <div class="col-span-1 md:col-span-2">
                <h1 class="text-3xl sm:text-4xl font-bold mb-6"><?= $course->title ?></h1>

                <!-- Course Meta -->
                <div class="flex items-center gap-8 mb-6">
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

                <!-- Course Details -->
                <div class="grid grid-cols-2  lg:grid-cols-4 items-center gap-8 mb-8 text-sm text-gray-600">
                    <div>
                        <div class="font-medium mb-1">Derniere Modification</div>
                        <div><?= $course->updated_at ?></div>
                    </div>

                    <div>
                        <div class="font-medium mb-1">Apprenant</div>
                        <div><?= $course->student_count ?></div>
                    </div>

                    <!-- Social Actions -->
                    <div class="flex gap-4 mb-8">
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
                <div class="flex space-x-2 mb-8">
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

                <!-- Course Video -->
                <div class="bg-gray-200 aspect-video rounded-lg mb-8">
                    <img src="<?php echo '../' . $course->picture ?: 'https://via.placeholder.com/300x200.png?text=Image+Non+Disponible'; ?>" alt="Course preview" class="w-full h-full object-cover rounded-lg">
                </div>

                <!-- Course Overview -->
                <section class="bg-white rounded-lg p-8 mb-8">
                    <div class="leading-relaxed  whitespace-normal break-words"  > <?= $ObjetContent->content_text ?></div>
                </section>
                <!-- Reviews Section -->
                <section class="bg-white rounded-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-2">Avis</h2>
                    <p class="text-gray-600 mb-8">Nos Apprenants parlent de ce cours</p>

                    <!-- Rating Overview -->
                    <div class="flex gap-12 mb-8">
                        <!-- Overall Score -->
                        <div class="flex flex-col items-center">
                            <div class="text-5xl font-bold mb-2">5</div>
                            <div class="flex text-yellow-400 mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="text-gray-500 text-sm"><?= $course->student_count ?></div>
                        </div>
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
                            <div class="bg-gray-50 p-4 m-8 rounded-lg shadow-sm">
                                <div class="flex items-center mb-2">
                                    <img alt="Photo de profil du commentateur" class="w-10 h-10 rounded-full mr-3" height="40" src="<?php echo !empty($newreview->avatar) ? $newreview->avatar : 'https://storage.googleapis.com/a1aa/image/1ZK6eQz7uGxKOahfeQHlR1zQxhXhr8QxTxrVwEFg60TCDUGoA.jpg'; ?>" width="40" />
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
            <div class="col-span-1">
                <!-- Prix et Achat -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold"><?= $course->prix ?>€</div>
                        <div class="text-sm line-through text-gray-400"><?= $course->prix  - 20  ?>€</div>
                    </div>
                    <button class="w-full bg-indigo-600 text-white py-3 rounded-lg mb-3">
                        Add to Cart
                    </button>
                    <button class="w-full border border-indigo-600 text-indigo-600 py-3 rounded-lg mb-6">
                        Buy Now
                    </button>
                </div>


                <!-- À propos de l'Instructeur -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">
                        À propos de l'Instructeur
                    </h2>
                    <div class="flex items-center mb-4">
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
                                $newTeacher = new Teacher($dbManager, $course->id_teacher);
                                echo $newTeacher->getCountCoursesByTeacher() . " Cours";
                                ?>
                            </span>
                        </div>



                    </div>
                </div>
            </div>

        </div>
</body>

</html>