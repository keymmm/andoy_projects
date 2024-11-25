<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/21b39866b0.js" crossorigin="anonymous"></script>

 
</head>
<body>
<button
        data-drawer-target="sidebar-multi-level-sidebar"
        data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
>
    <span class="sr-only">Open sidebar</span>
    <svg
            class="w-6 h-6"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
    >
        <path
                clip-rule="evenodd"
                fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
        ></path>
    </svg>
</button>

<aside
        id="sidebar-multi-level-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar"
>
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
                 <li>
                    <?php $isDashboard = isset($_GET['dashboard']); ?>
                    <a
                        href="?dashboard"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isDashboard ? 'bg-green-200 dark:bg-green-700' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-chart-line fa-lg " style="color: black"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
           

                <li>
                    <?php $isDashboard = isset($_GET['order']); ?>
                    <a
                        href="?order"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isDashboard ? 'bg-green-200 dark:bg-green-700' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-chart-line fa-lg " style="color: black"></i>
                        <span class="ms-3">Order</span>
                    </a>
                </li>

                <li>
                    <?php $isDashboard = isset($_GET['menu']); ?>
                    <a
                        href="?menu"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isDashboard ? 'bg-green-200 dark:bg-green-700' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-chart-line fa-lg " style="color: black"></i>
                        <span class="ms-3">Menu</span>
                    </a>
                </li>

                <li>
                    <?php $isDashboard = isset($_GET['menu']); ?>
                    <a
                        href="?category"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isDashboard ? 'bg-green-200 dark:bg-green-700' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-chart-line fa-lg " style="color: black"></i>
                        <span class="ms-3">Category</span>
                    </a>
                </li>


        </ul>
    </div>
</aside>

<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['view'])){
    require 'views/partials/menu.view.php';
}
if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['category'])){
    require 'add-category.php';
}
if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['menu'])){
    require 'views/partials/menu.view.php';
}

?>
</body>
</html>
