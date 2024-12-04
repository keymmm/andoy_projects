<?php require 'views/partials/head.php' ?>

<?php
$section = isset($_GET['section']) ? $_GET['section'] : 'dashboard';


function loadSection($section) {
    switch ($section) {
        case 'menu':
            include 'admin_dashboard/menu.php';
            break;
        case 'order':
            include 'admin_dashboard/orders.php';
            break;
        case 'category':
            include 'admin_dashboard/category.php';
            break;
        case 'dashboard':
        default:
            include 'admin_dashboard/dashboard.php';
    }
}
?>


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
    <div class="h-full px-5 py-4  bg-gray-100 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
                 <li>
                 <?php $isActive =(isset($_GET['section']) && $_GET['section'] === 'dashboard'); ?>
                    <a
                        href="?section=dashboard"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isActive ? 'bg-green-200 dark:bg-green-700 ' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-house"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
           

                <li>
                    <?php $isActive = (isset($_GET['section']) && $_GET['section'] === 'order'); ?>
                    <a
                        href="?section=order"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isActive ? 'bg-green-200 dark:bg-green-700' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="ms-3">Order</span>
                    </a>
                </li>

                <li>
                    <?php $isActive = (isset($_GET['section']) && $_GET['section'] === 'menu'); ?>
                    <a
                        href="?section=menu"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isActive ? 'bg-green-200 dark:bg-green-700' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-utensils"></i>
                        <span class="ms-3">Menu</span>
                    </a>
                </li>

                <li>
                     <?php $isActive = (isset($_GET['section']) && $_GET['section'] === 'category'); ?>                    <a
                        href="?section=category"
                        class="flex items-center p-2 text-black rounded-lg 
                            <?php echo $isActive ? 'bg-green-200 dark:bg-green-700' : 'hover:bg-green-200 dark:hover:bg-green-700'; ?> 
                            group"
                    >
                        <i class="fa-solid fa-list"></i>
                        <span class="ms-3">Category</span>
                    </a>
                </li>
            
            <div class="p-4 sm:ml-64">




</aside>
<!-- <div id="section"  class="p-4 border-2  border-gray-200 rounded-lg dark:border-gray-700"> -->
        <?php loadSection($section); ?>
       
    <!-- </div> -->

</body>
</html>
