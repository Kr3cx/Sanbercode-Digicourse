<?php
require_once 'animal.php';

class Frog extends Animal
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function jump()
    {
        echo "hop hop<br>";
    }
}
?>