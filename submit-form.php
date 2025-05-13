<?php
$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

$conn = new mysqli($host, $username, $password, $dbname);

// Create a connection to the MySQL database using MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Accessing form data through the POST method
$name    = $_POST['name'] ?? '';
$gender  = $_POST['gender'] ?? '';
$email   = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// (Optional) You can add validation or sanitization here

// Prepare an SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO contacts (name, gender, email, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $gender, $email, $message);

// Execute the statement and check if it was successful
if ($stmt->execute()) {
    echo "Data stored successfully.";
} else {
    echo "Error storing data: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>