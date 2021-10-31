<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname="university_laboratory";

$login= filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$user_name= filter_var(trim($_POST['user_name']),FILTER_SANITIZE_STRING);
$surname= filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
$email= filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);

if($login==''){
  echo 'Enter login';
  exit;
}

if($password==''){
  echo 'Enter password';
  exit;
}
else {
  $password = md5($password."s@som909i");
}

if($user_name==''){
  echo 'Enter First Name';
  exit;
}

if($surname==''){
  echo 'Enter surname';
  exit;
}


$status=$_POST['status'];
if($status==''){
  echo 'Choose status';
  exit;
}


require 'configDB.php';
$data = [
    'login' => $login,
    'surname' => $surname,
    'email' => $email,
    'password' => $password,
    'status' => $status
  ];
//$dsn = "mysql:host={$servername};dbname={$dbname}";
//$pdo=new PDO($dsn, $username, $password );
$sql='INSERT INTO users(login, user_name, surname, email, password, status) VALUES(:login, :user_name, :surname, :email, :password, :status)';
$query=$pdo->prepare($sql);

$query->execute(array('login' => $login, 'user_name' => $user_name, 'surname' => $surname, 'email' => $email, 'password' => $password, 'status' => $status));


?>
