<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($email)){
        if (!empty($message)){
            $subject = "New Contact";
            $body = $message;
            $emailid = $email;
        }else{
            echo "Message must not be empty";
        }
    }else{
        echo "Email must not be empty";
    }
}