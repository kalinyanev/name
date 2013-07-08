<?php
echo("kalin_Studio 10.1.0 #708");

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