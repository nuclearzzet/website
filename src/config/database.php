<?php

class Database{

    public static function connect(){

        $host = 'localhost';
        $user = 'personal_website';
        $pass = 'O2qat8uGu.O-5tiq';        
        $name = 'personal_website';

        $conn = new mysqli($host, $user, $pass, $name);

        return $conn;
    }
}