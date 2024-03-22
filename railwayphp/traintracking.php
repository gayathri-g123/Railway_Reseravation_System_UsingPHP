<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Train Tracking</title>
</head>
<body>
<h2>Train Tracking</h2>

<?php
// Get the train ID and name from the form
$trainId = $_POST["trainId"];
$trainName = $_POST["trainName"];

// Initialize the database connection variables
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "train_db1";

$conn = null;
$stmt = null;
$rs = null;

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the train details from the database
    $sql = "SELECT * FROM train1 WHERE train_id = ? AND train_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $trainId, $trainName);

    $stmt->execute();
    $rs = $stmt->get_result();

    if ($rs->num_rows > 0) {
        // The train was found
        $row = $rs->fetch_assoc();
        $current_station = $row["current_station"];
        $status = $row["status"];

        // Display the train details
        echo "Current Station: " . $current_station . "<br>";
        echo "Status: " . $status . "<br>";
        echo "<li><a href='home.html?train_number=$trainNo'> back </a></li>";
    } else {
        // The train was not found
        echo "Train not found";
    }
} finally {
    // Close connections
    if ($rs != null) {
        $rs->close();
    }
    if ($stmt != null) {
        $stmt->close();
    }
    if ($conn != null) {
        $conn->close();
    }
}
?>
<!-- Add a link back to the home page -->
<a href="home.html">Back to Home</a>

</body>
</html>
