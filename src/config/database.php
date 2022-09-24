<?php

class Database{
    
    private $host = 'localhost';
    private $user = 'personal_website';
    private $password = 'password*123';
    private $name = 'personal_website';

    private $conn;

    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host= ' . $this->host . ';dbname= ' . $this->name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $err){
            echo "Connection Failed: " . $err->getMessage();
        }

        return $this->conn;
    }

    // Getters

    public function getHost(){
        return $this->host;
    }

    public function getName(){
        return $this->name;
    }

    public function getUser(){
        return $this->user;
    }

    public function getPassword(){
        return $this->password;
    }
}