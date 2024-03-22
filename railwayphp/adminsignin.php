<?php

$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "d2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$enteredUsername = $_POST["username"];
$enteredPassword = $_POST["password"];
// Prepare and bind the SQL statement
$stmt = $conn->prepare("SELECT * FROM adminlogoo WHERE username=? AND pass=?");
$stmt->bind_param("ss", $enteredUsername, $enteredPassword);

// Execute the statement
$result = $stmt->execute();

// Get the result set
$res = $stmt->get_result();

// Check if the result set has rows
if ($res->num_rows > 0) {
    $stmt->close();
    $conn->close();
    echo "<script>alert('Login Successfully'); window.location.href = 'admin_dashboard.html';</script>";
    exit();
} else {
    // Display alert and redirect on failure
    
    
    echo "<script>alert('Invalid details'); window.location.href = 'admin-login.html';</script>";
    exit();
}

// Close connection

?>
