<?php

//Class represents one user

    class User{
        
        private $id;
        private $address;
        private $name;
        private $surname;
        private $credits;
        private $hashedPassword;
        static public $connection;
        //ATRYBUT PUBLICZNY: STATIC CONNECTION
        
        public function __construct(){
            $this->id = -1;
            $this->address = "";
            $this->name = "";
            $this->surname = "";
            $this->credits = null;  //Bo credits jest integerem, wiec nie mozemy dac mu pustego stringa;
            $this->hashedPassword = "";
            
        }
        
        public function getId(){
            return $this->id;
        }      
        
        public function getAddress(){
            return $this->address;
        }
        
        public function setAddress($address){
            $this->address = $address;
            return true;
        }
        
        public function getName(){
            return $this->name;
        }
        
        public function setName($name){
            $this->name = $name;
            return true;
        }
        
        public function getSurname(){
            return $this->surname;
        }
        
        public function setSurname($surname){
            $this->surname = $surname;
            return true;
        }
        
        public function getCredits(){
            return $this->credits;
        }
        
        public function setCredits($credits){
            $this->credits = $credits;
            return true;
        }
        
        public function getHashedPassword($hashedPassword){
             return $this->hashedPassword;
        }
        
        public function setHashedPassword($password){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $this->hashedPassword = $hashedPassword;
            return true;
       
        }
       public function saveUserToDB(){
           
       }
       
           
    }
    