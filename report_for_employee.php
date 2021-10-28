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
              <a class="nav__link active" href="employee.php"> <h4><b>Back</b></h4></a>
              <a class="nav__link active" href="student_exit.php"> <h4><b>Exit</b></h4></a>
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
<?php else:
$login = $_COOKIE['employee'];
  ?>


  <?php
  require 'configDB.php';
  echo '<ul>';
  $query=$pdo->query("select * from report_for_guest  order by equipment_name");
 echo '

 <table class="styled-table">
<thead>
    <tr>
        <th>Equipment</th>
        <th>amount</th>
        <th>available</th>
    </tr>
</thead>
<tbody>'         ;
  while ($row=$query->fetch(PDO::FETCH_OBJ)) {
  echo '
                   <tr>
                       <td>'.$row->equipment_name.'  <br> '.$row->model.'</td>
                       <td>'.$row->amount.'  </td>
                        <td>'.$row->amount_free.' </td>

                   </tr>   ';}
              echo '
                   <tbody>
               </table>
           </div>';
     ?>

     <br>
     <br>

     <?php
     require 'configDB.php';
     echo '<ul>';
     $query=$pdo->query("select * from report_for_employee  order by equipment_name");
    echo '

    <table class="styled-table">
   <thead>
       <tr>
           <th>Equipment</th>
           <th>Date of Borrowing</th>
           <th>User</th>
       </tr>
   </thead>
   <tbody>'         ;
     while ($row=$query->fetch(PDO::FETCH_OBJ)) {
     echo '
                      <tr>
                          <td>'.$row->equipment_name.'  <br> '.$row->model.'</td>
                          <td>'.$row->date_borrow.'   </td>
                           <td>'.$row->user_name.'  '.$row->surname.' <br> '.$row->login.' </td>

                      </tr>   ';}
                 echo '
                      <tbody>
                  </table>
              </div>';
        ?>


<?php endif; ?>

</body>

</html>
