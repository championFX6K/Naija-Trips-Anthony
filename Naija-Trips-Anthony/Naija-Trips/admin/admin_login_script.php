<?php
session_start();
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate input
    if (empty($email) || empty($password)) {
        $_SESSION["error"] = "Email and password are required.";
        header("Location: admin_login.php");
        exit();
    }

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id, email, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["admin_id"] = $row["id"];
            $_SESSION["admin_email"] = $row["email"];
            header("Location: dashboard.php"); // Redirect to admin dashboard or any other page after login
        } else {
            $_SESSION["error"] = "Invalid password.";
            header("Location: admin_login.php");
        }
    } else {
        $_SESSION["error"] = "Email not registered.";
        header("Location: admin_login.php");
    }

    $stmt->close();
}

$conn->close();
?>
