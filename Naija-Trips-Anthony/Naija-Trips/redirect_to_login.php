<?php
session_start();
$_SESSION["error"] = "Please log in to book a trip.";
header("Location: login.php");
exit();
?>
