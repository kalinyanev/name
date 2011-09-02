<?php
include_once 'Customer.php';
$cust1 = new Customer ( "Shirley", "Goldbarg", 28, "female", "Visa", "12345678" );
$cust2 = new Customer ( "Shiri", "Goldbarg", 25, "female", "MasterCard", "22222222" );
$cust3 = new Customer ( "", "Goldbarg", 7, "fmale", "ccc", "22222222" );

echo $cust1->printData ();
echo $cust2->printData ();
echo $cust3->printData ();
?>