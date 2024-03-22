<?php
session_start();

// Connection details (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "checkt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the payment form
$fullName = $_POST['firstname'];
$age = $_POST['Age'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
// Add more fields as needed

// Insert data into the database
$sql = "INSERT INTO tickets (full_name, age, address, city, state, zip) VALUES ('$fullName', '$age', '$address', '$city', '$state', '$zip')";
// Add more fields as needed

if ($conn->query($sql) === TRUE) {
    // Set session variables for ticket details
    $_SESSION['full_name'] = $fullName;
    $_SESSION['age'] = $age;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zip'] = $zip;

    // Debugging: Output session variables
    var_dump($_SESSION);

    // Redirect to ticket generation page on successful database insertion
    header('Location: ticket_generation.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
