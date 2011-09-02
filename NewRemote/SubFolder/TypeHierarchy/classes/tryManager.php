<?php
include_once 'Manager.php';
$m1 = new Manager ( "Oren", "Goldi", 28, "male", 4000, 20, "Volvo" );
echo $m1->printData ();
?>