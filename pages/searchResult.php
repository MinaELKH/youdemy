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
    $courses = course::getSearch($dbManager , $MotSearch);
}


?>

<?php require('include/navbar.php') ?>
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

    

        <?php require('include/cards.php') ?>
      




    </div>
</section>
