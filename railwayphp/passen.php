<!-- passengers.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Passengers</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1, h2 {
            color: #333;
        }

        div.container {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>BOOK TIcket</h1>

    <div class="container">
        <!-- Container 1: Contact Details -->
        <div>
        <h2>Contact Details</h2>
        <form action="condb.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" title="Please enter a 10-digit mobile number" required>

            <!-- Common button for both containers -->
            
        </div>

        <!-- Container 2: Personal Details -->
        <h2>Personal Details</h2>
        <div>
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="id_type">Aadhaar ID:</label>
            <input id="id_type" name="id_type" type ="text" required>
                

            <!-- Container for ID Input (Initially Hidden) -->
            
            <button type="submit">Confirm & pay </button>
        </form>
    </div>
    </div>

    
</body>

</html>
