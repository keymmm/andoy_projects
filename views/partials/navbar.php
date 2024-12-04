<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isActive($page, $current_page) {
    return $page === $current_page ? 'text-green-500' : 'text-gray-500';
}

$current_page = $_SERVER['REQUEST_URI'];

?>
<nav class="bg-white ">
     <div class="max-w-6xl mx-auto px-4">
      <div class="flex justify-between">
       <div class="flex space-x-10 ">
        <div>
         <a class="flex items-center py-4 px-2" href="#">
          <span class="font-bold text-gray-500 text-lg ">
           DIWATA
          </span>
         </a>
        </div>

        <div class="hidden md:flex items-center space-x-6 " id="navbar-links">
        <a class="py-4 px-2 <?= isActive('/magdugo/index.php',$current_page) ?> text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="index.php">
            Home
         </a>
         <a class="py-4 px-2 <?= isActive('/magdugo/menu.php',$current_page) ?> text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="menu.php">
          Menu
         </a>
         <a class="py-4 px-2 <?= isActive('/magdugo/about.php',$current_page) ?> text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="#">
          About
         </a>
         <a class="py-4 px-2  <?= isActive('/magdugo/contactUs.php',$current_page) ?> text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="contactUs.php">
          Contact
         </a>
        </div>
       </div>
       
       <!-- display this if user is login -->
       <?php if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true){ ?>
          <div class="flex  px-2.5">
              <a href="cart.php" class="flex items-center ">
              <i class="fa-solid fa-cart-shopping"></i>   
              </a>   
          </div>

          <div class="relative py-3" >
        <button id="userMenuButton" class="flex items-center space-x-2">
            <img alt="User Avatar" class="h-8 w-8 rounded-full" height="30" src="image/home/Screenshot 2024-11-16 152017.png" width="30"/>
            <span><?= $_SESSION['name']; ?></span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="profile.php">View profile</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="">Dashboard</a>
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

<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");
    const navbarLinks = document.getElementById("navbar-links");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
        navbarLinks.classList.toggle("hidden");
    });

    // Dropdown for profile
    document.getElementById('userMenuButton').addEventListener('click', function () {
        let userMenu = document.getElementById('userMenu');
        userMenu.classList.toggle('hidden');
    });
</script>