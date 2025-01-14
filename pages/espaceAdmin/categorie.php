<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
ob_start();

use classes\Categorie;
use config\DataBaseManager;

$dbManager = new DatabaseManager();

// Ajout de catégorie

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["add"])) {
    try {
        if (empty($_POST['name'])) {
            echo "Veuillez remplir les champs.";
        } else {
            $newCategorie = new Categorie($dbManager, 0, $_POST['name'], $_POST['description']);
            $result = $newCategorie->add();
            echo $result ? "Catégorie ajoutée avec succès !" : "Erreur lors de l'ajout de la catégorie.";
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Archive de catégorie
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["archive"])) {
    try {
        if (!empty($_POST['id_categorie'])) {
            $newCategorie = new Categorie($dbManager, $_POST['id_categorie']);
            $result = $newCategorie->archived();
            echo $result ? "Catégorie archivée avec succès !" : "Erreur lors de l'archivage de la catégorie.";
        } else {
            echo "L'ID de la catégorie est manquant.";
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Fonction pour afficher les catégories
function afficher($dbManager)
{
    try {
        $categorie = new Categorie($dbManager);
        $categories = $categorie->getAll();

        if (!empty($categories)) {
            echo "<table id='categoriesTable' class='display w-full'>
                    <thead>
                        <tr>
                            <th>Réf</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($categories as $objet) {
                echo "<tr>
                        <td>{$objet->id_categorie}</td>
                        <td>{$objet->name}</td>
                        <td>{$objet->description}</td>
                        <td>
                            <form action='' method='post'>
                                <input type='hidden' name='id_categorie' value='{$objet->id_categorie}'>
                                <button type='submit' name='archive' value='{$objet->id_categorie}' class='text-red-400'>
                                    <span class='material-symbols-outlined'>archive</span>
                                </button>
                            </form>
                        </td>
                    </tr>";
            }
            echo "</tbody>
                </table>";
        } else {
            echo "<p>Aucune catégorie trouvée.</p>";
        }
    } catch (Exception $e) {
        echo "Erreur lors de la récupération des catégories : " . $e->getMessage();
    }
}
?>

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Language (Français) -->
    <script src="//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"></script>
</head>
<body class="bg-gray-100">

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

<script>
    $(document).ready(function () {
        $('#categoriesTable').DataTable({
            paging: true,        // Activer la pagination
            searching: true,     // Activer la recherche
            info: true,          // Activer les informations sur les résultats
            responsive: true,    // Mode responsive
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json" // Français
            },
        });
    });
</script>

<?php
$content = ob_get_clean();
include('layout.php');
?>

