<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if form data is available
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['feedback']) && isset($_POST['rating'])) {

    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "campaign_feedback2";

    // Connect to MySQL database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to insert data
    $sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if statement preparation was successful
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters and execute the query
    $stmt->bind_param("sssi", $name, $email, $feedback, $rating);

    if ($stmt->execute()) {
        echo "Thank you for your feedback!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();

} else {
    echo "Form data is missing. Please fill out all fields in the feedback form.";
}
?>
