<?php  

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
    $sqlQuery = "SELECT * FROM tbl_menu";
    $result = $conn->query($sqlQuery);
}
?>
<?php require 'views/partials/head.php' ?>
<body class="bg-gray-100">
<!-- Navbar -->
<?php require 'views/partials/navbar.php'; ?>

<main class="container mx-auto py-8 p-14">
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
                <!-- display the menu -->
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img
                        alt="Placeholder image for Veggie Wrap"
                        class="w-full h-48 object-cover rounded-t-lg"
                        height="400"
                        src="image/home/Screenshot 2024-11-16 152017.png"
                        width="600" />
                        <div class="p-4">
                        <h2 class="text-xl font-bold mb-2"><?= $row['name'] ?></h2>
                        <p class="text-gray-700 mb-4">
                            <?= $row['description'] ?>
                        </p>
                        <p class="text-lg font-bold mb-4">₱<?= $row['price'] ?></p>
                        <button class="w-full bg-green-500 text-white hover:bg-green-700 py-2 rounded-lg">
                            Add to Cart
                        </button>
                        </div>
                </div>

            
         <?php }
        } else { ?>
        <p class="text-gray-500">No menu items found for "<?= htmlspecialchars($searchTerm); ?>"</p>
        <?php } ?> 
    
    </div>
    
    
</main>




<!-- Footer -->
<?php require 'views/partials/footer.php'; ?>


</body>
</html>
