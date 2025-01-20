<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
require_once("../uploadimage.php");

use classes\Course;
use classes\Categorie;
use classes\ContentText;
use classes\ContentVideo;
use config\DataBaseManager;
use classes\Tag;
use classes\CourseTags;
use config\session;


ob_start();

session::start();
if (Session::isLoggedIn() && session::hasRole('teacher')) {
    // Récupérer les données de session
    $s_userId = Session::get('user')['id'];
    $s_userName = Session::get('user')['name'];
    $s_userEmail = Session::get('user')['email'];
    $s_userRole = Session::get('user')['role'];
    $s_userAvatar = Session::get('user')['avatar'];
    //  var_dump($userAvatar); 
} else {
    setSweetAlertMessage(
        'Authentification requise ⚠️',
        'Veuillez vous authentifier en tant qu enseignant pour  accéder a cette page.',
        'warning',
        '../auth/login.php'
    );
}







$dbManager = new DatabaseManager();

// Récupérer les catégories pour le select

$categories = Categorie::getAll($dbManager);


// Ajout de cours
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["add_course"])) {
    try {
        // Validation des champs
        if (empty($_POST['title'])) {
            throw new Exception("Le titre du cours est obligatoire.");
        }
        if (empty($_POST['id_categorie'])) {
            throw new Exception("La catégorie est obligatoire.");
        }


        $uploadResult = uploadImage($_FILES['picture']);
        $picture = $uploadResult['filePath'];
        // Création du cours
        $newCourse = new Course(
            $dbManager,
            0,
            $_POST['title'],
            $_POST['description'],
            $picture,
            $s_userId, // Supposant que l'ID du professeur est dans la session
            $_POST['id_categorie'],
            Course::STATUS_PENDING,
            0, //archive
            $_POST['prix'],
            $_POST['type']
        );

        $result = $newCourse->add();
        $id_course = $dbManager->getLastInsertId();

        // echo("id_course") ; 
        // var_dump($id_course);
        if ($result) {
         
          if (!empty($_POST['tags'])) {
            
            $tags_input = htmlspecialchars(trim($_POST['tags']));
            $tags = array_unique(array_filter(array_map('trim', explode(',', $tags_input))));
    
            foreach ($tags as $tag_name) {
               
              $tag = new Tag($dbManager, 0, $tag_name);
              // Vérifier si le tag existe
              $objetTag = $tag->getTagByName();
              if ($objetTag != null) {
                $tag_id = $objetTag->id_tag;
              }
    
              // Ajouter la relation entre l'course et le tag
              $tag_course = new courseTags($dbManager, $id_course, $tag_id);
              $tag_course->linkTagTocourse();
            }
          } 
        }

        
        if ($result) {
            
            // Gestion du contenu en fonction du type
            $type = $_POST['type'];

            if ($type === 'video') {
                // Validation des champs spécifiques au type "Vidéo"
                
             
                    if (!empty($_POST['videoURL'])) {
                        $url= $_POST['videoURL'];
                    } elseif (isset($_FILES['videoUpload'])) {
                        $url = uploadVideo($_FILES['videoUpload']);
                     
                    }
             
              
                // Création du contenu vidéo
                $videoContent = new ContentVideo($dbManager);
                $videoContent->setCourseId($id_course);
                $videoContent->setTitle($_POST['title']);
                $videoContent->setUrl($url['filePath']);
                $videoContent->setDuration((int)$_POST['duration']);

                if (!$videoContent->add()) {
                    throw new Exception("Échec de l'ajout du contenu vidéo.");
                }
            } elseif ($type === 'texte') {
                // Validation des champs spécifiques au type "Texte"
                if (empty($_POST['content'])) {
                    throw new Exception("Le contenu texte est obligatoire.");
                }

                // Création du contenu texte
                $textContent = new ContentText($dbManager);
                $textContent->setCourseId($id_course);
                $textContent->setTitle($_POST['title']);
                $textContent->setContent($_POST['content']);

                if (!$textContent->add()) {
                    throw new Exception("Échec de l'ajout du contenu texte.");
                }
            } else {
                throw new Exception("Type de contenu invalide.");
            }

            // Succès
            setSweetAlertMessage('Succès', 'Le cours et son contenu ont été ajoutés avec succès', 'success', 'addCourse.php');
        } else {
            throw new Exception("Échec de l'ajout du contenue.");
           
        }
    } catch (Exception $e) {
        setSweetAlertMessage('Erreur', $e->getMessage(), 'error', 'addCourse.php');
    }
}
?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Ajouter un Nouveau Cours</h2>

            <form method="POST" action="" enctype="multipart/form-data" class="space-y-6" id="courseForm">
                <!-- Titre du Cours -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Titre du Cours <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Entrez le titre du cours">
                    <div id="titleError" class="text-red-500 text-sm hidden">Le titre du cours est obligatoire.</div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description du Cours
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Décrivez brièvement votre cours"></textarea>
                </div>

                <!-- Catégorie -->
                <div>
                    <label for="id_categorie" class="block text-sm font-medium text-gray-700 mb-2">
                        Catégorie <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="id_categorie"
                        name="id_categorie"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionnez une catégorie</option>
                        <?php foreach ($categories as $categorie): ?>
                            <option value="<?= $categorie->id_categorie ?>">
                                <?= htmlspecialchars($categorie->name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div id="categoryError" class="text-red-500 text-sm hidden">La catégorie est obligatoire.</div>
                </div>

                <!-- Type de contenu (Vidéo ou Texte) -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                        Type de contenu <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="type"
                        name="type"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onchange="toggleContentFields()">
                        <option value="">Sélectionnez un type de contenu</option>
                        <option value="video">Vidéo</option>
                        <option value="text">Texte</option>
                    </select>
                    <div id="typeError" class="text-red-500 text-sm hidden">Le type de contenu est obligatoire.</div>
                </div>

                <!-- Champs Vidéo -->
                <div id="videoFields" class="hidden">


                    <h2 class="text-2xl font-bold mb-4">Téléchargez ou Intégrez une Vidéo</h2>

                    <!-- Option 1 : Upload vidéo -->
                    <div class="mb-4">
                        <label for="videoUpload" class="block text-gray-700">Télécharger une vidéo</label>
                        <input type="file" id="videoUpload" name="videoUpload" accept="video/*" class="mt-2 p-2 border border-gray-300 rounded-lg w-full">
                    </div> 

                    <!-- Option 2 : URL YouTube -->
                    <div class="mb-4">
                        <label for="videoURL" class="block text-gray-700">Ou, collez une URL YouTube</label>
                        <input type="url" id="videoURL" name="videoURL" placeholder="https://www.youtube.com/watch?v=exemple" class="mt-2 p-2 border border-gray-300 rounded-lg w-full">
                    </div>
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">
                            Durée de la Vidéo (en minutes) <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="number"
                            id="duration"
                            name="duration"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Durée de la vidéo">
                        <div id="durationError" class="text-red-500 text-sm hidden">La durée de la vidéo est obligatoire.</div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                    <input id="tags" name="tags" placeholder="Tapez pour ajouter des tags" class="w-full p-2 border border-gray-300 rounded-md">
                </div>

                <?php
                // Récupérer tous les tags depuis la base de données
                $tags = Tag::getAll($dbManager);

                // Créer un tableau contenant les noms des tags
                $tagsArray = array_map(function ($tag) {
                    return $tag->name_tag; // Récupère uniquement le nom des tags
                }, $tags);

                // Convertir les tags en format JSON pour les utiliser dans JavaScript
                echo '<script>';
                echo 'var tagsList = ' . json_encode($tagsArray) . ';';
                echo '</script>';
                ?>

                <script>
                    var input = document.querySelector('input[name=tags]');

                    // Initialiser Tagify avec la liste des tags récupérés depuis la base de données
                    var tagify = new Tagify(input, {
                        whitelist: tagsList, // Remplir le whitelist avec les tags récupérés
                        maxTags: 5, // Limite du nombre de tags que l'utilisateur peut ajouter
                        dropdown: {
                            enabled: 1, // Montre les suggestions immédiatement
                            maxItems: 10, // Nombre d'éléments à afficher dans le menu de suggestions
                            classname: 'tags-look', // Classe personnalisée pour le style
                            searchKeys: ['name'], // Recherche par nom
                        }
                    });
                </script>

                <div id="textFields" class="hidden">
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                            Contenu Texte <span class="text-red-500">*</span>
                        </label>
                        <div id="quill-editor" class="w-full h-40 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></div>
                        <input type="hidden" name="content" id="content">
                        <div id="contentError" class="text-red-500 text-sm hidden">Le contenu texte est obligatoire.</div>
                    </div>
                </div>
                <!-- Prix -->
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">
                        Prix du Cours (€)
                    </label>
                    <input
                        type="number"
                        id="prix"
                        name="prix"
                        step="0.01"
                        min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="0.00">
                </div>

                <!-- Image de Couverture -->
                <div>
                    <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">
                        Image de Couverture
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-300 group">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <svg class="w-10 h-10 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="lowercase text-sm text-gray-400 group-hover:text-blue-600 pt-1 tracking-wider">
                                    Cliquez pour télécharger une image
                                </p>
                            </div>
                            <input
                                type="file"
                                name="picture"
                                id="picture"
                                accept="image/*"
                                class="hidden" />
                        </label>
                    </div>
                </div>

                <!-- Bouton de Soumission -->
                <div class="pt-4">
                    <button
                        type="submit"
                        name="add_course"
                        class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-300"
                        onclick="return validateForm()">
                        Créer le Cours
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleContentFields() {
        const type = document.getElementById('type').value;
        const videoFields = document.getElementById('videoFields');
        const textFields = document.getElementById('textFields');

        // Réinitialiser l'affichage des champs
        videoFields.classList.add('hidden');
        textFields.classList.add('hidden');

        // Afficher les champs spécifiques en fonction du type sélectionné
        if (type === 'video') {
            videoFields.classList.remove('hidden');
        } else if (type === 'text') {
            textFields.classList.remove('hidden');
        }
    }

    function validateForm() {
        let isValid = true;

        // Réinitialiser les erreurs
        document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

        // Vérifier si les champs obligatoires sont remplis
        if (document.getElementById('title').value.trim() === '') {
            document.getElementById('titleError').classList.remove('hidden');
            isValid = false;
        }

        if (document.getElementById('id_categorie').value === '') {
            document.getElementById('categoryError').classList.remove('hidden');
            isValid = false;
        }

        if (document.getElementById('type').value === '') {
            document.getElementById('typeError').classList.remove('hidden');
            isValid = false;
        }

        const type = document.getElementById('type').value;
        if (type === 'video') {
            if (document.getElementById('url').value.trim() === '') {
                document.getElementById('urlError').classList.remove('hidden');
                isValid = false;
            }
            if (document.getElementById('duration').value.trim() === '') {
                document.getElementById('durationError').classList.remove('hidden');
                isValid = false;
            }
        } else if (type === 'text') {
            if (document.getElementById('content').value.trim() === '') {
                document.getElementById('contentError').classList.remove('hidden');
                isValid = false;
            }
        }

        return isValid;
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialiser Quill
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Entrez le contenu texte ici...',
            modules: {
                toolbar: [
                    // Mise en forme de texte
                    ['bold', 'italic', 'underline', 'strike'], // Gras, italique, souligné, barré
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Couleur du texte et arrière-plan
                    [{
                        'font': []
                    }], // Choix de la police
                    [{
                        'size': ['small', 'normal', 'large', 'huge']
                    }], // Taille de police

                    // Alignement du texte
                    [{
                        'align': []
                    }],

                    // Options d'en-têtes
                    [{
                        'header': 1
                    }, {
                        'header': 2
                    }, {
                        'header': 3
                    }],

                    // Listes
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],

                    // Liens et images
                    ['link', 'image', 'video'], // Liens, images et vidéos
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }], // Augmenter ou diminuer le retrait

                    // Citation et code
                    ['blockquote', 'code-block'], // Citation et bloc de code

                    // Outils supplémentaires
                    ['clean'] // Supprimer la mise en forme
                ]
            }
        });


        // Synchroniser le contenu de Quill avec l'input caché
        const contentInput = document.getElementById('content');
        quill.on('text-change', () => {
            contentInput.value = quill.root.innerHTML; // Récupère le HTML généré par Quill
        });

        // Vérification du formulaire
        document.getElementById('courseForm').addEventListener('submit', (e) => {
            if (document.getElementById('type').value === 'text' && contentInput.value.trim() === '') {
                e.preventDefault();
                document.getElementById('contentError').classList.remove('hidden');
            }
        });
    });
</script>





<?php
$content = ob_get_clean();
include('layout.php');
?>