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
                  <a class="nav__link active" href="employee.php"> <h4><b>Student</b></h4></a>
                  <a class="nav__link active" href="employee.php"> <h4><b>Employee</b></h4></a>
              </nav>
          </div>
      </div>
      </header>

      <div class="content">
        <form action="add.php" method="post">
          <input type="text" name="task" id="task" placeholder="TO DO" class="form-control">
          <button type="submit" name="sendTask" class="btn btn-success">Send</button>
        </form>

        <?php
        require 'configDB.php';
        echo '<ul>';
        $query=$pdo->query('SELECT * FROM `TASKS` order by `id`');
        while ($row=$query->fetch(PDO::FETCH_OBJ)) {
        echo '<li><b>'.$row->task.'</b><a href="delete.php?id='.$row->id.'"><button>Delete</button></a></li>';
      };
      ?>

    </body>
</html>
