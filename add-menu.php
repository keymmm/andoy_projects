<?php
global $conn;
require 'db_connection/connection.php';

$sqlQuery = "SELECT a.menu_id,a.name, b.name as category_name, a.price FROM tbl_menu a
        INNER JOIN tbl_categories b ON a.category_id = b.category_id";

$result = $conn->query($sqlQuery);

?>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">


        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            name
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
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['menu_id'] ?></td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['name'] ?></td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['category_name'] ?></td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['price'] ?></td>
                    <td class="flex px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="edit.php?<?= $row['menu_id'] ?>" class="px-2">
                            <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue"></i>
<!--                           <p class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-900">Edit</p>-->
                        </a>
                        <a href="delete.php?<?= $row['menu_id'] ?>">
                            <i class="fa-solid fa-trash fa-xl" style="color: red"></i>
                        </a>
                    </td>
                </tbody>
               <?php  } }?>
            </table>
        </div>

    </div>

</div>