<?php

require_once("connect.php");
require_once("dashboard_persistence.php");

$user_id = 3;

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
} else {
    header("Location: /pulse_app_2/pulse_app/index.php");
    exit();
}

$bpm = getBpm($user_id, $conn);
$mood = getMood($user_id, $conn);

?>