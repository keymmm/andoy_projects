<?php
require 'db_connection/connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

        $sqlQuery = "DELETE FROM tbl_categories WHERE category_id = ?";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin-dashboard.php?section=category");
        exit();
    } else {
        echo "<script> alert('Error deleting record') </script>";
    }

}

?>
