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
  <p> Hello employee, your login is <?=$_COOKIE['employee']?>.
  <a class="nav__link active" href="employee_exit.php"> <h4><b>Exit</b></h4></a>
  </p>


<div class="disabled__container">
  <table style="width:100%">
              <caption> </caption>
              <tr>
                 <td><h4> User </h4></td>
                 <td><h4> Equipments </h4> </td>
                 <td><h4> Report </h4> </td>
               </tr>
               <tr>
                  <td><h4> <a href="add_delete_users.php">Add or delete users</a> </h4></td>
                  <td><h4> <a href="employee.php">Add or delete equipments</a> </h4> </td>
                  <td><h4> <a href="report_for_employee.php">Show report</a> </h4> </td>
              </tr>
              <tr>
            <td></td>
              <td></td>
                 <td><h4> <a href="download_report.php">Download report</a> </h4> </td>
                 </tr>
          </table>
  	</div>
</div>




<?php endif; ?>

</body>

</html>
