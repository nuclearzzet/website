<?php

class Database{
    
    private $host = 'localhost';
    private $user = 'personal_website';
    private $pass = 'personal_website*779';
    private $name = 'personal_website';

    private $conn;

    public function connect(){
        try{

            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
            return true;
        }catch(error_get_last $err){
            echo 'Connection_failed ' . $err->getMessage();
            return false;
        }

    }

}