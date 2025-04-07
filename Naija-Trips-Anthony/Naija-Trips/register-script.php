<?php
session_start();
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from form
    $uname = trim($_POST["uname"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];

    // Validate input
    if (empty($uname) || empty($email) || empty($phone) || empty($password)) {
        $_SESSION["error"] = "All fields are required.";
        header("Location: register.php");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"] = "Invalid email format.";
        header("Location: register.php");
        exit();
    }

    // Check email length (ensure it fits into the database column)
    if (strlen($email) > 255) {
        $_SESSION["error"] = "Email is too long. Maximum allowed length is 255 characters.";
        header("Location: register.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (firstname, email, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $uname, $email, $phone, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION["success"] = "Registration successful. Please log in.";
        header("Location: login.php");
    } else {
        $_SESSION["error"] = "Registration failed. Please try again.";
        header("Location: register.php");
    }

    $stmt->close();
}

$conn->close();
?>
