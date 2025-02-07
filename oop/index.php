<?php
require_once 'animal.php';
require_once 'ape.php';
require_once 'frog.php';

$sheep = new Animal("shaun");
echo "Name: " . $sheep->name . "<br>";
echo "Legs: " . $sheep->legs . "<br>";
echo "Cold Blooded: " . $sheep->cold_blooded . "<br><br>";

$sungokong = new Ape("kera sakti");
echo "Name: " . $sungokong->name . "<br>";
echo "Legs: " . $sungokong->legs . "<br>";
$sungokong->yell();

$kodok = new Frog("buduk");
echo "Name: " . $kodok->name . "<br>";
echo "Legs: " . $kodok->legs . "<br>";
$kodok->jump();
?>