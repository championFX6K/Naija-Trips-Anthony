<?php
session_start();
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $state = trim($_POST["state"]);
    $destination = trim($_POST["Destination"]);
    $image = $_FILES['destinationimg'];

    // Validate inputs
    if (empty($state) || empty($destination) || empty($image['name'])) {
        $_SESSION["error"] = "All fields are required.";
        header("Location: add-destination.php");
        exit();
    }

    // Handle image upload
    $target_dir = "assets/uploads/destinations/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        $_SESSION["error"] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($image["size"] > 5000000) { // 5MB limit
        $_SESSION["error"] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION["error"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION["error"] = "Sorry, your file was not uploaded.";
        header("Location: add-destination.php");
        exit();
    } else {
        // Try to upload file
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Insert data into database
            $imageName = basename($image["name"]);
            $stmt = $conn->prepare("INSERT INTO destinations (state, destination, destinationImg) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $state, $destination, $imageName);
            
            if ($stmt->execute()) {
                $_SESSION["success"] = "New destination added successfully!";
            } else {
                $_SESSION["error"] = "Error adding destination: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $_SESSION["error"] = "Sorry, there was an error uploading your file.";
        }
    }

    header("Location: add-destination.php");
}

$conn->close();
?>
