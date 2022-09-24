<?php

class Sender{
    
    // Database Attributes
    private $conn;
    private $db;

    // Sender Attribute
    private $name;
    private $email;
    private $title;
    private $body;

    public function __construct($name, $email, $title, $body){

        $this->name = $name;
        $this->email = $email;
        $this->title = $title;
        $this->body = $body;
    }

    public function create(){

    }

    public function read(){

    }

    // Getters

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getBody(){
        return $this->body;
    }
}