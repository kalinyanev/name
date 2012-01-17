<?php
echo("1234");
echo("5678");
echo("5678");
echo("567822");
class A
{
	public function execute($var)
	{
		if($var==0)
			throw new Exception("Exception ...");
		else
			return 1;
	}
}
?>