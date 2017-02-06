<?php

class Address{
        
        private $id;
        private $city;
        private $street;
        private $flat;
        private $postalCode;
        static public $connection;

        
        public function __construct(){
            $this->id = -1;
            $this->city = "";
            $this->street = "";
            $this->flat = "";
            $this->postalCode = null;  
            
        }
        
        public function getId(){
            return $this->id;
        }      
        
        public function getCity(){
            return $this->city;
        }
        
        public function setCity($city){
            $this->city = $city;
            return true;
        }
        
        public function getStreet(){
            return $this->street;
        }
        
        public function setStreet($street){
            $this->street = $street;
            return true;
        }
        
        public function getFlat(){
            return $this->flat;
        }
        
        public function setFlat($flat){
            $this->flat = $flat;
            return true;
        }
        
        public function getPostalCode(){
            return $this->postalCode;
        }
        
        public function setPostalCode($postalCode){
            $this->postalCode = $postalCode;
            return true;
        }
        

       public function saveAddressToDB(){

            if($this->id == -1){
            $sql = "INSERT INTO Adresses(city, street, flat, postal_code) VALUES (?, ?, ?, ?)";
            $result = $conn->prepare($sql);
            $result->execute([$this->city, $this->street, $this->flat, $this->postal_code]);
            }else{
            $sql = "UPDATE Users SET city=?, street=?, flat=?, postal_code=?, WHERE id=$this->id";
            $result = $conn->prepare($sql);
            $result->execute([$this->city, $this->street, $this->flat, $this->postal_code]);
            if($result == true){
                return true;  
            }
            }
                return false;
        }
      
      
        static public function deleteAddress($id){              //TO NAPRAWDE JA NAPISALAM TE FUNKCJE NA POTRZEBY TWITTERA, ALE JUZ NIE DO KONCA LAPIE, OCB
   
            $sql = "SELECT COUNT(DISTINCT id) FROM Users";
            $result = $conn->query($sql);
            $rows = $result->fetch();
            $count = $rows[0];

         if($id<=$count){
            $sql = "DELETE FROM Users WHERE id=?";
            $result = $conn->prepare($sql);
            $result->execute([$id]);
             echo ("Address deleted");
         }else{
             echo("Nie ma adresu o takim numerze ID");
             echo "<br>";
         }
        }
        
         static public function loadAddressById($id){
    
         $sql = "SELECT city, street, flat, postal_code FROM Addresses WHERE id=?";
         $result = $conn->prepare($sql);
         $result->execute([$id]);
             foreach($result as $row){


             }                     //TO TO CHYBA W FOREACHU BYĆ POWINNO
//             $loadedUser = new User();
//             $loadedUser->id = $id;
//             $loadedUser->address = $row["address"];
//             $loadedUser->name = $row["name"];
//             $loadedUser->surname = $row["surname"];
//             $loadedUser->credits = $row["credits"];
//             $loadedUser->hashedPassword = $row["hashed_password"];
//
//            return $loadedUser;
         }
         
        
    }
