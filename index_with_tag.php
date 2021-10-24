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

  <div class="empty"></div>

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


  <div class="empty"></div>

  <?php
    $tags = $_POST['tags'];
    ?>

	<div class="disabled__container">
    <div class="disabled__col  disabled__col--first">
      <h4> Chosen tag is "<?php echo $tags; ?>"   </h4>
    </div>
    	<form action="index_with_tag.php" method="post">
            <label for="tags"><h4>Choose other tag:</h4></label>
			<select name="tags">
				<option value="all">all</option>
				<option value="chemistry">chemistry</option>
				<option value="physics">physics</option>
				<option value="microscope">microscope</option>
			</select>
		<input type="submit">
		</form>

	</div>


  <?php
    $tags = $_POST['tags'];
    require 'configDB.php';
    echo '<ul>';
    if ($tags == "all") {
      $query=$pdo->query("SELECT equipment_name, producer, model, amount, IFNULL(e.amount,0)-IFNULL(h.used,0) as amount_free,  tag, description, URL, image FROM `equipments` e left join (select equipment_id, IFNULL(count(*),0) as used from `hire` where date_return is null group by equipment_id ) h on e.equipment_id = h.equipment_id order by e.equipment_id  ");
    }
    else{
      $query=$pdo->query("SELECT equipment_name, producer, model, amount, IFNULL(e.amount,0)-IFNULL(h.used,0) as amount_free, tag, description, URL, image FROM `equipments` e  left join  (select equipment_id, IFNULL(count(*),0) as used from `hire` where date_return is null group by equipment_id ) h on e.equipment_id = h.equipment_id where e.tag='$tags' order by e.equipment_id  ");
    }
    while ($row=$query->fetch(PDO::FETCH_OBJ)) {
      echo '<div class="disabled__container">
        <div class="disabled__col  disabled__col--first">
        <i> <h4>'.$row->equipment_name.'</h4></i>
        <br><h6> producer: '.$row->producer.'
        <br>model: '.$row->model.'</h6>
        <br>tag:   '.$row->tag. '
        <br>
        <br>number of all items:  '.$row->amount.'
        <br>number of items available for rent:  '.$row->amount_free.'
        </div>
        <div class="disabled__col  disabled__col--second">
        '.$row->description.'
        <br><br>
         <a href= '.$row->URL.'> <b>more</b></a>
         </div>
         <div class="fdisabled__col  disabled__col--third">
         <img src="'.$row->image.'" alt="">
         </div>
         </div>';}
    ?>

  </body>
</html>
