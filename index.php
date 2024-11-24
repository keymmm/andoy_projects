<?php 
session_start();
require 'views/partials/head.php';
?>
 <body class="bg-gray-100">
  <!-- Navbar -->
    <?php require 'views/partials/navbar.php'; ?>
  <!-- Hero Section -->
    <?php require 'views/partials/hero.php'; ?>
  <!-- Features Section -->
    <?php require 'views/partials/features.php'; ?>
  <!-- Popular Dishes Section -->
    <?php require 'views/partials/popular-dishes.php'; ?>
  <!-- Footer -->
    <?php require 'views/partials/footer.php'; ?>
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

