
<?php if(!isset($_COOKIE["employee"])): ?>
<div class="container mt-4">
  <h1>Authorization for employee</h1>
  <form action="employee_auth.php" method="post">
    <input type="text" class="form-control" name="login"  id="login" placeholder="Enter login"><br>
    <input type="password" class="form-control" name="password"  id="password" placeholder="Enter password"><br>
    <button class="button-23=success" type="submit"><h5>Login</h5></button>
  </form>
</div>
<?php else:$login = $_COOKIE['employee'];  ?>

  <?php
  require('fpdf184/fpdf.php');
  require 'configDB.php';

  $pdf = new FPDF();
   $pdf->AddPage();
   $pdf->SetFont('arial','',12);

  $pdf->Cell(45,10,"Equipment",1,0);
  $pdf->Cell(20,10,"Amount",1,0);
   $pdf->Cell(20,10,"Available",1,0);
$query=$pdo->query("select * from report_for_guest  order by equipment_name");
   while ($row=$query->fetch(PDO::FETCH_OBJ)) {
     $equipment_name=$row->equipment_name;
     $model=$row->model;
     $amount=$row->amount;
     $amount_free=$row->amount_free;
     $pdf->Ln();
     $pdf->Cell(45,10,$equipment_name,1,0);
     $pdf->Cell(20,10,$amount,1,0);
    $pdf->Cell(20,10,$amount_free,1,0);
      };
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(40,10,"Equipment",1,0);
$pdf->Cell(45,10,"Rent Date",1,0);
$pdf->Cell(25,10,"Login",1,0);
 $pdf->Cell(35,10,"Name",1,0);
  $pdf->Cell(35,10,"Surname",1,0);
$query=$pdo->query("select * from report_for_employee  order by equipment_name");
 while ($row=$query->fetch(PDO::FETCH_OBJ)) {
   $equipment_name=$row->equipment_name;
   $model=$row->model;
   $date_borrow=$row->date_borrow;
   $user_name=$row->user_name;
   $surname=$row->surname;
   $login=$row->login;
   $pdf->Ln();
   $pdf->Cell(40,10,$equipment_name,1,0);
   $pdf->Cell(45,10,$date_borrow,1,0);
  $pdf->Cell(25,10,$login,1,0);
  $pdf->Cell(35,10,$user_name,1,0);
 $pdf->Cell(35,10,$surname,1,0);
    };
$pdf->Ln();
$pdf->Ln();

   $file = 'employee_report'.time().'.pdf';
    $pdf->output($file,'D');

?>

<?php endif; ?>
