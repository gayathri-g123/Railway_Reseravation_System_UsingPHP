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

// Get user input from the form

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$username = $_POST["username"];
$pass = $_POST["password"];


// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO logoo (firstname, lastname, email, username, pass) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $pass);

// Execute the statement
if ($stmt->execute()) {
        // Registration successful, set a session variable
        
        session_start();
        $_SESSION['username'] = $username;
        $stmt->close();
    $conn->close();

        echo "<script>alert('Signed up Successfully'); window.location.href = 'Loginpage.html';</script>";
    exit();
} else {
    // Display alert and redirect on failure
    echo "<script>alert('Registration failed'); window.location.href = 'index.php';</script>";
    exit();
}


// Close connection

?>
