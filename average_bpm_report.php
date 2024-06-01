<?php
require_once("connect.php"); // File to handle database connection

$user_id = null;

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
} else {
    header("Location: index.php");
    exit();
}

// Fetch data from the database
$device_id = null;
$average = null;


$sql = "SELECT pulse_device_id FROM emotion_regulator_app WHERE member_id = $user_id";

$result = $conn->query($sql);

if($row = $result->fetch_assoc()) {
    $device_id = $row['pulse_device_id'];
}

$sql = "SELECT average FROM pulse_detector_device WHERE device_id = $device_id";

$result = $conn->query($sql);

if($row = $result->fetch_assoc()) {
    $average = $row['average'];
}

// $sql = "SELECT average FROM pulse_detector_device WHERE device_id = $device_id";

//get average


$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average BPM Report</title>
    <link rel="stylesheet" href="reports.css">

    <style>
            h2 {
            text-align: center;
            margin-bottom: 30px;
            color: white;
            font-size: 60px;
        }
        .advice {
            padding: 20px;
            position: center;
            width: 400px;
            height: 400px;            
            background: transparent;
            border: 2px solid #0ef;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            color: #fff;
            font-weight: 600;       
            margin-top: 30px;   
            margin-left: 20px;  
            transition: .5s;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h2>Average BPM Report</h2>
        
        <div class="advice">
            <table>
                <tr>
                    <th>Average BPM</th>
                </tr>
                <?php
                echo
                "<tr>
                    <td>$average</td>
                </tr>
                "
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
