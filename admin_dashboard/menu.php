<?php
//global $conn;
require 'db_connection/connection.php';

function searchMenu($conn, $searchItem){
    $query = "SELECT a.menu_id, a.name, a.description,  b.name as category_name, a.price FROM tbl_menu a
        INNER JOIN tbl_categories b ON a.category_id = b.category_id
        WHERE a.name LIKE ?";
    $searchPattern = "%" . $searchItem . "%";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $searchPattern);
    $stmt->execute();
    return $stmt->get_result();
}



function defaultMenu($conn){
    $sqlQuery = "SELECT a.menu_id, a.name, a.description,  b.name as category_name, a.price FROM tbl_menu a
                INNER JOIN tbl_categories b ON a.category_id = b.category_id ORDER BY menu_id";
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
            <input type="hidden" name="section" value="menu">
            <input
                name="search_menu"
                class="border-2 border-gray-300 rounded-lg py-2 px-4 w-64"
                placeholder="Search menu"
                type="text"
            />

            <button type="submit" class="absolute right-3 top-3.5 text-gray-500">
                  <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        <a href="add-menu.php">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Menu </button>
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
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
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
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['menu_id'] ?></td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['name'] ?></td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['description'] ?></td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['category_name'] ?></td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap dark:text-white"><?= $row['price'] ?></td>
                        <td class="flex px-4 py-6">
                            <a href="update_menu.php?id=<?= $row['menu_id'] ?>" class="px-2">
                                <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue"></i>
                            </a>
                            <a href="delete.php?id=<?= $row['menu_id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">
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