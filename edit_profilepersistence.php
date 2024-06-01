<?php

function getUsername($member_id, $conn) {
    $username;

    $sql = "SELECT username FROM member WHERE member_id = $member_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    }

    return $username;
}

function getPassword($member_id, $conn) {
    $password;

    $sql = "SELECT password FROM member WHERE member_id = $member_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $password = $row['password'];
    }

    return $password;
}

function getName($member_id, $conn) {
    $name;

    $sql = "SELECT name FROM member WHERE member_id = $member_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    }

    return $name;
}

function getSurname($member_id, $conn) {
    $surname;

    $sql = "SELECT surname FROM member WHERE member_id = $member_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $surname = $row['surname'];
    }

    return $surname;
}

function getImage($member_id, $conn) {
    $image;

    $sql = "SELECT image FROM member WHERE member_id = $member_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image = $row['image'];
    }

    return $image;
}

function updateProfile($member_id, $name, $surname, $username, $password, $image, $conn) {

    $sql = "UPDATE member SET name = ?, surname = ?, username = ?, password = ?, image = ? WHERE member_id = ?";

    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("sssssi", 
        $name, 
        $surname, 
        $username, 
        $password, 
        $image,
        $member_id
    );

    $stmt->execute();
}

?>