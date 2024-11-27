<?php  
session_start();
require 'db_connection/connection.php';

$searchTerm = '';

if (isset($_POST['search']) && !empty($_POST['search_term'])) {
    $searchTerm = htmlspecialchars($_POST['search_term']); 
    $sqlQuery = "SELECT * FROM tbl_menu WHERE name LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sqlQuery);
    $searchPattern = "%" . $searchTerm . "%";
    $stmt->bind_param("ss", $searchPattern, $searchPattern);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Default query to show all items
    $sqlQuery = "SELECT * FROM tbl_menu";
    $result = $conn->query($sqlQuery);
}
?>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Diwata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/21b39866b0.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<?php require 'views/partials/navbar.php'; ?>

<main class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <!-- Search Form -->
        <form method="POST" action="" class="relative">
            <input
                name="search_term"
                value="<?= htmlspecialchars($searchTerm); ?>"
                class="border border-gray-300 rounded-lg py-2 px-4 w-64"
                placeholder="Search menu"
                type="text"
            />
            <button type="submit" name="search" class="absolute right-2 top-3 text-gray-500">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Menu Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <img
                    alt="<?= $row['name'] ?>"
                    class="w-full h-48 object-cover rounded-t-lg"
                    src="image/home/Screenshot 2024-11-16 152017.png"
                />
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?= $row['name'] ?></h3>
                    <p class="text-gray-700 mb-4"><?= $row['description'] ?></p>
                    <div class="flex space-x-24">
                    <p class="text-blue-600 font-bold">$<?= $row['price'] ?></p>

                    <form method="POST" action="">
                        <input type="hidden" name="item_id" value="<?= $row['menu_id'] ?>">
                        <input type="hidden" name="item_name" value="<?= $row['name'] ?>">
                        <input type="hidden" name="item_price" value="<?= $row['price'] ?>">
                        <input type="hidden" name="item_description" value="<?= $row['description'] ?>">
                        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-full text-sm px-5 py-2.5">
                            Add to Cart
                        </button>
                    </form>
 
                    
                </div>
            </div>
        <?php }
    } else { ?>
        <p class="text-gray-500">No menu items found for "<?= htmlspecialchars($searchTerm); ?>"</p>
    <?php } ?>
    </div>
</main>

<!-- Footer -->
<!-- <?php require 'views/partials/footer.php'; ?> -->

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

</body>
</html>
