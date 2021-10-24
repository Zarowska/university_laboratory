<?php
require 'configDB.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$password = md5($password."s@som909i");

$sql = " ";
$pdo->prepare($sql)->execute([$password]);

 header('Location: /university_laboratory/employee.php');
?>
