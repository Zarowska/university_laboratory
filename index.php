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
                    <a class="nav__link active" href="add.php"> <h4><b>Home </b></h4></a>
                    <a class="nav__link active" href="index.php"> <h4><b>Login </b></h4></a>
                </nav>
            </div>
        </div>
        </header>



        <?php
        require 'configDB.php';

        echo '<ul>';
        $query=$pdo->query('SELECT * FROM `TASKS` order by `id`');
        while ($row=$query->fetch(PDO::FETCH_OBJ)) {
        //  echo '<li><b>'.$row->task.'</b><a href="delete.php?id='.$row->id.'"><button>Delete</button></a></li>';

           echo '
             <div class="disabled__container">
             <div class="disabled__col  disabled__col--first">

             <h4>'.$row->task.'</h4><p>dostepno '.$row->id.' szt </p>
             </div>
             <div class="disabled__col  disabled__col--second">
                description   '.$row->task.'
                <br>description
                <br>description
                <br>description
             </div>
             <div class="fdisabled__col  disabled__col--third">
                <img src="img\1.jpg" alt="">
             </div>
           </div>
           ';
        }
?>


    </body>
</html>