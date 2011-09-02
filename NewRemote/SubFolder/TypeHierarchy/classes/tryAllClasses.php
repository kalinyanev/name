<?php
include_once 'Person.php';
$p1 = new Person ( "Gadi", "Goldbarg", 35, "male" );
$p2 = new Person ( "Gaya", "Goldbarg", 3, "female" );
$p3 = new Person ( "", "", 1, "xxx" );

echo $p1->printData ();
echo $p2->printData ();
echo $p3->printData ();
?>

<?php
include_once 'Employee.php';

$emp1 = new Employee ( "GadiEmp", "Goldbarg", 28, "male", 2000, 2 );
$emp2 = new Employee ( "ShiriEmp", "Goldbarg", 28, "female", 3000, 3 );
$emp3 = new Employee ( "Emp3", "Goldbarg", 28, "ffmale", 3000, 0 );

echo $emp1->printData ();
echo $emp2->printData ();
echo $emp3->printData ();
?>

<?php
include_once 'Customer.php';
$cust1 = new Customer ( "Shirley", "Goldbarg", 28, "female", "Visa", "12345678" );
$cust2 = new Customer ( "Shiri", "Goldbarg", 25, "female", "MasterCard", "22222222" );
$cust3 = new Customer ( "", "Goldbarg", 7, "fmale", "ccc", "22222222" );

echo $cust1->printData ();
echo $cust2->printData ();
echo $cust3->printData ();
?>

<?php
include_once 'Manager.php';
$m1 = new Manager ( "Oren", "Goldi", 28, "male", 4000, 20, "Volvo" );
echo $m1->printData ();
?>