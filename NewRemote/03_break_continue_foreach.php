<?php
echo "123";
$arr = array(1, 2, 3, 4);
foreach ($arr as $value) {
    if($value==2)
    	continue;
    elseif ($value==5)
    	break;
    echo $value;
}
?>