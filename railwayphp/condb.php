<?php
// Connect to the database using mysqli
$mysqli = new mysqli('localhost', 'root', 'admin', 'checkt');

// Check connection
if ($mysqli->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}

// Get form data
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$id_type = $_POST['id_type'];

// Validate and sanitize data


// Prepare SQL statement
$sql = "INSERT INTO confirmpay (email, mobile, firstname, lastname, gender, id_type) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

// Bind parameters
$stmt->bind_param('ssssss', $email, $mobile, $firstname, $lastname, $gender, $id_type);

// Execute the query
if ($stmt->execute()) {
  // User details saved successfully
  header("Location: payment.html"); 
} else {
  echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$mysqli->close();

