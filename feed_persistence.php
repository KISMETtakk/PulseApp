<?php

function getBpm($member_id, $conn) {
    $device_id = null;
    $bpm = null;

    //get device id of the specific member

    $sql = "SELECT pulse_device_id FROM emotion_regulator_app WHERE member_id = $member_id";

    $result = $conn->query($sql);

    if( ($row = $result->fetch_assoc()) ) {

        $device_id = $row['pulse_device_id'];

    }
    //get average bpm

    $sql = "SELECT average FROM pulse_detector_device WHERE device_id = $device_id";

    $result = $conn->query($sql);

    if( ($row = $result->fetch_assoc()) ) {

        $bpm = $row['average'];
    }

    return $bpm;
}

?>