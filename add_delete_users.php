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



      <div class="empty">      </div>

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
<ul>
      <div class="disabled__container2">
        <h4>Add new user: </h4>

               <form action="add_users_post.php" method="post">

           <p>
                 <label for="firstName">Login:</label>
                 <input type="text" name="login" id="login" placeholder="Login" class="form-control">
            </p>
            <p>
                <label for="emailAddress">Password:</label>
                  <input type="text" name="password" id="password" placeholder="Password" class="form-control">
            </p>
            <p>
                <label for="firstName">First Name:</label>
                <input type="text" name="user_name" id="user_name" placeholder="First name" class="form-control">
            </p>
            <p>
                <label for="lastName">Last Name:</label>
                  <input type="text" name="surname" id="surname" placeholder="Last name" class="form-control">
            </p>
            <p>
                <label for="emailAddress">Email Address:</label>
                  <input type="text" name="email" id="email" placeholder="Email" class="form-control">
            </p>
            <p>
                <label for="emailAddress">Status:</label>
                  <select name="status" id="status" input type="text" class="form-control">
                    <option value="student">student</option>
                    <option value="employee">employee</option>
                  </select>

            </p>

          <button type="submit" name="sendTask" class="btn btn-success">Add</button>
        </form>
      </div>

  <div class="empty"></div>
<h4>Delete user: </h4>
      <?php
      require 'configDB.php';
      echo '<ul>';
      $query=$pdo->query('    SELECT `user_id` , `login` , `user_name` , `surname` , `email` , `status` FROM `users` order by `user_id`   ');

      echo '

      <table class="styled-table">
      <thead>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Login</th>
            <th>Email</th>
            <th>Status</th>
            <th> </th>
        </tr>
      </thead>
      <tbody>'         ;
      while ($row=$query->fetch(PDO::FETCH_OBJ)) {
      echo '
                       <tr>
                           <td>'.$row->user_name.'</td>
                            <td>'.$row->surname.'</td>
                           <td>'.$row->login.'</td>
                            <td>'.$row->email.' </td>
                            <td>'.$row->status.' </td>
                            <td><a href="delete_user.php?id='.$row->user_id.'"><button>Delete</button></a> </td>
                       </tr>   ';}
                  echo '
                       <tbody>
                   </table>
               </div>';
         ?>
    <?php endif; ?>

    </body>

    </html>
