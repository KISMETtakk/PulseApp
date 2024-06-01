<?php

function getMemberObject($user_id, $member_object, $conn) {
    $sql = "SELECT member_id, name, surname, username, image, dob, gender 
            FROM member 
            WHERE member_id = $user_id";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        $member_object->setMember_id($row['member_id']);
        $member_object->setName($row['name']);
        $member_object->setSurname($row['surname']);
        $member_object->setUsername($row['username']);
        $member_object->setImage($row['image']);
        $member_object->setDob($row['dob']);
        $member_object->setGender($row['gender']);
    }

    return $member_object;
}

function getDefaultImage($conn) {
    $image;

    $sql = "SELECT image 
            FROM member 
            WHERE member_id = 1";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        $image = $row['image'];
    }

    return $image;
}

function deleteUser($del_id, $conn) {
    // Define the variable to hold device_id
    $device_id;

    // Select the pulse_device_id from emotion_regulator_app table
    $sql = "SELECT pulse_device_id FROM emotion_regulator_app WHERE member_id = $del_id";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        $device_id = $row['pulse_device_id'];
    }

    // Delete records from emotion_regulator_app table
    $sql = "DELETE FROM emotion_regulator_app WHERE member_id = $del_id";
    $conn->query($sql);

    // Delete records from pulse_detector_device table
    $sql = "DELETE FROM pulse_detector_device WHERE device_id = $device_id";
    $conn->query($sql);

    // Delete records from member table
    $sql = "DELETE FROM member WHERE member_id = $del_id";
    $conn->query($sql);
}

?>