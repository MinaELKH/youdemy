<?php 
    require_once  'autoloader.php';
?>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   EduMall
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="font-sans antialiased">
  <!-- Navbar -->
  <nav class="bg-white shadow-md fixed w-full z-10 top-0">
   <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-4">
     <img alt="EduMall Logo" class="h-10" src="https://placehold.co/40x40"/>
     <span class="text-xl font-bold">
      EduMall
     </span>
    </div>
    <div class="flex items-center space-x-4">
     <a class="text-gray-700" href="#">
      Category
     </a>
     <div class="relative">
      <input class="border rounded-full py-2 px-4 pl-10" placeholder="Search..." type="text"/>
      <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
      </i>
     </div>
     <a class="text-gray-700" href="#">
      Demo
     </a>
     <a class="text-gray-700" href="#">
      Become an Instructor
     </a>
     <a class="text-gray-700" href="#">
      <i class="fas fa-shopping-cart">
      </i>
     </a>
     <a class="text-gray-700" href="#">
      Log In
     </a>
     <a class="bg-blue-500 text-white py-2 px-4 rounded-full" href="#">
      Sign Up
     </a>
    </div>
   </div>
  </nav>
  <!-- Hero Section -->
  <section class="bg-gray-50 py-16 mt-16">
   <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center">
    <div class="lg:w-1/2">
     <h2 class="text-blue-600 text-sm font-semibold">
      START TO SUCCESS
     </h2>
     <h1 class="text-4xl font-bold mt-2">
      Access To
      <span class="text-blue-500">
       5500+
      </span>
      Courses from
      <span class="text-blue-500">
       480
      </span>
      Instructors &amp; Institutions
     </h1>
     <p class="text-gray-600 mt-4">
      Take your learning organisation to the next level.
     </p>
     <div class="relative mt-6">
      <input class="w-full border rounded-full py-3 px-4 pl-10" placeholder="What do you want to learn?" type="text"/>
      <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
      </i>
     </div>
    </div>
    <div class="lg:w-1/2 mt-8 lg:mt-0 flex flex-col space-y-4">
     <div class="flex space-x-4">
      <img alt="Two people discussing" class="w-1/2 rounded-lg" src="https://placehold.co/200x200"/>
      <img alt="Woman working on laptop" class="w-1/2 rounded-lg" src="https://placehold.co/200x200"/>
     </div>
     <div class="flex space-x-4">
      <img alt="Woman studying" class="w-1/2 rounded-lg" src="https://placehold.co/200x200"/>
      <div class="bg-white shadow-lg rounded-lg p-4 flex items-center">
       <i class="fas fa-bell text-yellow-500 text-2xl">
       </i>
       <div class="ml-4">
        <p class="text-gray-700">
         Tomorrow is our
         <span class="font-bold">
          "When I Grow Up" Spirit Day!
         </span>
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
  </section>
  <!-- Features Section -->
  <section class="bg-blue-500 py-8">
   <div class="container mx-auto px-4 flex flex-wrap justify-around text-white">
    <div class="flex flex-col items-center space-y-2">
     <i class="fas fa-brain text-4xl">
     </i>
     <p class="text-center">
      Learn The Essential Skills
     </p>
    </div>
    <div class="flex flex-col items-center space-y-2">
     <i class="fas fa-certificate text-4xl">
     </i>
     <p class="text-center">
      Earn Certificates And Degrees
     </p>
    </div>
    <div class="flex flex-col items-center space-y-2">
     <i class="fas fa-briefcase text-4xl">
     </i>
     <p class="text-center">
      Get Ready for The Next Career
     </p>
    </div>
    <div class="flex flex-col items-center space-y-2">
     <i class="fas fa-star text-4xl">
     </i>
     <p class="text-center">
      Master at Different Areas
     </p>
    </div>
   </div>
  </section>


  >
  <!-- Categories Section -->
  <section class="bg-white py-16">
   <div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-8">
     Top
     <span class="text-yellow-500">
      Categories
     </span>
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-paint-brush text-2xl mb-2">
      </i>
      <p>
       Art &amp; Design
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-code text-2xl mb-2">
      </i>
      <p>
       Development
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-sun text-2xl mb-2">
      </i>
      <p>
       Lifestyle
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-user text-2xl mb-2">
      </i>
      <p>
       Personal Development
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-briefcase text-2xl mb-2">
      </i>
      <p>
       Business
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-chart-line text-2xl mb-2">
      </i>
      <p>
       Finance
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-bullhorn text-2xl mb-2">
      </i>
      <p>
       Marketing
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-camera text-2xl mb-2">
      </i>
      <p>
       Photography
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-database text-2xl mb-2">
      </i>
      <p>
       Data Science
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-heartbeat text-2xl mb-2">
      </i>
      <p>
       Health &amp; Fitness
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-music text-2xl mb-2">
      </i>
      <p>
       Music
      </p>
     </div>
     <div class="bg-gray-100 p-4 rounded-lg text-center">
      <i class="fas fa-chalkboard-teacher text-2xl mb-2">
      </i>
      <p>
       Teaching &amp; Academics
      </p>
     </div>
    </div>
   </div>
  </section>
  <!-- Students are Viewing Section -->
  <section class="bg-white py-16">
   <div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-8">
     Students are
     <span class="text-yellow-500">
      Viewing
     </span>
    </h2>
    <div class="flex space-x-4 mb-8">
     <button class="bg-blue-500 text-white py-2 px-4 rounded-full">
      All
     </button>
     <button class="text-gray-600 py-2 px-4">
      Trending
     </button>
     <button class="text-gray-600 py-2 px-4">
      Popularity
     </button>
     <button class="text-gray-600 py-2 px-4">
      Featured
     </button>
     <button class="text-gray-600 py-2 px-4">
      Art &amp; Design
     </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
     <!-- Course Card -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Salmon Sashimi Served With Mushrooms and Greens" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-red-500 text-white text-xs py-1 px-2 rounded-full">
        FEATURED
       </span>
       <span class="bg-blue-500 text-white text-xs py-1 px-2 rounded-full">
        -14%
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Salmon Sashimi Served With Mushrooms and Greens
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $19.00
       </span>
       <span class="text-gray-500 line-through">
        $21.99
       </span>
      </div>
     </div>
     <!-- Repeat similar blocks for other courses -->
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Family Meals Are Rich In Nutrition" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-green-500 text-white text-xs py-1 px-2 rounded-full">
        FREE
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Family Meals Are Rich In Nutrition
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-green-500 font-bold">
        Free
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Healthy Vegetarian Dishes Come From" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-green-500 text-white text-xs py-1 px-2 rounded-full">
        Intermediate
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Healthy Vegetarian Dishes Come From
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $32.99
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Healthy Sauces From Fruits and Vegetables" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-red-500 text-white text-xs py-1 px-2 rounded-full">
        -45%
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Healthy Sauces From Fruits and Vegetables
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $54.00
       </span>
       <span class="text-gray-500 line-through">
        $98.99
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Essential Cooking Skills" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-red-500 text-white text-xs py-1 px-2 rounded-full">
        FEATURED
       </span>
       <span class="bg-blue-500 text-white text-xs py-1 px-2 rounded-full">
        -40%
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Essential Cooking Skills
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $18.00
       </span>
       <span class="text-gray-500 line-through">
        $29.99
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Advanced Cooking Course For Adults" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-green-500 text-white text-xs py-1 px-2 rounded-full">
        All Levels
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Advanced Cooking Course For Adults
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $15.00
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Avocado Salad Helps Reduce Heat and Beautify" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-green-500 text-white text-xs py-1 px-2 rounded-full">
        Intermediate
       </span>
       <span class="bg-blue-500 text-white text-xs py-1 px-2 rounded-full">
        -32%
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Avocado Salad Helps Reduce Heat and Beautify
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $15.00
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Brain Power Blueberry Smoothie" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-red-500 text-white text-xs py-1 px-2 rounded-full">
        FEATURED
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Brain Power Blueberry Smoothie
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $97.99
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Fashion Design Course For Children" class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-red-500 text-white text-xs py-1 px-2 rounded-full">
        FEATURED
       </span>
       <span class="bg-blue-500 text-white text-xs py-1 px-2 rounded-full">
        -15%
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Fashion Design Course For Children
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-red-500 font-bold">
        $29.00
       </span>
       <span class="text-gray-500 line-through">
        $33.99
       </span>
      </div>
     </div>
     <div class="bg-white p-4 rounded-lg shadow-lg">
      <img alt="Computer Science: Mathematical and..." class="rounded-lg mb-4" src="https://placehold.co/300x200"/>
      <div class="flex justify-between items-center mb-2">
       <span class="bg-green-500 text-white text-xs py-1 px-2 rounded-full">
        FREE
       </span>
      </div>
      <h3 class="text-lg font-bold">
       Computer Science: Mathematical and...
      </h3>
      <p class="text-gray-600">
       Owen Christ
      </p>
      <div class="flex justify-between items-center mt-4">
       <span class="text-green-500 font-bold">
        Free
       </span>
      </div>
     </div>
    </div>
   </div>
  </section>
 </body>
</html>

