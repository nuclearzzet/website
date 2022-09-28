<?php

class Database{

    public static function connect(){

        $host = 'localhost';
        $user = 'personal_website';
        $pass = 'personal_website*779';        
        $name = 'personal_website';

        $conn = new mysqli($host, $user, $pass, $name);

        return $conn;
    }
}