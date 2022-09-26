<?php

session_start();

include 'src/config/database.php'; 
$conn = new Database();
$conn->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlentities(filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW), 'ENT_QUOTES');
    $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW), 'ENT_QUOTES');
    $title = htmlentities(filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW), 'ENT_QUOTES');
    $body = htmlentities(filter_input(INPUT_POST, 'body', FILTER_UNSAFE_RAW), 'ENT_QUOTES');

    insertIntoDB($conn, $name, $email, $title, $body);
}

function insertIntoDB($conn, $name, $email, $title, $body){
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $title = mysqli_real_escape_string($conn, $title);
    $body = mysqli_real_escape_string($conn, $body);

    $sql = 'INSERT INTO Sender(name, email, title, body) VALUES(?, ?, ?, ?)';

    $stmt = $conn->prepare($sql);
    $stmt->bind_params("ssss", $name, $email, $title, $body);
    $stmt->execute();

}