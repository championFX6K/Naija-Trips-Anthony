<?php
session_start();
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $conpassword = trim($_POST["conpassword"]);

    // Validate input
    if (empty($name) || empty($email) || empty($password) || empty($conpassword)) {
        $_SESSION["error"] = "All fields are required.";
        header("Location: new-admin.php");
        exit();
    }

    if ($password !== $conpassword) {
        $_SESSION["error"] = "Passwords do not match.";
        header("Location: new-admin.php");
        exit();
    }

    // Check if the email already exists in the database
    $stmt = $conn->prepare("SELECT id FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION["error"] = "Email is already registered.";
        header("Location: new-admin.php");
        exit();
    }

    // Insert the new admin into the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO admins (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION["success"] = "New admin registered successfully.";
    } else {
        $_SESSION["error"] = "Error registering new admin.";
    }

    $stmt->close();
}

$conn->close();
header("Location: new-admin.php");
exit();
?>
