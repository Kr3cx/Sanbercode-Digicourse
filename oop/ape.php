<?php
require_once 'animal.php';

class Ape extends Animal
{
    public $legs = 2;

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function yell()
    {
        echo "Auooo<br>";
    }
}
?>