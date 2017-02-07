<?php

require 'config/connection.php';
var_dump("sss");


//DEKLARACJE ZMIENNYCH
$request = "";
$arrayRequest=[];
$requestClass="";
$requestParam = '';
var_dump("aaa");

//PARSOWANie ZAPYTANIA
$request = $_SERVER['REQUEST_URI'];
$arrayRequest = explode('/', $request);
var_dump("zzz");
//if(isset($arrayRequest[3])){
//    $requestClass = $arrayRequest[2];
//}else{
//    echo "drugi przypadek";
//}

if(isset($arrayRequest[3])){
    $requestParam = intval($arrayRequest[3]);
    var_dump("xxx");
}else{ 
    echo "nie podales parametru";
    var_dump("yyy");
}
var_dump("$requestParam");

if($requestParam>0){
    $oUser = new User();
    $userData = $oUser->loadFromDB($requestParam);
    var_dump("ooo");
}
    if($requestParam){
        
    }else{
        $allUsers = User::loadAllFromDB();
        var_dump($allUsers);
    }


//$arrayRequest[0] = Warsztaty_dodatkowe
//$arrayRequest[1] = router.php


$requestClass = $arrayRequest[3];



if($_SERVER['REQUEST_METHOD']=="GET"){
    
    if($requestClass == "user"){
        
        if(is_int($requestParam)){
            //WYSWIETLI JEDNEGO USERA
        }
            $user = new User();
        $userData = $user->loadFromDB($requestParam); 
        }else{
        //WYSWIETLI WSZYSTKICH
       
        
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