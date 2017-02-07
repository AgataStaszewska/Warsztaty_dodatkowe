<?php

require("Class/User.php");


$host = "localhost";
$user = "paczkolab";
$db = "paczkolab";
$password = "haslo";

$connection = new PDO("mysql:host=$host;dbname=$db;", $user, $password);

//if($connection->errorCode()!=null){
//  die("Connection unsuccessful. Error: ".$connection->errorInfo()[2]);
//}else{
//  return true;
//}
User::$connection = $connection; //MOZEMY TAK ZROBIC, BO JEST PUBLIC, JAKBY BYŁO PRIVATE MUSIELIBYSMY UZYC SETERA
