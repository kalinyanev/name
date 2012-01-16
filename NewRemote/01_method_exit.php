<?php
echo("1234");

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