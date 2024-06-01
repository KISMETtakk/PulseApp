<?php 

require_once("connect.php");
require_once("user_accountpersistence.php");
require_once("member.php");

$user_id;
$del_id;

if(isset($_POST['del_id'])) {

    $del_id = $_POST['del_id'];

    deleteUser($del_id, $conn);

    header("Location: index.php");
}

if(isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];

} else {
    header("Location: login.php");
}

//GET USER INFORMATION
$member_object = new Member(0, null, null, null, null, null, null, null, null, null, null, null);

$member_object = getMemberObject($user_id, $member_object, $conn);

$member_id = $member_object->getMemberId();
$name = $member_object->getName();
$surname = $member_object->getSurname();
$username = $member_object->getUsername();
$image = $member_object->getImage();
$dob = $member_object->getDob();
$gender = $member_object->getGender();

$image_data;

if(!empty($image)) {
    $image_data = "data:image/jpeg;base64," . base64_encode($image);
} else {
    $image = getDefaultImage($conn);

    $image_data = "data:image/jpeg;base64," . base64_encode($image);
}

?>