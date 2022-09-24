<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($email)){
        if (!empty($name)){
            if (!empty($title)){
                if (!empty($body)){
                    header('LOCATION: /personal_website/index');
                }else{
                    $message =  "Message cannot be empty";
                }
            }else{
                $message = "Title cannot be empty";
            }
        }else{
            $message =  "Name cannot be empty";
        }
    }else{
        $message =  "Email cannot be empty";
    }
}