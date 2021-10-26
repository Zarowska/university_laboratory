<?php
$login = $_COOKIE['student'];
$new_password = $_POST['new_password_student'];

$new_password = md5($new_password."s@som909i");

require 'configDB.php';

$sql="UPDATE `users` SET `password`=:new_password  WHERE `login`=:login   and `status`='student'";
$query=$pdo->prepare($sql);
$query->execute(array(':login' => $login, ':new_password' => $new_password));

setcookie('student','login', time()-3600, "/university_laboratory/");

header('Location: /university_laboratory/student.php');


?>
