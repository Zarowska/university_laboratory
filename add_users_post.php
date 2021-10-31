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

require 'configDB.php';
$sql = "SELECT * FROM `users` WHERE `login`=:login ";
$query=$pdo->prepare($sql);
$query->execute(array('login' => $login));
$login_count=$query->rowCount();

if($login==''){
  echo 'Enter login';
  exit;
}
elseif ($login_count>0) {
  echo
  '<a class="nav__link active" href="add_delete_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>The login is used</h4> '
    ;
  exit;
};

if($password==''){
  echo 'Enter password test';
  exit;
}
else {
  $password = md5($password."s@som909i");
}

$sql = "SELECT * FROM `users` WHERE `user_name`=:user_name and `surname`=:surname";
$query=$pdo->prepare($sql);
$query->execute(array('user_name' => $user_name,'surname' => $surname));
$user_count=$query->rowCount();

if($user_name==''||$surname==''){
  echo
  '<a class="nav__link active" href="add_delete_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>First name and surname cannot be empty</h4> '
    ;
  exit;
}
elseif ($user_count>0) {
  echo
  '<a class="nav__link active" href="add_delete_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>a user already exists</h4> '
    ;
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

echo 'Add';
echo 'Back';

?>
