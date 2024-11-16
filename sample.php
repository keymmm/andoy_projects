<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Food Delivery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-white">
<header class="flex items-center justify-between p-6">
    <div class="flex items-center">
        <img alt="Logo" class="h-10 w-10" height="50" src="https://storage.googleapis.com/a1aa/image/Rj9qILfa4M1pGKqSXVD7cKXHGpHLFtr7Gaee0u1VMUJ4IBjnA.jpg" width="50"/>
        <span class="ml-3 text-xl font-bold">DIWATA</span>
    </div>
    <nav class="flex items-center space-x-6">
        <a class="text-green-500 font-bold" href="#">Home</a>
        <a class="text-gray-700" href="#">Menu</a>
        <a class="text-gray-700" href="#">About</a>
        <a class="text-gray-700" href="#">Contact</a>
    </nav>
    <div class="relative">
        <button id="userMenuButton" class="flex items-center space-x-2">
            <img alt="User Avatar" class="h-8 w-8 rounded-full" height="30" src="https://storage.googleapis.com/a1aa/image/MhOWhzskvkraFN4R8Ir0PAEi0nJQfFF5M6b1ZAXRhpBPSw4JA.jpg" width="30"/>
            <span>Guest</span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">View profile</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">Dashboard</a>
            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">Logout</a>
        </div>
    </div>
</header>
<main class="flex items-center justify-between px-24 py-12">
    <div class="max-w-lg">
        <h1 class="text-5xl font-bold text-gray-900">Delicious Food Delivered To You</h1>
        <p class="mt-4 text-lg text-gray-600">Order your favorite meals from the best restaurants in town and get them delivered to your doorstep.</p>
        <button class="mt-6 px-6 py-3 bg-green-500 text-white text-lg font-bold rounded-lg">Order Now</button>
    </div>
    <div>
        <img alt="Delicious burger with lettuce, cheese, and tomato" class="h-96 w-96" height="600" src="https://storage.googleapis.com/a1aa/image/6mTrX3Y3k9bKGhicNfwW5Sf3C1ouVzEaX80CdBKidnidkgxTA.jpg" width="600"/>
    </div>
</main>
<script>
    document.getElementById('userMenuButton').addEventListener('click', function() {
        var userMenu = document.getElementById('userMenu');
        userMenu.classList.toggle('hidden');
    });
</script>
</body>
</html>