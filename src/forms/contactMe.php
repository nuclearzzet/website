<?php

session_start();

include '../config/database.php'; 

$conn = Database::connect();

if($conn){
    echo "Connected";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS), ENT_QUOTES);
    $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL), ENT_QUOTES);
    $title = htmlentities(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS), ENT_QUOTES);
    $body = htmlentities(filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS), ENT_QUOTES);

    if (!empty($name) && !empty($email) && !empty($title) && !empty($body)){
        if (insertIntoDB($conn, $name, $email, $title, $body)){
            header('LOCATION: /personal_website/successful.php');
        }
    }else{
        $message = "All fields are required";
    }
}

function insertIntoDB($conn, $name, $email, $title, $body){
    try{
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $title = mysqli_real_escape_string($conn, $title);
        $body = mysqli_real_escape_string($conn, $body);

        $sql = 'INSERT INTO contacts(name, email, title, message) VALUES(?, ?, ?, ?)';

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