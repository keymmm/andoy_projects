<?php 

    session_start();
    session_unset();
    session_destroy();

    // Redirect to the home page after logout
    header("Location: index.php");  
    exit;



?>