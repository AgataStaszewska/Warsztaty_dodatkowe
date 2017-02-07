<?php

require 'config/connection.php';


//DEKLARACJE ZMIENNYCH
$request = "";
$arrayRequest=[];
$requestClass="";

//PARSOWANie ZAPYTANIA
$request = $_SERVER['REQUEST_URI'];
$arrayRequest = explode('/', $request);

//if(isset($arrayRequest[3])){
//    $requestClass = $arrayRequest[2];
//}else{
//    echo "drugi przypadek";
//}

if(isset($arrayRequest[4])){
    $requestParam = $arrayRequest[4];
}else{ 
    echo "nie podales parametru";
}

var_dump($arrayRequest);
var_dump($requestParam);


//$arrayRequest[0] = Warsztaty_dodatkowe
//$arrayRequest[1] = router.php
//var_dump($arrayRequest);

$requestClass = $arrayRequest[4];

//var_dump($requestClass);

if($_SERVER['REQUEST_METHOD']=="GET"){
    
    if($requestClass == "user"){
        
        $user = new User();
        $userData = $user->loadFromDB(1);
       
        
    }
}
//
//if($_SERVER['REQUEST_METHOD']=='GET'){
//   
//    
//    if($_SERVER['REQUEST_URI']=="/Warsztaty_dodatkowe/router.php/user"){
//        $newUser = new User();
//    echo "chodzi o users";
//    }else{
//        echo "nie chodzi o usera";
//    }
//    
//}