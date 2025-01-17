<?php
// courses.php
$courses = [
    [
        "title" => "iOS & Swift - The Complete iOS App Development Bootcamp",
        "instructor" => "Jacob Sayuri",
        "level" => "Advance",
        "rating" => 5.0,
        "hours" => 14,
        "price" => 13.00,
        "image" => "path/to/ios-course-image.jpg"
    ],
    // Add other courses similarly
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de cours de programmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Programming Language</h1>
            <div class="text-blue-600">Checkout New List</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($courses as $course): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Card Image -->
                <div class="relative h-48">
                    <img src="<?php echo htmlspecialchars($course['image']); ?>" 
                         alt="<?php echo htmlspecialchars($course['title']); ?>"
                         class="w-full h-full object-cover">
                    <button class="absolute top-4 right-4 p-2 rounded-full bg-white">
                        <svg class="w-6 h-6 text-gray-400 hover:text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                    
                    <!-- Instructor -->
                    <div class="absolute bottom-4 left-4 flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-full bg-gray-200"></div>
                        <span class="text-white font-medium"><?php echo htmlspecialchars($course['instructor']); ?></span>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <?php echo htmlspecialchars($course['title']); ?>
                    </h3>

                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">
                                <?php echo htmlspecialchars($course['level']); ?>
                            </span>
                            <span class="text-sm text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                                <?php echo $course['hours']; ?>
                            </span>
                            <span class="text-sm text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <?php echo number_format($course['rating'], 1); ?>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-900">
                            $<?php echo number_format($course['price'], 2); ?>
                        </span>
                        <button class="text-blue-600 hover:text-blue-800 flex items-center">
                            Add to cart
                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>