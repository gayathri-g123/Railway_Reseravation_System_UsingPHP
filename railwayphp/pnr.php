<?php
$mysqli = new mysqli('localhost', 'root', 'admin', 'pnrstatus');

// Check for database connection errors
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$pnrno = $_POST['pnrno'];

// If the PNR number is not provided, redirect the user to the home page.


// Query the database to get the PNR status
$query = "SELECT status FROM pnr WHERE pnrno = ?";

$prepared_statement = $mysqli->prepare($query);

if (!$prepared_statement) {
    die('Query Error: ' . $mysqli->error);
}

$prepared_statement->bind_param('i', $pnrno);

$prepared_statement->execute();

$result = $prepared_statement->get_result();

// Display the PNR status
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "PNR Status: " . $row['status'];
    echo "<li><a href='home.html?train_number=$trainNo'> back </a></li>";
    
    exit();
} else {
    echo "Invalid PNR number";
}

// Close the prepared statement
$prepared_statement->close();

// Close the database connection
$mysqli->close();
?>
