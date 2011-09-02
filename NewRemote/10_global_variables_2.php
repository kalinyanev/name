<?php
$aaa="Hello";
function foo()
{
    global $aaa;
    echo $aaa;
}
foo();
?>