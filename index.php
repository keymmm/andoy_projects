<?php  session_start();  ?>

<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Diwata
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Poppins', sans-serif;
        }
  </style>
 </head>
 <body class="bg-gray-100">
  <!-- Navbar -->
     <nav class="bg-white shadow-lg">
     <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between">
       <div class="flex space-x-10 ">
        <div>
         <a class="flex items-center py-4 px-2" href="#">
          <img alt="Logo of the food ordering service" class="h-8 w-8 mr-2" height="50" src="https://storage.googleapis.com/a1aa/image/Om66ukaugoKWPhemHlnzfuy8tilKlijPfAeZKIeYVU1NWtJeE.jpg" width="50"/>
          <span class="font-bold text-gray-500 text-lg ">
           DIWATA
          </span>
         </a>
        </div>

        <div class="hidden md:flex items-center space-x-6 " id="navbar-links">
         <a class="py-4 px-2  <?php if($current_page === '/index.php'){
                echo 'text-green-500';
            } else { echo 'text-green-500';} ?>  font-semibold hover:text-green-500 transition duration-300 " href="">
          Home
         </a>
         <a class="py-4 px-2 rounded-lg text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="menu.php">
          Menu
         </a>
         <a class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="#">
          About
         </a>
         <a class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="#">
          Contact
         </a>
        </div>
       </div>
       
       <!-- display this if user is login -->
       <?php if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true){ ?>
       
        <div class="relative py-3" >
        <button id="userMenuButton" class="flex items-center space-x-2">
            <img alt="User Avatar" class="h-8 w-8 rounded-full" height="30" src="image/home/Screenshot 2024-11-16 152017.png" width="30"/>
            <span><?= $_SESSION['name']; ?></span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">View profile</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">Dashboard</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="logout.php">Logout</a>
        </div>
    
        <!-- display this  is user is not login -->
        <?php } else { ?> 

            <div class="hidden md:flex items-center space-x-3 ">
                <a class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-gray-200 transition duration-300" href="login.php">
                 Log In
                </a>
                <a class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300" href="signup.php">
                 Sign Up
                </a>
            </div>

        <?php }?>
        
        
        



       <div class="md:hidden flex items-center">
        <button class="outline-none mobile-menu-button">
         <i class="fas fa-bars">
         </i>
        </button>
       </div>
      </div>
     </div>
    </nav>
  <!-- Hero Section -->
  <div class="bg-white py-10">
   <div class="max-w-6xl mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center">
     <div class="md:w-1/2">
      <h1 class="text-4xl md:text-6xl font-bold text-gray-800 leading-tight">
       Delicious Food Delivered To You
      </h1>
      <p class="mt-4 text-gray-600">
       Order your favorite meals from the best restaurants in town and get them delivered to your doorstep.
      </p>
      <div class="mt-8">
       <a class="bg-green-500 text-white py-3 px-6 rounded-md text-lg font-semibold hover:bg-green-400 transition duration-300" href="#">
        Order Now
       </a>
      </div>
     </div>
     <div class="md:w-1/2 mt-10 md:mt-0">
      <img alt="A variety of delicious food items displayed attractively" height="400" src="image/home/burger.png" width="600"/>
     </div>
    </div>
   </div>
  </div>
  <!-- Features Section -->
  <div class="bg-gray-100 py-20">
   <div class="max-w-6xl mx-auto px-4">
    <div class="text-center mb-12">
     <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
      Why Choose Us
     </h2>
     <p class="mt-4 text-gray-600">
      We offer the best food delivery service with a wide variety of options to choose from.
     </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
     <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <i class="fas fa-utensils text-green-500 text-4xl mb-4">
      </i>
      <h3 class="text-xl font-semibold text-gray-800">
       Wide Variety
      </h3>
      <p class="mt-4 text-gray-600">
       Choose from a wide range of cuisines and dishes to satisfy your cravings.
      </p>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <i class="fas fa-shipping-fast text-green-500 text-4xl mb-4">
      </i>
      <h3 class="text-xl font-semibold text-gray-800">
       Fast Delivery
      </h3>
      <p class="mt-4 text-gray-600">
       Get your food delivered to you quickly and efficiently.
      </p>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <i class="fas fa-star text-green-500 text-4xl mb-4">
      </i>
      <h3 class="text-xl font-semibold text-gray-800">
       Top Quality
      </h3>
      <p class="mt-4 text-gray-600">
       We partner with the best restaurants to ensure top quality food.
      </p>
     </div>
    </div>
   </div>
  </div>
  <!-- Popular Dishes Section -->
  <div class="bg-white py-20" id="pospular-dish">
   <div class="max-w-6xl mx-auto px-4">
    <div class="text-center mb-12">
     <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
      Popular Dishes
     </h2>
     <p class="mt-4 text-gray-600">
      Check out some of our most popular dishes that our customers love.
     </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
     <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
      <img alt="A delicious pizza with various toppings" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/NnU0WHAGR44BCJFx6Ze4QAx3RKe1nv9BR3REDkCrW5k0qNxTA.jpg" width="300"/>
      <h3 class="text-xl font-semibold text-gray-800">
       Pizza
      </h3>
      <p class="mt-4 text-gray-600">
       A delicious pizza with various toppings to choose from.
      </p>
     </div>
     <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
      <img alt="A bowl of fresh salad with various vegetables" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/MmLYOID3ORqiEJ0sEeqceoxlmHiwxeee7rWKxpUNnFpUXtJeE.jpg" width="300"/>
      <h3 class="text-xl font-semibold text-gray-800">
       Salad
      </h3>
      <p class="mt-4 text-gray-600">
       A bowl of fresh salad with various vegetables and dressings.
      </p>
     </div>
     <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
      <img alt="A plate of sushi with various types of fish" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/qy618RnaKYqgFRrgys15kRmIkhVWACFyolXkPp0vBlpsaT8E.jpg" width="300"/>
      <h3 class="text-xl font-semibold text-gray-800">
       Sushi
      </h3>
      <p class="mt-4 text-gray-600">
       A plate of sushi with various types of fish and ingredients.
      </p>
     </div>
    </div>
   </div>
  </div>
  <!-- Testimonials Section -->
  <div class="bg-gray-100 py-20">
   <div class="max-w-6xl mx-auto px-4">
    <div class="text-center mb-12">
     <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
      What Our Customers Say
     </h2>
     <p class="mt-4 text-gray-600">
      Hear from our satisfied customers who love our service.
     </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
     <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <img alt="Portrait of a happy customer" class="w-24 h-24 rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/FYfngjfDNysdXUlvVM547jENcqqdcE2TRD2iyOJSYbfxVbinA.jpg" width="100"/>
      <h3 class="text-xl font-semibold text-gray-800">
       John Doe
      </h3>
      <p class="mt-4 text-gray-600">
       "The food was amazing and the delivery was super fast. Highly recommend!"
      </p>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <img alt="Portrait of a satisfied customer" class="w-24 h-24 rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/tGfzPaG8NH2rAyVeRFbYH5qhDJFGf7FRu5jsO4DMdn3nVbinA.jpg" width="100"/>
      <h3 class="text-xl font-semibold text-gray-800">
       Jane Smith
      </h3>
      <p class="mt-4 text-gray-600">
       "Great variety of dishes and excellent quality. Will order again!"
      </p>
     </div>
     <div class="bg-white p-6 rounded-lg shadow-lg text-center">
      <img alt="Portrait of a delighted customer" class="w-24 h-24 rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/f5PwAv7txHzPPCAsdasj1X1YojNFlWIMkZDVfhpY9bY2qNxTA.jpg" width="100"/>
      <h3 class="text-xl font-semibold text-gray-800">
       Emily Johnson
      </h3>
      <p class="mt-4 text-gray-600">
       "The best food delivery service I've ever used. Highly recommend to everyone!"
      </p>
     </div>
    </div>
   </div>
  </div>
  <!-- Footer -->
  <footer class="bg-white py-8">
   <div class="max-w-6xl mx-auto px-4">
    <div class="flex flex-col md:flex-row justify-between items-center">
     <div class="text-center md:text-left">
      <a class="flex items-center py-4 px-2" href="#">
       <img alt="Logo of the food ordering service" class="h-8 w-8 mr-2" height="50" src="https://storage.googleapis.com/a1aa/image/Om66ukaugoKWPhemHlnzfuy8tilKlijPfAeZKIeYVU1NWtJeE.jpg" width="50"/>
       <span class="font-semibold text-gray-500 text-lg">
        Diwata
       </span>
      </a>
      <p class="mt-4 text-gray-600">
       © <?= date('Y')?> Diwata. All rights reserved.
      </p>
     </div>
     <div class="flex space-x-4 mt-4 md:mt-0">
      <a class="text-gray-500 hover:text-green-500 transition duration-300" href="https://web.facebook.com/quem.magdugo.7927">
       <i class="fab fa-facebook-f">
       </i>
      </a>
      <a class="text-gray-500 hover:text-green-500 transition duration-300" href="">
       <i class="fab fa-twitter">
       </i>
      </a>
      <a class="text-gray-500 hover:text-green-500 transition duration-300" href="#">
       <i class="fab fa-instagram">
       </i>
      </a>
      <a class="text-gray-500 hover:text-green-500 transition duration-300" href="#">
       <i class="fab fa-linkedin-in">
       </i>
      </a>
     </div>
    </div>
   </div>
  </footer>

  <script>
   const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");
        const navbarLinks = document.getElementById("navbar-links");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
            navbarLinks.classList.toggle("hidden");
        });

    //drop down for profile   
    document.getElementById('userMenuButton').addEventListener('click', function() {
        let userMenu = document.getElementById('userMenu');
        userMenu.classList.toggle('hidden');
    });


  </script>
 </body>
</html>