<?php
require 'configDB.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$password = md5($password."s@som909i");

$sql = "SELECT * FROM `users` WHERE `login`=:login and  `password`=:password and `status`='employee'";

$query=$pdo->prepare($sql);
$query->execute(array('login' => $login, 'password' => $password));
$employee_count=$query->rowCount();
  if($employee_count==0){
    echo
    '<a class="nav__link active" href="employee.php"> <h3><b>Back</3></h4></a>'.
    '<h4>Employee not found. The login or password is incorrect</h4> '
      ;
    exit;
  }

setcookie('employee',$login, time()+3600, "/university_laboratory/");


 header('Location: /university_laboratory/employee.php');

?>
