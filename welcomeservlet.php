<?php

require_once("connect.php");
require_once("welcomepersistence.php");
require_once("member.php");


$user_id;

// Retrieve user information from database
if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

} else {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {

    header('Location: index.php');
    exit();
}

if(isset($_POST['submit'])) {

    if(isset($_FILES['bpm_file'])) {
        $tmp_file = $_FILES['bpm_file']['tmp_name'];
        
        $content = file_get_contents($tmp_file);

        $array = explode("\n", $content);

        updatePulseRate($array, $user_id, $conn);
    }
}

$member_object = new Member($user_id, 0, null, null, null, null, null, null, null, null, null, null);

$member_object = getMemberObject($user_id, $member_object, $conn);

$name = $member_object->getName();
$surname = $member_object->getSurname();
$username = $member_object->getUsername();

$bpm = getPulseRate($user_id, $conn);
$mood = getMood($user_id, $conn);

?>