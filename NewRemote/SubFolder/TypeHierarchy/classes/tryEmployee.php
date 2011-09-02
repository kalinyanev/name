<?php
require_once 'Employee.php';
$emp1 = new Employee ( "GadiEmp", "Goldbarg", 28, "male", 2000, 2 );
$emp2 = new Employee ( "ShiriEmp", "Goldbarg", 28, "female", 3000, 3 );
$emp3 = new Employee ( "Emp3", "Goldbarg", 28, "ffmale", 3000, 0 );

echo $emp1->printData ();
echo $emp2->printData ();
echo $emp3->printData ();
?>