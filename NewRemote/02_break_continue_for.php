<?php
echo "123645645";
for($i=1;$i<10;$i++)
{
	if($i==3)
		continue;
	elseif($i==5)
		break;
	echo $i;
}
?>