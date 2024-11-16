<?php
    
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $db_name = 'food_ordering';

    $conn = new mysqli($servername, $username, $password, $db_name);

    if($conn->connect_error){
        die($conn->connect_error);
    }

?>