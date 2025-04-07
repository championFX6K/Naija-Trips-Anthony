<?php
session_start();

include '../connection.php';

if (!isset($_GET['id'])) {
    $_SESSION["error"] = "No destination ID provided.";
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM destinations WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION["error"] = "Destination not found.";
    header("Location: dashboard.php");
    exit();
}

$destination = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destination</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="db-info-wrap db-add-tour-wrap">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="dashboard-box">
                    <h4>Edit Destination</h4>
                    <?php
                    if (isset($_SESSION["error"])) {
                        echo '<div style="background-color: #f8d7da; padding: 10px; border: 1px solid #dc3545; color: #721c24; margin-bottom: 10px;">' . $_SESSION["error"] . '</div>';
                        unset($_SESSION["error"]);
                    }

                    if (isset($_SESSION["success"])) {
                        echo '<div style="background-color: #c3e6cb; padding: 10px; border: 1px solid #28a745; color: #155724; margin-bottom: 10px;">' . $_SESSION["success"] . '</div>';
                        unset($_SESSION["success"]);
                    }
                    ?>
                    <form action="updateDestinationScript.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($destination['id']); ?>">
                        <div class="custom-field-wrap">
                            <div class="form-group">
                                <label>State</label>
                                <select id="state" name="state">
                                    <option value="">...Select State...</option>
                                    <?php
                                    $states = ['Abia', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue', 'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'FCT', 'Gombe', 'Imo', 'Jigawa', 'Kaduna', 'Kano', 'Katsina', 'Kebbi', 'Kogi', 'Kwara', 'Lagos', 'Nasarawa', 'Niger', 'Ogun', 'Ondo', 'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Zamfara'];
                                    foreach ($states as $state) {
                                        $selected = $destination['state'] == $state ? 'selected' : '';
                                        echo "<option value=\"$state\" $selected>$state</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Destination Place</label>
                                <input type="text" name="destination" value="<?php echo htmlspecialchars($destination['destination']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Current Image</label><br>
                                <img src="<?php echo htmlspecialchars($destination['destinationImg']); ?>" alt="Current Image" style="width:100px;height:100px;">
                            </div>
                            <div class="form-group">
                                <label>Upload New Image</label>
                                <input type="file" name="destinationimg">
                            </div>
                        </div>
                        <button class="all-button" name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>      
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
