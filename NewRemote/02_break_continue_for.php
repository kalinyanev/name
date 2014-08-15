<?php
echo "Studio11,b244_1";
for($i=1;$i<10;$i++)
{
	if($i==3)
		continue;
	elseif($i==5)
		break;
	echo $i;
}
?>