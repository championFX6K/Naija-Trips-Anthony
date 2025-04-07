<?php
session_start();
include "connection.php";

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<script>alert('$message');</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate input
    if (empty($email) || empty($password)) {
        $_SESSION["error"] = "Email and password are required.";
        header("Location: login.php");
        exit();
    }

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id, firstname, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute(); 
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_email"] = $row["email"];
            $_SESSION["user_name"] = $row["firstname"];
            $_SESSION["loggedin"] = true;
            header("Location: booking.php"); // Redirect to dashboard or any other page after login
        } else {
            $_SESSION["error"] = "Invalid password.";
            header("Location: login.php");
        }
    } else {
        $_SESSION["error"] = "Email not registered.";
        header("Location: login.php");
    }

    $stmt->close();
}

$conn->close();
?>
