<?php

$server ="localhost";
$user ="root";
$pwd = "";
$db = "mydb";

$conn = mysqli_connect ($server, $user, $pwd, $db);

if(!$conn){

die(mysqli_error($conn));

}
else
echo "Established!";


?>