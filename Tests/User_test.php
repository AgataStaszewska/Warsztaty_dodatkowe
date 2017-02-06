<?php

include "../Class/User.php";

$oUser = new User();
var_dump($oUser);

//Back later
if ($oUser instanceof User){
    echo "Instance of User";
}else{
    echo "Instance is not User";
    
}



//TODO test get and set functions
//TODO Write funciotns to tests
