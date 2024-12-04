
<?php 

    require 'db_connection/connection.php';

    function selectCategory($conn, $categoryId){
        $query = "SELECT category_id, name FROM tbl_categories WHERE category_id <> $categoryId";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            return $result;
        }
    }

    function updateMenu($conn, $name,$description, $category_id, $price, $menu_id  ){
        $query = "UPDATE tbl_menu SET name = ? , description = ?, category_id = ?,price = ? 
        WHERE menu_id = ? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssidi', $name, $description, $category_id , $price, $menu_id);
        if($stmt->execute()){
            echo "<script>alert('succsfully update menu')</script>";
            header("location :  admin-dashboard.php?section=menu");
            exit;
        }

    }


    if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT a.name, a.description, a.category_id,  b.name as category_name, a.price FROM tbl_menu a
                INNER JOIN tbl_categories b ON a.category_id = b.category_id WHERE menu_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
       
    }

    if(isset($_POST['submit'])){
        $menu_id = $_GET['id'];
        $name = $_POST['menu_name'];
        $description = $_POST['description'];
        $category= $_POST['category'];
        $price = floatval($_POST['price']);

        updateMenu($conn, $name, $description, $category, $price, $menu_id);
       
    }


?>


<?php  require 'views/partials/head.php' ?>
    
</body>
</html>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-6 py-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-6">Add New Menu Item</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <?php while($row = $result->fetch_assoc()) { ?>
                        <div>
                            <label for="menu" class="block text-gray-700">Name</label>
                            <input type="text" id="name" name="menu_name" value="<?= $row['name'] ?>" class="w-full mt-2 p-2 border border-gray-300 rounded-md" placeholder="Enter menu item name" required>
                        </div>
                        <div>
                             <label for="category" class="block text-gray-700">Category</label>
                             <select id="category" name="category" required class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                                <option value="<?php $row['category_id'] ?>"><?php $row['category_name']  ?></option>   
                                <?php 

                                $categories = selectCategory($conn, $_GET['id']); 
                                while ($ca = $categories->fetch_assoc()): ?>
                                        <option value="<?= $ca['category_id'] ?>"><?= $ca['name'] ?></option>
                                <?php endwhile ?>
                            
                            </select>  
                        </div>

                    
                                        
                        <div>
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" id="price" name="price"  value="<?= $row['price'] ?>"   class="w-full mt-2 p-2 border border-gray-300 rounded-md"placeholder="Enter price" required step="any">
                        </div>
                        <div>
                            <label for="image" class="block text-gray-700">Menu Image</label>
                            <input type="file" id="image" name="menu_image" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="md:col-span-2">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea id="description" name="description"  class="w-full mt-2 p-2 border border-gray-300 rounded-md" rows="4" placeholder="Enter description" required><?= $row['description'] ?></textarea>
                        </div>
                    </div>
                <?php } ?>
                    <div class="mt-6 flex justify-between">
                        <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                            <i class="fas fa-plus mr-2"></i> Save changes
                        </button>
                        <a href="admin-dashboard.php?section=menu">
                            <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 flex items-center">
                                <i class="fas fa-undo mr-2"></i> Cancel
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </main>

</body>
</html>