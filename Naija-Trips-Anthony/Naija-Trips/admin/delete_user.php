<?php
session_start();
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Delete user from the database
    $sql = "DELETE FROM users WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'User deleted successfully.';
    } else {
        $_SESSION['error'] = 'Error deleting user: ' . mysqli_error($conn);
    }

    header("Location: user.php");
    exit();
}
?>
