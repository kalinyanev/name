<?php
echo("Studio 10.5, this is build 58_ Kalin");

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