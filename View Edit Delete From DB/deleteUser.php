<?php
include 'connectDB.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM users WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: viewUsers.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>