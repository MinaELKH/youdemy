<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
require_once("../uploadimage.php");
ob_start();

use classes\Course;
use classes\Categorie;
use config\DataBaseManager;
use classes\ContentText;
use classes\ContentVideo;

$dbManager = new DataBaseManager();
$id_course = $_GET['id_course'] ?? null;
if (!$id_course || !is_numeric($id_course)) {
    die("ID de cours invalide ou manquant.");
}
// charger les donnees du cours
try {
    $newCourse = new Course($dbManager, $id_course);
    $course = $newCourse->getDetailCourse(); // je selection d apres viewcourse 
     print_r($course) ; 
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
        $newContent->id_course = $id_course ;
        $ObjetContent = $newContent->getByIdCourse() ;
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
        <div class="container mx-auto px-4 flex items-center justify-between">
            <div class="flex items-center gap-8">
                <img src="logo.png" alt="NarutoEdu" class="h-8">
                <button class="flex items-center gap-2 text-gray-600">
                    <i class="fas fa-th"></i>
                    Category
                </button>
                <div class="relative">
                    <input type="search" placeholder="Search course here"
                        class="w-64 pl-10 pr-4 py-2 bg-gray-100 rounded-full">
                    <i class="fas fa-search absolute left-4 top-3 text-gray-400"></i>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <a href="#" class="text-indigo-600">Courses</a>
                <a href="#" class="text-gray-600">Blog</a>
                <a href="#" class="text-gray-600"><i class="fas fa-shopping-cart"></i></a>
                <a href="#" class="bg-indigo-600 text-white px-6 py-2 rounded-full">Try for free</a>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center gap-2 text-sm">
            <a href="#" class="text-indigo-600">Home</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="#" class="text-indigo-600">Courses</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-600">Programming with Python</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-3 gap-8">
            <!-- Course Info -->
            <div class="col-span-2">
                <h1 class="text-3xl font-bold mb-6"><?= $course->title ?></h1>

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
                <div class="flex items-center gap-8 mb-8 text-sm text-gray-600">
                    <div>
                        <div class="font-medium mb-1">Last Updates</div>
                        <div><?= $course->updated_at?></div>
                    </div>
                  
                    <div>
                        <div class="font-medium mb-1">Students</div>
                        <div><?= $course->student_count?></div>
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

                <!-- Course Video -->
                <div class="bg-gray-200 aspect-video rounded-lg mb-8">
                <img src="<?php echo '../'.$course->picture ?: 'https://via.placeholder.com/300x200.png?text=Image+Non+Disponible'; ?>"  alt="Course preview" class="w-full h-full object-cover rounded-lg">
                </div>

                <!-- Course Overview -->
                <section class="bg-white rounded-lg p-8 mb-8">
    <div class="leading-relaxed"> <?= $ObjetContent->content_text ?></div>
</section>
                <!-- Reviews Section -->
                <section class="bg-white rounded-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold mb-2">Reviews</h2>
                    <p class="text-gray-600 mb-8">Our students says about this course</p>

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
                            <div class="text-gray-500 text-sm">12 Reviews</div>
                        </div>

                        <!-- Rating Bars -->
                        <div class="flex-1">
                            <div class="space-y-2">
                                <!-- Excellent -->
                                <div class="flex items-center gap-2">
                                    <span class="text-sm w-20">Excellent</span>
                                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 100%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 w-12">100%</span>
                                </div>

                                <!-- Very Good -->
                                <div class="flex items-center gap-2">
                                    <span class="text-sm w-20">Very Good</span>
                                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 20%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 w-12">20%</span>
                                </div>

                                <!-- Average -->
                                <div class="flex items-center gap-2">
                                    <span class="text-sm w-20">Average</span>
                                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 10%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 w-12">10%</span>
                                </div>

                                <!-- Poor -->
                                <div class="flex items-center gap-2">
                                    <span class="text-sm w-20">Poor</span>
                                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 0%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 w-12">0%</span>
                                </div>

                                <!-- Terrible -->
                                <div class="flex items-center gap-2">
                                    <span class="text-sm w-20">Terrible</span>
                                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 0%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 w-12">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Individual Reviews -->
                    <div class="space-y-6 mb-6">
                        <!-- Review 1 -->
                        <div class="border-b pb-6">
                            <div class="flex gap-4 mb-3">
                                <img src="/api/placeholder/48/48" alt="Rakabuming Suhu" class="w-12 h-12 rounded-full">
                                <div>
                                    <h3 class="font-semibold">Rakabuming Suhu</h3>
                                    <div class="flex items-center gap-2">
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Sep 2, 2021</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600">Quisque et quam lacus amet. Tincidunt auctor phasellus purus faucibus lectus mattis.</p>
                        </div>

                        <!-- Review 2 -->
                        <div class="border-b pb-6">
                            <div class="flex gap-4 mb-3">
                                <div class="w-12 h-12 rounded-full bg-purple-600 flex items-center justify-center text-white font-semibold">
                                    JB
                                </div>
                                <div>
                                    <h3 class="font-semibold">Jovanca Beby</h3>
                                    <div class="flex items-center gap-2">
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-sm text-gray-500">Sep 2, 2021</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600">Quisque et quam lacus amet. Tincidunt auctor phasellus purus faucibus lectus mattis.</p>
                        </div>
                    </div>

                    <!-- More Reviews Button -->
                    <div class="text-center">
                        <button class="text-indigo-600 font-medium hover:underline">More reviews</button>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold">Rp 220.400</div>
                        <div class="text-sm line-through text-gray-400">Rp 440.000</div>
                    </div>

                    <button class="w-full bg-indigo-600 text-white py-3 rounded-lg mb-3">
                        Add to Cart
                    </button>
                    <button class="w-full border border-indigo-600 text-indigo-600 py-3 rounded-lg mb-6">
                        Buy Now
                    </button>

                    <div class="space-y-4">
                        <h3 class="font-bold mb-4">This course includes</h3>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-clock"></i>
                            <span>2 hours on-demand video</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-file-alt"></i>
                            <span>1 article</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-download"></i>
                            <span>50 downloadable resources</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-infinity"></i>
                            <span>Full lifetime access</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-mobile-alt"></i>
                            <span>Access on mobile and TV</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-certificate"></i>
                            <span>Certificate of completion</span>
                        </div>

                        <div class="bg-white rounded-lg p-6 mb-8">
                            <h2 class="text-xl font-bold mb-6">About the Instructor</h2>

                            <div class="flex items-center gap-4">
                                <!-- Instructor Photo -->
                                <img src="/api/placeholder/64/64" alt="DR. Soman Jumakir"
                                    class="w-16 h-16 rounded-full object-cover">

                                <!-- Instructor Info -->
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-1">
                                        <h3 class="font-semibold text-lg">DR. Soman Jumakir</h3>
                                        <div class="flex items-center gap-2 text-sm">
                                            <i class="fas fa-book-open"></i>
                                            <span>12 Courses</span>
                                        </div>
                                    </div>

                                    <div class="text-gray-600 text-sm mb-2">Founder Naruto Edu</div>

                                    <!-- Rating -->
                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold">5.0</span>
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>