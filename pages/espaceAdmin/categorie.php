<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
ob_start();
// session_start() ;
//  if ($_SESSION['id_role'] !=2 ) { // client ou visiteur
//     header("location: erreur.php");
//    exit;
// } else if ( $_SESSION['id_role'] == 1) { // admin ou superAdmin
//      $id_user = $_SESSION['id_user'];
//  }

use classes\Categorie;
use config\DataBaseManager;

$dbManager = new DatabaseManager();

// $_SESSION["id_user"] = 5;
// $id_user =  $_SESSION["id_user"];

?>
<?php
// AJout d categorie 
if (($_SERVER["REQUEST_METHOD"] == 'POST') && (isset($_POST["addCategorie"]))) {
  if (empty($_POST['name']) ) {
    echo "veuillez remplir les champs ";
  } else {
    $newCategorie = new Categorie($dbManager,  0, $_POST['name'], $_POST['description']);
    $result = $newCategorie->add();
    //  var_dump($result) ;
    //  die();
  }
}
?>

<script src="https://cdn.tailwindcss.com"></script>
<section class="mb-2">
  <h3 class="text-xl font-semibold mb-2">Gestion des categories </h3>
  <div class="bg-white p-2 rounded-lg shadow-lg">
    <p class="text-gray-600">Ajouter un Categorie</p>
    <div class="container mx-auto p-6">
      <!-- Formulaire d'ajout de Categorie -->

      <form method="POST" action="">
        <div class="space-y-2">
          <!-- Nom du Categorie -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom du Categorie</label>
            <input type="text" id="name" name="name" class="w-full p-3 border rounded-lg" placeholder="Entrez le nom du Categorie">
          </div>
          <!-- Description du Categorie -->
          <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea id="description" name="description" class="w-full h-32 p-3 border rounded-lg resize-none" placeholder="Entrez la description du Categorie"></textarea>
          </div>
          <!-- Bouton de soumission -->
          <div>
            <button type="submit" name="addCategorie" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
              Ajouter le Categorie
            </button>
          </div>
        </div>
      </form>

    </div>
  </div>
</section>
<section class="mb-2">
  <h3 class="text-xl font-semibold mb-2">Gestion des categories </h3>
  <div class="bg-white p-2 rounded-lg shadow-lg">
    <p class="text-gray-600">Liste des Categories</p>
    <?php
    afficher($dbManager);

    function afficher($dbManager)
    {
      $categorie = new Categorie($dbManager);
      $categories =  $categorie->getAll();
  
      if (!empty($categories)) {

        echo "<div class='listeTable'><table border='1'>
              <thead>
               <tr>
                    <th>Réf</th>
                    <th>Title</th>
                    <th>description</th>
               </tr>
               </thead><tbody>";

        foreach ($categories as $objet) {
          $id = $objet->id_categorie;
          echo "<tr>
                <td>{$objet->id_categorie}</td>  
                 <td> $objet->name </td>
                  <td> $objet->description </td>
                <td>
              </td>
                    <td class='flex align-center justify-center'>
                        <form action='' method='post'>
                            <input type='hidden' name='id_categorie' value='{$objet->id_categorie}'>
                            <button type='submit' name='archive' value='$id'>
                                <span class='text-red-400 cursor-pointer material-symbols-outlined'>archive</span>
                            </button>
                        </form>
                    </td>
            </tr>";
        }
        echo "</tbody></table></div>";
      
      } 
      else {
        echo "<p>Aucune  categorie trouvée.</p>";
      }
    
    }


    ?>
  </div>
</section>



<?php
$content = ob_get_clean();
include('layout.php');
?>