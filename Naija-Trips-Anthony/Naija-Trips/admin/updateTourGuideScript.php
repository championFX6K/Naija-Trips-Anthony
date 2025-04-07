<?php
session_start();
include '../connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $agentState = $_POST['agentstate'];
    $role = $_POST['agent_role'];
    $characteristics = isset($_POST['characteristics']) ? implode(', ', $_POST['characteristics']) : '';
    $description = $_POST['description'];

    // Handle image upload if a new image is uploaded
    if ($_FILES['agentImg']['name']) {
        $target_dir = "assets/uploads/agentimg/";
        $target_file = $target_dir . basename($_FILES["agentImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["agentImg"]["tmp_name"]);
        if ($check === false) {
            $_SESSION["error"] = "File is not an image.";
            $uploadOk = 0;
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            $_SESSION["error"] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["agentImg"]["size"] > 500000) { // 500KB
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
        } else {
            // Try to upload file
            if (move_uploaded_file($_FILES["agentImg"]["tmp_name"], $target_file)) {
                $agentImg = basename($_FILES["agentImg"]["name"]);
                $sql = "UPDATE agents SET name='$name', phone='$phone', agentState='$agentState', role='$role', characteristics='$characteristics', description='$description', agentImg='$agentImg' WHERE id='$id'";
            } else {
                $_SESSION["error"] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Update without changing the image
        $sql = "UPDATE agents SET name='$name', phone='$phone', agentState='$agentState', role='$role', characteristics='$characteristics', description='$description' WHERE id='$id'";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION["success"] = "The agent has been updated successfully.";
    } else {
        $_SESSION["error"] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    header("Location: dashboard.php");
    exit();
}
