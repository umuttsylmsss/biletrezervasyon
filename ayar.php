<?php
$host="localhost:3377"; 
$db_name="umut";
$db_user="root";  
$pass='';

date_default_timezone_set('Europe/Istanbul');
try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $db_user, $pass);
}catch (PDOExpception $e) {
    echo $e->getMessage();
}

?>