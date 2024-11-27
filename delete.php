<?php
require 'db_connection/connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sqlQuery = "DELETE FROM tbl_menu WHERE menu_id = ?";
    $stmt = $conn->prepare($sqlQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin-dashboard.php?menu");
        exit();
    } else {
        echo "<script> alert('Error deleting record:  . $conn->error ') </script>";
    }

    $stmt->close();
}

$conn->close();
?>
