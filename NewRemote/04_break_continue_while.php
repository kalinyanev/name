<?php
$i=1;
while($i<10)
{
	$i++;
	if($i==3)
		continue;
	elseif($i==7)
		break;
	echo $i;		
}
?>