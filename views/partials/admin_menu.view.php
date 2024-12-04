<?php

include 'db_connection/connection.php';

// function searchMenu($conn, $searchItem){
//     $query = "SELECT a.menu_id, a.name, a.description,  b.name as category_name, a.price FROM tbl_menu a
//         INNER JOIN tbl_categories b ON a.category_id = b.category_id
//         WHERE a.name LIKE ?";
  
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param('s', $searchPattern);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     return $result;
// }

function defaultMenu($conn){
    $sqlQuery = "SELECT a.menu_id, a.name, a.description,  b.name as category_name, a.price FROM tbl_menu a
                INNER JOIN tbl_categories b ON a.category_id = b.category_id ORDER BY menu_id";
    $result = $conn->query($sqlQuery);
    return $result;
}
defaultMenu($conn);

if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['search_menu'])){
    $searchItem = $_GET['search_menu'];
    searchMenu($conn,$searchItem);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<script>

function pop() {
    return `
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Toggle modal
        </button>

        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    `;
}
</script>



<body>
    

<div class="p-4 sm:ml-64">


    <div class="flex justify-between items-center mb-6">
        <!-- Search Form -->
        <form method="GET" action="" class="relative">
            <input
                name="search_menu"
                class="border-2 border-gray-300 rounded-lg py-2 px-4 w-64"
                placeholder="Search menu"
                type="text"
            />
            <button type="submit" class="absolute right-3 top-3 text-gray-500">
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
                            <a href="edit.php?id=<?= $row['menu_id'] ?>" class="px-2">
                                <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue"></i>
                            </a>
                            <a href="delete.php?id=<?= $row['menu_id'] ?>" onclick="pop()">
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

</body>
</html>