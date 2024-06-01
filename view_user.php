<?php 

// Check if the 'user_id' parameter is set in the URL
if(isset($_GET['user_id'])) {
    // Sanitize the input to prevent SQL injection
    $user_id = $_GET['user_id'];
    
    // Now you can use $user_id in your queries or other operations
    // For example, you can retrieve user details from the database based on this ID
    // Make sure to use proper prepared statements to prevent SQL injection
} else {
    // Handle the case where 'id' parameter is not set
    echo "User ID is not provided in the URL.";
}

require_once("connect.php");

//read all records from database table
$sql = "SELECT * 
        FROM pulse 
        WHERE user_id = $user_id";

$result = $connection->query($sql); //execute query

if(!$result) {
    die("Invalid query: " . $connection->error);
}

if($row = $result->fetch_assoc()) {
    $pulse = $row['pulse_rate'];
}

$sql = "SELECT * 
        FROM user 
        WHERE user_id = $user_id";

$result = $connection->query($sql); //execute query

if(!$result) {
    die("Invalid query: " . $connection->error);
}

if($row = $result->fetch_assoc()) {
    $id = $row['user_id'];
    $username = $row['username'];
    $name = $row['name'];
    $surname = $row['surname'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            flex: 1;
            padding: 0 10px;
        }

        .display-head {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 10px 0;
        }

        table td:first-child {
            text-align: right;
            width: 30%;
        }

        .display-body {
            margin-top: 20px;
        }

        .display-body table {
            border-collapse: collapse;
        }

        .display-body table td {
            border-bottom: 1px solid #ddd;
            padding: 8px 0;
        }

        .display-body table td:first-child {
            color: #333;
            font-weight: bold;
        }

        .display-body table td:last-child {
            text-align: center;
        }

        .display-body table td a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }

        .display-body table td a:hover {
            color: #0056b3;
        }

        .back-button {
            text-align: center;
        }

        .bpm {
            color: tomato;
        }
    </style>
    <title>User Pulse Details</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="display-head">
                        <h2><?php echo $name ?> Pulse Details<h2>
                </div>
                <div class="display-body">
                    <table>
                        <tr>
                            <td>User ID: </td>
                            <td><b><?php echo $id ?></b></td>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td><b><?php echo $username ?></b></td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td><b><?php echo $name ?></b></td>
                        </tr>
                        <tr>
                            <td>Surname: </td>
                            <td><b><?php echo $surname ?></b></td>
                        </tr>
                        <tr>
                            <td>BPM: </td>
                            <td class="bpm"><b><?php echo $pulse ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="back-button"><a href="admin_main.php">Back</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
