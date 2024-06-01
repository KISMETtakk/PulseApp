<?php

//HANDLE REMOVAL OF USER

$user_id;

if(isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    removeUser($user_id, $conn);
}

?>