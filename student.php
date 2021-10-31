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
              <a class="nav__link active" href="reset_password_student.php"> <h4><b>Reset password</b></h4></a>
              <a class="nav__link active" href="student_exit.php"> <h4><b>Exit</b></h4></a>
          </nav>
      </div>
  </div>
  </header>


    <div class="empty">
    </div>

<?php if(!isset($_COOKIE["student"])): ?>
<div class="container mt-4">
  <h1>Authorization for student</h1>
  <form action="student_auth.php" method="post">
    <input type="text" class="form-control" name="login"  id="login" placeholder="Enter login"><br>
    <input type="password" class="form-control" name="password"  id="password" placeholder="Enter password"><br>
    <button class="button-23=success" type="submit"><h5>Login</h5></button>
  </form>
</div>
<?php else: ?>
<?php
  $login=$_COOKIE['student'];
  require 'configDB.php';
  $sql = "SELECT * FROM `users` WHERE `login`=:login ";
  $query=$pdo->prepare($sql);
  $query->execute(array('login' => $login));
  $row=$query->fetch(PDO::FETCH_OBJ);
  $user_name=$row->user_name;
  $surname=$row->surname;
  ?>

  <div class="container mt-4">
  <h4><p> Hello  <b><?=$user_name?>   <?=$surname?> </b>. </h4>
  </div>

  <?php
  require 'configDB.php';
  echo '<ul>';
  $query=$pdo->query("select * from report_for_student where login = '$login'  order by equipment_id");
 echo '<h4><b><p>  Your equipments:  </p></b></h4>';
  while ($row=$query->fetch(PDO::FETCH_OBJ)) {
  echo '
  <div class="disabled__container">
    <div class="disabled__col  disabled__col--first">
    <i> <h4>'.$row->equipment_name.'</h4></i>
    <br><h6> producer: '.$row->producer.'
    <br>model: '.$row->model.'</h6>
    <br>tag:   '.$row->tag. '
    <br>
    </div>
    <div class="disabled__col  disabled__col--second">
    date_borrow:  '.$row->date_borrow.'
     </div>
     <div class="fdisabled__col  disabled__col--third">
     <img src="'.$row->image.'" alt="">
     </div>
     </div>';}
     ?>
<?php endif; ?>

</body>

</html>
