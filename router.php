<?php

include ("config/connection.php");

var_dump($_SERVER['REQUEST_METHOD']);
var_dump($_SERVER['REQUEST_URI']);


if($_SERVER['REQUEST_METHOD']=='GET'){
   
    
    if($_SERVER['REQUEST_URI']=="/Warsztaty_dodatkowe/router.php/user"){
        $newUser = new User();
    echo "chodzi o users";
    }else{
        echo "nie chodzi o usera";
    }
    
}