<?php




spl_autoload_register(function ($class) {
    // Convertit le namespace en chemin de fichier
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    
    // Vérifie si le fichier existe et l'inclut
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("Classe non trouvée : $class (fichier attendu : $file)");
    }
});





// new App\Controllers\HomeController();  // Appelle l'autoloader 1
// new External\Library\SomeClass();    