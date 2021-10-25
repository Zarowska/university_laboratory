<?php
setcookie('student','login', time()-3600, "/university_laboratory/");

header('Location: /university_laboratory/student.php');
?>
