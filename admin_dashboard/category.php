<?php
global $conn;
require 'db_connection/connection.php';

function searchMenu($conn, $searchItem){
    $query = "SELECT * FROM tbl_categories
        WHERE name LIKE ? OR description LIKE ?";
    $searchPattern = "%" . $searchItem . "%";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $searchPattern, $searchPattern);
    $stmt->execute();
    return $stmt->get_result();
}

function defaultMenu($conn){
    $sqlQuery = "SELECT * FROM tbl_categories ORDER BY category_id";
    return $conn->query($sqlQuery);
}

if (isset($_GET['search_menu']) and $_GET['search_menu'] != '') {
    $searchItem = $_GET['search_menu'];
    $result = searchMenu($conn, $searchItem);
} else {
    $result = defaultMenu($conn);
}

?>

<div class="p-4 sm:ml-64">


    <div class="flex justify-between items-center mb-6">
        <!-- Search Form -->
        <form method="GET" action="" class="relative">
            <input type="hidden" name="section" value="category">
            <input
                name="search_menu"
                class="border-2 border-gray-300 rounded-lg py-2 px-4 w-64"
                placeholder="Search category"
                type="text"
            />

            <button type="submit" class="absolute right-3 top-3.5 text-gray-500">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        <a href="add-category.php">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Category </button>
        </a>
    </div>




    <div class="p-4 border-2  border-gray-200 rounded-lg dark:border-gray-700">


        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-green-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody >
                <?php
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {?>
                <tr>
                    <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['category_id'] ?></td>
                    <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['name'] ?></td>
                    <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['description'] ?></td>
                    <td class="flex px-4 py-6">
                        <a href="update_category.php?id=<?= $row['category_id'] ?>" class="px-2">
                            <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue"></i>
                        </a>
                        <a href="delete_category.php?id=<?= $row['category_id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">
                            <i class="fa-solid fa-trash fa-xl" style="color: red"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                <?php  } }?>
            </table>
        </div>

    </div>
</div>