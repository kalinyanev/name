<?php
$i = 1;
do
{
      $i++;
      if ($i == 5)
            continue;
      elseif ($i==7)
            break;
      else
            echo $i;
}
while ( $i < 10 );
?>
