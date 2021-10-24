<?php
setcookie('employee','login', time()-3600, "/university_laboratory/");

header('Location: /university_laboratory/employee.php');
?>
