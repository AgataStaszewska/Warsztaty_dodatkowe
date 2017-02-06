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

            if($this->id == -1){
            $sql = "INSERT INTO Users(address, name, surname, credits, hashed_password) VALUES (?, ?, ?, ?, ?)";
            $result = $conn->prepare($sql);
            $result->execute([$this->address, $this->name, $this->surname, $this->credits, $this->hashedPassword]);
            }else{
            $sql = "UPDATE Users SET address=?, name=?, surname=?, credits=?, hashed_password=?, WHERE id=$this->id";
            $result = $conn->prepare($sql);
            $result->execute([$this->address, $this->name, $this->surname, $this->credits, $this->hashedPassword]);
            if($result == true){
                return true;  
            }
            }
                return false;
        }
      
      
        static public function deleteUser($id){
   
            $sql = "SELECT COUNT(DISTINCT id) FROM Users";
            $result = $conn->query($sql);
            $rows = $result->fetch();
            $count = $rows[0];

         if($id<=$count){
            $sql = "DELETE FROM Users WHERE id=?";
            $result = $conn->prepare($sql);
            $result->execute([$id]);
             echo ("User deleted");
         }else{
             echo("Nie ma użytkownika o takim numerze ID");
             echo "<br>";
         }
        }
        
         static public function loadUserById($id){
    
         $sql = "SELECT address, name, surname, credits, hashed_password FROM Users WHERE id=?";
         $result = $conn->prepare($sql);
         $result->execute([$id]);
             foreach($result as $row){
             echo("Nazwa użytkownika to ".$row["username"].", a jego e-mail to ".$row["email"]);
             echo "<br>";

             }
             $loadedUser = new User();
             $loadedUser->id = $id;
             $loadedUser->address = $row["address"];
             $loadedUser->name = $row["name"];
             $loadedUser->surname = $row["surname"];
             $loadedUser->credits = $row["credits"];
             $loadedUser->hashedPassword = $row["hashed_password"];

            return $loadedUser;
         }
         
         static public function loadAllUsers(){
    
           $sql = "SELECT * FROM Users";
           $usersArray = [];
           $result = $conn->query($sql);

                foreach($result as $row){
                    $loadedUser = new User();
                    $loadedUser->id = $id;
                    $loadedUser->address = $row["address"];
                    $loadedUser->name = $row["name"];
                    $loadedUser->surname = $row["surname"];
                    $loadedUser->credits = $row["credits"];
                    $loadedUser->hashedPassword = $row["hashed_password"];

                    $usersArray[] = $loadedUser;
         }
        }




  }

       
           
    
    