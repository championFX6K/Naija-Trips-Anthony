<?php
session_start();
include '../connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM agents WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    $_SESSION["success"] = "The agent has been deleted successfully.";
} else {
    $_SESSION["error"] = "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("Location: dashboard.php");
exit();
?>
