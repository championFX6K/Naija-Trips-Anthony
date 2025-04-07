<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debugging code to log the query
file_put_contents('debug.log', $query . PHP_EOL, FILE_APPEND);

include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $preferences = json_decode($_POST['preferences'], true);

    // Escape the preferences array elements
    $escaped_preferences = array_map(function($pref) use ($conn) {
        return mysqli_real_escape_string($conn, $pref);
    }, $preferences);

    $query = "SELECT name FROM agents WHERE ";
    $conditions = [];
    foreach ($escaped_preferences as $preference) {
        $conditions[] = "characteristics LIKE '%$preference%'";
    }
    $query .= implode(' OR ', $conditions);

    $result = mysqli_query($conn, $query);
    $options = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value=\"{$row['name']}\">{$row['name']}</option>";
    }
    echo $options;
}
?>
