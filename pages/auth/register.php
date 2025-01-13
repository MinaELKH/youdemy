<html lang="fr">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Udemy Clone
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <script>
   function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
  </script>
  <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  <!-- Sign Up Form -->
  <div class=" x-auto flex flex-col md:flex-row w-full max-w-4xl bg-white shadow-md rounded-lg overflow-hidden mx-auto mt-10">
   <div class="w-full md:w-1/2 p-8">
    <h2 class="text-2xl font-bold text-gray-900 mb-2">
     Sign up for an account
    </h2>
    <p class="text-sm text-gray-600 mb-6">
     Already a member?
     <a class="text-indigo-600" href="#">
      Sign in
     </a>
    </p>
    <form action="controllerAuth.php" enctype="multipart/form-data" method="POST">
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="name">
        Name
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="first_name" name="name" type="text"/>
     </div>
      <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="email">
       Email address
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="email" name="email" type="email"/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="password">
       Password
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="password" name="password" type="password"/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="confirm_password">
       Confirm Password
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="confirm_password" name="confirm_password" type="password"/>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="role">
       Role
      </label>
      <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="role" name="role">
       <option value="student">
        Student
       </option>
       <option value="teacher">
        Teacher
       </option>
      </select>
     </div>
     <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700" for="avatar">
       Avatar
      </label>
      <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="avatar" name="avatar" type="file"/>
     </div>
  
     <div>
      <button name="signup" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
       Sign up
      </button>
     </div>
     <div class="mt-6 flex items-center justify-center">
      <div class="border-t border-gray-300 w-full">
      </div>
      <div class="text-sm text-gray-500 px-2">
       Or continue with
      </div>
      <div class="border-t border-gray-300 w-full">
      </div>
     </div>
     <div class="mt-6 grid grid-cols-2 gap-3">
      <div>
       <a class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50" href="#">
        <img alt="Google logo" class="w-5 h-5 mr-2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png"/>
        Google
       </a>
      </div>
      <div>
       <a class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50" href="#">
        <img alt="GitHub logo" class="w-5 h-5 mr-2" src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png"/>
        GitHub
       </a>
      </div>
     </div>
    </form>
   </div>
   <div class="w-full md:w-1/2 hidden md:block">
    <img alt="A desk setup with a laptop, keyboard, mouse, and other office items" class="w-full h-full object-cover" src="https://placehold.co/600x800"/>
   </div>
  </div>
 </body>
</html>
