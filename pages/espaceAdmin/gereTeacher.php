<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/youdemy/autoloader.php';
require_once("../sweetAlert.php"); 
ob_start();?>
<!-- Gestion des Enseignants -->
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-100 p-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                Gestion des Enseignants
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
                
                <button class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-full hover:scale-105 transform transition flex items-center shadow-xl hover:shadow-2xl">
                    <i class="fas fa-plus mr-2"></i> Ajouter
                </button>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-blue-50 to-purple-50">
                    <tr>
                        <?php 
                        $headers = [
                            'Enseignant' => 'w-1/4', 
                            'Matière' => 'w-1/6', 
                            'Contact' => 'w-1/4', 
                            'Statut' => 'w-1/6', 
                            'Actions' => 'w-1/6 text-center'
                        ];
                        
                        foreach ($headers as $header => $width): ?>
                            <th class="<?= $width ?> px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">
                                <?= $header ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                    $teachers = [
                        [
                            'name' => 'Marie Dupont',
                            'subject' => 'Mathématiques',
                            'email' => 'marie.dupont@ecole.fr',
                            'phone' => '+33 6 12 34 56 78',
                            'status' => 'Actif',
                            'image' => 'https://randomuser.me/api/portraits/women/65.jpg',
                            'color' => 'bg-green-500'
                        ],
                        // Autres enseignants...
                    ];

                    foreach ($teachers as $teacher): ?>
                        <tr class="border-b border-gray-100 hover:bg-blue-50/50 transition duration-300">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <img 
                                            src="<?= htmlspecialchars($teacher['image']) ?>" 
                                            alt="Profile" 
                                            class="w-16 h-16 rounded-full object-cover border-4 <?= $teacher['color'] ?> border-opacity-30 transform hover:scale-110 transition"
                                        >
                                        <span class="absolute bottom-0 right-0 block h-4 w-4 rounded-full <?= $teacher['color'] ?> ring-2 ring-white"></span>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900"><?= htmlspecialchars($teacher['name']) ?></div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                                    <?= htmlspecialchars($teacher['subject']) ?>
                                </span>
                            </td>
                            
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">
                                    <div>= htmlspecialchars($teacher['email']) ?></div>
                                    <div class="text-xs text-gray-400"><?= htmlspecialchars($teacher['phone']) ?></div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4">
                                <span class="= $teacher['status'] == 'Actif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?> 
                                    px-3 py-1 rounded-full text-xs font-semibold uppercase">
                                    <?= htmlspecialchars($teacher['status']) ?>
                                </span>
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-3">
                                    <button class="text-blue-500 hover:text-blue-700 transform hover:scale-125 transition">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-500 hover:text-green-700 transform hover:scale-125 transition">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-500 hover:text-red-700 transform hover:scale-125 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <!-- Pagination élégante -->
            <div class="bg-white/60 backdrop-blur-sm px-6 py-4 flex items-center justify-between border-t border-gray-200">
                <div class="flex items-center space-x-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                        <i class="fas fa-chevron-left mr-2"></i>Précédent
                    </button>
                    <div class="flex space-x-1">
                        <button class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 text-white">1</button>
                        <button class="w-10 h-10 rounded-full hover:bg-gray-100">2</button>
                        <button class="w-10 h-10 rounded-full hover:bg-gray-100">3</button>
                    </div>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                        Suivant<i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
                <div class="text-sm text-gray-500">
                    Page 1 sur 3 - Total de 25 enseignants
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animations et effets supplémentaires */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
</style>

<script>
    // Interactions dynamiques
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.classList.add('transform', 'scale-[1.02]', 'shadow-lg');
        });
        
        row.addEventListener('mouseleave', function() {
            this.classList.remove('transform', 'scale-[1.02]', 'shadow-lg');
        });
    });
</script>




<?php
$content = ob_get_clean();
include('layout.php');
?>

