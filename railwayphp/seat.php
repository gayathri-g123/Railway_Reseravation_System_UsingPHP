<?php
// seat.php
$mysqli = new mysqli('localhost', 'root', 'admin', 'checkt');

// Check for connection errors
if ($mysqli->connect_error) {
    die('Failed to connect to the database: ' . $mysqli->connect_error);
}
session_start();

// Get parameters from the POST data
$train_number = $_POST['train_number'];
$date = $_POST['date'];
$from = $_POST['departure_station'];
$to = $_POST['arrival_station'];
$class = $_POST['class'];
$quota = $_POST['quota'];

// Prepare a SQL statement to check seat availability for the specific train
$sql = 'SELECT * FROM seat_information WHERE train_number = ? AND journey_date = ? AND departure_station = ? AND arrival_station = ? AND class = ? AND quota = ?';
$stmt = $mysqli->prepare($sql);

// Bind the parameters to the SQL statement
$stmt->bind_param('ssssss', $train_number, $date, $from, $to, $class, $quota);

// Execute the statement
$stmt->execute();

// Get the result set
$res = $stmt->get_result();

// Display seat availability details
if ($res->num_rows > 0) {
    echo '<ul>'; // Start the list
    while ($row = $res->fetch_assoc()) {
        // Display seat details as needed
        echo "<li>Seat Number: {$row['seat_number']}</li>";
        echo "<li>Status: {$row['status']}</li>";
        // Add more details if needed
        
        echo "<button onclick=\"bookTicket('passen.php')\">Book a ticket</button>";
        
        echo '<br>';
    }
    echo '</ul>';

    // Redirect to home.html using JavaScript after displaying details
  
} else {
    echo 'No seat availability details found for this train.';
}

// Close the result set
$res->close();

// Close the prepared statement
$stmt->close();

// Close the database connection
$mysqli->close();

?>

<script>
function bookTicket(url) {
    window.location.href = url;
}
</script>
