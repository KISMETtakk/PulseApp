<?php

require_once("connect.php");
require_once("loginpersistence.php");

$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get username and password from form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $array = null;

    if(isset($_FILES['bpm_file'])) {
        $tmp_data = $_FILES['bpm_file']['tmp_name'];

        $content = file_get_contents($tmp_data);

        $array = explode("\n", $content);
    }

    $flag = login($username, $password, $array, $conn);

    if($flag === true) {

        $member_id = getMemberId($username, $conn);

        header("Location: welcome.php?user_id=$member_id");
        $conn->close();
        exit();

    } else {
        $errMsg = "Invalid username or password!";
    }
}

// Close conn
$conn->close();

?>