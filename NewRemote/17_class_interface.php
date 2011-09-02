<?php
class Person {
    public $name;
    function doNothing() {
        echo "Too lazy ...";
    }
}
interface facingAjob {
    function doSomething();
}
class ITperson extends Person implements facingAjob {
    function doSomething() {
        echo "Oh nooo ...";
    }
    function doNothing(){}
}
$manager = new Person ( );
$developer = new ITperson ( );
$qa = new ITperson ( );
$qa->doSomething ();
?> 