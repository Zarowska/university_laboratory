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
            <a class="nav__link active" href="student.php"> <h4><b>Student</b></h4></a>
            <a class="nav__link active" href="employee.php"> <h4><b>Employee</b></h4></a>
          </nav>
      </div>
  </div>
  </header>

    <div class="empty">
    </div>

<?php if(!isset($_COOKIE["employee"])): ?>
<div class="container mt-4">
  <h4>Back to authorization for student:</h4>
  <a class="nav__link active" href="student.php"> <h4><b>Back</b></h4></a>
</div>

<?php else: ?>
<h4>Enter new password:</h4>
  <form action="new_password_employee.php" method="post">
    <input type="password" class="form-control" name="new_password_employee"  id="new_password_employee" placeholder="Enter new  password"><br>
    <button class="button-23=success" type="submit"><h5>Reset</h5></button>
  </form>


<?php endif; ?>

</body>

</html>
