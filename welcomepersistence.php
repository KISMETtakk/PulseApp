<?php

function getPulseRate($member_id, $conn) {
    $bpm = 0;

    $sql = "SELECT average 
            FROM pulse_detector_device p, emotion_regulator_app e 
            WHERE p.device_id = e.pulse_device_id AND e.member_id = $member_id";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        $bpm = $row['average'];
    }

    return $bpm;
}

function getMemberObject($member_id, $member_object, $conn) {

    $sql = "SELECT name, surname, username  
            FROM member
            WHERE member_id = $member_id";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        $member_object->setName($row['name']);
        $member_object->setSurname($row['surname']);
        $member_object->setUsername($row['username']);
    }

    return $member_object;
}

function getMood($member_id, $conn) {
    $mood = "---";

    $sql = "SELECT mood 
            FROM emotion_regulator_app 
            WHERE member_id = $member_id";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        $mood = $row['mood'];
    }

    return $mood;
}

function updatePulseRate($array_vals, $member_id, $conn) {
    //get device id of user
    $device_id = null;
    $array = array_slice($array_vals, -10);

    $sql = "SELECT pulse_device_id FROM emotion_regulator_app WHERE member_id = $member_id";

    $result = $conn->query($sql);

    if($row = $result->fetch_assoc()) {
        $device_id = $row['pulse_device_id'];
    }

    //store new bpms into the database
    foreach($array as $val) {
        // echo "actual values ( $val )";

        $stmt = $conn->prepare("INSERT INTO readings (pulse_rate, device_id) VALUES (?, ?)");
                
        $stmt->bind_param("ii", 
            $val,
            $device_id
        );
                
        $stmt->execute();
    }

    $sum = array_sum($array);
    $count = count($array);

    // echo "sum ( $sum )";
    // echo "count ( $count )";

    $average = round($sum / $count);

    $stmt = $conn->prepare("UPDATE pulse_detector_device SET average = ? WHERE device_id = ?");
                
    $stmt->bind_param("ii",
        $average,
        $device_id
    );
    
    $stmt->execute();

    // echo "average: ( $average )";
}
?>