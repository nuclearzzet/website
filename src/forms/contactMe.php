<?php

session_start();

include '../config/database.php'; 
$db = new Database();
$conn = $db->connect();

if($conn){
    echo "Connected";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $title = htmlentities(filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $body = htmlentities(filter_input(INPUT_POST, 'body', FILTER_UNSAFE_RAW), ENT_QUOTES | ENT_HTML5, 'UTF-8');

    if (insertIntoDB($conn, $name, $email, $title, $body)){
        header('LOCATION: /personal_website/successful.php');
    }
}

function insertIntoDB($conn, $name, $email, $title, $body){
    try{
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $title = mysqli_real_escape_string($conn, $title);
        $body = mysqli_real_escape_string($conn, $body);

        $sql = 'INSERT INTO Sender(name, email, title, body) VALUES(?, ?, ?, ?)';

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $title, $body);

        if($stmt->execute()){
            return true;
        }else{
            throw new Exception();
        }
    }catch(Exception $err){
        echo "Error: " . $err->getMessage();
    }
}