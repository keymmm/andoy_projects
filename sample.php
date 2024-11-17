<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Diwata - Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
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
                <div class="flex space-x-10">
                    <div>
                        <a class="flex items-center py-4 px-2" href="#">
                            <img alt="Logo of the food ordering service" class="h-8 w-8 mr-2" height="50" src="https://storage.googleapis.com/a1aa/image/Om66ukaugoKWPhemHlnzfuy8tilKlijPfAeZKIeYVU1NWtJeE.jpg" width="50"/>
                            <span class="font-bold text-gray-500 text-lg">DIWATA</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-6" id="navbar-links">
                        <a class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="index.php">Home</a>
                        <a class="py-4 px-2 text-green-500 font-semibold hover:text-green-500 transition duration-300" href="menu.php">Menu</a>
                        <a class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="about.php">About</a>
                        <a class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300" href="contact.php">Contact</a>
                    </div>
                </div>
                <?php if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true){ ?>
                <div class="relative py-3">
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
                </div>
                <?php } else { ?>
                <div class="hidden md:flex items-center space-x-3">
                    <a class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-gray-200 transition duration-300" href="login.php">Log In</a>
                    <a class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300" href="signup.php">Sign Up</a>
                </div>
                <?php }?>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu Section -->
    <div class="bg-white py-20" id="menu">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Our Menu</h2>
                <p class="mt-4 text-gray-600">Explore our wide variety of delicious dishes.</p>
            </div>
            <div class="mb-8 flex justify-between items-center">
                <input type="text" id="searchBar" class="w-full p-4 rounded-lg border border-gray-300" placeholder="Search for food...">
                <div class="relative ml-4">
                    <button id="categoryButton" class="bg-gray-300 text-gray-700 py-2 px-10 rounded-lg focus:outline-none">
                        Sort by 
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div id="categoryMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#" data-category="all">All</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#" data-category="pizza">Pizza</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#" data-category="salad">Salad</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#" data-category="sushi">Sushi</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#" data-category="burger">Burger</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#" data-category="pasta">Pasta</a>
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#" data-category="smoothie">Smoothie</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="menuItems">
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center" data-category="pizza">
                    <img alt="A delicious pizza with various toppings" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/NnU0WHAGR44BCJFx6Ze4QAx3RKe1nv9BR3REDkCrW5k0qNxTA.jpg" width="300"/>
                    <h3 class="text-xl font-semibold text-gray-800">Pizza</h3>
                    <p class="mt-4 text-gray-600">A delicious pizza with various toppings to choose from.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-800 font-bold">$12.99</p>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md text-lg font-semibold hover:bg-green-400 transition duration-300">Add to Cart</button>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center" data-category="salad">
                    <img alt="A bowl of fresh salad with various vegetables" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/MmLYOID3ORqiEJ0sEeqceoxlmHiwxeee7rWKxpUNnFpUXtJeE.jpg" width="300"/>
                    <h3 class="text-xl font-semibold text-gray-800">Salad</h3>
                    <p class="mt-4 text-gray-600">A bowl of fresh salad with various vegetables and dressings.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-800 font-bold">$8.99</p>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md text-lg font-semibold hover:bg-green-400 transition duration-300">Add to Cart</button>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center" data-category="sushi">
                    <img alt="A plate of sushi with various types of fish" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/qy618RnaKYqgFRrgys15kRmIkhVWACFyolXkPp0vBlpsaT8E.jpg" width="300"/>
                    <h3 class="text-xl font-semibold text-gray-800">Sushi</h3>
                    <p class="mt-4 text-gray-600">A plate of sushi with various types of fish and ingredients.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-800 font-bold">Price: $15.99</p>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md text-lg font-semibold hover:bg-green-400 transition duration-300">Add to Cart</button>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center" data-category="burger">
                    <img alt="A juicy burger with cheese and vegetables" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/3G8vG8GFNIrxIlqjpQTu0ajtx8cWpYHya7ZfO1sehLIo2lxTA.jpg" width="300"/>
                    <h3 class="text-xl font-semibold text-gray-800">Burger</h3>
                    <p class="mt-4 text-gray-600">A juicy burger with cheese, lettuce, and tomatoes.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-800 font-bold">$10.99</p>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md text-lg font-semibold hover:bg-green-400 transition duration-300">Add to Cart</button>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center" data-category="pasta">
                    <img alt="A bowl of pasta with tomato sauce and basil" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/4G8vG8GFNIrxIlqjpQTu0ajtx8cWpYHya7ZfO1sehLIo2lxTA.jpg" width="300"/>
                    <h3 class="text-xl font-semibold text-gray-800">Pasta</h3>
                    <p class="mt-4 text-gray-600">A bowl of pasta with rich tomato sauce and fresh basil.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-800 font-bold">$11.99</p>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md text-lg font-semibold hover:bg-green-400 transition duration-300">Add to Cart</button>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center" data-category="smoothie">
                    <img alt="A refreshing smoothie with berries and mint" class="w-full h-48 object-cover rounded-lg mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/5G8vG8GFNIrxIlqjpQTu0ajtx8cWpYHya7ZfO1sehLIo2lxTA.jpg" width="300"/>
                    <h3 class="text-xl font-semibold text-gray-800">Smoothie</h3>
                    <p class="mt-4 text-gray-600">A refreshing smoothie made with fresh berries and mint.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-800 font-bold">$6.99</p>
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md text-lg font-semibold hover:bg-green-400 transition duration-300">Add to Cart</button>
                    </div>
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
                        <span class="font-semibold text-gray-500 text-lg">Diwata</span>
                    </a>
                    <p class="mt-4 text-gray-600">© <?= date('Y')?> Diwata. All rights reserved.</p>
                </div>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a class="text-gray-500 hover:text-green-500 transition duration-300" href="https://web.facebook.com/quem.magdugo.7927">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-gray-500 hover:text-green-500 transition duration-300" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-gray-500 hover:text-green-500 transition duration-300" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-gray-500 hover:text-green-500 transition duration-300" href="#">
                        <i class="fab fa-linkedin-in"></i>
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

        // Search functionality
        const searchBar = document.getElementById('searchBar');
        const menuItems = document.getElementById('menuItems').children;

        searchBar.addEventListener('input', function() {
            const searchTerm = searchBar.value.toLowerCase();
            Array.from(menuItems).forEach(item => {
                const itemName = item.querySelector('h3').textContent.toLowerCase();
                if (itemName.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Dropdown functionality
        const categoryButton = document.getElementById('categoryButton');
        const categoryMenu = document.getElementById('categoryMenu');
        const categoryLinks = categoryMenu.querySelectorAll('a');

        categoryButton.addEventListener('click', () => {
            categoryMenu.classList.toggle('hidden');
        });

        categoryLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const category = link.getAttribute('data-category');
                Array.from(menuItems).forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
                categoryMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>