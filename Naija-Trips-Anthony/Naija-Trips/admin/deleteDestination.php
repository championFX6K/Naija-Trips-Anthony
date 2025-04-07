<?php
session_start();
include '../connection.php';

if (!isset($_GET['id'])) {
    $_SESSION["error"] = "No destination ID provided.";
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];

// Get the image path before deleting the record
$query = "SELECT destinationImg FROM destinations WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION["error"] = "Destination not found.";
    header("Location: dashboard.php");
    exit();
}

$row = $result->fetch_assoc();
$imagePath = $row['destinationImg'];

// Delete the record from the database
$query = "DELETE FROM destinations WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // If record deleted successfully, delete the image file
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    $_SESSION["success"] = "Destination deleted successfully!";
} else {
    $_SESSION["error"] = "Error deleting destination: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: dashboard.php");
?>
