<?php
function sweetAlert($redirectUrl) {
    // Vérifie si une alerte existe dans la session
    if (isset($_SESSION['msgSweetAlert'])) {
        $title = addslashes($_SESSION['msgSweetAlert']['title']);
        $text = addslashes($_SESSION['msgSweetAlert']['text']);
        $status = $_SESSION['msgSweetAlert']['status'];

        // Génère le script SweetAlert avec des styles personnalisés
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '$title',
                    text: '$text',
                    icon: '$status',
                    showConfirmButton: true,
                    customClass: {
                        popup: 'custom-sweetalert' // Appliquer une classe CSS personnalisée
                    }
                }).then(() => {
                    window.location.href = '$redirectUrl';
                });
            });
        </script>";

        // Supprime l'alerte après affichage
        unset($_SESSION['msgSweetAlert']);
    }
}
