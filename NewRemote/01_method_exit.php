<?php
echo "dasda1";
echo "dasda2";
echo "dasda3";
echo "dasda4";
echo "dasda5";
echo("000");

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