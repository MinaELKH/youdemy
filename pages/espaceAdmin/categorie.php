<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php");
ob_start();

use classes\Categorie;
use config\DataBaseManager;

$dbManager = new DatabaseManager();

// Ajout de catégorie

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["add"])) {
    try {

        
        // Votre code à exécuter
        if (empty($_POST['name'])) {
            throw new Exception("Le champ 'titre de categorie' est obligatoire.");
        }

        $newCategorie = new Categorie($dbManager, 0, $_POST['name'], $_POST['description']);

        $result = $newCategorie->add();

        if ($result) {
            setSweetAlertMessage('Succès', ' La catégorie a été ajoutée avec succès', 'success', 'categorie.php');
        } else {
            throw new Exception("Échec de l'ajout de la catégorie.");
        }
    } catch (Exception $e) {
        setSweetAlertMessage('Erreur', $e->getMessage(), 'error', 'categorie.php');
    }
}

// Archive de catégorie
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["archive"])) {
    try {
            $newCategorie = new Categorie($dbManager, $_POST['id_categorie']);
            $result = $newCategorie->archived();
            if ($result) {
                setSweetAlertMessage('Succès', 'Categorie archivée avec succès.', 'success', 'categorie.php');
            } else {
                setSweetAlertMessage('Erreur', 'Aucun archivage n\'a eu lieu. veuillez contacter le superAdmin', 'error', 'categorie.php');
            }
        } catch (Exception $e) {
        setSweetAlertMessage('Erreur', $e->getMessage(), 'error', 'categorie.php');
    }
}

// Fonction pour afficher les catégories
function afficher($dbManager)
{
    try {
        $categorie = new Categorie($dbManager);
        $categories = $categorie->getAll();

        echo "<div class='min-h-screen bg-gradient-to-br from-gray-50 to-blue-100 p-8'>
                <div class='container mx-auto'>
                    <div class='bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden p-6'>";

        if (!empty($categories)) {
            echo "<table id='DataTable' class='w-full'>
                    <thead class='bg-gradient-to-r from-blue-50 to-purple-50'>
                        <tr>
                            <th class='w-1/6 px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider'>Réf</th>
                            <th class='w-1/3 px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider'>Nom</th>
                            <th class='w-1/3 px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider'>Description</th>
                            <th class='w-1/6 px-6 py-4 text-center text-sm font-bold text-gray-700 uppercase tracking-wider'>Actions</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($categories as $objet) {
                echo "<tr class='border-b border-gray-100 hover:bg-blue-50/50 transition duration-300'>
                        <td class='px-6 py-4 text-gray-800'>{$objet->id_categorie}</td>
                        <td class='px-6 py-4'>
                            <div class='font-semibold text-gray-900'>{$objet->name}</div>
                        </td>
                        <td class='px-6 py-4 text-gray-600'>{$objet->description}</td>
                        <td class='px-6 py-4 text-center'>
                            <form action='' method='post' class='flex justify-center'>
                                <input type='hidden' name='id_categorie' value='{$objet->id_categorie}'>
                                <button type='submit' name='archive' value='{$objet->id_categorie}' 
                                    class='text-red-500 hover:text-red-700 transform hover:scale-125 transition'
                                    title='Archiver la catégorie'>
                                    <i class='fas fa-archive'></i>
                                </button>
                            </form>
                        </td>
                    </tr>";
            }
            echo "</tbody>
                </table>";
        } else {
            echo "<p class='text-center text-gray-500 py-6'>Aucune catégorie trouvée.</p>";
        }

        echo "  </div>
            </div>
        </div>";

        // Add DataTables initialization script
        echo "<script>
            $(document).ready(function() {
                $('#categoriesTable').DataTable({
                    responsive: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json'
                    },
                    columnDefs: [{
                        targets: 'no-sort',
                        orderable: false
                    }]
                });
            });
        </script>";

    } catch (Exception $e) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                <strong class='font-bold'>Erreur : </strong>
                <span class='block sm:inline'>" . htmlspecialchars($e->getMessage()) . "</span>
              </div>";
    }
}

?>



<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>

    <script src="https://cdn.tailwindcss.com"></script>
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
 
    <script src="//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"></script>
</head>
<body class="bg-gray-100"> -->

<section class="mb-4">
    <h3 class="text-xl font-semibold mb-2">Gestion des Catégories</h3>
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <p class="text-gray-600">Ajouter une Catégorie</p>
        <form method="POST" action="">
            <div class="space-y-4">
                <!-- Nom du Categorie -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom de la Catégorie</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border rounded-lg" placeholder="Entrez le nom">
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" class="w-full h-32 p-3 border rounded-lg resize-none" placeholder="Entrez la description"></textarea>
                </div>
                <!-- Bouton de soumission -->
                <div>
                    <button type="submit" name="add" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Ajouter
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="mb-4">
    <h3 class="text-xl font-semibold mb-2">Liste des Catégories</h3>
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <?php afficher($dbManager); ?>
    </div>
</section>

<!-- <script>
    $(document).ready(function() {
        $('#categoriesTable').DataTable({
            paging: true, // Activer la pagination
            searching: true, // Activer la recherche
            info: true, // Activer les informations sur les résultats
            responsive: true, // Mode responsive
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json" // Français
            },
        });
    });
</script> -->

<?php
$content = ob_get_clean();
include('layout.php');
?>