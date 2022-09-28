<?php

class Database{
    
    
    private $host;
    private $user;
    private $pass;
    private $name;

    private $conn;

    public static function connect(){
        try{

            $host = 'localhost';
            $user = 'personal_website';
            $pass = 'personal_website*779';
            $name = 'personal_website';

            $conn = new mysqli($host, $user, $pass, $name);

            if($conn){
                return $conn;
            }else{
                $message = 'Could not Connection to db';
                throw new Exception($message);
            }
        }catch(error_get_last $err){
            echo "Connection Failed: " . $err->getMessage();
        }
    }
}