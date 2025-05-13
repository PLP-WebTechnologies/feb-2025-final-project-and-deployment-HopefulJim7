<?php
// Database connection parameters (same as before)
$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all records from the contacts table
$sql = "SELECT id, name, gender, email, message, submission_date FROM contacts ORDER BY submission_date DESC";
$result = $conn->query($sql);

// Check if records were found and display them
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='margin-bottom:20px;'>";
        echo "<strong>ID:</strong> " . $row['id'] . "<br>";
        echo "<strong>Name:</strong> " . htmlspecialchars($row['name']) . "<br>";
        echo "<strong>Gender:</strong> " . htmlspecialchars($row['gender']) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>";
        echo "<strong>Message:</strong> " . htmlspecialchars($row['message']) . "<br>";
        echo "<strong>Date:</strong> " . $row['submission_date'] . "<br>";
        echo "</div>";
    }
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>