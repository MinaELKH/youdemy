<?php
session_start(); // Démarre la session
//session_destroy();
// Vérifier si la variable de session 'user' existe
if (isset($_SESSION['user'])) {
    echo "La session fonctionne ! Utilisateur 777: " . $_SESSION['user'];
} else {
    echo "Aucune session n'a été définie.";
}
?>