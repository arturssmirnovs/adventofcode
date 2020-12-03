<?php
require_once "class.php";
require_once "class2.php";

// let's do magic
$run = new DayOne("data.txt");
echo $run->output();

echo "<br/>";

$run = new DayTwo("data.txt");
echo $run->output();