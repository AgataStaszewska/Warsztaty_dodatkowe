<?php
require("Class/User.php");

$host = "localhost";
$user = "root";
$db = "";
$password = "";

//$connection = new PDO("mysql:host=$host;dbname=$db", $user, $password);

//FAKE TO DELETE NOW!!!!!
$connection = "fakeconncetion";
//End FAKE TO DELETE

User::$connection = $connection; //MOZEMY TAK ZROBIC, BO JEST PUBLIC, JAKBY BYŁO PRIVATE MUSIELIBYSMY UZYC SETERA


