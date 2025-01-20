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
use Classes\Enrollment;
use config\DataBaseManager;
use config\Session;
// affichage 
session::start();
if (Session::isLoggedIn()) {
    // Récupérer les données de session
    $s_userId = Session::get('user')['id'];
    $userName = Session::get('user')['name'];
    $userEmail = Session::get('user')['email'];
    $userRole = Session::get('user')['role'];
    $userAvatar = Session::get('user')['avatar'];
}


$dbManager = new DataBaseManager();
$newCourse = new Course($dbManager);

if (isset($_POST['search'])) {
    $MotSearch = trim($_POST['search']);
    $courses = course::getSearch($dbManager, $MotSearch);
    //var_dump( $courses ) ;
}
if (isset($_GET['id_categorie'])) {
    $id_categorie = intval($_GET['id_categorie']);
    $courses = Course::getByCategorie($dbManager, $id_categorie);
}

?>

<?php require('include/navbar.php') ?>
<section>

    <div class="container mx-auto mt-24">
        <a class="text-blue-600 text-sm" href="#">
            Quel sera votre prochain sujet d'apprentissage ?
        </a>
        <h1 class="text-l text-gray-600 font-bold mt-2">
            Découvrez les cours dispensés par des experts confirmés.
        </h1>
        <!-- si la recherche est fait pas categorie on mention la categorie c est optionnel -->
        <?php
        if (isset($id_categorie) && $id_categorie) {
            $selectedCategory = Categorie::getById($dbManager, $id_categorie);
            echo "
                <div class=' bg-indigo-50  rounded-md   px-3   py-2   mb-4   border-l-3  border-indigo-400  text-indigo-700'>
                    Catégorie : " . htmlspecialchars($selectedCategory->name) . "
                </div>";
        }
        ?>


        <p lass="text-xs text-gray-400">
            Explorez des cours conçus et enseignés par des experts de renom.
        </p>



        <?php require('include/cards.php') ?>





    </div>
</section>