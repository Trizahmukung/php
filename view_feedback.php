<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Query to select all feedback entries ordered by submission date
$sql = "SELECT * FROM feedback ORDER BY submission_date DESC";
$result = $conn->query($sql);

// Display data in a table format if available
if ($result->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Rating</th>
                <th>Submission Date</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["feedback"] . "</td>
                <td>" . $row["rating"] . "</td>
                <td>" . $row["submission_date"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No feedback available.";
}

// Close the connection
$conn->close();
?>
