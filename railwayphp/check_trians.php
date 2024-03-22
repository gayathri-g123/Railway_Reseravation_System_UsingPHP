<?php

// Get the input values from the form
$from = $_POST['from'];
$to = $_POST['to'];
$date = $_POST['date'];
$dateTime = new DateTime($date);


// Create a new mysqli object to connect to the database
$mysqli = new mysqli('localhost', 'root', 'admin', 'checkt');

// Check for connection errors
if ($mysqli->connect_errno) {
    echo 'Failed to connect to the database: ' . $mysqli->connect_error;
    exit();
}

// Prepare a SQL statement to get the list of trains
$sql = 'SELECT train_number, train_name, departure_time, arrival_time FROM ctrain2  WHERE departure_station = ? AND arrival_station = ? AND departure_time >= ?';
$stmt = $mysqli->prepare($sql);

// Bind the input values to the SQL statement
$stmt->bind_param('sss', $from, $to, $date);

// Execute the statement
$stmt->execute();

// Get the result set
$res = $stmt->get_result();

// Check if there are rows in the result set
if ($res->num_rows > 0) {
    echo '<ul>'; // Start the list
    while ($row = $res->fetch_assoc()) {
        $trainNo = $row["train_number"];
        $trainname = $row['train_name'];
        $DepartureTime = $row['departure_time'];
        $ArrivalTime = $row['arrival_time'];
        
        echo "<li>Train Number: $trainNo</li>";
        echo "<li>Train Name: $trainname</li>";
        echo "<li>Departure Time: $DepartureTime</li>";
        echo "<li>Arrival Time: $ArrivalTime</li>";
        echo '<br>';
        echo "<button onclick=\"bookTicket('seat.html')\">Check seat availability</button>";
        
    }
    echo '</ul>'; 
} else {
echo 'No trains found.';
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
