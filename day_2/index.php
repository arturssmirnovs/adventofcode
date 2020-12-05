<?php
require_once "class.php";
require_once "class2.php";

// let's do magic
$run = new DayTwo("data.txt");
echo $run->output();

echo "<br/>";

// let's do magic
$run = new DayTwoPart2("data.txt");
echo $run->output();
