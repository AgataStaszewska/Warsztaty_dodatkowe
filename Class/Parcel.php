<?php

class Parcel{
    private $id;
    private $userId;
    private $size;
    static public $connection;
    
    public function __construct(){
        $this->id = -1;
        $this->$userId=null;
        $this->$size = null;
    }
    
    public function getId(){
            return $this->id;
        }      
        
    public function setuserId($userId){
        $this->userId = $userId;
        return true;
    }
    
    public function getUserId(){
        return $this->userId;
    }
    
    public function setSize($parcelSize){
        $this->size=$parcelSize;
    }
    
    public function saveParcelToDB(){

            if($this->id == -1){
            $sql = "INSERT INTO Parcels(user_id, size) VALUES (?, ?)";
            $result = $conn->prepare($sql);
            $result->execute([$this->user_id, $this->size]);
            }else{
            $sql = "UPDATE Parcels SET user_id=?, size=? WHERE id=$this->id";
            $result = $conn->prepare($sql);
            $result->execute([$this->user_id, $this->size]);
            if($result == true){
                return true;  
            }
            }
                return false;
        }
        
    static public function deleteParcel($id){              //TO NAPRAWDE JA NAPISALAM TE FUNKCJE NA POTRZEBY TWITTERA, ALE JUZ NIE DO KONCA LAPIE, OCB
   
            $sql = "SELECT COUNT(DISTINCT id) FROM Parcels";
            $result = $conn->query($sql);
            $rows = $result->fetch();
            $count = $rows[0];

         if($id<=$count){
            $sql = "DELETE FROM Parcels WHERE id=?";
            $result = $conn->prepare($sql);
            $result->execute([$id]);
             echo ("Parcel deleted");
         }else{
             echo("Nie ma przesylki o takim numerze ID");
             echo "<br>";
         }
    }
    
    
}
