<!-- Gestion de l'authentification - Connexion - register -->
<?php
require("../sweetAlert.php"); 

require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
use classes\User ;
use config\Session ; 
Session::start();


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
?>


<!-- register -->
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["signup"])) {
    try {

        // Récupération des données du formulaire
        $name = trim($_POST["name"] ?? '');
        $email = trim($_POST["email"] ?? '');
        $password = $_POST["password"] ?? '';
        $confirmPassword = $_POST["confirm_password"] ?? '';
        $role = $_POST["role"] ?? '';
        $avatar = $_FILES["avatar"] ?? null;
   
        // Validation des champs
        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($role) ) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse email invalide.");
        }

        if ($password !== $confirmPassword) {
            throw new Exception("Les mots de passe ne correspondent pas.");
        }

        if (strlen($password) < 3) {
            throw new Exception("Le mot de passe doit comporter au moins 6 caractères.");
        }
 
        // Gestion de l'avatar
        $avatarPath = null;
        // if ($avatar && $avatar['error'] === UPLOAD_ERR_OK) {
        //     $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        //     $fileExtension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        //     if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        //         throw new Exception("Le format de l'avatar est invalide (seuls JPG, PNG, GIF sont autorisés).");
        //     }

        //     $uploadDir = 'uploads/avatars/';
        //     if (!is_dir($uploadDir)) {
        //         mkdir($uploadDir, 0755, true);
        //     }
        //     $avatarPath = $uploadDir . uniqid() . '.' . $fileExtension;
        //     if (!move_uploaded_file($avatar['tmp_name'], $avatarPath)) {
        //         throw new Exception("Erreur lors de l'enregistrement de l'avatar.");
        //     }
        // }

        
        $userId = User::signup($name, $email, $avatarPath, $password , $role);
        // Stockage des données utilisateur dans la session
        Session::set('logged_in', true);
        Session::set('user', [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'avatar' => $avatarPath,
        ]);
         // redirection selon role 
        User::gotoLocation($role) ; 
        // SweetAlert pour le succès
    
    } catch (Exception $e) {
        $_SESSION['msgSweetAlert'] = [
            'title' => 'Avertissement',
            'text' => $e->getMessage(), // Corrected method call
            'status' => 'error'
        ];
        sweetAlert('register.php'); // Assuming this function handles alerts and redirects
        exit; // Ensures script stops after handling the exception
    }
}
?>
