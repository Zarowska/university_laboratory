<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="university_laboratory";


$dsn = "mysql:host={$servername};dbname={$dbname}";
$pdo=new PDO($dsn, $username, $password );
?>
