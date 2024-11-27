
<?php 

    require 'db_connection/connection.php';

    function selectCategory($conn){
        $query = "SELECT category_id, name FROM tbl_categories";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            return $result;
        }
    } 

    function addNewMenu($conn, $name , $description, $category_id, $price){
        $query = "INSERT INTO tbl_menu (name, description, category_id, price) VALUES (?, ? , ? , ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssid',$name, $description, $category_id, $price );
        $stmt->execute();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])){
        $name = $_POST['menu_name'];
        $category_id = $_POST['category'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        addNewMenu($conn, $name, $description, $category_id, $price);
        header("location: admin-dashboard.php?menu");
    }


?>


<?php require 'views/partials/head.php'; ?> 
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-6 py-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-6">Add New Menu Item</h2>
                <form method="post">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="menu" class="block text-gray-700">Name</label>
                            <input type="text" id="name" name="menu_name" class="w-full mt-2 p-2 border border-gray-300 rounded-md" placeholder="Enter menu item name" required>
                        </div>
                        <div>
                             <label for="category" class="block text-gray-700">Category</label>
                             <select id="category" name="category" required class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                                <option value="">Select category</option>
                        <?php  
                                 $category = selectCategory($conn);
                    
                                    while($row = $category->fetch_assoc()){ ?>                                      
                                        <option value="<?= $row['category_id'] ?>" ><?= $row['name'] ?></option>
                                <?php } ?>  
                               </select>  
                        </div>
                        <div>
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" id="price" name="price" class="w-full mt-2 p-2 border border-gray-300 rounded-md" placeholder="Enter price" required>
                        </div>
                        <div>
                            <label for="image" class="block text-gray-700">Menu Image</label>
                            <input type="file" id="image" class="w-full mt-2 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="md:col-span-2">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea id="description" name="description" class="w-full mt-2 p-2 border border-gray-300 rounded-md" rows="4" placeholder="Enter description" required></textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Menu Item
                        </button>
                        <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 flex items-center">
                             <i class="fas fa-undo mr-2"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </main>

</body>
</html>