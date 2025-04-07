<?php
session_start();
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Delete booking
    $sql = "DELETE FROM bookings WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["success"] = "Booking deleted successfully.";
    } else {
        $_SESSION["error"] = "Error deleting booking: " . mysqli_error($conn);
    }
}
?>
