

<?php 

use Classes\Enrollment;
use classes\CourseTags;

if (empty($courses)): ?>
            <div class="bg-white border border-blue-100 rounded-lg shadow-md mt-8 p-8 text-center space-y-5 max-w-md mx-auto">
                <div class="bg-blue-50 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">
                        Votre parcours d'apprentissage commence bientôt
                    </h3>
                    <p class="text-gray-600 mb-5">
                        Nous préparons actuellement du contenu personnalisé pour vous.
                        Restez à l'écoute, votre aventure d'apprentissage est sur le point de démarrer !
                    </p>
                </div>

             
                    <div class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Être notifié lors de la création
                    </div>
            </div>

        <?php else: ?>
            <!-- Grille des cours -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                <?php foreach ($courses as $course): ?>

                    <div class="bg-white rounded-md shadow-sm overflow-hidden relative group">

                        <div class="relative">
                            <!-- Image du cours -->
                            <img
                                alt="<?= htmlspecialchars($course->title); ?>"
                                class="w-full h-32 object-cover"
                                src="<?php echo  $course->picture ?: 'https://storage.googleapis.com/a1aa/image/noC8xPRPcuBWd_C1xQmYNlvvgBKWFaAuuJPWmdQmvPM.jpg'; ?>" />
                            <!-- Icône de favoris -->
                            <i class="fas fa-heart text-white absolute top-2 right-2 bg-yellow-500 p-1 rounded-full"></i>
                        </div>
                        <div class="p-3">

                            <!-- Titre du cours -->
                            <h2 class="text-sm font-semibold mb-2">
                                <?= htmlspecialchars($course->title); ?>
                            </h2>
                            <span class="p-1 my-4 text-xs bg-gray-200 rounded-full ">
                                    <?= htmlspecialchars($course->category_name); ?>
                                </span>
                            <div class="flex items-center mb-2">
                        
                                <!-- Avatar de l'auteur -->
                                <img src="<?= !empty($course->teacher_avatar) ? 'http://localhost/youdemy/pages/'.$course->teacher_avatar : 'http://localhost/youdemy/pages/uploads/avatar_1.jpg' ?>"
                                        alt="Profil"
                                        class="w-8 h-8 rounded-full mr-3 mt-2"
                                        height="40"
                                        width="40" />
                              
                                    <span class="text-xs font-semibold">
                                    <?= htmlspecialchars($course->teacher_name); ?>
                                   </span>
                                          <!-- Informations supplémentaires -->
                            <div class="flex  gap-2 items-center text-xs text-gray-600 mt-2">
                          
                          <span class="mr-2 flex items-center">
                              <i class="fas fa-user mr-1"></i>
                              <?= htmlspecialchars($course->student_count); ?>
                          </span>
                          <span class="mr-2 flex items-center">
                              <i class="fas fa-comment mr-1"></i>
                              <?= htmlspecialchars($course->review_count); ?>
                          </span>
                          <i class="fas fa-star text-yellow-500 mr-2"></i>
                          <span> 5
                              <!-- <?= htmlspecialchars($course->rating); ?> -->
                          </span>
                      </div>
                            </div>
                       
                     
                            <!-- Tags -->
                            <div class="flex space-x-2 mt-2 mx-2">
                                <?php
                                $newtag = new CourseTags($dbManager, $course->id_course);
                                $result = $newtag->getTagsBycourse();
                                foreach ($result as $index => $Objet_tag) {
                                    echo '    <span class="text-xs bg-gray-200 text-gray-700 rounded-full px-2 py-1 mr-1">
                       ' . $Objet_tag->name_tag . '
                    </span>';
                                }
                                ?>
                            </div>


                            <!-- Prix et bouton -->



                            <div class="flex items-center justify-between mt-3">
                                <span class="text-lg font-bold">
                                    $13.00
                                </span>

                                <?php
                                // Vérification si l'utilisateur est déjà inscrit
                                $newEnrol = new Enrollment($dbManager, $course->id_course, $s_userId);
                                $exist = $newEnrol->inscrit();

                                if ($exist): ?>
                                    <a href="espaceStudent/detailCourStudent.php/?id_course=<?= htmlspecialchars($course->id_course); ?>" class="block">
                                    <button class="bg-green-50 text-green-600 hover:bg-blue-100 px-2 py-1 rounded-lg text-[10px] transition-colors">
                                            <i class="fas fa-check mr-1"></i>
                                            Accéder
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <a href="detailCourse.php?id_course=<?= htmlspecialchars($course->id_course); ?>" class="block">
                                        <button class="bg-blue-50 text-blue-600 hover:bg-blue-100 px-2 py-1 rounded-lg text-[10px] transition-colors">
                                            <i class="fas fa-shopping-cart mr-1"></i>
                                            Ajouter au panier
                                        </button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>