<?php
require("../sweetAlert.php"); 
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
use classes\User ;
use config\Session ; 



 ?>
 <!-- auth -->


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["login"])) {
    try {
        // Récupération des données du formulaire
        $email = trim($_POST["email"] ?? '');
        $password = $_POST["password"] ?? '';
        // Validation des champs
        if (empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse email invalide.");
        }
        // Vérification des informations utilisateur
        $user = User::signin($email, $password);

        // Si l'utilisateur est trouvé, création de la session
        Session::set('logged_in', true);
        Session::set('user', [
            'id' => $user->getid_user(),
            'name' => $user->getname_full(),
            'email' => $user->getEmail(),
            'role' => $user->getRole(),
            'avatar' => $user->getAvatar(),
        ]);

        // SweetAlert pour succès
        $_SESSION['msgSweetAlert'] = [
            'title' => 'Connexion réussie',
            'text' => 'Bienvenue, ' . htmlspecialchars($user->getname_full()) . '!',
            'status' => 'success'
        ];
        sweetAlert('dashboard.php'); // Redirection vers le tableau de bord
        exit;

    } catch (Exception $e) {
        // Gestion des erreurs
        $_SESSION['msgSweetAlert'] = [
            'title' => 'Erreur de connexion',
            'text' => $e->getMessage(),
            'status' => 'error'
        ];
       // var_dump($_SESSION['msgSweetAlert']) ; 
        sweetAlert('login.php'); // Redirection vers la page de connexion
        exit;
    }
}

if (isset($_SESSION['msgSweetAlert'])) {
  sweetAlert('');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>

</head>
 <body class="bg-gray-100">
   <!-- Header -->
  <header class="bg-white shadow">
   <div class="container mx-auto flex justify-between items-center py-4 px-6">
    <div class="flex items-center">
     <img alt="Udemy logo" class="h-10" src="https://placehold.co/100x40"/>
     <nav class="ml-6 hidden md:flex">
      <a class="text-gray-700 hover:text-gray-900 mx-3" href="#">
          Accueil
      </a>
     </nav>
    </div>
   </div>
  </header>
  
  <div class="flex w-full max-w-4xl bg-white shadow-md rounded-lg overflow-hidden">
   <div class="w-full md:w-1/2 p-8">
    <div class="flex justify-center mb-4">
     <i class="fas fa-wave-square text-4xl text-indigo-600">
     </i>
    </div>
    <h2 class="text-2xl font-bold text-gray-900 mb-2">
     Sign in to your account
    </h2>
    <p class="text-sm text-gray-600 mb-6">
     Not a member?
     <a class="text-indigo-600" href="#">
      Start a 14 day free trial
     </a>
    </p>
    <form hx-post="login.php" hx-trigger="confirmed" hx-target="#result">
     <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
       Email address
      </label>
      <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Email address" type="email"/>
     </div>
     <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
       Password
      </label>
      <input    name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" placeholder="Password" type="password"/>
     </div>
    
     <div class="mb-4">
      <button hx-get="/confirmed" 
        onClick="Swal.fire({title: 'Confirm', text:'Do you want to continue?'}).then((result)=>{
            if(result.isConfirmed){
              htmx.trigger(this, 'confirmed');  
            } 
        })"  name="login" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Sign in
      </button>
     </div>
     <div class="text-center text-gray-600 mb-4">
      Or continue with
     </div>
     <div class="flex justify-center space-x-4">
      <button class="flex items-center border border-gray-300 rounded py-2 px-4 text-gray-700">
       <img alt="Google logo" class="mr-2" src="https://placehold.co/20x20"/>
       Google
      </button>
      <button class="flex items-center border border-gray-300 rounded py-2 px-4 text-gray-700">
       <img alt="GitHub logo" class="mr-2" src="https://placehold.co/20x20"/>
       GitHub
      </button>
     </div>
    </form>
    <div id="result">

    </div>
   </div>
   <div class="hidden md:block md:w-1/2">
    <img alt="A desk with a laptop, keyboard, mouse, and other office items" class="object-cover w-full h-full" src="https://placehold.co/600x800"/>
   </div>
  </div>
  <script>
  document.addEventListener("htmx:confirm", function(e) {
    // The event is triggered on every trigger for a request, so we need to check if the element
    // that triggered the request has a hx-confirm attribute, if not we can return early and let
    // the default behavior happen
    if (!e.detail.target.hasAttribute('hx-confirm')) return

    // This will prevent the request from being issued to later manually issue it
    e.preventDefault()

    Swal.fire({
      title: "Proceed?",
      text: `I ask you... ${e.detail.question}`
    }).then(function(result) {
      if (result.isConfirmed) {
        // If the user confirms, we manually issue the request
        e.detail.issueRequest(true); // true to skip the built-in window.confirm()
      }
    })
  })
</script>
 </body>
</html>
