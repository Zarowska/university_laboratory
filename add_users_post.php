<!DOCTYPE html>
<html>
    <head>
			<meta charset="utf-8">
      <meta name="viewport" content="width=device-wigth, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
				<title>University laboratory</title>
	  </head>
    <body>


<body>
  <div class="empty">
  </div>

  <header class="header">
     <div class="container">
      <div class="header__inner">
          <div class="header__logo">University laboratory</div>
          <nav class="nav">
              <a class="nav__link active" href="index.php"> <h4><b>Home </b></h4></a>
              <a class="nav__link active" href="reset_password_employee.php"> <h4><b>Reset password</b></h4></a>
              <a class="nav__link active" href="employee_exit.php"> <h4><b>Exit</b></h4></a>
          </nav>
      </div>
  </div>
  </header>


    <div class="empty">
    </div>

<?php if(!isset($_COOKIE["employee"])): ?>
<div class="container mt-4">
  <h1>Authorization for employee</h1>
  <form action="employee_auth.php" method="post">
    <input type="text" class="form-control" name="login"  id="login" placeholder="Enter login"><br>
    <input type="password" class="form-control" name="password"  id="password" placeholder="Enter password"><br>
    <button class="button-23=success" type="submit"><h5>Login</h5></button>
  </form>
</div>

<?php else: ?>

<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname="university_laboratory";

$login= filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$user_password= filter_var(trim($_POST['user_password']),FILTER_SANITIZE_STRING);
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
  '<a class="nav__link active" href="add_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>The login is used</h4> '
    ;
  exit;
};

if($user_password==''){
  echo
  '<a class="nav__link active" href="add_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>Enter password</h4> '   ;
  exit;
  }
else {
  $user_password = md5($user_password."s@som909i");
}

$sql = "SELECT * FROM `users` WHERE `user_name`=:user_name and `surname`=:surname";
$query=$pdo->prepare($sql);
$query->execute(array('user_name' => $user_name,'surname' => $surname));
$user_count=$query->rowCount();

if($user_name==''||$surname==''){
  echo
  '<a class="nav__link active" href="add_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>First name and surname cannot be empty</h4> '
    ;
  exit;
}
elseif ($user_count>0) {
  echo
  '<a class="nav__link active" href="add_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>a user already exists</h4> '
    ;
}


$status=$_POST['status'];
if($status==''){
  echo
  '<a class="nav__link active" href="add_users.php"> <h3><b>Back</3></h4></a>'.
  '<h4>Choose status</h4> '   ;
  exit;
}
require 'configDB.php';
//$dsn = "mysql:host={$servername};dbname={$dbname}";
//$pdo=new PDO($dsn, $username, $password );
$sql='INSERT INTO users(login, user_name, surname, email, password, status) VALUES(:login, :user_name, :surname, :email, :password, :status)';
$query=$pdo->prepare($sql);

$query->execute(array('login' => $login, 'user_name' => $user_name, 'surname' => $surname, 'email' => $email, 'password' => $user_password, 'status' => $status));

echo '<h4>The user`s account has been added.</h4>';
echo '<a class="nav__link active" href="add_users.php"> <h3><b>Back</3></h4></a>';

?>


<?php endif; ?>

</body>

</html>
