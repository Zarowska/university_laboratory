<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname="university_laboratory";

$task=$_POST['task'];
if($task==''){
  echo 'Enter task';
  exit;
}

require 'configDB.php';

//$dsn = "mysql:host={$servername};dbname={$dbname}";
//$pdo=new PDO($dsn, $username, $password );
$sql='INSERT INTO tasks(task) VALUES(:task)';
$query=$pdo->prepare($sql);
$query->execute(['task'=>$task]);

 header('Location: /university_laboratory/index.php');

?>
