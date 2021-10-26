<?php
$login = $_COOKIE['employee'];
$new_password = $_POST['new_password_employee'];

$new_password = md5($new_password."s@som909i");

require 'configDB.php';

$sql="UPDATE `users` SET `password`=:new_password  WHERE `login`=:login   and `status`='employee'";
$query=$pdo->prepare($sql);
$query->execute(array(':login' => $login, ':new_password' => $new_password));

setcookie('employee','login', time()-3600, "/university_laboratory/");

header('Location: /university_laboratory/employee.php');


?>
