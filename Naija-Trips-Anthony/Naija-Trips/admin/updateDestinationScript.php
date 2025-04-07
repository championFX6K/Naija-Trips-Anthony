<?php
session_start();
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $state = trim($_POST["state"]);
    $destination = trim($_POST["destination"]);
    $image = $_FILES['destinationimg'];

    // Validate inputs
    if (empty($state) || empty($destination)) {
        $_SESSION["error"] = "State and Destination fields are required.";
        header("Location: editDestination.php?id=" . $id);
        exit();
    }

    // Handle image upload
    $uploadOk = 1;
    if (!empty($image['name'])) {
        $target_dir = "assets/uploads/destinations/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
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
            header("Location: editDestination.php?id=" . $id);
            exit();
        } else {
            // Try to upload file
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                // Update with new image
                $stmt = $conn->prepare("UPDATE destinations SET state = ?, destination = ?, destinationImg = ? WHERE id = ?");
                $stmt->bind_param("sssi", $state, $destination, $target_file, $id);
            } else {
                $_SESSION["error"] = "Sorry, there was an error uploading your file.";
                header("Location: editDestination.php?id=" . $id);
                exit();
            }
        }
    } else {
        // Update without new image
        $stmt = $conn->prepare("UPDATE destinations SET state = ?, destination = ? WHERE id = ?");
        $stmt->bind_param("ssi", $state, $destination, $id);
    }

    if ($stmt->execute()) {
        $_SESSION["success"] = "Destination updated successfully!";
        
    } else {
        $_SESSION["error"] = "Error updating destination: " . $stmt->error;
    }

    $stmt->close();
    header("Location: dashboard.php");
}

$conn->close();
?>
