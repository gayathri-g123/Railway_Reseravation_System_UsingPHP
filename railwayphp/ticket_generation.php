<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Generation</title>
    <!-- Add any additional styles or meta tags as needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .ticket {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        .ticket-details {
            margin-top: 20px;
        }

        .ticket-details p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>Ticket Confirmation</h2>
        <div class="ticket-details">
            <?php
            session_start();
            // Check if the ticket ID is stored in the session
            if (isset($_SESSION['ticket_id'])) {
                echo "<p><strong>Ticket ID:</strong> {$_SESSION['ticket_id']}</p>";
            } else {
                // If not in session, retrieve the ticket ID from the database
                $mysqli = new mysqli('localhost', 'root', 'admin', 'checkt');

                if ($mysqli->connect_error) {
                    die('Failed to connect to the database: ' . $mysqli->connect_error);
                }

                // Assume you have stored the ticket ID in a column named 'ticket_id' in your table
                $user_id = $_SESSION['zip']; // Adjust this based on your actual session variable

                $sql = "SELECT ticket_id FROM tickets WHERE zip = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('s', $user_id);
                $stmt->execute();
                $stmt->bind_result($ticket_id);

                if ($stmt->fetch()) {
                    echo "<p><strong>Ticket ID:</strong> $ticket_id</p>";
                    // Store the ticket ID in the session for future reference
                    $_SESSION['ticket_id'] = $ticket_id;
                } else {
                    echo "<p>No ticket information available.</p>";
                }

                $stmt->close();
                $mysqli->close();
            }

            // Display other ticket details from session variables
            if (isset($_SESSION['full_name'])) {
                echo "<p><strong>Name:</strong> {$_SESSION['full_name']}</p>";
                echo "<p><strong>Age:</strong> {$_SESSION['age']}</p>";
                echo "<p><strong>Address:</strong> {$_SESSION['address']}</p>";
                echo "<p><strong>City:</strong> {$_SESSION['city']}</p>";
                echo "<p><strong>State:</strong> {$_SESSION['state']}</p>";
                echo "<p><strong>Zip Code:</strong> {$_SESSION['zip']}</p>";
                // Add more session variables as needed
            } else {
                echo "<p>No ticket information available.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
