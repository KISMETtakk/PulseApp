<?php

function login($username, $password, $array, $conn) {
    $flag = false;
    $member_id = null;
    $device_id = null;
    $mood = null;
    $average = null;

    //get user with specified username and password
    $sql = "SELECT member_id FROM member WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    //if found, get user last 10 pulse rates and store in the database
    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $member_id = $row['member_id'];
        }
    
        //generate pulse_rate
        // $pulse_rate = rand(60, 100);

        //get device id of logging in user
        $sql = "SELECT pulse_device_id FROM emotion_regulator_app WHERE member_id = $member_id";
        $result = $conn->query($sql);

        if($row = $result->fetch_assoc()) {
            $device_id = $row['pulse_device_id'];
        }

        //----------------------------------------------

        //get first 10 pulse_rates
        if ($result->num_rows > 0) {
    
            // Get the last 10 records
            $last10 = array_slice($array, -10);
            $average = round(array_sum($last10) / count($last10)); //get average of 10 pulse rates
            // $timestamp = date('Y-m-d H:i:s');
    
            // Insert data first 10 pulse rates into the database
            foreach ($last10 as $value) {
                
                $stmt = $conn->prepare("INSERT INTO readings (pulse_rate, device_id) VALUES (?, ?)");
                
                $stmt->bind_param("ii", 
                    $value,
                    $device_id
                );
                
                $stmt->execute();

            }

            //insert users average into the database
            $stmt = $conn->prepare("UPDATE pulse_detector_device SET average = ? WHERE device_id = ?");
                
            $stmt->bind_param("ii",
                $average,
                $device_id
            );
            
            $stmt->execute();
    
            echo "Data stored successfully.";
        }

        //----------------------------------------------

        //store mood into pulse app
        $mood = getMood($average);

        $sql = "UPDATE emotion_regulator_app SET mood = ? WHERE member_id = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("si", 
            $mood,
            $member_id
        );

        $stmt->execute();
        $stmt->close();

        $flag = true;
    }

    return $flag;
}

function getMemberId($username, $conn) {
    $sql = "SELECT member_id FROM member WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {

        $member_id = $row['member_id'];

        return $member_id;
    }

    return null;
}

function getMood($bpm) {
    
    if ($bpm >= 80) {
        return "Happy";
    } elseif ($bpm >= 60 && $bpm < 80) {
        return "Moderate";
    } else {
        return "Sad";
    }
}

?>