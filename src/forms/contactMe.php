<?php

session_start();

include 'src/config/database.php'; 
$conn = new Database();
$conn->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name_raw = $_POST['name'];
    $email_raw = $_POST['email'];
    $title_raw = $_POST['title'];
    $body_raw = $_POST['body'];

    sanitizeInputs($name_raw, $email_raw, $title_raw, $body_raw);
}

function sanitizeInputs($name_raw, $email_raw, $title_raw, $body_raw){
    $name_raw = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email_raw = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $title_raw = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $body_raw = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);

    secureInputs($name_raw, $email_raw, $title_raw, $body_raw);
}

function secureInputs($name_raw, $email_raw, $title_raw, $body_raw){
    $name = htmlentities($name_raw, 'ENT_QUOTES');
    $email = htmlentities($email_raw, 'ENT_QUOTES');
    $title = htmlentities($title_raw, 'ENT_QUOTES');
    $body = htmlentities($body_raw, 'ENT_QUOTES');

    insertIntoDB($conn, $name, $email, $title, $body);
}

function insertIntoDB($conn, $name, $email, $title, $body){
    $name = mysqli_real_escape_string($db, $name);
    $email = mysqli_real_escape_string($db, $email);
    $title = mysqli_real_escape_string($db, $title);
    $body = mysqli_real_escape_string($db, $body);

    $sql = 'INSERT INTO Sender(name, email, title, body) VALUES(?, ?, ?, ?)';

    $stmt = $conn->prepare($sql);
    $stmt->bind_params("ssss", $name, $email, $title, $body);
    $stmt->execute();

}