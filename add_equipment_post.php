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

<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname="university_laboratory";


$equipment_name= filter_var(trim($_POST['equipment_name']),FILTER_SANITIZE_STRING);
$model= filter_var(trim($_POST['model']),FILTER_SANITIZE_STRING);
$producer= filter_var(trim($_POST['producer']),FILTER_SANITIZE_STRING);
$image= filter_var(trim($_POST['image']),FILTER_SANITIZE_STRING);
$description= filter_var(trim($_POST['description']),FILTER_SANITIZE_STRING);
$URL= filter_var(trim($_POST['URL']),FILTER_SANITIZE_STRING);
$tag= filter_var(trim($_POST['tag']),FILTER_SANITIZE_STRING);
$amount_new= filter_var(trim($_POST['amount']),FILTER_SANITIZE_STRING);



if($equipment_name==''){
  echo
  '<a class="nav__link active" href="add_equipments.php"> <h3><b>Back</3></h4></a>'.
  '<h4>Enter equipment_name</h4> '   ;
  exit;
  }

  if($amount_new==''||$amount_new<0){
    echo
    '<a class="nav__link active" href="add_equipments.php"> <h3><b>Back</3></h4></a>'.
    '<h4>Enter amount</h4> '   ;
    exit;
    }


 require 'configDB.php';
 $sql = "SELECT * FROM `equipments` WHERE `equipment_name`=:equipment_name AND `producer`=:producer AND `model`=:model ";
 $query=$pdo->prepare($sql);
 $query->execute(array('equipment_name' => $equipment_name,'producer' => $producer,'model' => $model ));
$amount_old=0;
  while ($row=$query->fetch(PDO::FETCH_OBJ)) {
$amount_old=$row->amount;
}
$amount_add=$amount_old+$amount_new;
 $equipment_count=$query->rowCount();

 if($equipment_count>0){

  require 'configDB.php';
  //$dsn = "mysql:host={$servername};dbname={$dbname}";
  //$pdo=new PDO($dsn, $username, $password );
  $sql='UPDATE  equipments SET `amount`= :amount_add WHERE `equipment_name`=:equipment_name AND `producer`=:producer AND `model`=:model ';
  $query=$pdo->prepare($sql);
  $query->execute(array('amount_add'=>$amount_add,'equipment_name'=>$equipment_name, 'producer'=> $producer, 'model'=>$model ));



  echo '<h4>The equipment has been added test.</h4>';
  echo '<a class="nav__link active" href="add_equipments.php"> <h3><b>Back</3></h4></a>';
}
 else
 {
require 'configDB.php';
//$dsn = "mysql:host={$servername};dbname={$dbname}";
//$pdo=new PDO($dsn, $username, $password );
$sql='INSERT INTO equipments(equipment_name, model, producer, image, description, URL, tag, amount) VALUES(:equipment_name, :model, :producer, :image, :description, :URL, :tag, :amount)';
$query=$pdo->prepare($sql);

$query->execute(array('equipment_name' => $equipment_name, 'model' => $model, 'producer' => $producer, 'image' => $image, 'description' => $description, 'URL' => $URL, 'tag' => $tag, 'amount' => $amount_new));

echo '<h4>The equipment has been added.</h4>';
echo '<a class="nav__link active" href="add_equipments.php"> <h3><b>Back</3></h4></a>';
}

?>
<?php endif; ?>

</body>

</html>
