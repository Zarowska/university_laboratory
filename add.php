<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="university_laboratory";

$task=$_POST['task'];
if($task==''){
  echo 'Enter task';
  exit;
}
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname );

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$dsn = 'mysql:host=localhost;dbname=university_laboratory';
$pdo=new PDO($dsn, $username, $password );
$sql='INSERT INTO tasks(task) VALUES(:task)';
$query=$pdo->prepare($sql);
$query->execute(['task'=>$task]);

?>
