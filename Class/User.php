<?php

//Class represents one user

    class User{
        
        private $id;
        private $addressId;
        private $name;
        private $surname;
        private $credits;
        private $hashedPassword;
        public static $connection;
        //ATRYBUT PUBLICZNY: STATIC CONNECTION
        
        public function __construct(){
            $this->id = -1;
            $this->addressId = null;
            $this->name = "";
            $this->surname = "";
            $this->credits = null;  //Bo credits jest integerem, wiec nie mozemy dac mu pustego stringa;
            $this->hashedPassword = "";
            
        }
        
        public function getId(){
            return $this->id;
        }      
        
        public function getAddressId(){
            return $this->addressId;
        }
        
        public function setAddressId($addressId){
            $this->address = $addressId;
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
            $result = $connection->prepare($sql);
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
        
         public function loadFromDB($id){
    
         $sql = "SELECT * FROM Users WHERE id=$id";
         var_dump(Self::$connection);
            $result = Self::$connection->query($sql);
            var_dump($result);
         if($result){
             var_dump($result);
             $row = $result->fetch(PDO::FETCH_ASSOC);
             $this->id = $id;
             $this->address_id = $row["address_id"];
             $this->name = $row["name"];
             $this->surname = $row["surname"];
             $this->credits = $row["credits"];
             $this->hashedPassword = $row["hashed_password"];
              return $row;  //TU JEST ZWRACANIE ROW, PONIEWAZ NIE TRUE, BO UZYWAMY W WIDOKU
             
             }else{
                 echo ("Bład przy ladowaniu z bazy");
                 return false;
             }

         }
         
         static public function loadAllFromDB(){
    
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

       
           
    
    