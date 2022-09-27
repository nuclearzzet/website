<?php

include '../../config/database.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = htmlentities(filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $username = htmlentities(filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $password1 = htmlentities($_POST['password1'], ENT_QUOTES);
    $password2 = htmlentities($_POST['password2'], ENT_QUOTES);

    if ($password1 == $password2){
        $hashedPassword = hash("sha256", $password1);
        insertIntoDB($conn, $name, $username, $email, $hashedPassword);
    }
}

function insertToDB($conn, $name, $username, $email, $hashedPassword){
    try{
        $name = mysqli_real_escape_string($name);
        $username = mysqli_real_escape_string($username);
        $email = mysqli_real_escape_string($email);
        $hashedPassword = mysqli_escape_string($hashedPassword);

        $sql = "INSERT INTO admin(name, username, email, password) VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $username, $email, $hashedPassword);

        if($stmt->execute()){
            return true;
        }else{
            throw new Exception();
        }
    }catch(Exception $err){
        echo "Error: " . $err->getMessage();
    }
}