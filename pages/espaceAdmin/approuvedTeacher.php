<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php"); 
ob_start();?>


<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-100 p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                Enseignants en Attente d'Approbation
            </h1>
            
            <div class="flex space-x-4">
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Rechercher..." 
                        class="pl-10 pr-4 py-3 w-72 bg-white/80 backdrop-blur-sm rounded-full border-2 border-blue-100 focus:border-blue-300 transition duration-300 ease-in-out shadow-lg"
                    >
                    <i class="fas fa-search absolute left-4 top-4 text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-blue-50 to-purple-50">
                    <tr>
                        <th class="w-1/4 px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                            Enseignant
                        </th>
                        <th class="w-1/6 px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                            Discipline
                        </th>
                        <th class="w-1/4 px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                            Informations de Contact
                        </th>
                        <th class="w-1/6 px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                            Documents
                        </th>
                        <th class="w-1/6 px-6 py-4 text-center text-sm font-bold text-gray-700 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                    $pendingTeachers = [
                        [
                            'id' => 1,
                            'name' => 'Sophie Leroy',
                            'email' => 'sophie.leroy@education.fr',
                            'phone' => '+33 6 45 67 89 01',
                            'discipline' => 'Physique-Chimie',
                            'cv' => 'cv_sophie_leroy.pdf',
                            'diplome' => 'diplome_sophie_leroy.pdf',
                            'image' => 'https://randomuser.me/api/portraits/women/44.jpg'
                        ],
                        // Autres enseignants en attente...
                    ];

                    foreach ($pendingTeachers as $teacher): ?>
                        <tr class="border-b hover:bg-gray-50 transition duration-300">
                            <td class="px-6 py-4 flex items-center space-x-4">
                                <img 
                                    src="<?= $teacher['image'] ?>" 
                                    alt="<?= $teacher['name'] ?>" 
                                    class="w-12 h-12 rounded-full object-cover shadow-md"
                                >
                                <div>
                                    <div class="font-semibold text-gray-800"><?= $teacher['name'] ?></div>
                                    <div class="text-sm text-gray-500"><?= $teacher['email'] ?></div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">
                                    <?= $teacher['discipline'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <i class="fas fa-phone mr-2 text-blue-500"></i>= $teacher['phone'] ?>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="<?= $teacher['cv'] ?>" target="_blank" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-file-pdf"></i> CV
                                    </a>
                                    <a href="= $teacher['diplome'] ?>" target="_blank" class="text-green-500 hover:text-green-700">
                                        <i class="fas fa-graduation-cap"></i> Diplôme
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-3">
                                    <button 
                                        class="approve-btn text-green-500 hover:text-green-700 transition duration-300"
                                        data-id="<?= $teacher['id'] ?>"
                                    >
                                        <i class="fas fa-check-circle text-2xl"></i>
                                    </button>
                                    <button 
                                        class="reject-btn text-red-500 hover:text-red-700 transition duration-300"
                                        data-id="<?= $teacher['id'] ?>"
                                    >
                                        <i class="fas fa-times-circle text-2xl"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const approveButtons = document.querySelectorAll('.approve-btn');
    const rejectButtons = document.querySelectorAll('.reject-btn');

    // Logique d'approbation
    approveButtons.forEach(button => {
        button.addEventListener('click', function() {
            const teacherId = this.dataset.id;
            
            Swal.fire({
                title: 'Confirmer l\'approbation',
                text: 'Voulez-vous vraiment approuver cet enseignant ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, approuver',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Appel AJAX pour approuver
                    fetch('approve_teacher.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ id: teacherId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Supprimer la ligne du tableau
                            button.closest('tr').remove();
                            
                            Swal.fire(
                                'Approuvé!', 
                                'L\'enseignant a été approuvé avec succès.', 
                                'success'
                            );
                        }
                    });
                }
            });
        });
    });

    // Logique de rejet
    rejectButtons.forEach(button => {
        button.addEventListener('click', function() {
            const teacherId = this.dataset.id;
            
            Swal.fire({
                title: 'Confirmer le rejet',
                text: 'Voulez-vous vraiment rejeter cette candidature ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, rejeter',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Appel AJAX pour rejeter
                    fetch('reject_teacher.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ id: teacherId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Supprimer la ligne du tableau
                            button.closest('tr').remove();
                            
                            Swal.fire(
                                'Rejeté!', 
                                'La candidature a été rejetée.', 
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
});
</script>


<?php
$content = ob_get_clean();
include('layout.php');
?>

