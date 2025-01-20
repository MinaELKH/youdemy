<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
require_once("../uploadimage.php");
ob_start();

use classes\Course;
use classes\Categorie;
use config\DataBaseManager;

$dbManager = new DataBaseManager();

// Récupérer l'ID du cours depuis l'URL
$id_course = $_GET['id_course'] ?? null;

if (!$id_course || !is_numeric($id_course)) {
    die("ID de cours invalide ou manquant.");
}

// Récupérer les catégories pour le select

$categories = Categorie::getAll($dbManager);

// Charger les données du cours pour la pré-remplir dans le formulaire
try {
    $newCourse = new Course($dbManager, $id_course);
    $course = $newCourse->getById();

    if (!$course) {
        throw new Exception("Le cours avec l'ID $id_course n'existe pas.");
    }
} catch (Exception $e) {
    // Gérer les erreurs
    error_log($e->getMessage());
    die("Erreur : Impossible de charger les données du cours.");
}
?>

<!-- update  -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_course'])) {
    try {
        // Hydrater l'objet Course avec les données du formulaire
        $newCourse->title = $_POST['title'];
        $newCourse->description = $_POST['description'];
        $newCourse->id_categorie = $_POST['id_categorie'];
        $newCourse->prix = $_POST['prix'];
        $newCourse->status = 1; // Exemple : 1 pour actif
        $newCourse->archived = 0; // Exemple : 0 pour non archivé

        // Gestion de l'image
        if (!empty($_FILES['picture']['name'])) {
            $uploadedFile = uploadImage($_FILES['picture']); // Fonction uploadImage() pour gérer les fichiers
            if ($uploadedFile) {
                $newCourse->picture = $uploadedFile;
            } else {
                throw new Exception("Échec du téléchargement de l'image.");
            }
        }

        // Mettre à jour les données dans la base
        if ($newCourse->update()) {
            echo "<script>sweetAlertSuccess('Le cours a été mis à jour avec succès.');</script>";
        } else {
            throw new Exception("Impossible de mettre à jour le cours.");
        }
    } catch (Exception $e) {
        // Gérer les erreurs
        echo "<script>sweetAlertError('Erreur : " . htmlspecialchars($e->getMessage()) . "');</script>";
    }
}

?>



<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Modifier le Cours</h2>

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
                        value="<?= htmlspecialchars($course->title) ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Entrez le titre du cours">
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
                        placeholder="Décrivez brièvement votre cours"><?= htmlspecialchars($course->description) ?></textarea>
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
                            <option value="<?= $categorie->id_categorie ?>" <?= $categorie->id_categorie == $course->id_categorie ? 'selected' : '' ?>>
                                <?= htmlspecialchars($categorie->name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- Prix -->
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">
                        Prix du Cours (€)
                    </label>
                    <input
                        value="<?= htmlspecialchars($course->prix) ?>"
                        type="number"
                        id="prix"
                        name="prix"
                        step="0.01"
                        min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                      >
                </div>

                <!-- Image de Couverture -->
                <div>
                    <div class="flex justify-between">
                    <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">
                        Image de Couverture
                    </label>
                 <img src="<?php echo '../'.$course->picture ?>" class="h-16 w-16"  >
                    </div>
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
                                value="<?= htmlspecialchars($categorie->picture) ?>"
                                name="picture"
                                id="picture"
                                accept="image/*"
                                class="hidden" />
                        </label>
                    </div>
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
                        <option value="video" <?= isset($course->type) && $course->type === 'video' ? 'selected' : '' ?>>Vidéo</option>
                        <option value="text" <?= isset($course->type) && $course->type === 'text' ? 'selected' : '' ?>>Texte</option>
                    </select>

                    <div id="typeError" class="text-red-500 text-sm hidden">Le type de contenu est obligatoire.</div>
                </div>

                <!-- Champs Vidéo -->
                <div id="videoFields" class="hidden">
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700 mb-2">
                            URL de la Vidéo <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="url"
                            id="url"
                            name="url"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Entrez l'URL de la vidéo">
                        <div id="urlError" class="text-red-500 text-sm hidden">L'URL de la vidéo est obligatoire.</div>
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

                <!-- Champs Texte -->
                <div id="textFields" class="hidden">
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                            Contenu Texte <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            id="content"
                            name="content"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Entrez le contenu texte"></textarea>
                        <div id="contentError" class="text-red-500 text-sm hidden">Le contenu texte est obligatoire.</div>
                    </div>
                </div>


















                <!-- Bouton de Soumission -->
                <div class="pt-4">
                    <button
                        type="submit"
                        name="update_course"
                        class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-300">
                        Mettre à Jour le Cours
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



<?php
$content = ob_get_clean();
include('layout.php');
?>