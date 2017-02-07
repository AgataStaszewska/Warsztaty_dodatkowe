<?php

include "../Class/User.php";

//if ($oUser instanceof User){
//    echo "Instance of User";
//}else{
//    echo "Instance is not User";
    
   
    

 
    
    var_dump($connection);
    $user1 = new User();
//    $user1->setAddressId("");
    $user1->setName("Agata");
    $user1->setSurname("Staszewska");
    $user1->setCredits(134567);
    $user1->setHashedPassword("haslo");
    var_dump($user1);
    $user1->saveUserToDB();




