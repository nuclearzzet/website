<?php

session_start();

include '../config/database.php'; 
$conn = new Database();
$db = $conn->connect();

if($conn){
    echo "Connected";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlentities(filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW), ENT_QUOTES);
    $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW), ENT_QUOTES);
    $title = htmlentities(filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW), ENT_QUOTES);
    $body = htmlentities(filter_input(INPUT_POST, 'body', FILTER_UNSAFE_RAW), ENT_QUOTES);

    

    if (insertIntoDB($db, $name, $email, $title, $body)){
        header('LOCATION: /personal_website/successful.php');
    }
}

function insertIntoDB($db, $name, $email, $title, $body){
    $name = mysqli_real_escape_string($db, $name);
    $email = mysqli_real_escape_string($db, $email);
    $title = mysqli_real_escape_string($db, $title);
    $body = mysqli_real_escape_string($db, $body);

    $sql = 'INSERT INTO Sender(name, email, title, body) VALUES(?, ?, ?, ?)';

    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $title, $body);
    $stmt->execute();

    return true;
}