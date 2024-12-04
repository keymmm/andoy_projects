
<?php
require 'db_connection/connection.php';


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_categories WHERE category_id = '$id'";
    $result = $conn->query($query);
}

?>



<?php  require 'views/partials/head.php' ?> 

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">   
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Category</h2>
        <form method="GET">
            <?php while($row = $result->fetch_assoc()) : ?>
            <div class="mb-4">
                <label for="categoryName" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="categoryName" value="<?= $row['name'] ?>" name="categoryName" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter category name" required>
            </div>
            <div class="mb-4">
                <label for="categoryDescription" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="categoryDescription"  rows="6" name="categoryDescription" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter category description" required><?= $row['description'] ?></textarea>
            </div>
            <?php endwhile ?>
            <div class="flex items-center justify-between">
                <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                 Save Changes
                </button>
                <a href="admin-dashboard.php?section=category">
                    <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Cancel
                    </button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>