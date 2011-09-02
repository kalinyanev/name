<?php
include_once 'Person.php';
$p1 = new Person ( "Gadi", "Goldbarg", 35, "male" );
$p2 = new Person ( "Gaya", "Goldbarg", 3, "female" );
$p3 = new Person ( "", "", 1, "xxx" );

echo $p1->printData ();
echo $p2->printData ();
echo $p3->printData ();
?>