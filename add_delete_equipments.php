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
                  <a class="nav__link active" href="index.php"> <h4><b>Home</b></h4></a>
                  <a class="nav__link active" href="reset_password_employee.php"> <h4><b>Reset password</b></h4></a>
                  <a class="nav__link active" href="employee_exit.php"> <h4><b>Exit</b></h4></a>
              </nav>
          </div>
      </div>
      </header>

      <div class="container mt-4">
        <a class="nav__link active" href="employee.php"> <h4><b>Back</b></h4></a>
        <p>
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
<ul>
      <div class="disabled__container2">
        <h4>Add new equipment: </h4>
               <form action="add_equipment_post.php" method="post">
           <p>
                 <label for="equipment_name">equipment_name:</label>
                 <input type="text" name="equipment_name" id="equipment_name" placeholder="equipment_name" class="form-control">
            </p>

            <p>
                <label for="producer">producer:</label>
                <input type="text" name="producer" id="producer" placeholder="producer" class="form-control">
            </p>
            <p>
                <label for="model">model:</label>
                  <input type="text" name="model" id="model" placeholder="model" class="form-control">
            </p>
            <p>
                <label for="image">image: get relative path to the file</label>
                  <input type="text" name="image" id="image" placeholder="image" class="form-control">
            </p>
            <p>
                <label for="description">description:</label>
                  <input type="text" name="description" id="description" placeholder="description" class="form-control">
            </p>
            <p>
                <label for="URL">URL:</label>
                  <input type="text" name="URL" id="URL" placeholder="URL" class="form-control">
            </p>
            <p>
                <label for="amount">amount:</label>
                  <input type="number"step="1" name="amount" id="amount" placeholder="amount" class="form-control">
            </p>
            <p>
                <label for="tag">tag:</label>
                  <select name="tag" id="tag" input type="text" class="form-control">
                    <option value="microscope">microscope</option>
                    <option value="chemistry">chemistry</option>
                    <option value="physics">physics</option>
                    <option value=""></option>
                  </select>
            </p>
          <button type="submit" name="sendTask" class="btn btn-success">Add</button>
        </form>
      </div>

<h4>Delete equipment: </h4>
      <?php
      require 'configDB.php';
      echo '<ul>';
      $query=$pdo->query('    SELECT `equipment_id` , `equipment_name` ,  `producer` ,`model` , `image` , `description`, `URL` , `tag`, `amount`  FROM `equipments` order by `equipment_id`   ');

      echo '

      <table class="styled-table">
      <thead>
        <tr>
            <th>equipment_name</th>
            <th>producer</th>
            <th>model</th>
            <th>image</th>
            <th>tag</th>
            <th>amount</th>
            <th> </th>
        </tr>
      </thead>
      <tbody>'         ;
      while ($row=$query->fetch(PDO::FETCH_OBJ)) {
      echo '
                       <tr>
                           <td>'.$row->equipment_name.'</td>
                            <td>'.$row->producer.'</td>
                           <td>'.$row->model.'</td>
                            <td>'.$row->image.' </td>
                            <td>'.$row->tag.' </td>
                            <td>'.$row->amount.' </td>
                           <td><a href="delete_equipment.php?equipment_id='.$row->equipment_id.'"><button>Delete</button></a> </td>
                       </tr>   ';}
                  echo '
                       <tbody>
                   </table>
               </div>';
         ?>
    <?php endif; ?>

    </body>

    </html>
